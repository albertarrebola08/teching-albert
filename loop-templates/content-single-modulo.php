<?php
defined( 'ABSPATH' ) || exit;
// No pongas get_header() ni get_footer() ni have_posts() aquí

// Header hero global
set_query_var( 'tax_slug', 'nivel_y_ciclo' ); // Cambia si tu taxonomía tiene otro slug
get_template_part( 'global-templates/header', 'hero' );
?>
<div class="container py-5 text-primary">
	<!-- Descripción breve del módulo (si tienes ese campo en el módulo, ajústalo si no) -->
	<?php if ( $desc = get_field( 'descripcion_breve' ) ) : ?>
		<div class="lead mb-4"><?php echo wp_kses_post( $desc ); ?></div>
	<?php endif; ?>

	<!-- Listado de RA's asociados -->
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
		],
		'orderby' => 'title',
		'order' => 'ASC'
	] );

	if ( $ra_query->have_posts() ) : ?>
		<h3 class="mt-5 mb-3">Resultats d'aprenentatge del mòdul</h3>
		<ul class="list-group mb-4">
			<?php while ( $ra_query->have_posts() ) :
				$ra_query->the_post(); ?>
				<li class="list-group-item">
					<a href="<?php the_permalink(); ?>" class="fw-bold">
						<?php the_title(); ?>
					</a>
					<?php if ( $desc_ra = get_field( 'descripcion' ) ) : ?>
						<div class="small text-muted"><?php echo wp_trim_words( wp_strip_all_tags( $desc_ra ), 15 ); ?></div>
					<?php endif; ?>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<p class="text-muted">No exixteixen RA's associats al mòdul actualment</p>
	<?php endif; ?>

</div>