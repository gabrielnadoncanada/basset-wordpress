<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package lexend
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lexend_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    if (!empty($get_user)) {
        $classes[] = 'profile-breadcrumb';
    }

    $classes[] = 'uni-body panel bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-200 overflow-x-hidden';

    return $classes;
}
add_filter('body_class', 'lexend_body_classes');

/**
 * Get tags.
 */
function lexend_get_tag()
{
    $html = '';
    if (has_tag()) {
        $html .= '<div class="post-tags"><h5 class="tag-title">' . esc_html__('Post Tags :', 'lexend') . '</h5>';
        $html .= get_the_tag_list('<ul class="list-wrap p-0 mb-0"><li>', '</li><li>', '</li></ul>');
        $html .= '</div>';
    }
    return $html;
}

/**
 * Get Social.
 */
function lexend_social_share()
{ ?>
    <ul class="list-wrap p-0 mb-0">
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        <li>
            <a href="https://twitter.com/home?status=<?php the_permalink() ?>" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M10.0596 7.34522L15.8879 0.570312H14.5068L9.44607 6.45287L5.40411 0.570312H0.742188L6.85442 9.46578L0.742188 16.5703H2.12338L7.4676 10.3581L11.7362 16.5703H16.3981L10.0593 7.34522H10.0596ZM8.16787 9.54415L7.54857 8.65836L2.62104 1.61005H4.74248L8.71905 7.29827L9.33834 8.18405L14.5074 15.5779H12.386L8.16787 9.54449V9.54415Z" fill="currentColor"></path>
                </svg>
            </a>
        </li>
        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
        <li><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink() ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
    </ul>
<?php
}

/**
 * Get categories.
 */
function lexend_get_category()
{

    $categories = get_the_category(get_the_ID());
    $x = 0;
    foreach ($categories as $category) {

        if ($x == 2) {
            break;
        }
        $x++;
        print '<a class="news-tag" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
    }
}

/** img alt-text **/
function lexend_img_alt_text($img_er_id = null)
{
    $image_id = $img_er_id;
    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', false);
    $image_title = get_the_title($image_id);

    if (!empty($image_id)) {
        if ($image_alt) {
            $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', false);
        } else {
            $alt_text = get_the_title($image_id);
        }
    } else {
        $alt_text = esc_html__('Image Alt Text', 'lexend');
    }

    return $alt_text;
}

// lexend_offer_sidebar_func
function lexend_offer_sidebar_func()
{
    if (is_active_sidebar('offer-sidebar')) {

        dynamic_sidebar('offer-sidebar');
    }
}
add_action('lexend_offer_sidebar', 'lexend_offer_sidebar_func', 20);

// lexend_service_sidebar
function lexend_service_sidebar_func()
{
    if (is_active_sidebar('services-sidebar')) {

        dynamic_sidebar('services-sidebar');
    }
}
add_action('lexend_service_sidebar', 'lexend_service_sidebar_func', 20);

// lexend_portfolio_sidebar
function lexend_portfolio_sidebar_func()
{
    if (is_active_sidebar('portfolio-sidebar')) {

        dynamic_sidebar('portfolio-sidebar');
    }
}
add_action('lexend_portfolio_sidebar', 'lexend_portfolio_sidebar_func', 20);

// lexend_faq_sidebar
function lexend_faq_sidebar_func()
{
    if (is_active_sidebar('faq-sidebar')) {

        dynamic_sidebar('faq-sidebar');
    }
}
add_action('lexend_faq_sidebar', 'lexend_faq_sidebar_func', 20);
