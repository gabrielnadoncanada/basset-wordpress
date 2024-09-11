<?php

/**
 * lexend_scripts description
 * @return [type] [description]
 */
function lexend_scripts() {


    /**
     * ALL CSS FILES
    */
    wp_enqueue_style( 'lexend-fonts', LEXEND_THEME_CSS_DIR . 'lexend-fonts.css', []);
    wp_enqueue_style( 'uni-core', LEXEND_THEME_CSS_DIR . 'uni-core.min.css', [] );
    wp_enqueue_style( 'unicons', LEXEND_THEME_CSS_DIR . 'unicons.min.css', [] );
    wp_enqueue_style( 'font-awesome-free', LEXEND_THEME_CSS_DIR . 'fontawesome-all.min.css', [] );
    wp_enqueue_style( 'swiper-bundle', LEXEND_THEME_CSS_DIR . 'swiper-bundle.min.css', [] );
    wp_enqueue_style( 'prettify', LEXEND_THEME_CSS_DIR . 'prettify.min.css', [] );
    wp_enqueue_style( 'lexend-core', LEXEND_THEME_CSS_DIR . 'lexend-core.min.css', [] );
    wp_enqueue_style( 'lexend-unit', LEXEND_THEME_CSS_DIR . 'lexend-unit.css', [] );
    wp_enqueue_style( 'lexend-woo', LEXEND_THEME_CSS_DIR . 'lexend-woo.css', [] );
    wp_enqueue_style( 'lexend-style', get_stylesheet_uri() );


    // ALL JS FILES
    wp_enqueue_script( 'app-head-bs', LEXEND_THEME_JS_DIR . 'app-head-bs.js', [ 'jquery' ], '', false );
    wp_enqueue_script( 'uni-core-bundle', LEXEND_THEME_JS_DIR . 'uni-core-bundle.min.js', [ 'jquery' ], '', false );
    wp_enqueue_script( 'bootstrap', LEXEND_THEME_JS_DIR . 'bootstrap.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'swiper-bundle', LEXEND_THEME_JS_DIR . 'swiper-bundle.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'swiper-helper', LEXEND_THEME_JS_DIR . 'swiper-helper.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'uikit-components-bs', LEXEND_THEME_JS_DIR . 'uikit-components-bs.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'lexend-app', LEXEND_THEME_JS_DIR . 'app.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'lexend-main', LEXEND_THEME_JS_DIR . 'main.js', [ 'jquery' ], false, true );

    $lexend_default_dark = get_theme_mod('lexend_default_dark', false);
    $lexend_system_preference = get_theme_mod('lexend_system_preference', false);
    $lexend_preloader = get_theme_mod('lexend_preloader', false);
    $lexend_preloader_style1 = get_theme_mod('lexend_preloader_select', 'option-1');
    $lexendPreloader = !empty($lexend_preloader) && $lexend_preloader_style1 == 'option-1' ? 1 : 0;
    $lexendMode = !empty($lexend_default_dark) ? 1 : 0;
    $lexendSystemMode = !empty($lexend_system_preference) ? 1 : 0;
    wp_localize_script(
        'app-head-bs',
        'PRELOADER_CONTROLLER',
        array(
            'ENABLE_PAGE_PRELOADER' => $lexendPreloader,
            'DEFAULT_DARK_MODE' => $lexendMode,
            'USE_SYSTEM_PREFERENCES' => $lexendSystemMode,
        )
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'lexend_scripts' );