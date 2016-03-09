<?php

class WDSCPN_Test_Shortcode_Admin extends WDS_Shortcode_Admin {

	public function hooks() {
		add_filter( "{$this->shortcode}_shortcode_fields", array( $this, 'filter_shortcode_attributes' ), 10, 3 );
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

		$fields[] = array(
			'name' => __( 'Some Image', 'textdomain' ),
//			'desc' => __( 'This is a description, catchy huh!', 'textdomain' ),
			'type' => 'file',
			'id'   => 'attachment_image',
		);

		return $fields;
	}

	/**
	 * Filter attribute return values
	 *
	 * @param array $field_atts
	 * @param Shortcode_Button $sc_instance
	 * @param array $unmodified
	 *
	 * @return array
	 */
	public function filter_shortcode_attributes( $field_atts, $sc_instance, $unmodified ) {

		// 'file' type field id
		$file_field_id = 'attachment_image';
		if ( isset( $unmodified[ $file_field_id . '_id' ] ) && $unmodified[ $file_field_id . '_id' ] ) {
			$field_atts['image_id'] = $unmodified[ $file_field_id . '_id' ];
		}

		/*
		 * If you send back `$field_atts['sc_content']`, and you have 'include_close' set to true,
		 * The contents of the shortcode will be set to this value.
		 * Example:
		 *
		 * $field_atts['sc_content'] = 'Some content';
		 *
		 * // generated shortcode:
		 * [yourshortcode ...attributes...]Some content[/yourshortcode]
		 */
		return $field_atts;
	}
}
