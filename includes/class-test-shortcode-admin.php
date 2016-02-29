<?php

class WDSCPN_Test_Shortcode_Admin extends WDS_Shortcode_Admin {

	public function hooks() {
		add_filter( $this->shortcode . '_shortcode_fields', array( $this, 'filter_shortcode_field' ), 10, 2 );
		parent::hooks();
	}

	/**
	 * Sets up the button
	 *
	 * @return array
	 */
	function js_button_data() {
		return array(
			'qt_button_text' => __( 'Quick Tag Button Text', 'textdomain' ),
			'button_tooltip' => __( 'Visual Button Tooltip', 'textdomain' ),
			'icon'           => 'dashicons-slides',
			// 'include_close'  => true,
		);
	}

	/**
	 * Adds fields to the button modal using CMB2
	 *
	 * @param $fields
	 * @param $button_data
	 *
	 * @return array
	 */
	function fields( $fields, $button_data ) {
		$fields[] = array(
			'name' => __( 'Key Field', 'textdomain' ),
			'desc' => __( 'This is a description, catchy huh!', 'textdomain' ),
			'type' => 'text',
			'id'   => 'some_default_key',
		);

		return $fields;
	}

	/**
	 * Filters the data sent to the editor.
	 *
	 * @param array $fields
	 * @param Shortcode_Button $shortcode_button
	 *
	 * @return array
	 */
	function filter_shortcode_field( $fields, $shortcode_button ) {
		if ( ! $shortcode_button instanceof Shortcode_Button ) {
			return $fields;
		}

		// Can get CMB2 Objects
		// $cmb_obj = $shortcode_button->get_cmb_object();

		// Do all your fancy stuff here!

		return $fields;
	}
}
