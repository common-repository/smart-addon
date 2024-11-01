<?php

/**
 * Elementor widget
 * @package Smart Addon
 * @since 1.0.0
 * */

namespace Elementor;
class smart_addon_pricing_Widget extends Widget_Base{
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
		return 'smart_addon_pricing';
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
		return esc_html__(' Pricing ','smart-addon');
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
				'label' => esc_html__( 'Pricing Settings', 'smart-addon' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'pricing_name',
            [
                'label'       => esc_html__( 'Pricing Package Name', 'smart-addon' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'Enter Pricing Name', 'smart-addon' ),
                'default'     => esc_html__('personal','smart-addon')
            ]
        );

       $this->add_control(
            'price',
            [
                'label'       => esc_html__( 'Price', 'smart-addon' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'enter price', 'smart-addon' ),
                'default'     => esc_html__('30','smart-addon')
            ]
        );

        $this->add_control(
            'time',
            [
                'label'       => esc_html__( 'Enter Experied Time', 'smart-addon' ),
                'type'        => Controls_Manager::TEXT,
                'description' => esc_html__( 'you can enter mo/yr or as you want', 'smart-addon' ),
                'default'     => esc_html__('mo','smart-addon')
            ]
        );

        $this->add_control(
            'desc',
            [
                'label'       => esc_html__( 'Enter Short Description', 'smart-addon' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Limited access','smart-addon')
            ]
        );

		$this->add_control( 'pricingtems', [
			'label'       => esc_html__( 'Pricing Items', 'smart-addon' ),
			'type'        => Controls_Manager::REPEATER,
			'default'     => [
				[
					'feature'        => esc_html__( ' 100 MB Disk Space', 'smart-addon' ),

				]
			],
			'fields'      => [
				[
					'name'        => 'feature',
					'label'       => esc_html__( 'Feature List', 'smart-addon' ),
					'type'        => Controls_Manager::TEXT,
					'description' => esc_html__( 'Enter Title', 'smart-addon' )
				],
				[
					'name'        => 'support',
					'label'       => esc_html__( 'Support for this package ?', 'smart-addon' ),
					'type'        => Controls_Manager::SWITCHER,
					'description' => esc_html__( 'Is this feature support for this package ?', 'smart-addon' )
				],


			],
			'title_field' => "{{name}}"
		] );


		$this->add_control(
			'btn-txt',
			[
				'label'       => esc_html__( 'Button Text', 'smart-addon' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'enter button text', 'smart-addon' ),
				'default'     => esc_html__('Get Started','smart-addon')
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

		$this->end_controls_section();

		

	}

	protected function render()
	{
		$settings = $this->get_settings_for_display();

		?>
  				<div class="single-pricing-boxes">
					<div class="price-title text-center lh-45">
						<h3 class="fs-30 lh-45 m-b-10"><?php echo esc_html( $settings['pricing_name'] ); ?></h3>
						<p class="price fs-20"><span class="fs-40">$ </span><span class="fs-45 fw-700"><?php echo esc_html(  
							$settings['price'] ) ?></span>/<?php echo esc_html( $settings['time'] ); ?></p>
						<p class="fs-22"><?php echo esc_html( $settings['desc'] ); ?></p>
					</div>
					<div class="pricing-feature text-center p-tb-50">
						<ul>
							<?php 
								foreach( $settings[ 'pricingtems' ] as $item ) :
									$img = ( $item['support'] == 'yes' ? 'tick-01' : 'close-01' );

							 ?>
							<li><img src="<?php echo esc_url( SMART_ADDON_IMG.'/'.$img.'.png' ); ?>" alt="trick"><?php echo esc_html__( $item['feature'] ); ?></li>
							<?php endforeach; ?>
						</ul>

						<a href="<?php echo esc_url( $settings['btn-url']['url'] ); ?>" class="border-btn m-t-45"><?php echo esc_html( $settings['btn-txt'] ); ?></a>
					</div>
				</div>

			<?php 
		
	}
}
plugin::instance()->widgets_manager->register_widget_type(new smart_addon_pricing_Widget());