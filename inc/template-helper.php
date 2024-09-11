<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lexend
 */


/**
 *
 * Lexend Header
 */
function lexend_check_header()
{

    $lexend_header_tabs = function_exists('get_field') ? get_field('genix_header') : false;
    $elementor_header_template_meta = function_exists('get_field') ? get_field('elementor_header_style') : false;

    $lexend_header_option_switch = get_theme_mod('lexend_header_elementor_switch', false);
    $elementor_header_templates_kirki = get_theme_mod('lexend_header_templates');

    if ($lexend_header_tabs == 'default') {
        if ($lexend_header_option_switch) {
            if ($elementor_header_templates_kirki) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            }
        } else {
            get_template_part('template-parts/header/header-1');
        }
    } elseif ($lexend_header_tabs == 'elementor') {
        if ($elementor_header_template_meta) {
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_template_meta);
        } else {
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
        }
    } else {
        if ($lexend_header_option_switch) {

            if ($elementor_header_templates_kirki) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_header_templates_kirki);
            } else {
                get_template_part('template-parts/header/header-1');
            }
        } else {
            get_template_part('template-parts/header/header-1');
        }
    }
}
add_action('lexend_header_style', 'lexend_check_header', 10);


/**
 * [lexend_header_lang description]
 * @return [type] [description]
 */
function lexend_header_lang_default()
{
    $lexend_header_lang = get_theme_mod('lexend_header_lang', false);
    if ($lexend_header_lang) : ?>

        <ul>
            <li><a href="javascript:void(0)" class="lang__btn"><?php print esc_html__('English', 'lexend'); ?> <i class="fa-light fa-angle-down"></i></a>
                <?php do_action('lexend_language'); ?>
            </li>
        </ul>

    <?php endif; ?>
<?php
}

/**
 * [lexend_language_list description]
 * @return [type] [description]
 */
function _lexend_language($mar)
{
    return $mar;
}
function lexend_language_list()
{

    $mar = '';
    $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
    if (!empty($languages)) {
        $mar = '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
        foreach ($languages as $lan) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<a href="' . $lan['url'] . '" class="' . $active . '">' . $lan['translated_name'] . '</a>';
        }
        $mar .= '</div>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__('🇷🇺 Russia', 'lexend') . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__('🇮🇳 India', 'lexend') . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__('🇹🇷 Turkey', 'lexend') . '</a>';
        $mar .= '<a href="#" class="dropdown-item">' . esc_html__('🇫🇷 France', 'lexend') . '</a>';
        $mar .= ' </div>';
    }
    print _lexend_language($mar);
}
add_action('lexend_language', 'lexend_language_list');


// Header Logo
function lexend_header_logo()
{ ?>
    <?php
    $lexend_logo_on = function_exists('get_field') ? get_field('is_enable_sec_logo') : NULL;
    $lexend_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
    $lexend_logo_black = get_template_directory_uri() . '/assets/img/logo/secondary_logo.svg';

    $lexend_site_logo = get_theme_mod('logo', $lexend_logo);
    $lexend_secondary_logo = get_theme_mod('secondary_logo', $lexend_logo_black);
    ?>

    <?php if (!empty($lexend_logo_on)) : ?>
        <a class="secondary-logo" href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($lexend_secondary_logo); ?>" style="max-height: <?php echo esc_attr(get_theme_mod('logo_size_adjust', '40px')); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>" />
        </a>
    <?php else : ?>
        <a class="main-logo" href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($lexend_site_logo); ?>" style="max-height: <?php echo esc_attr(get_theme_mod('logo_size_adjust', '40px')); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>" />
        </a>
    <?php endif; ?>
<?php
}

// Header Sticky Logo
function lexend_header_sticky_logo()
{ ?>
    <?php
    $lexend_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
    $lexend_site_logo = get_theme_mod('logo', $lexend_logo);
    ?>
    <a class="sticky-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($lexend_site_logo); ?>" style="max-height: <?php echo esc_attr(get_theme_mod('logo_size_adjust', '40px')); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>" />
    </a>
<?php
}

// Mobile Menu Logo
function lexend_mobile_logo()
{

    $mobile_menu_logo = get_template_directory_uri() . '/assets/img/logo/logo.svg';
    $mobile_logo = get_theme_mod('mobile_logo', $mobile_menu_logo);

?>

    <a class="main-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($mobile_logo); ?>" style="max-height: <?php echo esc_attr(get_theme_mod('logo_size_adjust', '40px')); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>" />
    </a>

<?php }


/**
 * [lexend_header_social_profiles description]
 * @return [type] [description]
 */
