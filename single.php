<?php
get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		$post_type = get_post_type();

		if ( $post_type === 'modulo' ) {
			get_template_part( 'loop-templates/content-single', 'modulo' );
		} elseif ( $post_type === 'ra' ) {
			get_template_part( 'loop-templates/content-single', 'ra' );
		} else {
			get_template_part( 'loop-templates/content-single', 'default' );
		}

	endwhile;
endif;

get_footer();
?>