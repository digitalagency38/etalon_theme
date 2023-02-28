<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>


	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', get_post_type() );

	endwhile; // End of the loop.
	?>

	<section class="remote-search">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-md-12 px-md-3 d-flex justify-content-center flex-column">
					<h3><?= get_field('zagolovok_formy', 'option'); ?></h3>
					<p><?= get_field('tekst_formy', 'option'); ?></p>
					<?php

						echo do_shortcode( get_field('cf7_shortcode', 'option') );

					?>
				</div>
				<div class="col-md-12">
					<div class="fluid-right">
						<!--<div class="fluid-right-content"
							 style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/remote-search.jpg"></div>-->
					  <div class="fluid-right-content"
							 style="background-image: url(<?= get_field('kartinka_formy', 'option'); ?>"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();