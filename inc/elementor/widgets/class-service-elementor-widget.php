<?php

/**
 * Elementor widget
 * @package Smart Addon
 * @since 1.0.0
 * */

namespace Elementor;
class smart_addon_service_Widget extends Widget_Base{
	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'smart_addon_service';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title()
	{
		return esc_html__(' Service ','smart-addon');
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon()
	{
		return 'eicon-post-slider';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories()
	{
		return ['smart_addon'];
	}
	/**
	 * Register Elementor widget controls.
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
				'label' => esc_html__( 'Service Settings', 'smart-addon' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'smart-addon' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'enter service title', 'smart-addon' ),
                'default'     => esc_html__('Global coverage','smart-addon')
            ]
        );

       $this->add_control(
            'content',
            [
                'label'       => esc_html__( 'Content', 'smart-addon' ),
                'type'        => Controls_Manager::TEXTAREA,
                'description' => esc_html__( 'enter content', 'smart-addon' ),
            ]
        );


		$this->add_control(
			'btn-txt',
			[
				'label'       => esc_html__( 'Button Text', 'smart-addon' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'enter button text', 'smart-addon' ),
				'default'     => esc_html__('learn-more','smart-addon')
			]
		);

		$this->add_control(
			'btn-url',
			[
				'label'       => esc_html__( 'Button Url', 'smart-addon' ),
				'type'        => Controls_Manager::URL,
					'default'     => array(
						'url' => '#'
					),
					
			]
		);

		$this->add_control(
	   		 'image',
	      	[
	          'label' => esc_html__( 'Icon', 'quray-extra' ),
	          'type'  => Controls_Manager::MEDIA,
	          'description' => esc_html__( 'upload small icon image size 68*68', 'smart-addon' ),
				'dynamic' => [
				'active' => true,
			   ],
	    	]
	    );

		$this->end_controls_section();

		

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$image_id = $settings['image']['id'];
		$image_url = wp_get_attachment_image_src( $image_id, 'full', false );
		$image_alt = get_post_meta($image_id , '_wp_attachment_image_alt', true); 

		?>
		<!-- Single feature box -->
			<div class="single-exclusive-box trans-03 p-all-38">
				<div class="exclusive-img trans-03 m-b-30">
					<img src="<?php echo esc_url( $image_url[0] );  ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
				</div>
				<div class="exclusive-content">
					<h4 class="fs-22 m-b-25 trans-03"><?php echo esc_html( $settings['title'] ); ?></h4>
					<p><?php echo esc_html( $settings['content'] ); ?></p>
					<?php if ( !empty( $settings['btn-txt'] ) ) : ?>
						<a href="<?php echo esc_url( $settings['btn-url']['url'] ); ?>" class="learn-more"><?php echo esc_html( $settings['btn-txt'] ); ?></a>
					<?php endif; ?>
				</div>
			</div>

			<?php 
		
	}
}
plugin::instance()->widgets_manager->register_widget_type(new smart_addon_service_Widget());