<?php

class UBC_Use_Template_Shortcode_Tests extends WP_UnitTestCase {

	/**
	 * Test that the add_actions method is only called once
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function test_add_actions_runs_once() {

		$ubc_use_template_shortcode = $this->getMockBuilder( '\UBC\Shortcode\Use_Template' )
			->setMethods( array( 'add_actions' ) )
			->getMock();

		$ubc_use_template_shortcode->expects( $this->once() )->method( 'add_actions' );

		$ubc_use_template_shortcode->init();

	}/* test_add_actions() */



	/**
	 * Test the add_filters() method is only called once
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function test_add_filters_runs_once() {

		$ubc_use_template_shortcode = $this->getMockBuilder( '\UBC\Shortcode\Use_Template' )
			->setMethods( array( 'add_filters' ) )
			->getMock();

		$ubc_use_template_shortcode->expects( $this->once() )->method( 'add_filters' );

		$ubc_use_template_shortcode->init();

	}/* test_add_filters_runs_once() */


	/**
	 * Test that our methods gets added in add_actions
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function test_methods_added_via_add_actions() {

		$ubc_use_template_shortcode = new \UBC\Shortcode\Use_Template();
		$ubc_use_template_shortcode->init();

		$this->assertEquals(
			10,
			has_action( 'init', array( $ubc_use_template_shortcode, 'init__add_shortcode' ) ),
			'\UBC\Shortcode\Use_Template::add_actions is not attaching \UBC\Shortcode\Use_Template::init__add_shortcode to init'
		);

	}/* test_methods_added_via_add_actions() */


	/**
	 * Test that our methods gets added in add_filters
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function test_methods_added_via_add_filters() {

		$ubc_use_template_shortcode = new \UBC\Shortcode\Use_Template();
		$ubc_use_template_shortcode->init();

		$this->assertEquals(
			10,
			has_filter( 'wp_kses_allowed_html', array( $ubc_use_template_shortcode, 'wp_kses_allowed_html__add_data_attributes' ) ),
			'wp_kses_allowed_html__add_data_attributes() not added to filter wp_kses_allowed_html'
		);

		$this->assertEquals(
			10,
			has_filter( 'safe_style_css', array( $ubc_use_template_shortcode, 'safe_style_css__allow_display_none' ) ),
			'safe_style_css__allow_display_none() not added to filter safe_style_css'
		);

	}/* test_methods_added_via_add_actions() */


	/**
	 * Test that we add extra attributes to our allowed html for wp_kses_post
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function test_add_allowed_html() {

		// Now we should have added some extra attributes
		$after = wp_kses_allowed_html( 'post' );

		// Ensure we can use 'data-toggle' attributes for anchors
		$a_data_toggle_exists_after = isset( $after['a']['data-toggle'] );
		$this->assertTrue( $a_data_toggle_exists_after );

		// Ensure we can use data-category attributes for divs
		$div_data_category_exists_after = isset( $after['div']['data-category'] );
		$this->assertTrue( $div_data_category_exists_after );

	}/* test_add_allowed_html() */


	/**
	 * Test that we're able to use display properties in a style tag
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function test_safe_style_css() {

		// We add a callback to this filter, so we should have 'display' added
		$after = apply_filters( 'safe_style_css', array() );

		$display_exists = in_array( 'display', $after );

		$this->assertTrue( $display_exists );

	}/* test_safe_style_css() */


	/**
	 * Test that the shortcode exists after we initialize the plugin
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function test_shortcode_exists() {

		$this->assertTrue( shortcode_exists( 'ubc_template' ) );

	}/* test_shortcode_exists() */


	/**
	 * Test that when passed a department and template that the correct file path
	 * is generated
	 *
	 * @since 1.0.0
	 *
	 * @param null
	 * @return null
	 */

	public function test_generate_path() {

		$returns_empty_cases = array(
			'both_not_set' 		=> array( 'department' => '', 'template' => '' ),
			'dept_not_set' 		=> array( 'department' => '', 'template' => 'test' ),
			'template_not_set' 	=> array( 'department' => 'test', 'template' => '' ),
		);

		$ubc_use_template_shortcode = new \UBC\Shortcode\Use_Template();

		foreach ( $returns_empty_cases as $name => $paths ) {
			$returned = $ubc_use_template_shortcode->generate_path( $paths['department'], $paths['template'] );
			$empty = empty( $returned );
			$this->assertTrue( $empty, $name . ' is not empty and returned: ' . $returned );
		}

		// The root URL
		$path = $ubc_use_template_shortcode::$plugin_path . 'templates/';

		$complex_cases = array(
			'slashes_in_dept' 		=> array( 'department' => '/dept/', 'template' => 'template', 'expected' => $path . 'dept/template.php' ),
			'slashes_in_template' 	=> array( 'department' => 'dept', 'template' => '/template/', 'expected' => $path . 'dept/template.php' ),
			'slashes_in_both' 		=> array( 'department' => '/dept/', 'template' => '/template/', 'expected' => $path . 'dept/template.php' ),
			'bad_strings_in_dept' 	=> array( 'department' => ';dept;', 'template' => '/template/', 'expected' => $path . 'dept/template.php' ),
			'bad_strings_in_temp' 	=> array( 'department' => 'dept', 'template' => ';template;', 'expected' => $path . 'dept/template.php' ),
			'hyphens_in_both' 		=> array( 'department' => 'dept-name', 'template' => 'template-name', 'expected' => $path . 'dept-name/template-name.php' ),
			'dot_php_at_end' 		=> array( 'department' => 'dept-name', 'template' => 'template-name.php', 'expected' => $path . 'dept-name/template-name.php' ),
		);

		foreach ( $complex_cases as $name => $paths ) {
			$returned = $ubc_use_template_shortcode->generate_path( sanitize_title_with_dashes( $paths['department'] ), sanitize_title_with_dashes( $paths['template'] ) );
			$this->assertEquals( $paths['expected'], $returned, $name . ' is not as expected and returned ' . $returned );
		}

	}/* test_generate_path() */

}/* class UBC_Use_Template_Shortcode_Tests() */
