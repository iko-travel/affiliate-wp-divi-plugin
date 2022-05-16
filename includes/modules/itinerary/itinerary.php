<?php

class IKTDItinerary extends ET_Builder_Module {
	protected $namespace = 'iko-travel';
	public $slug       = 'iktd_itinerary';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://iko.travel/',
		'author'     => 'iko.travel',
		'author_uri' => 'https://iko.travel/',
	);

	public function init() {
		$this->name = esc_html__( 'iko Itinerary', $this->namespace );
		$this->settings_modal_toggles  = array(
			'iko' => array(
				'toggles' => array(
					'ikoOptions'   => esc_html( 'iko Settings', $this->namespace )
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => __( "This component does not require any configuration.", $this->namespace ),
				'type'            => 'iktd_input',
				'option_category' => 'basic_option',
				'description'     => __( "Simply ensure that you have entered the correct Client-ID and Client-Secret in the iko plugin settings.", $this->namespace ),
				'toggle_slug'     => 'ikoOptions',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return do_shortcode('[ikoitinerary]');
	}
}

new IKTDItinerary;
