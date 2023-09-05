<?php

	do_action( 'mega_charity_doctype' );

?>
<head>
<?php

	do_action( 'mega_charity_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php

	do_action( 'mega_charity_page_start_action' ); 


	do_action( 'mega_charity_header_action' );


	do_action( 'mega_charity_content_start_action' );


	do_action( 'mega_charity_header_image_action' );

	if (  mega_charity_is_frontpage() ) {
    	$options = mega_charity_get_theme_options();
		
    	$sorted = array();
			$sortable = 'main_slider,features,service,about,team,reason,latest_posts,contact';
			$sorted = explode( ',' , $sortable );

		foreach ( $sorted as $section ) {
			if ( $section == 'main_slider' || $section == 'service' || $section == 'about'|| $section == 'reason' || $section == 'latest_posts' || $section == 'features' ) {
				add_action( 'mega_medical_primary_content', 'mega_medical_add_'. $section .'_section' );
			}else{
				add_action( 'mega_medical_primary_content', 'mega_charity_add_'. $section .'_section' );
			}
		}
		do_action( 'mega_medical_primary_content' );
	}
