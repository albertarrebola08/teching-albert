<?php
defined( 'ABSPATH' ) || exit;
get_header();
?>

<div class="container py-5">

	<!-- Bloque de bienvenida editable -->
	<section class="mb-5 text-center">
		<h1 class="display-4 mb-3">Bienvenido/a a Teching ARSA</h1>
		<?php if ( $bienvenida = get_field( 'texto_de_bienvenida' ) ) : ?>
			<div class="lead mb-4"><?php echo wp_kses_post( $bienvenida ); ?></div>
		<?php else : ?>
			<p class="lead mb-4">
				Tu portal docente de Formación Profesional.<br>
				Aquí podrás encontrar material actualizado de todos tus módulos y resultados de aprendizaje.
			</p>
		<?php endif; ?>

		<?php
		$video = get_field( 'video_de_bienvenida' );
		var_dump( $video ); // QUITA esto cuando acabes
		?>
		<!-- Video de bienvenida editable por ACF -->
		<?php if ( $video = get_field( 'video_de_bienvenida' ) ) : ?>


			<div class="ratio ratio-16x9 mx-auto mb-4" style="max-width:700px;">
				<?php echo $video; // Esto ya trae el HTML del vídeo embebido ?>
			</div>
		<?php else : ?>
			<div class="alert alert-info mx-auto" style="max-width:700px;">
				<strong>Sube el video de bienvenida desde el panel de edición de la pagina Home.</strong>
			</div>
		<?php endif; ?>

	</section>

	<!-- Grid de módulos con diseño atractivo -->
	<section>
		<h2 class="mb-4 text-center">Módulos disponibles</h2>
		<div class="row g-4">
			<?php
			$modulos = new WP_Query( [ 
				'post_type' => 'modulo',
				'posts_per_page' => 6
			] );
			if ( $modulos->have_posts() ) :
				while ( $modulos->have_posts() ) :
					$modulos->the_post();
					get_template_part( 'loop-templates/content', 'modulo' );
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p class="text-center">No hay módulos publicados todavía.</p>';
			endif;
			?>
		</div>
		<div class="text-center mt-4">
			<a href="<?php echo get_post_type_archive_link( 'modulo' ); ?>" class="btn btn-lg btn-primary px-5">Ver
				todos
				los módulos</a>
		</div>
	</section>

</div>

<?php get_footer(); ?>