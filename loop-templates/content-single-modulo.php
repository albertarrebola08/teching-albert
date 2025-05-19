<?php
get_header();
?>
<div class="container py-5">
  <?php if ( have_posts() ) :
	  while ( have_posts() ) :
		  the_post(); ?>
			<h1 class="mb-4"><?php the_title(); ?></h1>
			<?php
			$img_url = get_field( 'imagen_principal' );
			$desc = get_field( 'descripcion' );
			?>
			<?php if ( $img_url ) : ?>
				  <img src="<?php echo esc_url( $img_url ); ?>" class="img-fluid mb-4" alt="<?php the_title_attribute(); ?>">
			<?php endif; ?>
			<?php if ( $desc ) : ?>
				  <p class="lead"><?php echo esc_html( $desc ); ?></p>
			<?php endif; ?>

			<!-- Aquí mostraremos los RAs de este módulo -->
			<h2 class="mt-5">Resultados de aprendizaje</h2>
			<div class="row">
	  		<?php
			  $modulo_id = get_the_ID();
			  $ra_query = new WP_Query( [ 
			  	'post_type' => 'ra',
			  	'posts_per_page' => -1,
			  	'meta_query' => [ 
			  		[ 
			  			'key' => 'modulo_padre',
			  			'value' => $modulo_id,
			  			'compare' => '=',
			  		]
			  	]
			  ] );
			  if ( $ra_query->have_posts() ) :
				  while ( $ra_query->have_posts() ) :
					  $ra_query->the_post();
					  get_template_part( 'loop-templates/content', 'ra' );
				  endwhile;
				  wp_reset_postdata();
			  else :
				  echo "<p>No hay RAs asociados.</p>";
			  endif;
			  ?>
			</div>

  	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