function lexend_header_social_profiles()
{
    $lexend_header_fb_url = get_theme_mod('lexend_header_fb_url', __('#', 'lexend'));
    $lexend_header_twitter_url = get_theme_mod('lexend_header_twitter_url', __('#', 'lexend'));
    $lexend_header_linkedin_url = get_theme_mod('lexend_header_linkedin_url', __('#', 'lexend'));
?>
    <ul>
        <?php if (!empty($lexend_header_fb_url)) : ?>
            <li><a href="<?php print esc_url($lexend_header_fb_url); ?>"><i class="fab fa-facebook-f"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($lexend_header_twitter_url)) : ?>
            <li><a href="<?php print esc_url($lexend_header_twitter_url); ?>"><i class="fab fa-twitter"></i></a></li>
        <?php endif; ?>

        <?php if (!empty($lexend_header_linkedin_url)) : ?>
            <li><a href="<?php print esc_url($lexend_header_linkedin_url); ?>"><i class="fab fa-instagram"></i></a></li>
        <?php endif; ?>
    </ul>

<?php
}

function lexend_footer_social_profiles()
{
    $lexend_footer_fb_url = get_theme_mod('lexend_footer_fb_url', __('#', 'lexend'));
    $lexend_footer_twitter_url = get_theme_mod('lexend_footer_twitter_url', __('#', 'lexend'));
    $lexend_footer_vimeo_url = get_theme_mod('lexend_footer_vimeo_url', __('#', 'lexend'));
    $lexend_footer_youtube_url = get_theme_mod('lexend_footer_youtube_url', __('#', 'lexend'));
?>

    <ul>
        <?php if (!empty($lexend_footer_fb_url)) : ?>
            <li>
                <a href="<?php print esc_url($lexend_footer_fb_url); ?>">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($lexend_footer_twitter_url)) : ?>
            <li>
                <a href="<?php print esc_url($lexend_footer_twitter_url); ?>">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($lexend_footer_vimeo_url)) : ?>
            <li>
                <a href="<?php print esc_url($lexend_footer_vimeo_url); ?>">
                    <i class="fab fa-vimeo-v"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($lexend_footer_youtube_url)) : ?>
            <li>
                <a href="<?php print esc_url($lexend_footer_youtube_url); ?>">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php
}

/**
 * [lexend_mobile_social_profiles description]
 * @return [type] [description]
 */
function lexend_mobile_social_profiles()
{
    $lexend_mobile_fb_url           = get_theme_mod('lexend_mobile_fb_url', __('#', 'lexend'));
    $lexend_mobile_twitter_url      = get_theme_mod('lexend_mobile_twitter_url', __('#', 'lexend'));
    $lexend_mobile_instagram_url    = get_theme_mod('lexend_mobile_instagram_url', __('#', 'lexend'));
    $lexend_mobile_linkedin_url     = get_theme_mod('lexend_mobile_linkedin_url', __('#', 'lexend'));
    $lexend_mobile_telegram_url      = get_theme_mod('lexend_mobile_telegram_url', __('#', 'lexend'));
?>

    <ul class="clearfix">
        <?php if (!empty($lexend_mobile_fb_url)) : ?>
            <li class="facebook">
                <a href="<?php print esc_url($lexend_mobile_fb_url); ?>"><i class="fab fa-facebook-f"></i></a>
            </li>
        <?php endif; ?>

        <?php if (!empty($lexend_mobile_twitter_url)) : ?>
            <li class="twitter">
                <a href="<?php print esc_url($lexend_mobile_twitter_url); ?>">
                    <svg style="display: block;" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.33192 5.92804L13.5438 0H12.3087L7.78328 5.14724L4.16883 0H0L5.46575 7.78353L0 14H1.2351L6.01407 8.56431L9.83119 14H14L8.33192 5.92804ZM6.64027 7.85211L6.08648 7.07704L1.68013 0.909771H3.57718L7.13316 5.88696L7.68694 6.66202L12.3093 13.1316H10.4123L6.64027 7.85211Z" fill="currentColor" />
                    </svg>
                </a>
            </li>
        <?php endif; ?>

        <?php if (!empty($lexend_mobile_instagram_url)) : ?>
            <li class="instagram">
                <a href="<?php print esc_url($lexend_mobile_instagram_url); ?>"><i class="fab fa-instagram"></i></a>
            </li>
        <?php endif; ?>

        <?php if (!empty($lexend_mobile_linkedin_url)) : ?>
            <li class="linkedin">
                <a href="<?php print esc_url($lexend_mobile_linkedin_url); ?>"><i class="fab fa-linkedin-in"></i></a>
            </li>
        <?php endif; ?>

        <?php if (!empty($lexend_mobile_telegram_url)) : ?>
            <li class="telegram">
                <a href="<?php print esc_url($lexend_mobile_telegram_url); ?>"><i class="fab fa-telegram-plane"></i></a>
            </li>
        <?php endif; ?>
    </ul>

<?php
}


