<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lexend
 */

get_header();

$blog_column_lg = is_active_sidebar('blog__sidebar') ? 'lg:col-8' : 'col-12';

$lexend_post_style = function_exists('get_field') ? get_field('lexend_post_layout') : NULL;

?>

<?php if ($lexend_post_style == 'layout-one') { ?>

    <section class="blog__area blog-details-area py-8 lg:py-9">
        <div class="container max-w-xl">
            <div class="blog__inner-wrap">
                <div class="blog-post-wrap">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', get_post_format());
                    ?>
                        <div class="container p-0 max-w-lg">
                            <?php get_template_part('template-parts/biography'); ?>

                            <?php if (get_previous_post_link() and get_next_post_link()) : ?>
                                <div class="post-navigation panel vstack sm:hstack justify-between gap-2 lg:gap-8 mb-6 xl:mb-8">
                                    <?php $prev_post = get_previous_post();
                                    if ($prev_post) : ?>
                                        <div class="new-post panel hstack w-100 sm:w-1/2">
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <div class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                                                    <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array('class' => 'media-cover image uc-transition-scale-up uc-transition-opaque')); ?>
                                                </div>
                                            </div>
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3">
                                                <span class="fs-7 opacity-60"><?php print esc_html__('Prev Article', 'lexend'); ?></span>
                                                <h6 class="h6 lg:h5 m-0"><?php print get_previous_post_link('%link ', '%title'); ?></h6>
                                            </div>
                                            <a class="position-cover" href="<?php echo get_permalink($prev_post->ID); ?>"></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post) :
                                    ?>
                                        <div class="new-post panel hstack w-100 sm:w-1/2">
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3 text-end rtl:text-start">
                                                <span class="fs-7 opacity-60"><?php print esc_html__('Next Article', 'lexend'); ?></span>
                                                <h6 class="h6 lg:h5 m-0"><?php print get_next_post_link('%link ', '%title'); ?></h6>
                                            </div>
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <div class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                                                    <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('class' => 'media-cover image uc-transition-scale-up uc-transition-opaque')); ?>
                                                </div>
                                            </div>
                                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="position-cover"></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif; ?>
                        </div>
                    <?php endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php } elseif ($lexend_post_style == 'layout-two') { ?>

    <section class="blog__area blog-details-area pb-8 lg:pb-9">
        <div class="container-full">
            <div class="blog__inner-wrap">
                <div class="blog-post-wrap">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', get_post_format());
                    ?>
                        <div class="container max-w-900px">
                            <?php get_template_part('template-parts/biography'); ?>

                            <?php if (get_previous_post_link() and get_next_post_link()) : ?>
                                <div class="post-navigation panel vstack sm:hstack justify-between gap-2 lg:gap-8 mb-6 xl:mb-8">
                                    <?php $prev_post = get_previous_post();
                                    if ($prev_post) : ?>
                                        <div class="new-post panel hstack w-100 sm:w-1/2">
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <div class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                                                    <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array('class' => 'media-cover image uc-transition-scale-up uc-transition-opaque')); ?>
                                                </div>
                                            </div>
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3">
                                                <span class="fs-7 opacity-60"><?php print esc_html__('Prev Article', 'lexend'); ?></span>
                                                <h6 class="h6 lg:h5 m-0"><?php print get_previous_post_link('%link ', '%title'); ?></h6>
                                            </div>
                                            <a class="position-cover" href="<?php echo get_permalink($prev_post->ID); ?>"></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post) :
                                    ?>
                                        <div class="new-post panel hstack w-100 sm:w-1/2">
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3 text-end rtl:text-start">
                                                <span class="fs-7 opacity-60"><?php print esc_html__('Next Article', 'lexend'); ?></span>
                                                <h6 class="h6 lg:h5 m-0"><?php print get_next_post_link('%link ', '%title'); ?></h6>
                                            </div>
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <div class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                                                    <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('class' => 'media-cover image uc-transition-scale-up uc-transition-opaque')); ?>
                                                </div>
                                            </div>
                                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="position-cover"></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif; ?>
                        </div>
                    <?php endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php } elseif ($lexend_post_style == 'layout-three') { ?>

    <section class="blog__area blog-details-area py-8 lg:py-9">
        <div class="position-absolute top-0 start-0 end-0 min-h-450px lg:min-h-600px xl:min-h-700px 2xl:800px bg-gray-900 z-0"></div>
        <div class="container max-w-xl">
            <div class="blog__inner-wrap">
                <div class="blog-post-wrap">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', get_post_format());
                    ?>
                        <div class="container p-0 max-w-lg">
                            <?php get_template_part('template-parts/biography'); ?>

                            <?php if (get_previous_post_link() and get_next_post_link()) : ?>
                                <div class="post-navigation panel vstack sm:hstack justify-between gap-2 lg:gap-8 mb-6 xl:mb-8">
                                    <?php $prev_post = get_previous_post();
                                    if ($prev_post) : ?>
                                        <div class="new-post panel hstack w-100 sm:w-1/2">
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <div class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                                                    <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array('class' => 'media-cover image uc-transition-scale-up uc-transition-opaque')); ?>
                                                </div>
                                            </div>
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3">
                                                <span class="fs-7 opacity-60"><?php print esc_html__('Prev Article', 'lexend'); ?></span>
                                                <h6 class="h6 lg:h5 m-0"><?php print get_previous_post_link('%link ', '%title'); ?></h6>
                                            </div>
                                            <a class="position-cover" href="<?php echo get_permalink($prev_post->ID); ?>"></a>
                                        </div>
                                    <?php endif; ?>
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post) :
                                    ?>
                                        <div class="new-post panel hstack w-100 sm:w-1/2">
                                            <div class="panel vstack justify-center px-2 gap-1 w-1/3 text-end rtl:text-start">
                                                <span class="fs-7 opacity-60"><?php print esc_html__('Next Article', 'lexend'); ?></span>
                                                <h6 class="h6 lg:h5 m-0"><?php print get_next_post_link('%link ', '%title'); ?></h6>
                                            </div>
                                            <div class="panel hstack justify-center w-100px h-100px">
                                                <div class="featured-image m-0 rounded ratio ratio-1x1 uc-transition-toggle overflow-hidden">
                                                    <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('class' => 'media-cover image uc-transition-scale-up uc-transition-opaque')); ?>
                                                </div>
                                            </div>
                                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="position-cover"></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif; ?>
                        </div>
                    <?php endwhile; // End of the loop.
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php } else { ?>

    <section class="blog__area blog-details-area py-8 lg:py-9">
        <div class="container max-w-xl">
            <div class="blog__inner-wrap">
                <div class="row justify-center">
                    <div class="<?php print esc_attr($blog_column_lg); ?>">
                        <div class="blog-post-wrap">
                            <?php
                            while (have_posts()) :
                                the_post();

                                get_template_part('template-parts/content', get_post_format());

                            ?>

                                <?php
                                if (get_previous_post_link() and get_next_post_link()) : ?>

                                    <div class="blog-next-prev d-none">
                                        <div class="row">
                                            <?php
                                            if (get_previous_post_link()) : ?>
                                                <div class="sm:col-6">
                                                    <div class="post prev">
                                                        <h4 class="title"><?php print get_previous_post_link('%link ', '%title'); ?></h4>
                                                        <span><?php print esc_html__('Prev Post', 'lexend'); ?></span>
                                                    </div>
                                                </div>
                                            <?php
                                            endif; ?>

                                            <?php
                                            if (get_next_post_link()) : ?>
                                                <div class="sm:col-6">
                                                    <div class="post next">
                                                        <h4 class="title"><?php print get_next_post_link('%link ', '%title'); ?></h4>
                                                        <span><?php print esc_html__('Next Post', 'lexend'); ?></span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                <?php endif; ?>
                            <?php

                                get_template_part('template-parts/biography');

                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop. ?>
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
    </section>

<?php } ?>

<?php
get_footer();
