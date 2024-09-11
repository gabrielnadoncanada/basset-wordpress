<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package lexend
 */

get_header();

$blog_column_lg = is_active_sidebar('blog__sidebar') ? 'lg:col-8' : 'col-12';

?>

<div class="blog__area py-8 lg:py-9">
    <div class="container max-w-xl">
        <div class="blog__inner-wrap">
            <div class="row justify-center">
                <div class="<?php print esc_attr($blog_column_lg); ?>">
                    <div class="blog-post-wrap">
                        <?php
                        if (have_posts()) :
                        ?>
                            <div class="result-bar page-header d-none">
                                <h1 class="page-title"><?php esc_html_e('Search Results For:', 'lexend'); ?> <?php print get_search_query(); ?></h1>
                            </div>
                            <?php
                            while (have_posts()) : the_post();
                                get_template_part('template-parts/content', 'search');
                            endwhile;
                            ?>
                            <nav class="pagination-wrap">
                                <?php lexend_pagination('<i class="unicon-chevron-left"></i>', '<i class="unicon-chevron-right"></i>', '', ['class' => 'page-link next']); ?>
                            </nav>
                        <?php
                        else :
                            get_template_part('template-parts/content', 'none');
                        endif;
                        ?>
                    </div>
                </div>
                <?php if (is_active_sidebar('blog__sidebar')) : ?>
                    <div class="lg:col-4">
                        <aside class="blog__sidebar rounded-2 p-4 bg-secondary dark:bg-gray-300 dark:bg-opacity-10">
                            <?php get_sidebar(); ?>
                        </aside>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
