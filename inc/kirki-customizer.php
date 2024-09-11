<?php
/**
 * lexend customizer
 *
 * @package lexend
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function lexend_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'lexend_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Lexend Customizer', 'lexend' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'lexend_default_setting', [
        'title'       => esc_html__( 'Lexend Default Setting', 'lexend' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

    $wp_customize->add_section('section_header_logo', [
        'title'       => esc_html__('Logo Setting', 'lexend'),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ]);

    $wp_customize->add_section('section_header_settings', [
        'title'       => esc_html__('Header Setting', 'lexend'),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ]);

    $wp_customize->add_section( 'mobile_menu_setting', [
        'title'       => esc_html__( 'Mobile Menu Setting', 'lexend' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'lexend' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'lexend' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'lexend' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'lexend' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'lexend' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'lexend' ),
        'description' => '',
        'priority'    => 20,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

    $wp_customize->add_section( 'woo_setting', [
        'title'       => esc_html__( 'WooCommerce Setting', 'lexend' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'lexend_customizer',
    ] );

}
add_action( 'customize_register', 'lexend_customizer_panels_sections' );


/*
Theme Default Settings
*/
function _lexend_default_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_preloader',
        'label'    => esc_html__('Preloader Switcher', 'lexend' ),
        'section'  => 'lexend_default_setting',
        'description' => esc_html__('Enable or Disable Preloader', 'lexend'),
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'lexend_preloader_select',
        'label'       => esc_html__('Select Preloader Style', 'lexend'),
        'section'     => 'lexend_default_setting',
        'default'     => 'option-1',
        'placeholder' => esc_html__('Choose an option', 'lexend'),
        'choices'     => [
            'option-1' => esc_html__('Default', 'lexend'),
            'option-2' => esc_html__('Image Preloader', 'lexend'),
        ],
        'active_callback'  => [
            [
                'setting'  => 'lexend_preloader',
                'operator' => '===',
                'value'    => true,
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'preloader_logo',
        'label'       => esc_html__('Preloader Logo', 'lexend'),
        'description' => esc_html__('Upload Preloader Logo.', 'lexend'),
        'section'     => 'lexend_default_setting',
        'default'     => get_template_directory_uri() . '/assets/img/logo/preloader.svg',
        'active_callback'  => [
            [
                'setting'  => 'lexend_preloader',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting'  => 'lexend_preloader_select',
                'operator' => '===',
                'value'    => 'option-2',
            ],
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_mode_switcher',
        'label'    => esc_html__( 'Dark Mode Switcher', 'lexend' ),
        'section'  => 'lexend_default_setting',
        'description' => esc_html__('Enable or Disable Dark switcher', 'lexend'),
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_default_dark',
        'label'    => esc_html__( 'Default Dark Mode', 'lexend' ),
        'section'  => 'lexend_default_setting',
        'description' => esc_html__('Set by default Dark mode', 'lexend'),
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_system_preference',
        'label'    => esc_html__( 'System Preference Mode', 'lexend' ),
        'section'  => 'lexend_default_setting',
        'description' => esc_html__('Set user System Preference Mode. if the user dark mode on their system, the Website will show by default Dark.', 'lexend'),
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_backtotop',
        'label'    => esc_html__('Back to Top Switcher', 'lexend' ),
        'section'  => 'lexend_default_setting',
        'description' => esc_html__('Enable or Disable Back button', 'lexend'),
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_lexend_default_fields' );


/*
Logo Settings
 */
function _header_logo_fields( $fields ) {

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'lexend' ),
        'description' => esc_html__( 'Upload Your Logo', 'lexend' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.svg',
        'active_callback' => [
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'secondary_logo',
        'label'       => esc_html__( 'Header Secondary Logo', 'lexend' ),
        'description' => esc_html__( 'Upload Your Logo', 'lexend' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/secondary_logo.svg',
        'active_callback' => [
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'dimension',
        'settings'    => 'logo_size_adjust',
		'label'       => esc_html__( 'Logo Size Height', 'lexend' ),
		'description' => esc_html__( 'Adjust your logo size with px', 'lexend' ),
		'section'     => 'section_header_logo',
		'default'     => '40px',
        'choices'     => [
			'accept_unitless' => true,
		],
        'active_callback' => [
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_logo_fields' );



/*
Header Settings
 */
function _header_header_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_header_elementor_switch',
        'label'       => esc_html__('Elementor Header Switch', 'lexend'),
        'section'  => 'section_header_settings',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'lexend' ),
        'section'     => 'section_header_settings',
        'description' => esc_html__( 'If you select a Header Style from the edit page, This option will not work. So go to edit page then change the header style.', 'lexend' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1' => get_template_directory_uri() . '/inc/img/header/header-1.png',
        ],
        'default'     => 'header-style-1',
        'active_callback' => [
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $lexend_header_post = array(
        'post_type'      => 'lexend-header',
        'posts_per_page' => -1,
    );
    $lexend_header_post_loop = get_posts($lexend_header_post);

    $header_post_obj_arr = array();
    foreach ($lexend_header_post_loop as $post) {
        $header_post_obj_arr[$post->ID] = $post->post_title;
    }

    wp_reset_query();

    $fields[] = [
        'type'     => 'select',
        'settings' => 'lexend_header_templates',
        'label'       => esc_html__('Elementor Header Template', 'lexend'),
        'section'  => 'section_header_settings',
        'description' => esc_html__('If you select a Header Style from the edit page, This option will not work. So go to edit page then change the header style.', 'lexend'),
        'priority' => 10,
        'placeholder' => esc_html__('Choose an option', 'lexend'),
        'choices'     => $header_post_obj_arr,
        'active_callback' => [
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => true
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'lexend_megamenu_select',
        'label'       => esc_html__('Select Megamenu Hover Style', 'lexend'),
        'section'     => 'section_header_settings',
        'placeholder' => esc_html__('Choose an option', 'lexend'),
        'choices'     => [
            'option-1' => esc_html__('Hover', 'lexend'),
            'option-2' => esc_html__('Click', 'lexend'),
        ],
        'default'     => 'option-1',
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );


/*
Mobile Menu Settings
*/
function _mobile_menu_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_show_mobile_social',
        'label'    => esc_html__( 'Show Mobile Menu Social', 'lexend' ),
        'section'  => 'mobile_menu_setting',
        'default'  => 0,
        'priority' => 12,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
        'active_callback' => [
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    // Mobile section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'lexend_mobile_fb_url',
        'label'    => esc_html__( 'Facebook URL', 'lexend' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'lexend' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'lexend_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'lexend_mobile_twitter_url',
        'label'    => esc_html__( 'Twitter URL', 'lexend' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'lexend' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'lexend_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'lexend_mobile_instagram_url',
        'label'    => esc_html__( 'Instagram URL', 'lexend' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'lexend' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'lexend_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'lexend_mobile_linkedin_url',
        'label'    => esc_html__( 'Linkedin URL', 'lexend' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'lexend' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'lexend_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'lexend_mobile_telegram_url',
        'label'    => esc_html__( 'Telegram URL', 'lexend' ),
        'section'  => 'mobile_menu_setting',
        'default'  => esc_html__( '#', 'lexend' ),
        'priority' => 12,
        'active_callback'  => [
            [
                'setting'  => 'lexend_show_mobile_social',
                'operator' => '===',
                'value'    => true,
            ],
            [
                'setting' => 'lexend_header_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_mobile_menu_fields' );


/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'breadcrumb_hide_default',
        'label'    => esc_html__('Breadcrumb Hide by Default', 'lexend'),
        'section'  => 'breadcrumb_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'lexend'),
            'off' => esc_html__('Disable', 'lexend'),
        ],
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_blog_btn_switch',
        'label'    => esc_html__( 'Blog Button ON/OFF', 'lexend' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_blog_author',
        'label'    => esc_html__( 'Blog Author Meta ON/OFF', 'lexend' ),
        'section'  => 'blog_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_blog_date',
        'label'    => esc_html__( 'Blog Date Meta ON/OFF', 'lexend' ),
        'section'  => 'blog_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta ON/OFF', 'lexend' ),
        'section'  => 'blog_setting',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_show_blog_share',
        'label'    => esc_html__( 'Show Blog Share', 'lexend' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'lexend' ),
            'off' => esc_html__( 'Disable', 'lexend' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'lexend_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'lexend' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'lexend' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'lexend' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'lexend' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'lexend' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'lexend' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {

    // Footer Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'lexend_footer_elementor_switch',
        'label'       => esc_html__('Elementor Footer Switch', 'lexend'),
        'section'  => 'footer_setting',
        'default'  => 0,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__('Enable', 'lexend'),
            'off' => esc_html__('Disable', 'lexend'),
        ],
    ];

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'lexend' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'lexend' ),
        'priority'    => 11,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
        ],
        'default'     => 'footer-style-1',
        'active_callback' => [
            [
                'setting' => 'lexend_footer_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $lexend_footer_post = array(
            'post_type'      => 'lexend-footer',
            'posts_per_page' => -1,
        );
    $lexend_footer_post_loop = get_posts($lexend_footer_post);
    $footer_post_obj_arr = array();
    foreach ($lexend_footer_post_loop as $post) {
        $footer_post_obj_arr[$post->ID] = $post->post_title;
    }

    wp_reset_postdata();

    $fields[] = [
        'type'     => 'select',
        'settings' => 'lexend_footer_templates',
        'label'       => esc_html__('Elementor Footer Template', 'lexend'),
        'section'  => 'footer_setting',
        'description' => esc_html__('If you select a Footer Style from the edit page, This option will not work. So go to edit page then change the footer style.', 'lexend'),
        'priority' => 11,
        'placeholder' => esc_html__('Choose an option', 'lexend'),
        'choices'     => $footer_post_obj_arr,
        'active_callback' => [
            [
                'setting' => 'lexend_footer_elementor_switch',
                'operator' => '==',
                'value' => true
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'lexend' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'lexend' ),
        'priority'    => 12,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'lexend' ),
            '3' => esc_html__( 'Widget Number 3', 'lexend' ),
            '2' => esc_html__( 'Widget Number 2', 'lexend' ),
        ],
        'active_callback' => [
            [
                'setting' => 'lexend_footer_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'lexend_footer_bg_color',
        'label'       => __( 'Footer BG Color', 'lexend' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'lexend' ),
        'section'     => 'footer_setting',
        'default'     => '#101013',
        'priority'    => 13,
        'active_callback' => [
            [
                'setting' => 'lexend_footer_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'lexend_copyright',
        'label'    => esc_html__( 'CopyRight Text', 'lexend' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright © Lexend 2024. All Rights Reserved', 'lexend' ),
        'priority' => 14,
        'active_callback' => [
            [
                'setting' => 'lexend_footer_elementor_switch',
                'operator' => '==',
                'value' => false
            ]
        ]
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );


// Color Settings
function lexend_color_fields( $fields ) {

    // Primary Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'lexend_color_option',
        'label'       => __( 'Primary Color', 'lexend' ),
        'description' => esc_html__('This is a Primary color control.', 'lexend' ),
        'section'     => 'color_setting',
        'default'     => '#12715B',
        'priority'    => 10,
    ];

    // Secondary Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'lexend_secondary_color_option',
        'label'       => __( 'Secondary Color', 'lexend' ),
        'description' => esc_html__('This is a Secondary color control.', 'lexend' ),
        'section'     => 'color_setting',
        'default'     => '#f5eee9',
        'priority'    => 10,
    ];

    // Button Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'lexend_btn_color_option',
        'label'       => __( 'Button Background Color', 'lexend' ),
        'description' => esc_html__('This is a button color control.', 'lexend' ),
        'section'     => 'color_setting',
        'default'     => '#12715B',
        'priority'    => 10,
    ];

    // Button Hover Color Settings
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'lexend_hover_color_option',
        'label'       => __( 'Button Hover Background Color', 'lexend' ),
        'description' => esc_html__('This is a button hover color control.', 'lexend' ),
        'section'     => 'color_setting',
        'default'     => '#0f604d',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'lexend_color_fields' );

// 404
function lexend_404_fields( $fields ) {

    // 404 settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'lexend_error_text',
        'label'    => esc_html__('404 Text', 'lexend'),
        'section'  => '404_page',
        'default'  => esc_html__('Page not found', 'lexend'),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'lexend_error_title',
        'label'    => esc_html__( 'Not Found Title', 'lexend' ),
        'section'  => '404_page',
        'default'  => esc_html__('Sorry, the page you seems looking for, has been moved, redirected or removed permanently.', 'lexend' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'lexend_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'lexend' ),
        'section'  => '404_page',
        'default'  => esc_html__('Back to Home', 'lexend' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'lexend_404_fields' );


/**
 * Added Fields
 */
function lexend_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'lexend' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
            'text-transform'  => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'choices' => [
            'fonts' => [
                'google'   => [],
            ],
        ],
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading Fonts', 'lexend' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'color'          => '',
            'text-transform'  => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'choices' => [
            'fonts' => [
                'google'   => [],
            ],
        ],
        'output'      => [
            [
                'element' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            ],
        ],
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'lexend_typo_fields' );


// WooCommerce
function lexend_woo_fields($fields) {

    // Woo settings
    $fields[] = [
        'type'        => 'select',
        'settings'    => 'woo_desktop_column',
        'label'       => esc_html__('Products per row', 'lexend'),
        'description' => esc_html__('Desktop view', 'lexend'),
        'section'     => 'woo_setting',
        'placeholder' => esc_html__('Select an option...', 'lexend'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '3' => esc_html__('4', 'lexend'),
            '4' => esc_html__('3', 'lexend'),
            '6' => esc_html__('2', 'lexend'),
        ],
        'default'     => '3',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'woo_mobile_column',
        'label'       => esc_html__('Products per row', 'lexend'),
        'description' => esc_html__('Mobile view', 'lexend'),
        'section'     => 'woo_setting',
        'placeholder' => esc_html__('Select an option...', 'lexend'),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '3' => esc_html__('4', 'lexend'),
            '4' => esc_html__('3', 'lexend'),
            '6' => esc_html__('2', 'lexend'),
            '1' => esc_html__('1', 'lexend'),
        ],
        'default'     => '6',
    ];

    return $fields;
}
add_filter('kirki/fields', 'lexend_woo_fields');


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function LEXEND_THEME_OPTION( $name ) {
    $value = '';
    if ( class_exists( 'lexend' ) ) {
        $value = Kirki::get_option( lexend_get_theme(), $name );
    }

    return apply_filters('LEXEND_THEME_OPTION', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function lexend_get_theme() {
    return 'lexend';
}