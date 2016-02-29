<?php

class WDSCPN_Test_Shortcode extends WDS_Shortcodes {

	/**
	 * The Shortcode Tag
	 * @var string
	 */
	public $shortcode = 'test';

	/**
	 * Default attributes applied tot he shortcode.
	 * @var array
	 */
	public $atts_defaults = array(
		'some_default_key' => 'default value',
	);

	/**
	 * Shortcode Output
	 */
	public function shortcode() {

		// Useful if the shortcode is a closable shortcode.
		// $this->content();

		$our_attribute_value = $this->att( 'some_default_key' );

		// Simple string concatination
		$output = '<div class="shortcode-test">';
		$output .= esc_attr( $our_attribute_value );
		$output .= '</div>';

		// Or you can get fancy with it.
		// NOTE: This overrides the previous variable set.
		$output = sprintf( '<div class="shortcode-test">%1$s</div>', esc_attr( $our_attribute_value ) );

		return $output;

	}

	/**
	 * Override for attribute getter
	 *
	 * You can use this to override specific attribute acquisition
	 * ex. Getting attributes from options, post_meta, etc...
	 *
	 * @see WDS_Shortcode::att
	 * @param string $att
	 * @param string|null $default
	 * @return string
	 */
	public function att( $att, $default = null ) {
		$current_value = parent::att( $att, $default );

		if ( 'some_default_key' == $att && 'change me' == $current_value ) {
			return 'You have been changed';
		}

		return $current_value;
	}
}