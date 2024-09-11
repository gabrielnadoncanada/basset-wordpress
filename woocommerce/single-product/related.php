<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     100.9.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if ($related_products) : ?>

    <?php
    $heading = apply_filters('woocommerce_product_related_products_heading', __('You might also like', 'lexend'));

    if ($heading) :
    ?>
        <div class="panel hstack justify-center gap-2 text-center">
            <h2 class="h5 lg:h4"><?php echo esc_html($heading); ?></h2>
        </div>
    <?php endif; ?>



    <?php
    $related_class = '';
    if (count($related_products) >= 4) {
        $related_class = 'rel-product-slider-active';
    }
    ?>
    <div class="panel position-relative swiper-parent mt-4 md:mt-6 <?php print esc_attr($related_class); ?>">
        <div class="swiper" data-uc-swiper="items: 2; gap: 8; dots: .swiper-pagination; disable-class: d-none;" data-uc-swiper-s="items: 3; gap: 16;" data-uc-swiper-m="items: 4; gap: 24;" data-uc-swiper-l="items: 4; gap: 32;">
            <div class="swiper-wrapper">
                <?php foreach ($related_products as $related_product) : ?>

                    <div class="swiper-slide">
                        <?php
                        $post_object = get_post($related_product->get_id());

                        setup_postdata($GLOBALS['post'] = &$post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

                        wc_get_template_part('content', 'product');
                        ?>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-nav swiper-next btn btn-xs md:btn-md w-32px md:w-48px h-32px md:h-48px bg-white text-gray-900 dark:bg-gray-700 dark:text-white rounded-circle shadow-xs position-absolute top-50 start-100 translate-middle-x mt-n9 md:mt-n10 z-1">
            <i class="unicon-chevron-right" style="font-size: 20px;"></i>
        </div>
        <div class="swiper-nav swiper-prev btn btn-xs md:btn-md w-32px md:w-48px h-32px md:h-48px bg-white text-gray-900 dark:bg-gray-700 dark:text-white rounded-circle shadow-xs position-absolute top-50 start-0 translate-middle-x mt-n9 md:mt-n10 z-1">
            <i class="unicon-chevron-left" style="font-size: 20px;"></i>
        </div>
    </div>

<?php
endif;

wp_reset_postdata();
