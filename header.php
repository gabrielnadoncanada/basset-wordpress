<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lexend
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>


    <?php
    $lexend_preloader = get_theme_mod('lexend_preloader', false);
    $lexend_preloader_style2 = get_theme_mod('lexend_preloader_select', 'option-2');
    $lexend_preloader_logo = get_template_directory_uri() . '/assets/img/logo/preloader.svg';
    $preloader_logo = get_theme_mod('preloader_logo', $lexend_preloader_logo);

    $lexend_backtotop = get_theme_mod('lexend_backtotop', false);
    $lexend_mode_switcher = get_theme_mod('lexend_mode_switcher', false);

    ?>


    <?php if (!empty($lexend_preloader) && $lexend_preloader_style2 == 'option-2') : ?>
        <div id="lexendLoader" class="preloader">
            <div class="loader">
                <div class="loader-container">
                    <div class="loader-icon"><img src="<?php echo esc_url($preloader_logo) ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($lexend_mode_switcher || $lexend_backtotop)) : ?>
        <div class="backtotop-wrap position-fixed bottom-0 end-0 z-999 m-2 vstack">
            <?php if (!empty($lexend_mode_switcher)) : ?>
                <div class="darkmode-trigger cstack w-40px h-40px rounded-circle text-none bg-gray-100 dark:bg-gray-700 dark:text-white" data-darkmode-toggle="">
                    <label class="switch">
                        <span class="sr-only"><?php echo esc_html__('Dark mode toggle', 'lexend') ?></span>
                        <input type="checkbox">
                        <span class="slider fs-5"></span>
                    </label>
                </div>
            <?php endif; ?>
            <?php if (!empty($lexend_backtotop)) : ?>
                <a class="btn btn-sm bg-primary text-white w-40px h-40px rounded-circle" href="to_top" data-uc-backtotop>
                    <i class="unicon-chevron-up"></i>
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>


    <?php do_action('lexend_header_style'); ?>

    <!-- main-area -->
    <main class="main-area">

        <?php do_action('lexend_before_main_content'); ?>