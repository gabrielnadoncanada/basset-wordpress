<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lexend
 */

$lexend_blog_btn = get_theme_mod('lexend_blog_btn', __('Read More', 'lexend'));
$lexend_blog_btn_switch = get_theme_mod('lexend_blog_btn_switch', true);

?>

<?php if (!empty($lexend_blog_btn_switch)) : ?>
    <a href="<?php the_permalink(); ?>" class="btn btn-md h-48px min-w-150px btn-primary text-white">
        <?php print esc_html($lexend_blog_btn); ?>
    </a>
<?php endif; ?>