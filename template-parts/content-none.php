<?php

/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lexend
 */

?>

<section class="no-results not-found rounded-2 p-4 bg-secondary dark:bg-gray-300 dark:bg-opacity-10">
    <header class="page-header">
        <h1 class="page-title blog-search-title"><?php esc_html_e('Nothing Found', 'lexend'); ?></h1>
    </header><!-- .page-header -->

    <div class="pageontent blog-search-content mt-20 mb-10">
        <?php
        if (is_home() && current_user_can('publish_posts')) :

            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'lexend'),
                    [
                        'a' => [
                            'href' => [],
                        ],
                    ]
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );

        elseif (is_search()) :
        ?>

            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lexend'); ?></p>
        <?php
            get_search_form();
        else :
        ?>

            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lexend'); ?></p>
        <?php
            get_search_form();

        endif;
        ?>
    </div>
</section>