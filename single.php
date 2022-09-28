<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

	<div id="primary" class="content-area py-5">
		<div class="page-header">
			<div class="container">
				<?php
				if ( function_exists( 'dimox_breadcrumbs' ) ) {
					dimox_breadcrumbs();
				} ?>
              	<div class="img_single">
					<?
					the_post_thumbnail(); ?>
				</div>
				<div class="stick_pos">
				<div class="date_single">
					<?php
					while ( have_posts() ) : the_post();
						the_date();
					endwhile;
					?>
				</div>
                                      
                                    <?php $stick_act = get_field( 'stick_act' );?>	
                                  		<?php if ($stick_act == '1'): ?>
                                      		<div class="card-stick">Акция завершена</div> 
                                    	<?php endif ?>
				</div>
				<h1>
					<?
					the_title(); ?>
				</h1>
			</div>
		</div>
		<div class="entry-content">
			<div class="container">

				<article>

					<?php
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
					?>

					<? get_template_part( 'template-parts/single-' . get_post_type( $post ) ); ?>

				</article>

			</div>
		</div>
	</div>

	<div class="container info">
		<?php the_field( 'seo_text' ); ?>
	</div>

<?php
get_footer();