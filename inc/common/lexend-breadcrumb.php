<?php

/**
 * Breadcrumbs for Lexend Theme.
 *
 * @package     lexend
 * @author      ThemeGenix
 * @copyright   Copyright (c) 2024, ThemeGenix
 * @link        https://www.themegenix.com
 * @since       lexend 1.0.0
 */


function lexend_breadcrumb_func()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'lexend'));
        $breadcrumb_class = 'home_front_page';
    }
    elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'lexend'));
        $breadcrumb_show = 0;
    }
    elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    }
    elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    }
    elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'lexend') . get_search_query();
    }
    elseif (is_404()) {
        $title = esc_html__('Page not Found', 'lexend');
    }
    elseif (is_archive() && 'services' == get_post_type()) {
        $title = get_theme_mod('lexend_services_title', __('Services', 'lexend'));
    }
    elseif (is_archive() && 'portfolio' == get_post_type()) {
        $title = get_theme_mod('lexend_portfolio_title', __('Portfolio', 'lexend'));
    }
    elseif (is_archive() && 'team' == get_post_type()) {
        $title = get_theme_mod('lexend_team_title', __('Teams', 'lexend'));
    }
    elseif (is_archive()) {
        $title = get_the_archive_title();
    }
    else {
        $title = get_the_title();
    }

    $_id = get_the_ID();

    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    }
    elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }
    $lexend_post_style = function_exists('get_field') ? get_field('lexend_post_layout') : NULL;

    $is_breadcrumb = function_exists('get_field') ? get_field('is_it_invisible_breadcrumb', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {
        // get_theme_mod
        $breadcrumb_hide_default = get_theme_mod('breadcrumb_hide_default', false);

    ?>

        <?php if (!empty($breadcrumb_hide_default) && $lexend_post_style !== 'layout-two' && $lexend_post_style !== 'layout-three') : ?>
            <div class="breadcrumbs panel z-1 py-2 bg-gray-25 dark:bg-gray-100 dark:bg-opacity-5 dark:text-white">
                <div class="container max-w-xl">
                    <nav aria-label="breadcrumb" class="breadcrumb justify-center gap-1 fs-7 sm:fs-6 m-0">
                        <?php if (function_exists('bcn_display')) {
                            bcn_display();
                        } ?>
                    </nav>
                </div>
            </div>
        <?php endif; ?>
<?php
    }
}

add_action('lexend_before_main_content', 'lexend_breadcrumb_func');
