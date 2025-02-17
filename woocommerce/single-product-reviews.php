<?php

/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 100.3.0
 */

defined('ABSPATH') || exit;

global $product;

if (!comments_open()) {
    return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
    <div class="row g-0 lg:g-9 sep" data-uc-grid>
        <div class="col-12 lg:col-6">
            <div id="comments" class="panel vstack gap-1 lg:gap-2">
                <h2 class="woocommerce-Reviews-title h5 lg:h4 m-0">
                    <?php
                    $count = $product->get_review_count();
                    if ($count && wc_review_ratings_enabled()) {
                        /* translators: 1: reviews count 2: product name */
                        $reviews_title = sprintf(esc_html(_n('%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'lexend')), esc_html($count), '<span>' . get_the_title() . '</span>');
                        echo apply_filters('woocommerce_reviews_title', $reviews_title, $count, $product); // WPCS: XSS ok.
                    } else {
                        esc_html_e('Reviews', 'lexend');
                    }
                    ?>
                </h2>

                <?php if (have_comments()) : ?>
                    <div class="reviews-wrap panel vstack gap-4 mt-6">
                        <ol class="reviews-lisiting p-0 panel row child-cols-12 sep-x gy-9">
                            <?php wp_list_comments(apply_filters('woocommerce_product_review_list_args', array('callback' => 'woocommerce_comments'))); ?>
                        </ol>
                    </div>
                    <?php
                    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
                        echo '<nav class="woocommerce-pagination">';
                        paginate_comments_links(
                            apply_filters(
                                'woocommerce_comment_pagination_args',
                                array(
                                    'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
                                    'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                                    'type'      => 'list',
                                )
                            )
                        );
                        echo '</nav>';
                    endif;
                    ?>
                <?php else : ?>
                    <p class="woocommerce-noreviews text-dark dark:text-white text-opacity-70"><?php esc_html_e('There are no reviews yet.', 'lexend'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>
            <div class="col">
                <div class="panel vstack gap-1 lg:gap-2" data-uc-sticky="bottom: true; offset: 40;">
                    <div id="review_form_wrapper">
                        <div id="review_form" class="comment-input">
                            <?php
                            $commenter    = wp_get_current_commenter();
                            $comment_form = array(
                                /* translators: %s is product title */
                                'title_reply'         => have_comments() ? esc_html__('Submit a review', 'lexend') : sprintf(esc_html__('Be the first to review &ldquo;%s&rdquo;', 'lexend'), get_the_title()),
                                /* translators: %s is product title */
                                'title_reply_to'      => esc_html__('Leave a Reply to %s', 'lexend'),
                                'title_reply_before'  => '<h4 id="reply-title" class="h5 lg:h4 mb-2">',
                                'title_reply_after'   => '</h4>',
                                'comment_notes_after' => '',
                                'label_submit'        => esc_html__('Submit Review', 'lexend'),
                                'logged_in_as'        => '',
                                'comment_field'       => '',
                            );

                            $name_email_required = (bool) get_option('require_name_email', 1);
                            $fields              = array(
                                'author' => array(
                                    'label'    => __('Name', 'lexend'),
                                    'type'     => 'text',
                                    'value'    => $commenter['comment_author'],
                                    'required' => $name_email_required,
                                ),
                                'email'  => array(
                                    'label'    => __('Email', 'lexend'),
                                    'type'     => 'email',
                                    'value'    => $commenter['comment_author_email'],
                                    'required' => $name_email_required,
                                ),
                            );

                            $comment_form['fields'] = array();

                            foreach ($fields as $key => $field) {
                                $field_html  = '<p class="comment-form-' . esc_attr($key) . '">';
                                $field_html .= '<label for="' . esc_attr($key) . '">' . esc_html($field['label']);

                                if ($field['required']) {
                                    $field_html .= '&nbsp;<span class="required">*</span>';
                                }

                                $field_html .= '</label><div class="comment-field"><input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="' . esc_attr($field['type']) . '" value="' . esc_attr($field['value']) . '" size="30" ' . ($field['required'] ? 'required' : '') . ' /></div></p>';

                                $comment_form['fields'][$key] = $field_html;
                            }

                            $account_page_url = wc_get_page_permalink('myaccount');
                            if ($account_page_url) {
                                /* translators: %s opening and closing link tags respectively */
                                $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf(esc_html__('You must be %1$slogged in%2$s to post a review.', 'lexend'), '<a href="' . esc_url($account_page_url) . '">', '</a>') . '</p>';
                            }

                            if (wc_review_ratings_enabled()) {
                                $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__('Your rating', 'lexend') . (wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '') . '</label>
                                    <select class="d-none" name="rating" id="rating" required>
                                        <option value="">' . esc_html__('Rate&hellip;', 'lexend') . '</option>
                                        <option value="5">' . esc_html__('Perfect', 'lexend') . '</option>
                                        <option value="4">' . esc_html__('Good', 'lexend') . '</option>
                                        <option value="3">' . esc_html__('Average', 'lexend') . '</option>
                                        <option value="2">' . esc_html__('Not that bad', 'lexend') . '</option>
                                        <option value="1">' . esc_html__('Very poor', 'lexend') . '</option>
                                    </select>
                                </div>';
                            }

                            $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__('Your review', 'lexend') . '&nbsp;<span class="required">*</span></label><div class="comment-field"><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></div></p>';

                            comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="col">
                <p class="woocommerce-verification-required"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'lexend'); ?></p>
            </div>
        <?php endif; ?>

        <div class="clear"></div>
    </div>