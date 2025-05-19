<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="container py-5">
	<!--  imagen thubnail ra -->
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="mb-4">
			<?php the_post_thumbnail( 'full', [ 'class' => 'img-fluid' ] ); ?>
		</div>
	<?php endif; ?>
	<h1 class="mb-4"><?php the_title(); ?></h1>

	<?php if ( $modulo = get_field( 'modulo_padre' ) ) : ?>
		<p>
			<strong>Módulo:</strong>
			<a href="<?php echo get_permalink( $modulo->ID ); ?>">
				<?php echo esc_html( $modulo->post_title ); ?>
			</a>
		</p>
	<?php endif; ?>

	<?php if ( $img = get_field( 'imagen_principal' ) ) : ?>
		<img src="<?php echo esc_url( $img ); ?>" alt="Imagen principal" class="img-fluid mb-3 rounded"
			style="max-height: 340px; object-fit: cover;">
	<?php endif; ?>

	<?php if ( $desc = get_field( 'descripcion_breve' ) ) : ?>
		<div class="lead mb-4"><?php echo wp_kses_post( $desc ); ?></div>
	<?php endif; ?>

	<!-- Tabs Bootstrap 4 -->
	<ul class="nav nav-tabs mb-4" id="raTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="tab-estudiar" data-toggle="tab" href="#estudiar" role="tab">Qué vamos a
				estudiar</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="tab-video" data-toggle="tab" href="#video" role="tab">Vídeo de bienvenida</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="tab-desarrollo" data-toggle="tab" href="#desarrollo" role="tab">Desarrollo del
				contenido</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="tab-quiz" data-toggle="tab" href="#quiz" role="tab">Comprueba lo que has
				aprendido</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="tab-mas" data-toggle="tab" href="#mas" role="tab">Quiero saber más</a>
		</li>
	</ul>
	<div class="tab-content" id="raTabContent">
		<div class="tab-pane fade show active" id="estudiar" role="tabpanel">
			<?php echo wp_kses_post( get_field( 'que_vamos_a_estudiar' ) ); ?>
		</div>
		<div class="tab-pane fade" id="video" role="tabpanel">
			<?php if ( $video = get_field( 'video_de_bienvenida' ) )
				echo $video; ?>
		</div>
		<div class="tab-pane fade" id="desarrollo" role="tabpanel">
			<?php if ( have_rows( 'desarrollo_del_contenido' ) ) : ?>
				<?php while ( have_rows( 'desarrollo_del_contenido' ) ) :
					the_row(); ?>
					<div class="card mb-3">
						<div class="card-body">
							<?php if ( $tit = get_sub_field( 'titulo_bloque' ) ) : ?>
								<h5 class="card-title"><?php echo esc_html( $tit ); ?></h5>
							<?php endif; ?>
							<?php if ( $cont = get_sub_field( 'contenido_bloque' ) ) : ?>
								<div class="mb-2"><?php echo wp_kses_post( $cont ); ?></div>
							<?php endif; ?>
							<?php if ( $vid = get_sub_field( 'video_bloque' ) ) : ?>
								<div class="mb-2"><?php echo $vid; ?></div>
							<?php endif; ?>
							<?php if ( $arc = get_sub_field( 'archivo_bloque' ) ) : ?>
								<p><a href="<?php echo esc_url( $arc['url'] ); ?>" download>Descargar archivo</a></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<p class="text-muted">No hay bloques de contenido aún.</p>
			<?php endif; ?>
		</div>
		<div class="tab-pane fade" id="quiz" role="tabpanel">
			<?php echo wp_kses_post( get_field( 'quiz' ) ); ?>
		</div>
		<div class="tab-pane fade" id="mas" role="tabpanel">
			<?php echo wp_kses_post( get_field( 'quiero_saber_mas' ) ); ?>
		</div>
	</div>
</div>