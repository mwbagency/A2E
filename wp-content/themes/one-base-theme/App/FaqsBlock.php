<?php

declare(strict_types=1);

namespace One202x\Theme;

use One202x\Faqs\FaqValues;
use WP_Block;
use WP_Block_Type;
use WP_Block_Type_Registry;
use WP_Post;
use WP_Query;

defined('ABSPATH') || exit;

final class FaqsBlock
{
    private const POST_TYPE = 'faq';
    private const LEGACY_BLOCK_NAME = 'one-faqs/accordion-item';
    private const MAX_ITEMS = 8;

    private readonly ?FaqValues $values;

    public function __construct()
    {
        $this->values = class_exists(FaqValues::class) ? new FaqValues() : null;
    }

    public function register_hooks(): void
    {
        add_action('init', [$this, 'register_legacy_block'], 20);

        add_filter('query_loop_block_query_vars', [$this, 'filter_legacy_query'], 10, 2);
    }

    public function register_legacy_block(): void
    {
        $block = WP_Block_Type_Registry::get_instance()->get_registered(
            'one-faqs/faqs'
        );

        if (!$block instanceof WP_Block_Type) {
            return;
        }

        // Keep existing FAQ Query Loops working; new content uses the FAQ List.
        register_block_type(
            self::LEGACY_BLOCK_NAME,
            [
                'api_version' => 3,
                'title' => __('FAQ accordion item', 'one-base-theme'),
                'category' => 'widgets',
                'icon' => 'editor-help',
                'parent' => ['core/post-template'],
                'uses_context' => [
                    'postId',
                    'postType',
                ],
                'supports' => [
                    'html' => false,
                    'inserter' => false,
                    'reusable' => false,
                ],
                'editor_script_handles' => $block->editor_script_handles,
                'view_script_handles' => $block->view_script_handles,
                'style_handles' => $block->style_handles,
                'editor_style_handles' => $block->editor_style_handles,
                'render_callback' => [$this, 'render_legacy_item'],
            ]
        );
    }

    /** @param array<string, mixed> $attributes */
    public function render_faqs(array $attributes): string
    {
        $faqIds = $this->normaliseIds($attributes['faqIds'] ?? []);
        $columns = (int) ($attributes['columns'] ?? 1) === 2 ? 2 : 1;
        $singleOpen = !isset($attributes['singleOpen'])
            || (bool) $attributes['singleOpen'];
        $limit = min(
            self::MAX_ITEMS,
            max(1, (int) ($attributes['limit'] ?? self::MAX_ITEMS))
        );

        $queryArguments = [
            'post_type' => self::POST_TYPE,
            'post_status' => 'publish',
            'has_password' => false,
            'posts_per_page' => $limit,
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => true,
            'no_found_rows' => true,
        ];

        if ($faqIds !== []) {
            $queryArguments['post__in'] = $faqIds;
            $queryArguments['orderby'] = 'post__in';
            $queryArguments['order'] = 'ASC';
            $queryArguments['posts_per_page'] = count($faqIds);
        }

        $posts = post_type_exists(self::POST_TYPE)
            ? (new WP_Query($queryArguments))->posts
            : [];
        $items = [];

        foreach ($posts as $post) {
            if ($post instanceof WP_Post) {
                $items[] = $this->renderItem($post->ID);
            }
        }

        $wrapperOptions = [
            'class' => sprintf(
                'one-faqs-faqs one-faqs-faqs--columns-%d',
                $columns
            ),
            'data-one-faqs-single-open' => $singleOpen ? 'true' : 'false',
        ];

        if (isset($attributes['anchor']) && is_string($attributes['anchor'])) {
            $wrapperOptions['id'] = $attributes['anchor'];
        }

        $wrapperAttributes = get_block_wrapper_attributes($wrapperOptions);

        if ($items === []) {
            return sprintf(
                '<div %1$s><p class="one-faqs-faqs__empty">%2$s</p></div>',
                $wrapperAttributes,
                esc_html__('No FAQs are available.', 'one-base-theme')
            );
        }

        return sprintf(
            '<div %1$s><div class="one-faqs-faqs__items">%2$s</div></div>',
            $wrapperAttributes,
            implode('', $items)
        );
    }

    /**
     * Render the hidden item block used by existing FAQ Query Loops.
     *
     * @param array<string, mixed> $attributes
     */
    public function render_legacy_item(
        array $attributes,
        string $content,
        WP_Block $block,
    ): string {
        $postId = (int) ($block->context['postId'] ?? 0);

        if (
            $postId < 1
            || get_post_type($postId) !== self::POST_TYPE
            || get_post_status($postId) !== 'publish'
            || post_password_required($postId)
        ) {
            return '';
        }

        return $this->renderItem(
            $postId,
            get_block_wrapper_attributes([
                'class' => 'one-faqs-faqs__item',
                'data-one-faqs-legacy-item' => 'true',
            ])
        );
    }

    /**
     * Keep previously saved curated FAQ Query Loops working.
     *
     * @param array<string, mixed> $query
     * @return array<string, mixed>
     */
    public function filter_legacy_query(
        array $query,
        WP_Block $block
    ): array {
        $blockQuery = is_array($block->context['query'] ?? null)
            ? $block->context['query']
            : [];

        if (
            ($blockQuery['postType'] ?? '') !== self::POST_TYPE
            || empty($blockQuery['one202xFaqSelection'])
        ) {
            return $query;
        }

        $query['post_type'] = self::POST_TYPE;
        $query['post_status'] = 'publish';
        $query['has_password'] = false;
        $query['posts_per_page'] = min(
            self::MAX_ITEMS,
            max(1, (int) ($query['posts_per_page'] ?? self::MAX_ITEMS))
        );

        $faqIds = $this->normaliseIds($blockQuery['include'] ?? []);

        if ($faqIds === []) {
            return $query;
        }

        $query['post__in'] = $faqIds;
        $query['orderby'] = 'post__in';
        $query['order'] = 'ASC';
        $query['posts_per_page'] = count($faqIds);

        return $query;
    }

    /**
     * @return list<int>
     */
    private function normaliseIds(mixed $ids): array
    {
        if (!is_array($ids)) {
            return [];
        }

        return array_slice(
            array_unique(array_filter(array_map('absint', $ids))),
            0,
            self::MAX_ITEMS
        );
    }

    private function renderItem(
        int $postId,
        string $attributes = ''
    ): string {
        $title = get_the_title($postId);
        $question = is_string($title) && $title !== ''
            ? $title
            : __('Untitled FAQ', 'one-base-theme');

        $answer = $this->values?->get(
            'answer',
            $postId,
            [],
            ['source' => 'accordion']
        );
        $answer = is_string($answer) ? $answer : '';

        if ($attributes === '') {
            $attributes = 'class="one-faqs-faqs__item"';
        }

        ob_start();
        get_template_part(
            'blocks/faq-list/parts/item',
            null,
            [
                'attributes' => $attributes,
                'question' => $question,
                'answer' => $answer,
                'post_id' => $postId,
            ]
        );

        return (string) ob_get_clean();
    }
}
