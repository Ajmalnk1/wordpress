<?php

if ( ! function_exists( 'mega_medical_add_reason_section' ) ) :

    function mega_medical_add_reason_section() {
    	$options = mega_charity_get_theme_options();

        if ( get_theme_mod( 'reason_enable' ) == false ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'mega_medical_filter_reason_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        mega_medical_render_reason_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_medical_get_reason_section_details' ) ) :

    function mega_medical_get_reason_section_details( $input ) {
        $options = mega_charity_get_theme_options();
        
        $content = array();
        $page_id = ! empty( get_theme_mod( 'reason_content_page' ) ) ? get_theme_mod( 'reason_content_page' ): '';
        $args = array(
            'post_type'             => 'page',
            'p'                     => $page_id,
            'posts_per_page'        => 1,
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

add_filter( 'mega_medical_filter_reason_section_details', 'mega_medical_get_reason_section_details' );


if ( ! function_exists( 'mega_medical_render_reason_section' ) ) :

    function mega_medical_render_reason_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        }  ?>
        <?php foreach ( $content_details as $content ) : ?>
        
            <div id="medical-reasons" class="relative page-section">
                <div class="wrapper">
                    <article class="has-post-thumbnail">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                        </div>

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                            </header>

                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ) ; ?></p> 
                            </div>

                            <ul>
                                <?php 
                                $reason_list = explode("|",get_theme_mod( 'reason_list' )); ?>
                                <?php foreach($reason_list as $list): 
                                    if(empty($list)) continue;
                                    echo '<li>'.esc_html($list).'</li>';
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
    <?php endforeach;
        
}
endif;

