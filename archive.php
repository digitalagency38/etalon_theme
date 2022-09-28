<?php

/**
 * Index
 *
 * Theme index.
 *
 * @since   1.0.0
 * @package WPGulp
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>
	<div id="primary" class="content-area py-4">
		<div class="page-header">
			<div class="container">
				<?php
				if ( function_exists( 'dimox_breadcrumbs' ) ) {
					dimox_breadcrumbs();
				} ?>
				<h1>
					<? echo single_term_title(); ?>
				</h1>
			</div>
		</div>

		<section class="favorites archive">
			<div class="container">

				<div class="row g-3">
					<?php

					$i = 0;
					while ( have_posts() ) {
						$i ++;
						the_post();

						$thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );
						if ( $i == 1 || $i == 4 || $i == 5 || $i == 8 || $i == 9 ) {
							$col = 14;
						} else {
							$col = 10;
						}

						?>
						<div class="col-md-<?php echo $col; ?>">
							<a href="<?php the_permalink(); ?>">
								<div class="card">
									<div class="card-img-top long_act"
										 style="background-image: url(<?php echo $thumbnail_url; ?>);">
                                      
                                  <div class="card_stick">
                                    <?php $stick_act = get_field( 'stick_act' );?>	
									<div class="card-date">
									<?php the_time( 'd.m.Y' ); ?></div>
                                  		<?php if ($stick_act == '1'): ?>
                                      		<div class="card-stick">Акция завершена</div> 
                                    	<?php endif ?>
								</div>
									</div>
                                  
                                  <div class="card-img-top sqare_act"
                                       style="background-image: url(<?php the_field( 'img_sqr' ) ?>);">
                                      
                                  <div class="card_stick">
                                    <?php $stick_act = get_field( 'stick_act' );?>	
									<div class="card-date">
									<?php the_time( 'd.m.Y' ); ?></div>
                                  		<?php if ($stick_act == '1'): ?>
                                      		<div class="card-stick">Акция завершена</div> 
                                    	<?php endif ?>
								</div>
                                  </div>
									<div class="card-body">
										<div class="title"><?php the_title(); ?>
											<?php if ( $post->excerpt ) : ?>
												<p><?php echo $post->excerpt(); ?></p>
											<?php endif; ?>

										</div>

									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	</div>

<?php
get_footer();
