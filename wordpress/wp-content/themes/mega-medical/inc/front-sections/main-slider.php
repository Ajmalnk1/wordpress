<?php

if ( ! function_exists( 'mega_medical_add_main_slider_section' ) ) :

    function mega_medical_add_main_slider_section() {
        $options = mega_charity_get_theme_options();

        if ( get_theme_mod( 'main_slider_enable' ) == false ) {
            return false;
        }

        $section_details = array();

        $section_details = apply_filters( 'mega_medical_filter_main_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        
        mega_medical_render_main_slider_section( $section_details );

    }
endif;

if ( ! function_exists( 'mega_medical_get_main_slider_section_details' ) ) :

    function mega_medical_get_main_slider_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( get_theme_mod( 'main_slider_content_post_'.$i ) ) ) :
                $post_ids[] = get_theme_mod( 'main_slider_content_post_'.$i );
            endif;
        }
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => absint( 3 ),
            'orderby'           => 'post__in',
            'ignore_sticky_posts'   => true,
        ); 

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = mega_charity_trim_content( 15 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;

add_filter( 'mega_medical_filter_main_slider_section_details', 'mega_medical_get_main_slider_section_details' );


if ( ! function_exists( 'mega_medical_render_main_slider_section' ) ) :

   function mega_medical_render_main_slider_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();
        $main_slider_btn_title = ! empty( get_theme_mod( 'main_slider_btn_label' ) ) ? get_theme_mod( 'main_slider_btn_label' ) : __('Make a Appointment', 'mega-medical');
        
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": false, "speed": 800, "dots": true, "arrows": true, "autoplay": false, "draggable": true, "fade": false }'>
            <?php foreach($content_details as $content ) : ?>
            <article style="background-image:url('<?php echo esc_url($content['image']); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="featured-content-wrapper">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo esc_html($content['title']); ?></a></h2>
                        </header>

                            <?php if( !empty( $content['excerpt'] ) ): ?>
                                <div class="entry-content">
                                    <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                                </div>
                            <?php endif; ?>

                        <?php if( !empty( $main_slider_btn_title ) ): ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html($main_slider_btn_title); ?></a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
       
        <?php 
    }
endif;

?>