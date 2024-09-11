<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lexend
 */

$lexend_show_blog_share = get_theme_mod('lexend_show_blog_share', false);
$lexend_post_tags_width = $lexend_show_blog_share ? 'md:col-8' : 'col-12';
$lexend_post_style = function_exists('get_field') ? get_field('lexend_post_layout') : NULL;

?>
<?php if (is_single()) : ?>

    <?php if ($lexend_post_style == 'layout-one') { ?>

        <div class="post-header">
            <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                    <h1 class="h4 sm:h2 lg:h1 xl:display-6"><?php the_title(); ?></h1>
                    <ul class="post-share-icons nav-x gap-1 dark:text-white">
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-facebook icon-1"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://twitter.com/home?status=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-x-filled icon-1"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-linkedin icon-1"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-pinterest icon-1"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php the_permalink(); ?>"><i class="unicon-link icon-1"></i></a>
                        </li>
                    </ul>
                </div>
                <figure class="featured-image m-0">
                    <figure class="featured-image m-0 rounded ratio ratio-2x1 rounded uc-transition-toggle overflow-hidden">
                        <?php the_post_thumbnail('full', ['class' => 'media-cover image uc-transition-scale-up uc-transition-opaque']); ?>
                    </figure>
                </figure>
            </div>
        </div>
        <div class="panel my-4 lg:my-6">
            <div class="container p-0 max-w-lg">
                <div class="post-content panel fs-6 md:fs-5" data-uc-lightbox="animation: scale">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages([
                        'before'      => '<div class="page-links">' . esc_html__('Pages:', 'lexend'),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ]);
                    ?>
                </div>
                <?php if (!empty(get_the_tags())) : ?>
                    <div class="post-footer panel vstack sm:hstack gap-3 justify-between justifybetween border-top py-4 mt-4 xl:mt-8">
                        <ul class="nav-x m-0 p-0 gap-narrow text-primary">
                            <li><span class="text-black dark:text-white me-narrow"><?php echo esc_html__('Tags:', 'lexend') ?></span></li>
                            <?php if (has_tag()) {
                                echo get_the_tag_list('<li>', '</li>,<li>', '</li>');
                            } ?>
                        </ul>
                        <?php if (!empty($lexend_show_blog_share)) : ?>
                            <ul class="post-share-icons nav-x gap-narrow">
                                <li class="me-1"><span class="text-black dark:text-white"><?php echo esc_html__('Share :', 'lexend') ?></span></li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-facebook icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://twitter.com/home?status=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-x-filled icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-pinterest icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php the_permalink(); ?>"><i class="unicon-link icon-1"></i></a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php } elseif ($lexend_post_style == 'layout-two') { ?>

        <div class="featured-image m-0 rounded ratio ratio-2x1 rounded-0 uc-transition-toggle overflow-hidden">
            <?php the_post_thumbnail('full', ['class' => 'media-cover image uc-transition-scale-up uc-transition-opaque']); ?>
        </div>

        <div class="post-content-wrap panel">
            <aside class="post-share-float d-none lg:d-block" data-uc-sticky="bottom: .post-author;">
                <div class="vstack justify-center items-center gap-2 position-absolute top-0 end-0 m-4 xl:m-9">
                    <span class="ft-secondary"><?php echo esc_html__('Share', 'lexend'); ?></span>
                    <ul class="social-icons nav-y justify-center gap-2 text-gray-900 dark:text-white">
                        <li>
                            <a class="w-40px xl:w-48px h-40px xl:h-48px d-inline-flex justify-center items-center rounded-circle border transition-all duration-200 ease-in hover:scale-110" href="https://twitter.com/home?status=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-x-filled icon-1 xl:icon-2"></i></a>
                        </li>
                        <li>
                            <a class="w-40px xl:w-48px h-40px xl:h-48px d-inline-flex justify-center items-center rounded-circle border transition-all duration-200 ease-in hover:scale-110 text-white bg-primary border-primary" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-linkedin icon-1 xl:icon-2"></i></a>
                        </li>
                        <li>
                            <a class="w-40px xl:w-48px h-40px xl:h-48px d-inline-flex justify-center items-center rounded-circle border transition-all duration-200 ease-in hover:scale-110" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-facebook icon-1 xl:icon-2"></i></a>
                        </li>
                        <li>
                            <a class="w-40px xl:w-48px h-40px xl:h-48px d-inline-flex justify-center items-center rounded-circle border transition-all duration-200 ease-in hover:scale-110" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-pinterest icon-1 xl:icon-2"></i></a>
                        </li>
                        <li>
                            <a class="w-40px xl:w-48px h-40px xl:h-48px d-inline-flex justify-center items-center rounded-circle border transition-all duration-200 ease-in hover:scale-110" href="<?php the_permalink(); ?>"><i class="unicon-link icon-1 xl:icon-2"></i></a>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="container max-w-900px">
                <div class="post-header mt-4 lg:mt-6 xl:mt-8">
                    <div class="panel vstack items-center gap-2 md:gap-3 text-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto">
                        <h1 class="h4 sm:h3 xl:h1 m-0"><?php the_title(); ?></h1>
                    </div>
                </div>
                <hr class="w-100 my-4 lg:my-6 xl:my-8 opacity-100 border-gray-100 dark:border-gray-700">
                <div class="post-content panel fs-6 md:fs-5" data-uc-lightbox="animation: scale">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages([
                        'before'      => '<div class="page-links">' . esc_html__('Pages:', 'lexend'),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ]);
                    ?>
                </div>
                <?php if (!empty(get_the_tags())) : ?>
                    <div class="post-footer panel vstack sm:hstack gap-3 justify-between justifybetween border-top py-4 mt-4 xl:mt-8 my-b lg:mb-6">
                        <ul class="nav-x m-0 p-0 gap-narrow text-primary">
                            <li><span class="text-black dark:text-white me-narrow"><?php echo esc_html__('Tags:', 'lexend') ?></span></li>
                            <?php if (has_tag()) {
                                echo get_the_tag_list('<li>', '</li>,<li>', '</li>');
                            } ?>
                        </ul>
                        <?php if (!empty($lexend_show_blog_share)) : ?>
                            <ul class="post-share-icons nav-x gap-narrow">
                                <li class="me-1"><span class="text-black dark:text-white"><?php echo esc_html__('Share :', 'lexend') ?></span></li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-facebook icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://twitter.com/home?status=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-x-filled icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-pinterest icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php the_permalink(); ?>"><i class="unicon-link icon-1"></i></a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php } elseif ($lexend_post_style == 'layout-three') { ?>

        <div class="post-header uc-dark">
            <div class="panel vstack gap-4 md:gap-6 xl:gap-8 text-center">
                <div class="panel vstack items-center max-w-400px sm:max-w-500px xl:max-w-md mx-auto gap-2 md:gap-3">
                    <h1 class="h4 sm:h2 lg:h1 xl:display-6"><?php the_title(); ?></h1>
                    <ul class="post-share-icons nav-x gap-1 dark:text-white">
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-facebook icon-1"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://twitter.com/home?status=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-x-filled icon-1"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-linkedin icon-1"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-pinterest icon-1"></i></a>
                        </li>
                        <li>
                            <a class="btn btn-md border-gray-900 border-opacity-15 w-32px lg:w-48px h-32px lg:h-48px text-dark dark:text-white dark:border-white hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php the_permalink(); ?>"><i class="unicon-link icon-1"></i></a>
                        </li>
                    </ul>
                </div>
                <figure class="featured-image m-0">
                    <figure class="featured-image m-0 rounded ratio ratio-2x1 rounded uc-transition-toggle overflow-hidden">
                        <?php the_post_thumbnail('full', ['class' => 'media-cover image uc-transition-scale-up uc-transition-opaque']); ?>
                    </figure>
                </figure>
            </div>
        </div>
        <div class="panel my-4 lg:my-6">
            <div class="container p-0 max-w-lg">
                <div class="post-content panel fs-6 md:fs-5" data-uc-lightbox="animation: scale">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages([
                        'before'      => '<div class="page-links">' . esc_html__('Pages:', 'lexend'),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ]);
                    ?>
                </div>
                <?php if (!empty(get_the_tags())) : ?>
                    <div class="post-footer panel vstack sm:hstack gap-3 justify-between justifybetween border-top py-4 mt-4 xl:mt-8">
                        <ul class="nav-x m-0 p-0 gap-narrow text-primary">
                            <li><span class="text-black dark:text-white me-narrow"><?php echo esc_html__('Tags:', 'lexend') ?></span></li>
                            <?php if (has_tag()) {
                                echo get_the_tag_list('<li>', '</li>,<li>', '</li>');
                            } ?>
                        </ul>
                        <?php if (!empty($lexend_show_blog_share)) : ?>
                            <ul class="post-share-icons nav-x gap-narrow">
                                <li class="me-1"><span class="text-black dark:text-white"><?php echo esc_html__('Share :', 'lexend') ?></span></li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-facebook icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="https://twitter.com/home?status=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-x-filled icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank"><i class="unicon-logo-pinterest icon-1"></i></a>
                                </li>
                                <li>
                                    <a class="btn btn-md btn-outline-gray-100 w-32px lg:w-40px h-32px lg:h-40px text-dark dark:text-white dark:border-gray-600 hover:bg-primary hover:border-primary hover:text-white rounded-circle" href="<?php the_permalink(); ?>"><i class="unicon-link icon-1"></i></a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php } else { ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-item blog-details-wrap format-search'); ?>>

            <?php if (has_post_thumbnail()) : ?>
                <div class="blog__details-thumb featured-image rounded ratio ratio-3x2 rounded-2 uc-transition-toggle overflow-hidden">
                    <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                </div>
            <?php endif; ?>

            <div class="blog__details-content">

                <!-- blog meta -->
                <div class="blog__post-meta">
                    <?php get_template_part('template-parts/blog/blog-meta'); ?>
                </div>

                <div class="post-text">
                    <?php the_content(); ?>
                    <?php
                    wp_link_pages([
                        'before'      => '<div class="page-links">' . esc_html__('Pages:', 'lexend'),
                        'after'       => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ]);
                    ?>
                </div>

                <?php if (!empty(get_the_tags())) : ?>
                    <div class="blog__details-bottom">
                        <div class="row">
                            <div class="<?php echo esc_attr($lexend_post_tags_width); ?>">
                                <?php print lexend_get_tag(); ?>
                            </div>
                            <?php if (!empty($lexend_show_blog_share)) : ?>
                                <div class="md:col-4">
                                    <div class="post-share text-md-end">
                                        <h5 class="social-title"><?php echo esc_html__('Share :', 'lexend') ?></h5>
                                        <?php lexend_social_share(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>
        </article>

    <?php } ?>

<?php else : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-item post type-post panel vstack gap-3 rounded-2 p-3 pb-4 bg-secondary dark:bg-gray-300 dark:bg-opacity-10 format-search'); ?>>

        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-post-thumb featured-image m-0 rounded ratio ratio-3x2 rounded-2 uc-transition-toggle overflow-hidden">
                <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                <a class="position-cover" href="<?php the_permalink(); ?>"></a>
            </div>
        <?php endif; ?>

        <div class="blog-post-content">
            <!-- blog meta -->
            <div class="blog__post-meta">
                <?php get_template_part('template-parts/blog/blog-meta'); ?>
            </div>
            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="blog__post-bottom">
                <?php get_template_part('template-parts/blog/blog-btn'); ?>
            </div>
        </div>

    </article>

<?php endif; ?>