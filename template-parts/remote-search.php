<!-- Удаленный подбор -->
<section class="remote-search">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-12 px-md-3 d-flex justify-content-center flex-column">
              <?php
              $id = get_queried_object_id();
				if ( is_archive() ) {
					$term   = $wp_query->get_queried_object();
					$entity = $term;
				} else {
					$entity = $post;
				}
              ?>
				<h3><?= get_field( 'zagolovok_formy', $entity ); ?></h3>
				<p><?= get_field( 'tekst_formy', $entity ); ?></p>
				<?php
				
				if ( get_field( 'cf7_shortcode', $entity ) ) {
					$shortcode = get_field( 'cf7_shortcode', $entity );
				} else {
					$shortcode = get_field( 'cf7_shortcode', 'option' );
				}
				echo do_shortcode( $shortcode );

				?>
			</div>
			<div class="col-md-12">
				<div class="fluid-right">
					<!--<div class="fluid-right-content"
						 style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/remote-search.jpg"></div>-->
                  <?php if ($entity) { ?>
                  <div class="fluid-right-content"
						 style="background-image: url(<?php echo get_field( 'kartinka_formy', $entity ); ?>);"></div>
                  <?php } else { ?>
                  	<div class="fluid-right-content"
						 style="background-image: url(<?php echo get_field( 'kartinka_formy', $id ); ?>);"></div>
                  <?php } ?>
                  
				</div>
			</div>
		</div>
	</div>
</section>