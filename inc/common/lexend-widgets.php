<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lexend_widgets_init() {

    /**
     * Blog sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'lexend' ),
        'id'            => 'blog__sidebar',
        'before_widget' => '<div id="%1$s" class="sidebar__widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="sidebar__widget-title">',
        'after_title'   => '</h4>',
    ] );


    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // Footer Default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer widget no. %1$s', 'lexend' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer Column %1$s', 'lexend' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer-widget column-'.$num.' %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="fw-title">',
            'after_title'   => '</h4>',
        ] );
    }

}
add_action( 'widgets_init', 'lexend_widgets_init' );