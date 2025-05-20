<?php
// loop-templates/content-modulo.php
$img_url = get_field( 'imagen_principal' );
if ( $img_url ) {
	$img_url = $img_url['url'];
} else {
	$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
}
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
					<p class="card-text"><?= $desc; ?></p>
				<?php endif; ?>
			</div>
		</div>
	</article>
</a>