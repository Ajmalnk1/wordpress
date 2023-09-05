<?php

if ( ! function_exists( 'mega_medical_add_about_section' ) ) :

    function mega_medical_add_about_section() {
    	$options = mega_charity_get_theme_options();

        $about_enable = apply_filters( 'mega_charity_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'mega_medical_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        mega_medical_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_medical_get_about_section_details' ) ) :

    function mega_medical_get_about_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();
        $post_id = ! empty( $options['about_content_post'] ) ? $options['about_content_post'] : '';
        $args = array(
            'post_type'         => 'post',
            'p'                 => $post_id,
            'posts_per_page'    => 1,
            'ignore_sticky_posts'   => true,

        );

            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = mega_charity_trim_content( 35 );
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

add_filter( 'mega_medical_filter_about_section_details', 'mega_medical_get_about_section_details' );


if ( ! function_exists( 'mega_medical_render_about_section' ) ) :

   function mega_medical_render_about_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();
        $about_btn_title = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 
        ?>
        <?php foreach ( $content_details as $content ) : ?>
        
        <div id="medical-about-us" class="relative page-section">
            <div class="wrapper">
                <article class="has-post-thumbnail">
                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <a href="<?php echo esc_url( $content['image'] ); ?>" class="post-thumbnail-link"></a>
                    </div>

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                        </header>

                        <div class="entry-content">
                            <p><?php echo esc_html( $content['excerpt'] ) ; ?></p> 
                        </div>

                        <?php if( !empty( $content['url'] ) && !empty( $about_btn_title ) ): ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn"><?php echo esc_html( $about_btn_title ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
            </div>
        </div>
    <?php endforeach;

}
endif;

