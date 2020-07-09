<?php
/**
 * Elementor Elementor_File_Link_Widget Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_File_Link_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor_File_Link_Widget widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'file_link_shortcode';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor_File_Link_Widget widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'File Link', 'elementor-file-select-control' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor_File_Link_Widget widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-link';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor_File_Link_Widget widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'media' ];
	}

	/**
	 * Register Elementor_File_Link_Widget widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Settings', 'elementor-file-select-control' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'file_link',
			[
				'label' => esc_html__( 'Select File', 'elementor-file-select-control' ),
				'type'	=> 'file-select',
				'placeholder' => esc_html__( 'URL to File', 'elementor-file-select-control' ),
				'description' => esc_html__( 'Select file from media library or upload', 'elementor-file-select-control' ),
			]
		);

		$this->add_control(
			'link_text',
			[
				'label' => esc_html__( 'Link Text', 'elementor-file-select-control' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Ex. Open File', 'elementor-file-select-control' ),
				'description' => esc_html__( 'Text that should be displayed as a link', 'elementor-file-select-control' ),
				'default'	=> 'Open File',
			]
		);

		$this->add_control(
			'link_target',
			[
				'label' => esc_html__( 'Link Target', 'elementor-file-select-control' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'_parent' => esc_html__( 'Same Tab', 'elementor-file-select-control' ),
					'_blank' => esc_html__( 'New Tab', 'elementor-file-select-control' ),
				],
				'default' => '_parent',
				'description' => esc_html__( 'CSS class to add to the link', 'elementor-file-select-control' ),
			]
		);

		$this->add_control(
			'link_css_class',
			[
				'label' => esc_html__( 'Link CSS Class', 'elementor-file-select-control' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => esc_html__( 'Ex. file-link', 'elementor-file-select-control' ),
				'description' => esc_html__( 'CSS class to add to the link', 'elementor-file-select-control' ),
			]
		);

		$this->end_controls_section();

	}
	
	/**
	 * Render Elementor_File_Link_Widget widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		echo '<a href="' . $settings['file_link'] . '" target="' . $settings['link_target'] . '" class="' . $settings['link_css_class'] . '" >' . $settings['link_text'] . '</a>';
	}
} 