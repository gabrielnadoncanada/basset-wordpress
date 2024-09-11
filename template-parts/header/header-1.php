<?php

/**
 * Template part for displaying header layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lexend
 */

// Header Settings
$menu_padding = has_nav_menu('main-menu') ? 'lexend-menu-has-showing' : 'lexend-menu-not-showing';


?>


<!-- header-area -->
<header>
    <div class="tg-header__area <?php echo esc_attr($menu_padding) ?>">
        <div class="container max-w-xl">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <?php lexend_header_logo(); ?>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none lg:d-flex">
                                <?php lexend_header_menu(); ?>
                            </div>
                            <?php if (has_nav_menu('main-menu')) { ?>
                                <div class="mobile-nav-toggler">
                                    <a href="javascript:void(0)" class="sidebar-btn">
                                        <svg width="20" height="20" viewBox="0 0 20 20">
                                            <rect class="line-1" y="3" width="20" height="2"></rect>
                                            <rect class="line-2" y="9" width="20" height="2"></rect>
                                            <rect class="line-3" y="9" width="20" height="2"></rect>
                                            <rect class="line-4" y="15" width="20" height="2"></rect>
                                        </svg>
                                    </a>
                                </div>
                            <?php } ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu  -->
    <?php get_template_part('template-parts/header/mobile-menu'); ?>


</header>
<!-- header-area-end -->