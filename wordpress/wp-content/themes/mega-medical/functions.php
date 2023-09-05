<?php 
if ( ! function_exists( 'mega_medical_setup' ) ) :

	function mega_medical_setup() {
		
		register_nav_menus( 
            array(
                'footer' 		=> esc_html__( 'Footer', 'mega-medical' ),
                'footer-menu' 	=> esc_html__( 'Footer Menu', 'mega-medical' ),
            )
        );

	}

endif;

add_action( 'after_setup_theme', 'mega_medical_setup', 20 );

add_action( 'init', 'mega_medical_remove_parent_action');

function mega_medical_remove_parent_action() {
	remove_action('mega_charity_footer','mega_charity_footer_site_info', 40);
};

if ( ! function_exists( 'mega_medical_fonts_url' ) ) :

	function mega_medical_fonts_url() {
		
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';
	
		if ( 'off' !== _x( 'on', 'khand font: on or off', 'mega-medical' ) ) {
			$fonts[] = 'Khand:400,500,600,700';
		}
		if ( 'off' !== _x( 'on', 'poppins font: on or off', 'mega-medical' ) ) {
			$fonts[] = 'Poppins:400,500,600,700';
		}
	
		$query_args = array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		);
	
		if ( $fonts ) {
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}
	
		return esc_url_raw( $fonts_url );
	}
	
endif;

if ( ! function_exists( 'mega_medical_enqueue_styles' ) ) :

	function mega_medical_enqueue_styles() {
		wp_enqueue_style( 'mega-medical-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'mega-medical-style', get_stylesheet_directory_uri() . '/style.css', array( 'mega-medical-style-parent' ), '1.0.0' );
		
		wp_enqueue_style( 'mega-medical-fonts', wptt_get_webfont_url( mega_medical_fonts_url() ), array(), '1.0' );

	}

endif;
add_action( 'wp_enqueue_scripts', 'mega_medical_enqueue_styles', 99 );

function mega_medical_customize_control_style() {

	wp_enqueue_style( 'mega-medical-customize-controls', get_theme_file_uri() . '/customizer-control.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'mega_medical_customize_control_style' );


if ( ! function_exists( 'mega_medical_footer_site_info' ) ) :

	function mega_medical_footer_site_info() {
		$options = mega_charity_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );
		$theme_data = wp_get_theme();

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text'] ? $options['copyright_text'] : '';
		$footer_logo = !empty(get_theme_mod('footer_logo')) ? get_theme_mod('footer_logo') : '';
		$footer_description = !empty( get_theme_mod('footer_description') ) ? get_theme_mod('footer_description') : '';
		?>

		<?php if( get_theme_mod( 'footer_Section_enable', true ) == true ): ?>
			<div class="footer-widgets-area col-6">
                <div class="wrapper">
                    <div class="text clear">
                    <?php if( !empty( $footer_logo ) ): ?>
                        <div class="footer-logo">
                            <a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url($footer_logo); ?>" alt="footer-logo"></a>
                        </div>
                    <?php endif; ?>

                    <?php if( get_theme_mod('footer_menu') == true ): ?>

                        <div class="footer-menu">
	                    	<?php  
	                    		
								wp_nav_menu(
									array(
										'theme_location' => 'footer-menu',
										'echo' => true,
										'fallback_cb' => 'mega_charity_menu_fallback_cb',
										'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										)
									);
					        		
					        	?>
	                    </div><!-- .footer-menu -->

	                <?php endif; ?>
                         
                    </div>
                    <p><?php echo mega_charity_santize_allow_tag( $footer_description ); ?></p>
                </div><!-- .wrapper -->
            </div><!-- .footer-widgets-area -->

        <?php endif; ?>

		<div class="site-info clear col-2">
			<div class="wrapper">
				<div class="copyright">
					<span>
						<?php 
						echo mega_charity_santize_allow_tag( $copyright_text ); 
						echo esc_html__( ' All Rights Reserved | ', 'mega-medical' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'mega-medical' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>';
						?>
					</span>
				</div>

				<?php if(has_nav_menu('footer') && get_theme_mod( 'footer_info_menu' ) == true ): ?>
					<div class="info-menu">

						<?php 
						wp_nav_menu( 
							array(
								'theme_location' => 'footer',
								'echo' => true,
								'fallback_cb' => 'mega_charity_menu_fallback_cb',
							)
						); ?>
					</div>
					<?php endif; ?>
				</div><!-- .wrapper -->    
			</div><!-- .site-info -->
		<?php
	}
endif;

add_action( 'mega_charity_footer', 'mega_medical_footer_site_info', 40 );

require get_theme_file_path() . '/inc/customizer.php';

require get_theme_file_path() . '/inc/front-sections/main-slider.php';

require get_theme_file_path() . '/inc/front-sections/about.php';

require get_theme_file_path() . '/inc/front-sections/service.php';

require get_theme_file_path() . '/inc/front-sections/features.php';

require get_theme_file_path() . '/inc/front-sections/latest-posts.php';

require get_theme_file_path() . '/inc/front-sections/medical-reason.php';