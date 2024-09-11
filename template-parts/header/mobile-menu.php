<?php

/**
 * Template part for displaying Mobile Menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lexend
 */

// Mobile Menu
$lexend_show_mobile_social = get_theme_mod('lexend_show_mobile_social', false);

?>


<div class="tgmobile__menu">
    <nav class="tgmobile__menu-box">
        <div class="close-btn"><i class="fas fa-times"></i></div>
        <div class="nav-logo">
            <?php lexend_header_logo(); ?>
        </div>
        <div class="tgmobile__menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="tgmobile__menu-bottom">
            <?php if (!empty($lexend_show_mobile_social)) : ?>
                <div class="social-links">
                    <?php lexend_mobile_social_profiles(); ?>
                </div>
            <?php endif; ?>
        </div>
    </nav>
</div>
<div class="tgmobile__menu-backdrop"></div>