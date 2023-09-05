<?php

function mega_medical_customize_register( $wp_customize ) {

	class Mega_Medical_Switch_Control extends WP_Customize_Control{

		public $type = 'switch';

		public $on_off_label = array();

		public function __construct( $manager, $id, $args = array() ){
	        $this->on_off_label = $args['on_off_label'];
	        parent::__construct( $manager, $id, $args );
	    }

		public function render_content(){
	    ?>
		    <span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</span>

			<?php if( $this->description ){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post( $this->description ); ?>
				</span>
			<?php } ?>

			<?php
				$switch_class = ( $this->value() == 'true' ) ? 'switch-on' : '';
				$on_off_label = $this->on_off_label;
			?>
			<div class="onoffswitch <?php echo esc_attr( $switch_class ); ?>">
				<div class="onoffswitch-inner">
					<div class="onoffswitch-active">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['on'] ) ?></div>
					</div>

					<div class="onoffswitch-inactive">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['off'] ) ?></div>
					</div>
				</div>	
			</div>
			<input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr( $this->value() ); ?>"/>
			<?php
	    }
	}

	class Mega_Medical_Dropdown_Chooser extends WP_Customize_Control{

		public $type = 'dropdown_chooser';

		public function render_content(){
			if ( empty( $this->choices ) )
	                return;
			?>
	            <label>
	                <span class="customize-control-title">
	                	<?php echo esc_html( $this->label ); ?>
	                </span>

	                <?php if($this->description){ ?>
		            <span class="description customize-control-description">
		            	<?php echo wp_kses_post($this->description); ?>
		            </span>
		            <?php } ?>

	                <select class="mega-medical-chosen-select" <?php $this->link(); ?>>
	                    <?php
	                    foreach ( $this->choices as $value => $label )
	                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
	                    ?>
	                </select>
	            </label>
			<?php
		}
	}
    class Mega_Medical_Multi_Input_Custom_Control extends WP_Customize_Control {

        public $type = 'multi-input';

        public $button_text;
    
        public function render_content() {
            ?>
            <label class="customize_multi_input">
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <p><?php echo esc_html( $this->description ); ?></p>
                <input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize_multi_value_field" <?php $this->link(); ?> />
                <div class="customize_multi_fields">
                    <div class="set">
                        <input type="text" value="" class="customize_multi_single_field"/>
                        <span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span>
                    </div>
                </div>
                <a href="#" class="button button-primary customize_multi_add_field"><?php echo esc_html( $this->button_text ); ?></a>
            </label>
            <?php
        }
    }


	$wp_customize->add_section( 'mega_medical_main_slider',
		array(
			'title'             => esc_html__( 'Main Slider','mega-medical' ),
			'description'       => esc_html__( 'Main Slider Options.', 'mega-medical' ),
			'panel'             => 'mega_charity_front_page_panel',
            'priority'			=> 5

		)
	);

    $wp_customize->add_setting( 'main_slider_enable',
        array(
            'default'			=> 	false,
            'sanitize_callback' => 'mega_charity_sanitize_switch_control',
        )
    );

    $wp_customize->add_control( new Mega_Medical_Switch_Control( $wp_customize,
        'main_slider_enable',
            array(
                'label'             => esc_html__( 'Main Slider Section Enable', 'mega-medical' ),
                'section'           => 'mega_medical_main_slider',
                'on_off_label' 		=> mega_charity_switch_options(),
            )
        )
    );

    for ( $i = 1; $i <= 3; $i++ ) :

        $wp_customize->add_setting( 'main_slider_content_post_' . $i,
            array(
                'sanitize_callback' => 'mega_charity_sanitize_page',
            )
        );
    
        $wp_customize->add_control( new Mega_Medical_Dropdown_Chooser( $wp_customize,
            'main_slider_content_post_' . $i,
                array(
                    'label'             => sprintf( esc_html__( 'Select Post %d', 'mega-medical' ), $i ),
                    'section'           => 'mega_medical_main_slider',
                    'choices'			=> mega_charity_post_choices(),
                    'active_callback'	=> 'mega_medical_is_main_slider_enable',
                )
            )
        );
    
    endfor;

	$wp_customize->add_setting( 'main_slider_btn_label',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'          	=> esc_html__( 'Make a Appointment','mega-medical' ),
			'transport'			=> 'postMessage',
		)
	);

	$wp_customize->add_control( 'main_slider_btn_label',
		array(
			'label'           	=> esc_html__( 'Button Label', 'mega-medical' ),
			'section'        	=> 'mega_medical_main_slider',
			'active_callback' 	=> 'mega_medical_is_main_slider_enable',
			'type'				=> 'text'
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'main_slider_btn_label',
			array(
				'selector'            => '#blog-featured-posts .read-more a',
				'settings'            => 'main_slider_btn_label',
				'container_inclusive' => false,
				'fallback_refresh'    => true,
				'render_callback'     => 'mega_medical_main_slider_btn_label_partial',
			)
		);
	}

	$wp_customize->add_section( 'mega_medical_features',
		array(
			'title'             => esc_html__( 'Features','mega-medical' ),
			'description'       => esc_html__( 'Features Options.', 'mega-medical' ),
			'panel'             => 'mega_charity_front_page_panel',
            'priority'			=> 15

		)
	);

    $wp_customize->add_setting( 'features_enable',
        array(
            'default'			=> 	false,
            'sanitize_callback' => 'mega_charity_sanitize_switch_control',
        )
    );

    $wp_customize->add_control( new Mega_Medical_Switch_Control( $wp_customize,
        'features_enable',
            array(
                'label'             => esc_html__( 'Features Section Enable', 'mega-medical' ),
                'section'           => 'mega_medical_features',
                'on_off_label' 		=> mega_charity_switch_options(),
            )
        )
    );

    for ( $i = 1; $i <= 3; $i++ ) :

        $wp_customize->add_setting( 'features_content_page_' . $i,
            array(
                'sanitize_callback' => 'mega_charity_sanitize_page',
            )
        );

        $wp_customize->add_control( new Mega_Medical_Dropdown_Chooser( $wp_customize,
            'features_content_page_' . $i,
                array(
                    'label'             => sprintf( esc_html__( 'Select Page %d', 'mega-medical' ), $i ),
                    'section'           => 'mega_medical_features',
                    'choices'			=> mega_charity_page_choices(),
                    'active_callback'	=> 'mega_medical_is_features_enable',
                )
            )
        );
    endfor;

    $wp_customize->add_section( 'mega_medical_reason',
		array(
			'title'             => esc_html__( 'Medical Reason','mega-medical' ),
			'description'       => esc_html__( 'Medical Reason Options.', 'mega-medical' ),
			'panel'             => 'mega_charity_front_page_panel',
			'priority'			=> 65
		)
	);

    $wp_customize->add_setting( 'reason_enable',
        array(
            'default'			=> 	false,
            'sanitize_callback' => 'mega_charity_sanitize_switch_control',
        )
    );

    $wp_customize->add_control( new Mega_Medical_Switch_Control( $wp_customize,
        'reason_enable',
            array(
                'label'             => esc_html__( 'Medical Reason Section Enable', 'mega-medical' ),
                'section'           => 'mega_medical_reason',
                'on_off_label' 		=> mega_charity_switch_options(),
            )
        )
    );

    $wp_customize->add_setting( 'reason_content_page', 
        array(
            'sanitize_callback' => 'mega_charity_sanitize_page',
        )
    );

    $wp_customize->add_control( new Mega_Medical_Dropdown_Chooser( $wp_customize,
        'reason_content_page', 
            array(
                'label'             => esc_html__( 'Select Page', 'mega-medical' ),
                'section'           => 'mega_medical_reason',
                'choices'			=> mega_charity_page_choices(),
                'active_callback'	=> 'mega_medical_is_reason_enable',
            )
        )
    );

    $wp_customize->add_setting( 'reason_list',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'refresh',
            
        )
    );

    $wp_customize->add_control( new Mega_Medical_Multi_Input_Custom_Control( $wp_customize,
        'reason_list',
            array(
                'label'             => esc_html__( 'Add List', 'mega-medical' ),
                'button_text'       => esc_html__( 'Add List.', 'mega-medical' ),
                'section'           => 'mega_medical_reason',
                'active_callback' 	=> 'mega_medical_is_reason_enable',
                'type'				=> 'multi-input',
            )
        )
    );
        
    $wp_customize->add_setting( 'footer_Section_enable',
        array(
            'default'       		=> true,
            'sanitize_callback' => 'mega_charity_sanitize_switch_control',
        )
    );

    $wp_customize->add_control( new Mega_Medical_Switch_Control( $wp_customize,
        'footer_Section_enable',
            array(
                'label'      			=> esc_html__( 'Footer Section', 'mega-medical' ),
                'section'    			=> 'mega_charity_section_footer',
                'on_off_label' 		    => mega_charity_switch_options(),
            )
        )
    );

    $wp_customize->add_setting( 'footer_logo',
        array(
            'sanitize_callback' => 'mega_charity_sanitize_image'
        )
    );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
        'footer_logo',
            array(
                'label'       		=> esc_html__( 'Footer Site Logo', 'mega-medical' ),
                'section'     		=> 'mega_charity_section_footer',
                'active_callback'	=> 'mega_medical_is_footer_Section_enable',
            )
        )
    );

    $wp_customize->add_setting( 'footer_menu',
        array(
            'default'       		=> false,
            'sanitize_callback' => 'mega_charity_sanitize_switch_control',
        )
    );

    $wp_customize->add_control( new Mega_Medical_Switch_Control( $wp_customize,
        'footer_menu',
            array(
                'label'      			=> esc_html__( 'Footer Menu', 'mega-medical' ),
                'section'    			=> 'mega_charity_section_footer',
                'on_off_label' 		    => mega_charity_switch_options(),
                'active_callback'	    => 'mega_medical_is_footer_Section_enable',
            )
        )
    );

    $wp_customize->add_setting( 'footer_description',
        array(
            'sanitize_callback'		=> 'mega_charity_santize_allow_tag',
            'transport'				=> 'postMessage',
        )
    );
    $wp_customize->add_control( 'footer_description',
        array(
            'label'      			=> esc_html__( 'Footer Description', 'mega-medical' ),
            'section'    			=> 'mega_charity_section_footer',
            'type'		 			=> 'textarea',
            'active_callback'	    => 'mega_medical_is_footer_Section_enable',
        )
    );

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'footer_description', array(
            'selector'            => '#colophon div.wrapper p',
            'settings'            => 'footer_description',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'mega_charity_footer_description_partial',
        ) );
    }

    $wp_customize->add_setting( 'footer_info_menu',
        array(
            'default'       		=> false,
            'sanitize_callback'     => 'mega_charity_sanitize_switch_control',
        )
    );

    $wp_customize->add_control( new Mega_Medical_Switch_Control( $wp_customize,
        'footer_info_menu',
            array(
                'label'      			=> esc_html__( 'Footer Info Menu Enable/Disable', 'mega-medical' ),
                'section'    			=> 'mega_charity_section_footer',
                'on_off_label' 		    => mega_charity_switch_options(),
            )
        )
    );


}
add_action( 'customize_register', 'mega_medical_customize_register' );

function mega_medical_is_main_slider_enable( $control ) {
	return $control->manager->get_setting( 'main_slider_enable' )->value();
}

function mega_medical_is_features_enable( $control ) {
	return $control->manager->get_setting( 'features_enable' )->value();
}

function mega_medical_is_reason_enable( $control ) {
	return $control->manager->get_setting( 'reason_enable' )->value();
}

function mega_medical_is_footer_Section_enable( $control ) {
	return $control->manager->get_setting( 'footer_Section_enable' )->value();
}


if ( ! function_exists( 'mega_medical_main_slider_btn_label_partial' ) ) :
    function mega_medical_main_slider_btn_label_partial() {
        return esc_html( get_theme_mod( 'main_slider_btn_label' ) );
    }
endif;
