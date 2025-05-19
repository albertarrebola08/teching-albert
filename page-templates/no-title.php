<?php
/**
 * Template Name: No Title Page Template
 *
 * This template can be used to override the default template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_template_part( 'page-templates/fullwidthpage' );

get_header();
?>

<div class="container py-5">
	<!-- Aquí podrías omitir el título de la página -->
	<div class="row">
		<?php
		$loop = new WP_Query( [ 
			'post_type' => 'proyecto',
			'posts_per_page' => 6,
		] );
		if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) :
				$loop->the_post();
				get_template_part( 'loop-templates/content-single', 'proyecto' );
			endwhile;
			wp_reset_postdata();
		else :
			echo '<p>No hay proyectos para mostrar.</p>';
		endif;
		?>
	</div>
</div>

<?php
get_footer();

