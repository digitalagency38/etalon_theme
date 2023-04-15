<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/assets/css/promo_style.css">

	<div id="primary" class="content-area py-5">
      <div class="container">
        <?php
        if ( function_exists( 'dimox_breadcrumbs' ) ) {
          dimox_breadcrumbs();
        } ?>

        <article>
			<div class="art_img"><img src="<?php echo get_field('img'); ?>" alt="<?php the_title(); ?>"></div>
			<div class="art_text"><?php the_content(); ?></div>
        </article>

      </div>
	</div>

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