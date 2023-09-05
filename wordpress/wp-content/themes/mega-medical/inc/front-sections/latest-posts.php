<?php

if ( ! function_exists( 'mega_medical_add_latest_posts_section' ) ) :

    function mega_medical_add_latest_posts_section() {
        $options = mega_charity_get_theme_options();

        $latest_posts_enable = apply_filters( 'mega_charity_section_status', true, 'latest_posts_section_enable' );

        if ( true !== $latest_posts_enable ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'mega_medical_filter_latest_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        mega_medical_render_latest_posts_section( $section_details );
    }
endif;

if ( ! function_exists( 'mega_medical_get_latest_posts_section_details' ) ) :

    function mega_medical_get_latest_posts_section_details( $input ) {
        $options = mega_charity_get_theme_options();

        $latest_posts_content_type  = get_theme_mod( 'mega_charity_theme_options_latest_posts_content_type', 'category' );
        $latest_posts_count = get_theme_mod( 'mega_charity_theme_options_latest_posts_count', 4 );

        $content = array();
        switch ( $latest_posts_content_type ) {

            case 'post':
                $post_ids = array();
                $author = array();

                for ( $i = 1; $i <= $latest_posts_count; $i++ ) {
                    if ( ! empty( $options['latest_posts_content_post_' . $i] ) ) :
                        $post_ids[] = $options['latest_posts_content_post_' . $i];
                    endif;
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => $latest_posts_count,
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['latest_posts_content_category'] ) ? $options['latest_posts_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => $latest_posts_count,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;
            
            default:
            break;
        }

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = mega_charity_trim_content( 15 );
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

add_filter( 'mega_medical_filter_latest_posts_section_details', 'mega_medical_get_latest_posts_section_details' );


if ( ! function_exists( 'mega_medical_render_latest_posts_section' ) ) :

   function mega_medical_render_latest_posts_section( $content_details = array() ) {
        $options = mega_charity_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
            <div id="medical-news" class="relative page-section">
                <div class="wrapper">
                <?php if( !empty( $options['latest_posts_title'] ) ): ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['latest_posts_title'] ); ?></h2>
                    </div>
                <?php endif; ?>

                    <div class="section-content col-3 clear">
                    <?php foreach ( $content_details as $content ) : ?>

                        <article>
                            <div class="medical-news-item">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                    <a href="#" class="post-thumbnail-link"></a>
                                    <div class="date">20 <br>Jun</div>
                                </div>

                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                    </div>

                                    <div class="post-read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"> View Details </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>       
    <?php }
endif;