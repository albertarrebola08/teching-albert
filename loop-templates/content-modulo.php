<?php
// loop-templates/content-modulo.php
$img_url = get_field( 'imagen_principal' );
$desc = get_field( 'descripcion' );
?>

<a href="<?php the_permalink(); ?>">
	<article <?php post_class( 'col mb-4' ); ?>>
		<div class="card">
			<?php if ( $img_url ) : ?>
				<img src="<?php echo esc_url( $img_url ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
			<?php endif; ?>
			<div class="card-body">
				<h2 class="card-title h5"><?php the_title(); ?></h2>
				<?php if ( $desc ) : ?>
					<p class="card-text"><?php echo esc_html( $desc ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</article>
</a>