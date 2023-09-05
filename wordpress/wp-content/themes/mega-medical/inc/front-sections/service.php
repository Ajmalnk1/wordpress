<?php

if ( ! function_exists( 'mega_medical_add_service_section' ) ) :

    function mega_medical_add_service_section() {
        $options = mega_charity_get_theme_options();

        $service_enable = apply_filters( 'mega_charity_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'mega_medical_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }


        mega_medical_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_medical_get_service_section_details' ) ) :

    function mega_medical_get_service_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();
        $service_count = get_theme_mod( 'mega_charity_theme_options_service_count', $options['service_count'] );

        $post_ids = array();

        for ( $i = 1; $i <= $service_count; $i++ ) {
            if ( ! empty( $options['service_content_post_' . $i] ) )
                $post_ids[] = $options['service_content_post_' . $i];
        }
        
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => $service_count,
            'orderby'           => 'post__in',
            'ignore_sticky_posts'   => true,
        ); 

            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = mega_charity_trim_content( 25 );
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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

add_filter( 'mega_medical_filter_service_section_details', 'mega_medical_get_service_section_details' );


if ( ! function_exists( 'mega_medical_render_service_section' ) ) :

   function mega_medical_render_service_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();
        
        $button = $options['service_btn_title'] ? $options['service_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        }  ?>

        <div id="medical-features" class="relative page-section">
            <div class="wrapper">
                <?php if( !empty( $options['service_title'] ) ): ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo mega_charity_santize_allow_tag( $options['service_title'] ); ?></h2>
                    </div>
                <?php endif; ?>

                <div class="section-content col-3 clear">
                <?php $i = 1; foreach ( $content_details as $content ) : ?>

                    <article>
                        <div class="medical-feature-item">
                            <div class="feature-icon">
                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                    <i class="fa <?php echo ! empty( $options['service_content_icon_' . $i] ) ? esc_attr( $options['service_content_icon_' . $i] ) : 'fa-handshake-o'; ?>"></i>
                                </a>
                            </div>

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php $i++; endforeach; ?>

                </div>
            </div>
        </div>

    <?php }
endif;