<?php

/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     100.3.0
 */

if (!defined('ABSPATH')) {
    exit;
}
$custom_desktop_col = get_theme_mod('woo_desktop_column', '3');
$custom_mobile_col = get_theme_mod('woo_mobile_column', '6');
$col = isset($_GET['col']) ? $_GET['col'] : $custom_desktop_col;

?>
<div class="shop-lisiting row child-cols-<?php echo esc_attr($custom_mobile_col); ?> lg:child-cols-<?php echo esc_attr($col); ?> col-match gy-4 lg:gy-8 gx-2 lg:gx-4">