<?php
// loop-templates/content-ra.php
$seccion = get_field( 'seccion' );
?>
<article <?php post_class( 'col-md-4 mb-4' ); ?>>
	<div class="card h-100 border-primary">
		<div class="card-body">
			<h3 class="h6 card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php if ( $seccion ) : ?>
				<p class="card-text mb-0"><strong>Sección:</strong> <?php echo esc_html( $seccion ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</article>