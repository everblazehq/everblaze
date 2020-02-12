<?php
/**
 * indivio Theme Customizer
 *
 * @package indivio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function indivio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'indivio_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'indivio_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'indivio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function indivio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function indivio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/** Primary color **/

function theme_customize_register( $wp_customize ) {

	$wp_customize->add_setting( 'primary_color', array(
		'default'   => '#056AFC',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Primary', 'indivio' ),
	) ) );


	// ELEMENTS

	$wp_customize->add_panel( 'elements', array(
		'title' => __( 'Elements', 'indivio' ),
		'description' => esc_html__( 'Adjust the custom elements of the theme.', 'indivio' ),
		'priority' => 50,
	) );

	$wp_customize->add_section( 'contact_button', array(
		'title' => __( 'Contact Button', 'indivio' ),
		'description' => esc_html__( 'You can adjust the contact button here. The button is located in the sidebar (desktop only).', 'indivio' ),
		'panel' => 'elements',
	) );

	function indivio_sanitize_select( $input, $setting ){

            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);

            //get the list of possible select options
            $choices = $setting->manager->get_control( $setting->id )->choices;

            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

        }

	$wp_customize->add_setting( 'contact_button_show', array(
		'default' => 'show',
		'transport' => 'refresh',
		'sanitize_callback' => 'indivio_sanitize_select'
	) );

	$wp_customize->add_control( 'contact_button_show', array(
		'label' => __( 'Show Contact Button', 'indivio' ),
		'section' => 'contact_button',
		'type' => 'select',
		'choices' => array(
			'hide' => __( 'Hide', 'indivio' ),
			'show' => __( 'Show', 'indivio' )
		)
	) );

	$wp_customize->add_setting( 'contact_button_text', array(
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses'
	) );

	$wp_customize->add_control( 'contact_button_text', array(
		'label' => __( 'Button Text', 'indivio' ),
		'section' => 'contact_button',
	) );

	$wp_customize->add_setting( 'contact_button_type', array(
		'default' => 'page',
		'transport' => 'refresh',
		'sanitize_callback' => 'indivio_sanitize_select'
	) );

	$wp_customize->add_control( 'contact_button_type', array(
		'label' => __( 'Button Action', 'indivio' ),
		'section' => 'contact_button',
		'type' => 'select',
		'choices' => array(
			'page' => __( 'Go to a page', 'indivio' ),
			'email' => __( 'Send an email', 'indivio' )
		)
	) );

	$wp_customize->add_setting( 'contact_button_page', array(
		'transport' => 'refresh',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( 'contact_button_page', array(
		'label' => __( 'Select a page', 'indivio' ),
		'section' => 'contact_button',
		'type' => 'dropdown-pages',
	) );

	$wp_customize->add_setting( 'contact_button_email', array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_email'
	) );

	$wp_customize->add_control( 'contact_button_email', array(
		'label' => __( 'Email address', 'indivio' ),
		'description' => esc_html__( 'Enter the email address the email should be sent to.', 'indivio' ),
		'section' => 'contact_button',
	) );


	// IMAGES

	$wp_customize->add_section( 'images', array(
		'title' => __( 'Images', 'indivio' ),
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'image_profile', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_profile', array(
		'label' => __( 'Profile Image', 'indivio' ),
		'section' => 'images'
	) ) );

	$wp_customize->add_setting( 'image_logo', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_logo', array(
		'label' => __( 'Logo', 'indivio' ),
		'section' => 'images'
 	) ) );

	$wp_customize->add_setting( 'image_avatar', array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_avatar', array(
		'label' => __( 'Avatar', 'indivio' ),
		'section' => 'images'
 	) ) );





}

add_action( 'customize_register', 'theme_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function indivio_customize_preview_js() {
	wp_enqueue_script( 'indivio-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1', true );
}
add_action( 'customize_controls_enqueue_scripts', 'indivio_customize_preview_js' );
