<?php

/**
 * Template name: Catalog
 */

get_header(); ?>

<div id="primary" class="content-area py-5">
	<div class="container">
		<header class="page-header py-4">
			<?php if ( function_exists( 'dimox_breadcrumbs' ) ) {
				dimox_breadcrumbs();
			} ?>

			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header><!-- .page-header -->

		<?php get_template_part( 'template-parts/catalog' ); ?>


	</div>
</div>
<?php get_template_part( 'template-parts/seo-block' ); ?>

<?php get_template_part( 'template-parts/map' ); ?>

<?php get_footer(); ?>