<?php

if ( ! function_exists( 'mega_medical_add_features_section' ) ) :

    function mega_medical_add_features_section() {
        $options = mega_charity_get_theme_options();

        if ( get_theme_mod( 'features_enable' ) == false ) {
            return false;
        }

        $section_details = array();

        $section_details = apply_filters( 'mega_medical_filter_features_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }
        
        mega_medical_render_features_section( $section_details );

    }
endif;

if ( ! function_exists( 'mega_medical_get_features_section_details' ) ) :

    function mega_medical_get_features_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( get_theme_mod( 'features_content_page_'.$i ) ) ) :
                $page_ids[] = get_theme_mod( 'features_content_page_'.$i );
            endif;
        }
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( 3 ),
            'orderby'           => 'post__in',
            'ignore_sticky_posts'   => true,
        ); 

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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

add_filter( 'mega_medical_filter_features_section_details', 'mega_medical_get_features_section_details' );


if ( ! function_exists( 'mega_medical_render_features_section' ) ) :

   function mega_medical_render_features_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();
        
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="medical-services" class="relative page-section">
            <div class="wrapper">
                <div class="section-content col-3 clear">
                <?php foreach($content_details as $content ) : ?>

                    <article>
                        <div class="medical-service-item">
                            <div class="inner-box">
                                <div class="featured-image">
                                    <a href="<?php echo esc_url($content['url']); ?>"><img src="<?php echo esc_url($content['image']); ?>" alt="medical-service-01"></a>
                                </div>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url($content['url']); ?>"><?php echo esc_html($content['title']); ?></a></h2>
                                </header>
                            </div>
                        </div>
                    </article>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <?php 
    }
endif;

?>