/**
 * [lexend_header_menu description]
 * @return [type] [description]
 */
function lexend_header_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'Lexend_Navwalker_Class::fallback',
        'walker'         => new Lexend_Navwalker_Class,
    ]);
    ?>
<?php
}


/**
 * [lexend_hamburger_menu description]
 * @return [type] [description]
 */
function lexend_hamburger_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'hamburger-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'Lexend_Navwalker_Class::fallback',
        'walker'         => new Lexend_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [lexend_header_menu description]
 * @return [type] [description]
 */
function lexend_mobile_menu()
{ ?>
    <?php
    $lexend_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => false,
        'echo'           => false,
    ]);

    $lexend_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $lexend_menu);
    echo wp_kses_post($lexend_menu);
    ?>
<?php
}

/**
 * [lexend_blog_mobile_menu description]
 * @return [type] [description]
 */
function lexend_blog_mobile_menu()
{ ?>
    <?php
    $lexend_menu = wp_nav_menu([
        'theme_location' => 'blog-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => false,
        'echo'           => false,
    ]);

    $lexend_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $lexend_menu);
    echo wp_kses_post($lexend_menu);
    ?>
<?php
}

/**
 * [lexend_search_menu description]
 * @return [type] [description]
 */
function lexend_header_search_menu()
{ ?>
    <?php
    wp_nav_menu([
        'theme_location' => 'header-search-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Lexend_Navwalker_Class::fallback',
        'walker'         => new Lexend_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [lexend_footer_menu description]
 * @return [type] [description]
 */
function lexend_footer_menu()
{
    wp_nav_menu([
        'theme_location' => 'footer-menu',
        'menu_class'     => 'navigation',
        'container'      => '',
        'fallback_cb'    => 'Lexend_Navwalker_Class::fallback',
        'walker'         => new Lexend_Navwalker_Class,
    ]);
}


/**
 * [lexend_category_menu description]
 * @return [type] [description]
 */
function lexend_category_menu()
{
    wp_nav_menu([
        'theme_location' => 'category-menu',
        'menu_class'     => 'cat-submenu m-0',
        'container'      => '',
        'fallback_cb'    => 'Lexend_Navwalker_Class::fallback',
        'walker'         => new Lexend_Navwalker_Class,
    ]);
}

/**
 *
 * lexend footer
 */

function lexend_check_footer()
{

    $lexend_footer_tabs = function_exists('get_field') ? get_field('genix_footer') : false;
    $elementor_footer_template_meta = function_exists('get_field') ? get_field('elementor_footer_style') : false;

    $lexend_footer_option_switch = get_theme_mod('lexend_footer_elementor_switch', false);
    $elementor_footer_templates_kirki = get_theme_mod('lexend_footer_templates');

    if ($lexend_footer_tabs == 'default') {
        if ($lexend_footer_option_switch) {
            if ($elementor_footer_templates_kirki) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
            }
        } else {
            get_template_part('template-parts/footer/footer-1');
        }
    } elseif ($lexend_footer_tabs == 'elementor') {
        if ($elementor_footer_template_meta) {
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_template_meta);
        } else {
            echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
        }
    } else {
        if ($lexend_footer_option_switch) {
            if ($elementor_footer_templates_kirki) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content($elementor_footer_templates_kirki);
            } else {
                get_template_part('template-parts/footer/footer-1');
            }
        } else {
            get_template_part('template-parts/footer/footer-1');
        }
    }
}
add_action('lexend_footer_style', 'lexend_check_footer', 10);


/**
 *
 * lexend_copyright_text
 */
function lexend_copyright_text()
{
    print get_theme_mod('lexend_copyright', esc_html__('Copyright © Lexend 2024. All Rights Reserved', 'lexend'));
}


/**
 *
 * pagination
 */
if (!function_exists('lexend_pagination')) {

    function _lexend_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function lexend_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul class="pagination">';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li class="page-item">' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _lexend_pagi_callback($pagi);
    }
}


