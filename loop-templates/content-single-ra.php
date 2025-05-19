<?php
get_header();
?>
<div class="container py-5">
	<?php if ( have_posts() ) :
		while ( have_posts() ) :
			the_post(); ?>
			<h1 class="mb-4"><?php the_title(); ?></h1>
			<p><strong>Sección:</strong> <?php echo esc_html( get_field( 'seccion' ) ); ?></p>
			<?php if ( $modulo = get_field( 'modulo_padre' ) ) : ?>
				<p><strong>Módulo:</strong> <a
						href="<?php echo get_permalink( $modulo->ID ); ?>"><?php echo esc_html( $modulo->post_title ); ?></a></p>
			<?php endif; ?>
			<div class="mb-4"><?php the_field( 'contenido_principal' ); ?></div>

			<!-- Subapartados si los tienes (o deja el espacio para añadirlos en el futuro) -->
			<?php
			// Si más adelante tienes PRO y repeater, aquí el bucle:
			/*
			if(have_rows('subapartados')):
			  while(have_rows('subapartados')): the_row();
				echo '<h4>' . esc_html(get_sub_field('subtitulo')) . '</h4>';
				echo get_sub_field('contenido_subapartado');
			  endwhile;
			endif;
			*/
			?>
		<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>