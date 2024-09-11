<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lexend
 */


// Bg color
$footer_bg_color = get_theme_mod('lexend_footer_bg_color');


// BG Color
$bg_color = !empty($lexend_footer_bg_color) ? $lexend_footer_bg_color : $footer_bg_color;


// Footer Columns
$footer_columns = 0;
$footer_widgets = get_theme_mod('footer_widget_number', 4);

for ($num = 1; $num <= $footer_widgets; $num++) {
    if (is_active_sidebar('footer-' . $num)) {
        $footer_columns++;
    }
}

switch ($footer_columns) {
    case '1':
        $footer_class[1] = 'col-12';
        break;
    case '2':
        $footer_class[1] = 'xl:col-3 lg:col-4 sm:col-6';
        $footer_class[2] = 'xl:col-3 lg:col-4 sm:col-6';
        break;
    case '3':
        $footer_class[1] = 'xl:col-3 lg:col-4 sm:col-6';
        $footer_class[2] = 'xl:col-3 lg:col-4 sm:col-6';
        $footer_class[3] = 'xl:col-3 lg:col-4 sm:col-6';
        break;
    case '4':
        $footer_class[1] = 'xl:col-3 lg:col-4 sm:col-6';
        $footer_class[2] = 'xl:col-3 lg:col-4 sm:col-6';
        $footer_class[3] = 'xl:col-3 lg:col-4 sm:col-6';
        $footer_class[4] = 'xl:col-3 lg:col-4 sm:col-6';
        break;
    default:
        $footer_class = 'xl:col-3 lg:col-4 sm:col-6';
        break;
}

?>


<!-- footer-area -->
<footer>
    <div class="footer__area" style="background-color: <?php print esc_attr($bg_color); ?>;">
        <div class="container max-w-xl">
            <?php if (is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) : ?>
                <div class="footer-top">
                    <div class="row">
                        <?php
                        if ($footer_columns < 4) {
                            print '<div class="xl:col-3 lg:col-4 sm:col-6">';
                            dynamic_sidebar('footer-1');
                            print '</div>';

                            print '<div class="xl:col-3 lg:col-4 sm:col-6">';
                            dynamic_sidebar('footer-2');
                            print '</div>';

                            print '<div class="xl:col-3 lg:col-4 sm:col-6">';
                            dynamic_sidebar('footer-3');
                            print '</div>';

                            print '<div class="xl:col-3 lg:col-4 sm:col-6">';
                            dynamic_sidebar('footer-4');
                            print '</div>';
                        } else {
                            for ($num = 1; $num <= $footer_columns; $num++) {
                                if (!is_active_sidebar('footer-' . $num)) {
                                    continue;
                                }
                                print '<div class="' . esc_attr($footer_class[$num]) . '">';
                                dynamic_sidebar('footer-' . $num);
                                print '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="footer__bottom">
            <div class="container max-w-xl">
                <div class="row items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p><?php print lexend_copyright_text(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->