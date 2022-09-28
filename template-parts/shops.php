<!-- Магазины -->
<section class="shops" data-aos="fade-in" data-aos-delay="200">
	<div class="container">
		<div class="section-header d-flex align-items-center">
			<h3>Мебельные магазины на любой вкус</h3>
		</div>

		<div class="d-none d-md-block">
			<?php
			$salons = new WP_Query( [ 'post_type' => 'salons' ] );
			$i      = 0;
			while ( $salons->have_posts() ) : $salons->the_post();
				$i ++; ?>
				<div class="card shop-card shop-card-<?php echo $post->ID; ?>">

					<div class="blurred_overlay" style="--blbg: url('<?php the_field( 'bg_image' ); ?>');">
                      	<div class="blurred_overlay__down"></div>
                  		<div class="blurred_overlay__up" style="--blbg: url('<?php the_field( 'bg_image' ); ?>');"></div>
                  	</div>

					<div class="card-body shop-card__body">
						<div class="d-flex align-items-center">
							<div class="logo">
								<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>"
									 alt="">
							</div>
							<div class="meta d-flex align-items-center ms-auto">


								<div class="phone mx-4">
									<a href="tel:+73952707131">
										<?php the_field( 'phone' ); ?>
									</a>
								</div>

								<div class="site me-3">
									<a href="<?php the_field( 'url' ); ?>"
									   target="_blank"><?php
										$url = get_field( 'url', $post->ID );
										$url = str_replace( 'https://', '', $url );
										$url = str_replace( 'http://', '', $url );
										echo $url; ?>
									</a>
								</div>


								<div class="socials ms-auto">
									<?php

									$socials = get_field( 'socials' );
									if ( $socials ) :
										foreach ( $socials as $social ) { ?>
											<a href="<?php echo $social['link']; ?>" target="_blank">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/shop-social-icon-<?php echo $social['type']; ?>.svg"
													 alt="">
											</a>

										<?php } endif;

									?>
								</div>
							</div>
						</div>

						<div class="d-flex">
							<div class="title"><?php the_title(); ?></div>
						</div>

						<div class="d-flex categories">
							<?php

							$categories = get_field( 'categories' );
							$terms      = get_terms( [ 'taxonomy' => 'product_cat', 'include' => $categories ] );

							if ( $terms ) { ?>
								<ul>
									<?php foreach ( $terms as $term ) { ?>
										<li>
											<a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>

						<div class="row">
							<div class="col-lg-18">
								<ul class="advantages">
									<?php while ( have_rows( 'advantages' ) ) : the_row(); ?>
										<li>
											<?php if ( get_sub_field( 'icon' ) ) : ?>
												<div class="icon">
													<img src="<?php the_sub_field( 'icon' ); ?>"
														 alt="<?php the_sub_field( 'title' ); ?>">
												</div>
											<?php endif; ?>
											<div class="advantage-title">
												<?php the_sub_field( 'title' ); ?>
											</div>
										</li>
									<?php endwhile; ?>
								</ul>
							</div>
							<div class="col-lg-6 d-flex justify-content-lg-end align-items-center align-items-end">
								<a href="<?php the_permalink(); ?>" class="btn btn-primary">Перейти в магазин</a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

		<div class="swiper d-md-none shops-slider">
			<div class="swiper-wrapper">
				<?php
				$salons = new WP_Query( [ 'post_type' => 'salons' ] );
				$i      = 0;
				while ( $salons->have_posts() ) : $salons->the_post();
					$i ++; ?>
					<div class="card shop-card shop-card-<?php echo $post->ID; ?> swiper-slide">

						<div class="bg-mobile"
							 style="background-image: url(<?php the_field( 'bg_image_mobile' ); ?>)"></div>

						<svg class="blur" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							 width="100%">
							<image filter="url(#filter<? echo $i; ?>)" xlink:href="<?php the_field( 'bg_image' ); ?>"
								   width="100%"
								   height="100%"></image>
							<filter id="filter<? echo $i; ?>">
								<feGaussianBlur stdDeviation="5"/>
							</filter>
							<mask id="mask<?php echo $i; ?>">
								<circle cx="-50%" cy="-50%" r="30" fill="white" filter="url(#filter<? echo $i; ?>)"/>
							</mask>
							<image xlink:href="<?php the_field( 'bg_image' ); ?>" width="100%" height="100%"
								   mask="url(#mask1)"></image>
						</svg>

						<div class="card-body shop-card__body">
							<div class="d-flex align-items-center">
								<div class="logo">
									<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>"
										 alt="">
								</div>
								<div class="meta d-flex align-items-center ms-auto">

									<div class="site me-3">
										<a href="<?php the_field( 'url' ); ?>"
										   target="_blank"><img
													src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-shops-globe.svg"
													alt=""></a>
									</div>

									<div class="phone">
										<a href="tel:+73952707131"><img
													src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-shops-phone.svg"
													alt=""></a>
									</div>

									<div class="social ms-auto">
										<img src="" alt="">
									</div>
								</div>
							</div>

							<div class="d-flex">
								<div class="title"><?php the_title(); ?></div>
							</div>

							<div class="d-flex categories">
								<?php

								$categories = get_field( 'categories' );

								if ( $categories ) {
									$terms = get_terms( [ 'taxonomy' => 'product_cat', 'include' => $categories ] );

									if ( $terms ) { ?>
										<ul>
											<?php foreach ( $terms as $term ) { ?>
												<li>
													<a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
								<?php } ?>
							</div>

							<div class="row">
								<div class="col-lg-18">
									<ul class="advantages">
										<?php while ( have_rows( 'advantages' ) ) : the_row(); ?>
											<li>
												<?php if ( get_sub_field( 'icon' ) ) : ?>
													<div class="icon">
														<img src="<?php the_sub_field( 'icon' ); ?>"
															 alt="<?php the_sub_field( 'title' ); ?>">
													</div>
												<?php endif; ?>
												<div class="advantage-title">
													<?php the_sub_field( 'title' ); ?>
												</div>
											</li>
										<?php endwhile; ?>
									</ul>
								</div>
								<div class="col-lg-6 d-flex justify-content-lg-end justify-content-center mt-2">
									<a href="<?php the_permalink(); ?>" class="btn btn-primary">Перейти в магазин</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="swiper-pagination-block d-flex align-items-center justify-content-center">
				<div class="shops-slider__swiper-button-prev"></div>
				<div class="shops-slider__swiper-pagination"></div>
				<div class="shops-slider__swiper-button-next"></div>
			</div>

		</div>

	</div>
</section>
