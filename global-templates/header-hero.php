<?php
// global-templates/header-hero.php
// Variables necesarias: $post (o explícitamente $modulo), $tax_slug (ej: 'nivel_y_ciclo')

if ( ! isset( $tax_slug ) ) {
	$tax_slug = 'nivel_y_ciclo'; // Cambia si usas otro
}

// Saca la imagen de ACF
$img_url = get_field( 'imagen_principal', $post->ID );

// Título
$titulo = get_the_title( $post->ID );

// Saca la jerarquía de la taxonomía
$terms = get_the_terms( $post->ID, $tax_slug );

// Prepara los niveles para el breadcrumb
$breadcrumb = [];
if ( $terms && ! is_wp_error( $terms ) ) {
	// Busca el término más específico (el último hijo, normalmente solo uno seleccionado)
	$leaf = null;
	foreach ( $terms as $term ) {
		if ( ! $term->parent )
			continue;
		$leaf = $term;
	}
	if ( ! $leaf && count( $terms ) > 0 ) {
		$leaf = $terms[0];
	}
	// Ahora recorre hacia arriba la jerarquía
	while ( $leaf ) {
		$breadcrumb[] = $leaf;
		if ( $leaf->parent ) {
			$leaf = get_term( $leaf->parent, $tax_slug );
		} else {
			$leaf = null;
		}
	}
	$breadcrumb = array_reverse( $breadcrumb );
}
?>

<div class="hero-header mb-5">
	<?php if ( $img_url ) : ?>
		<img src=" <?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $titulo ); ?>" class="w-100 hero-img">
	<?php endif; ?>
	<div class="p-5">
		<nav aria-label="breadcrumb" class="mb-2">
			<ol class="breadcrumb bg-transparent p-0 m-0">
				<?php
				if ( ! empty( $breadcrumb ) ) :
					foreach ( $breadcrumb as $term ) :
						?>
						<li class="breadcrumb-item">
							<a href="<?php echo get_term_link( $term ); ?>" class="text-secondary">
								<?php echo esc_html( $term->name ); ?>
							</a>
						</li>
						<?php
					endforeach;
				endif;
				?>
				<li class="breadcrumb-item active text-dark fw-bold" aria-current="page">
					<?php echo esc_html( $titulo ); ?>
				</li>
			</ol>
		</nav>
		<h1 class="display-5 fw-bold text-dark text-shadow-lg"><?php echo esc_html( $titulo ); ?></h1>
	</div>
</div>