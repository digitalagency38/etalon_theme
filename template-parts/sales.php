<?php if(!get_field('products')) return; ?>
<section class="sales">
	<div class="container">
		<h3 class="d-md-none">Распродажа</h3>
		<div class="row">
			<div class="col-md-6 d-flex flex-column justify-content-center align-items-start order-2 order-md-1">
				<h3 class="d-none d-md-block">Распродажа</h3>
				<div class="sales-pagination">
					<div class="sales-swiper-pagination"></div>
					<div class="arrows">
						<div class="sales-swiper-button-prev"></div>
						<div class="sales-swiper-button-next"></div>
					</div>
				</div>
				<a href="" class="btn btn-primary d-none d-md-block">Смотреть всё</a>
			</div>
			<div class="col-md-18 order-1 order-md-2">
				<div class="fluid-right">
					<div class="fluid-right-content">
						<div class="swiper sales-swiper">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
                              <?php $products = new WP_Query( [ 'post_type' => 'product', 'posts_per_page' => 20, 'post__in' => get_field('products', get_queried_object_id()) ] );
								while ( $products->have_posts() ) : $products->the_post();
									$thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );
									$price         = get_field( 'price', $post->ID ) ? get_field( 'price', $post->ID ) : '';
									$special_price = get_field( 'old_price', $post->ID ) ? get_field( 'old_price', $post->ID ) : '';
									?>
									<div class="swiper-slide">
										<div class="card card-product">
											<a href="<?php the_permalink(); ?>">
												<div class="card-img-top"
													 style="background-image: url(<?php echo $thumbnail_url; ?>);">
												</div>
											</a>
											<div class="card-body">
												<a href="<?php the_permalink(); ?>"
												   class="title"><?php the_title(); ?></a>

												<div class="price d-flex align-items-center">
													<?php if ( $price ) : ?>
														<div class="regular__price"><?php the_price( $price ); ?>
														₽</div><?php endif; ?>
													<?php if ( $special_price ) : ?>
														<div class="special__price"><?php the_price( $special_price ); ?>
														₽</div><?php endif; ?>
													<?php if ( $price && $special_price ) : ?>
														<div class="discount"><?php echo round( ( ( ( (float) $price / (float) $special_price ) * 100 - 100 ) * - 1 ), 1 ); ?>
															%
														</div>
													<?php endif; ?>
												</div>
											</div>
											<a href="<?php the_permalink(); ?>" class="btn btn-primary">Подробнее</a>

										</div>
									</div>
								<?php endwhile; wp_reset_query();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<a href="" class="btn btn-primary d-md-none w-100 mt-3">Смотреть всё</a>

	</div>
</section>
