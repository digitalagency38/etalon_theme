<?php $slides = new WP_Query( [ 'post_type' => 'slider', 'orderby' => 'menu_order', 'order' => 'ASC' ] ); ?>


<section class="slider">
	<div class="swiper">
		<div class="swiper-wrapper">
			<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
				<div class="swiper-slide">
					<div class="slide-image d-none d-md-block"
						 style="background-image: url(<?= get_the_post_thumbnail_url( $post->ID, 'full' ); ?>)"></div>
					<div class="slide-image d-md-none"
						 style="background-image: url(<?= the_field( 'img_mobile' ); ?>)"></div>
					<div class="container">
						<div class="slide-content">
							<?php the_title( '<h2>', '</h2>' ); ?>
							<?php the_content(); ?>
							<div class="actions">
                            	<a href="<?= the_field( 'link_btn' ); ?>" class="btn btn-primary""><?= the_field( 'text_btn' ); ?></a>
								<!--<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedback">Отправить заявку</a> -->
								<!--<div class="swiper-button-next"></div> -->
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="swiper-pagination-block">
			<div class="swiper-button-prev"></div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-next"></div>
		</div>
	</div>
</section>