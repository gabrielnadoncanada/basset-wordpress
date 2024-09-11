<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
                        <?php if (have_posts()) : ?>
                            <header class="page-header d-none">
                                <?php
                                the_archive_title('<h1 class="page-title">', '</h1>');
                                the_archive_description('<div class="archive-description">', '</div>');
                                ?>
                            </header><!-- .page-header -->
                            <?php
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();

                                /*
                                * Include the Post-Type-specific template for the content.
                                * If you want to override this in a child theme, then include a file
                                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                */
                                get_template_part('template-parts/content', get_post_type());
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
