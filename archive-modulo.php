<?php
// archive-modulo.php en tu child theme
defined( 'ABSPATH' ) || exit;
get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-modulo-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">

			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
				<header class="page-header">
					<h1 class="page-title">Todos los módulos</h1>
				</header>
				<div class="row">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'loop-templates/content', 'modulo' );
						}
					} else {
						get_template_part( 'loop-templates/content', 'none' );
					}
					?>
				</div>
			</main>

			<?php
			understrap_pagination();
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div>
	</div>
</div>

<?php get_footer(); ?>