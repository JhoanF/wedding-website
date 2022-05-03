<?php
/**
* The template for adding Timeline Settings in Customizer
*
* @package ScapeShot
*/

/**
 * Add timeline options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_timeline_options( $wp_customize ) {
	$wp_customize->add_section( 'scapeshot_timeline', array(
			'panel' => 'scapeshot_theme_options',
			'title' => esc_html__( 'Timeline', 'scapeshot-wedding' ),
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_timeline_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'choices'           => scapeshot_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_timeline',
			'type'              => 'select',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_timeline_section_title',
			'sanitize_callback' => 'sanitize_text_field',
			'active_callback'   => 'scapeshot_is_timeline_active',
			'label'             => esc_html__( 'Section Title', 'scapeshot-wedding' ),
			'default'           => esc_html__( 'Timeline', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_timeline',
			'type'              => 'text',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_timeline_section_description',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'scapeshot_is_timeline_active',
			'label'             => esc_html__( 'Section Description', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_timeline',
			'type'              => 'textarea',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_timeline_number',
			'default'           => 4,
			'sanitize_callback' => 'scapeshot_sanitize_number_range',
			'active_callback'   => 'scapeshot_is_timeline_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of items', 'scapeshot-wedding' ),
			'input_attrs'       => array(
				'style' => 'width: 45px;',
				'min'   => 0,
			),
			'label'             => esc_html__( 'No of items', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_timeline',
			'type'              => 'number',
		)
	);

	$number = get_theme_mod( 'scapeshot_timeline_number', 4 );

	for ( $i=1; $i <= $number; $i++ ) {
		scapeshot_register_option( $wp_customize, array(
				'name'              => 'scapeshot_events_timeline_date_'. $i,
				'sanitize_callback' => 'sanitize_text_field',
				'active_callback'   => 'scapeshot_is_timeline_active',
				'label'             => esc_html__( 'Date #', 'scapeshot-wedding' ) . $i,
				'section'           => 'scapeshot_timeline',
				'type'              => 'date',
			)
		);

		scapeshot_register_option( $wp_customize, array(
				'name'              => 'scapeshot_timeline_page_'. $i,
				'sanitize_callback' => 'scapeshot_sanitize_post',
				'active_callback'   => 'scapeshot_is_timeline_active',
				'label'             => esc_html__( 'Page', 'scapeshot-wedding' ) . ' ' . $i ,
				'section'           => 'scapeshot_timeline',
				'type'              => 'dropdown-pages',
			)
		);
	}
}
add_action( 'customize_register', 'scapeshot_timeline_options', 10 );

/** Active Callbacks **/
if ( ! function_exists( 'scapeshot_is_timeline_active' ) ) :
	/**
	* Return true if timeline is active
	*
	* @since  ScapeShot Pro Pro 1.0
	*/
	function scapeshot_is_timeline_active( $control ) {
		$enable = $control->manager->get_setting( 'scapeshot_timeline_option' )->value();

		return ( scapeshot_check_section( $enable ) );
	}
endif;