<?php
defined( 'ABSPATH' ) || exit;
get_header();
?>


<div class="container-fluid bg-gradient-arsa py-5">

	<!-- Bloque de bienvenida con fondo degradado -->
	<section class="mb-5 text-center text-white">
		<h1 class="display-3
		 mb-3 section-title-arsa">Benvinguts a <span style="font-weight:900;">Teching
				ARSA</span>
		</h1>
		<?php if ( $bienvenida = get_field( 'texto_de_bienvenida' ) ) : ?>
			<div class="lead mb-4" style="font-size:1.45rem;"><?php echo wp_kses_post( $bienvenida ); ?></div>

		<?php endif; ?>

		<?php if ( $video = get_field( 'video_de_bienvenida' ) ) : ?>
			<div class="embed-responsive embed-responsive-16by9 mx-auto mb-4" style="max-width:700px;">
				<?= $video; ?>
			</div>

		<?php endif; ?>
	</section>

</div>
<!-- Grid de módulos con animación -->
<div class="container py-5">
	<section>
		<h2 class="mb-4 text-center section-title-arsa">Mòduls disponibles</h2>
		<div class="row g-4">
			<?php
			$modulos = new WP_Query( [ 
				'post_type' => 'modulo',
				'posts_per_page' => 6
			] );
			$i = 0;
			if ( $modulos->have_posts() ) :
				while ( $modulos->have_posts() ) :
					$modulos->the_post();
					// Añade un pequeño delay a cada card para animación escalonada:
					$delay = 0.10 * $i++;
					?>
					<div class="col-12 col-sm-6 col-md-4 mb-4" style="animation-delay: <?php echo $delay; ?>s;">
						<?php get_template_part( 'loop-templates/content', 'modulo' ); ?>
					</div>

					<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p class="text-center">No hay módulos publicados todavía.</p>';
			endif;
			?>
		</div>
		<div class="text-center mt-4">
			<a href="<?php echo get_post_type_archive_link( 'modulo' ); ?>" class="btn btn-lg btn-arsa px-5">
				Ver todos los módulos
			</a>
		</div>
	</section>
</div>



<?php
wp_reset_postdata();
get_footer();
?>