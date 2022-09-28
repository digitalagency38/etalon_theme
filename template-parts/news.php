<!-- Новости -->

<section class="news newsjs" data-aos="fade-in" data-aos-delay="200">
	<div class="container">
		<div class="section-header d-flex align-items-center">
			<h3>Акции и новости</h3>
			<a href="/category/akczii" class="btn btn-primary ms-auto d-none d-md-block">Смотреть всё</a>
		</div>
		<div class="swiper">
			<div class="swiper-wrapper">
				<?php $news = new WP_Query( [
						'category'  => 'news',
						'showposts' => 6
				] );
				while ( $news->have_posts() ) {
					$news->the_post();
                  	
					$thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );
					?>
					<div class="swiper-slide">
						<a href="<?php the_permalink(); ?>">
							<div class="card">
								<div class="card-img-top">
									<div class="bg_image d-none d-md-block"
										 style="background-image: url(<?php the_field( 'img_sqr' ) ?>);"></div>
									<div class="bg_image d-md-none"
										 style="background-image: url(<?php the_field( 'img_sqr' ) ?>);"></div>
                                  <div class="card_stick">
                                    <?php $stick_act = get_field( 'stick_act' );?>	
									<div class="card-date">
									<?php the_date(); ?></div>
                                  		<?php if ($stick_act == '1'): ?>
                                      		<div class="card-stick">Акция завершена</div> 
                                    	<?php endif ?>
								</div>
								</div>
								<div class="card-body">
									<?php the_title(); ?>
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
			<div class="swiper-pagination-block d-flex align-items-center justify-content-center">
				<div class="news-swiper-button-prev me-auto"></div>
				<div class="news-swiper-pagination"></div>
				<div class="news-swiper-button-next ms-auto"></div>
			</div>
		</div>

		<a href="/category/news" class="btn btn-primary ms-auto d-md-none w-100">Смотреть всё</a>
	</div>
</section>