// theme color
function lexend_custom_color()
{

    // Primary Color
    $color_code = get_theme_mod('lexend_color_option', '#12715B');
    wp_enqueue_style('lexend-custom', LEXEND_THEME_CSS_DIR . 'lexend-custom.css', []);
    if ($color_code != '') {
        $custom_css = '';
        $custom_css .= "html:root {
            --bs-primary: " . $color_code . ";
            --color-primary: " . $color_code . ";
            --unit-primary-color: " . $color_code . "
        }";
        wp_add_inline_style('lexend-custom', $custom_css);
    }

    // Secondary Color
    $color_code2 = get_theme_mod('lexend_secondary_color_option', '#f5eee9');
    wp_enqueue_style('lexend-custom', LEXEND_THEME_CSS_DIR . 'lexend-custom.css', []);
    if ($color_code2 != '') {
        $custom_css = '';
        $custom_css .= "html:root {
            --bs-secondary-rgb: " . $color_code2 . ";
            --bs-secondary: " . $color_code2 . ";
            --unit-secondary-color: " . $color_code2 . ";
        }";
        wp_add_inline_style('lexend-custom', $custom_css);
    }

    // Button Color
    $color_code3 = get_theme_mod('lexend_btn_color_option', '#12715B');
    wp_enqueue_style('lexend-custom', LEXEND_THEME_CSS_DIR . 'lexend-custom.css', []);
    if ($color_code3 != '') {
        $custom_css = '';
        $custom_css .= ".btn-primary {
            --bs-btn-bg: " . $color_code3 . " !important;
            --bs-btn-border-color: " . $color_code3 . " !important;
            --bs-btn-disabled-bg: " . $color_code3 . " !important;
            --bs-btn-disabled-border-color: " . $color_code3 . " !important;
        }";
        wp_add_inline_style('lexend-custom', $custom_css);
    }

    // Button Hover Color
    $color_code4 = get_theme_mod('lexend_hover_color_option', '#0f604d');
    wp_enqueue_style('lexend-custom', LEXEND_THEME_CSS_DIR . 'lexend-custom.css', []);
    if ($color_code4 != '') {
        $custom_css = '';
        $custom_css .= ".btn-primary {
            --bs-btn-hover-bg: " . $color_code4 . " !important;
            --bs-btn-hover-border-color: " . $color_code4 . " !important;
            --bs-btn-active-bg: " . $color_code4 . " !important;
            --bs-btn-active-border-color: " . $color_code4 . " !important;
        }";
        wp_add_inline_style('lexend-custom', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'lexend_custom_color');


// lexend_kses_intermediate
function lexend_kses_intermediate($string = '')
{
    return wp_kses($string, lexend_get_allowed_html_tags('intermediate'));
}

function lexend_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function lexend_kses($raw)
{

    $allowed_tags = array(
        'a'      => array(
            'class'   => array(),
            'href'    => array(),
            'rel'  => array(),
            'title'   => array(),
            'target' => array(),
        ),
        'abbr'   => array(
            'title' => array(),
        ),
        'b'    => array(),
        'blockquote'   => array(
            'cite' => array(),
        ),
        'cite'   => array(
            'title' => array(),
        ),
        'code'  => array(),
        'del'   => array(
            'datetime'   => array(),
            'title'      => array(),
        ),
        'dd'     => array(),
        'div'    => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'dl'   => array(),
        'dt'   => array(),
        'em'   => array(),
        'h1'   => array(),
        'h2'   => array(),
        'h3'   => array(),
        'h4'   => array(),
        'h5'   => array(),
        'h6'   => array(),
        'i'    => array(
            'class' => array(),
        ),
        'img'   => array(
            'alt'  => array(),
            'class'   => array(),
            'height' => array(),
            'src'  => array(),
            'width'   => array(),
        ),
        'li'   => array(
            'class' => array(),
        ),
        'ol'   => array(
            'class' => array(),
        ),
        'p'    => array(
            'class' => array(),
        ),
        'q'    => array(
            'cite'    => array(),
            'title'   => array(),
        ),
        'span'  => array(
            'class'   => array(),
            'title'   => array(),
            'style'   => array(),
        ),
        'iframe'   => array(
            'width'        => array(),
            'height'       => array(),
            'scrolling'    => array(),
            'frameborder'  => array(),
            'allow'        => array(),
            'src'          => array(),
        ),
        'strike'  => array(),
        'br'      => array(),
        'strong'    => array(),
        'data-wow-duration'   => array(),
        'data-wow-delay'   => array(),
        'data-wallpaper-options'  => array(),
        'data-stellar-background-ratio'   => array(),
        'ul'   => array(
            'class' => array(),
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}
