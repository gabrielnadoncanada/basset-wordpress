<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lexend
 */
$lexend_blog_author = get_theme_mod('lexend_blog_author', true);
$lexend_blog_date = get_theme_mod('lexend_blog_date', true);
$lexend_blog_comments = get_theme_mod('lexend_blog_comments', true);

?>

<ul class="post-meta nav-x ft-tertiary p-0 m-0 fs-7 gap-1">
    <?php if (!empty($lexend_blog_author)) : ?>
        <li>
            <div class="hstack gap-narrow ft-tertiary">
                <img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'), ['size' => '40'])); ?>" alt="<?php echo esc_attr(get_the_author()); ?>" class="w-24px h-24px rounded-circle me-narrow">
                <a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-none fw-bold text-capitalize text-dark dark:text-white"><?php print get_the_author(); ?></a>
            </div>
        </li>
    <?php endif; ?>
    <?php if (!empty($lexend_blog_date)) : ?>
        <li class="opacity-50">•</li>
        <li>
            <div class="post-date hstack gap-narrow">
                <span><?php the_time(get_option('date_format')); ?></span>
            </div>
        </li>
    <?php endif; ?>
    <?php if (!empty($lexend_blog_comments)) : ?>
        <li class="opacity-50">•</li>
        <li>
            <div class="post-date hstack gap-narrow">
                <span><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
            </div>
        </li>
    <?php endif; ?>
</ul>