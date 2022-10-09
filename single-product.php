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

$post_terms = wp_get_post_terms( $post->ID, [ 'product_cat' ] );
$terms      = [];
foreach ( $post_terms as $post_term ) {
    array_push($terms, $post_term->slug);
}

get_header(); ?>

	<div id="primary" class="content-area pt-4 py-md-5">
		<div class="container">
			<header class="page-header">
				<?php if ( function_exists( 'dimox_breadcrumbs' ) ) {
					dimox_breadcrumbs();
				} ?>
			</header><!-- .page-header -->
			<div class="product" data-aos="fade-in" data-aos-delay="200">
				<div class="row">
					<div class="col-md-14 order-md-1 order-2">
						<div class="d-md-none">
							<?php the_title( '<h1 class="page-title mb-4">', '</h1>' ); ?>

							<div class="excerpt">
								<?php echo $post->excerpt !== '' ? $post->excerpt : null; ?>
							</div>

						</div>

						<div class="product__photo mt-3">
							<?php $images = get_field( 'gallery', $post->ID ); ?>
							<div class="product__photo-main">
								<div class="swiper-container gallery-top">
									<div class="swiper-wrapper">

										<?php if ( has_post_thumbnail() ) : ?>
											<div class="swiper-slide"
												 style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
											</div>
										<?php endif; ?>
										<?php if ( $images ) :

											foreach ( $images as $image ) { ?>
												<div class="swiper-slide"
													 style="background-image:url(<?php echo $image['url']; ?>)">
												</div>
											<?php } endif; ?>
									</div>

									<!--								<div class="swiper-button-next"></div>-->
									<!--								<div class="swiper-button-prev"></div>-->
								</div>

							</div>
							<div class="swiper-container gallery-thumbs">
								<div class="swiper-wrapper">
									<?php
									if ( $images ) :

										if ( has_post_thumbnail() ) : ?>
											<div class="swiper-slide">

												<div class="thumb"
													 style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>

											</div>
										<?php endif;

										foreach ( $images as $image ) { ?>
											<div class="swiper-slide">
												<div class="thumb"
													 style="background-image:url(<?php echo $image['url']; ?>)"></div>

											</div>
										<?php } endif; ?>
								</div>
							</div>
						</div>

						<?php if ( get_field( 'width' ) || get_field( 'height' ) || get_field( 'depth' ) ) : ?>
							<div class="sizes d-md-none">
								<?php if ( get_field( 'height' ) ) : ?>
									<div class="height">
										<div class="icon"><img
													src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-height.svg"
													alt="">
										</div> <span>Высота:</span> <?php the_field( 'height' ); ?> мм
									</div>
								<?php endif; ?>
								<?php if ( get_field( 'width' ) ) : ?>
									<div class="width">
										<div class="icon">
											<img
													src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-width.svg"
													alt=""></div> <span>Ширина:</span> <?php the_field( 'width' ); ?> мм
									</div>
								<?php endif; ?>
								<?php if ( get_field( 'depth' ) ) : ?>
									<div class="depth">
										<div class="icon"><img
													src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-depth.svg"
													alt="">
										</div> <span>Глубина:</span> <?php the_field( 'depth' ); ?> мм
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>


						<div class="metas mb-4 d-md-none">
							<?php if ( have_rows( 'parameters' ) ): ?>
								<h3>Характеристики</h3>
								<?php while ( have_rows( 'parameters' ) ) : the_row(); ?>
									<div class="row">
										<div class="col-12"><?php the_sub_field( 'title' ); ?></div>
										<div class="col-12"><?php the_sub_field( 'value' ); ?></div>
									</div>

								<?php endwhile; endif; ?>
						</div>

						<div class="price d-flex align-items-center d-md-none">
							<?php
							$price     = get_field( 'price', $post->ID );
							$old_price = get_field( 'old_price', $post->ID );
							?>
							<?php if ( $price ) : ?>
								<div class="regular__price">
									<?php echo number_format( $price, 0, ',', ' ' ); ?> ₽
								</div>
							<?php endif; ?>
							<?php if ( $old_price ) : ?>
								<div class="special__price">
									<?php echo number_format( $old_price, 0, ',', ' ' ); ?> ₽
								</div>
							<?php endif; ?>
							<?php if ( $price && $old_price ) : ?>
								<div class="discount"><?php echo round( ( ( ( (float) $price / (float) $old_price ) * 100 - 100 ) * - 1 ), 1 ); ?>
									%
								</div>
							<?php endif; ?>
						</div>

						<a href="" class="btn btn-primary d-md-none" data-bs-toggle="modal"
						   data-bs-target="#remoteSearch">Заказать</a>

						<?php $salon_id = get_field( 'salon', $post->ID );

						if ( $salon_id ) :
							?>
							<div class="salon mt-5">
								<div class="d-flex align-items-center">
									<div class="logo">
										<?php $salon_post = get_post( $salon_id ); ?>
										<a href="<?php echo get_the_permalink( $salon_post->ID ); ?>">
											<?php if ( get_the_post_thumbnail_url( $salon_post->ID, 'thumbnail' ) ) { ?>
												<img src="<?php echo get_the_post_thumbnail_url( $salon_post->ID, 'medium' ); ?>"
													 alt="<?php echo get_the_title( $salon_post ); ?>"
													 class="img-fluid">
											<?php } else { ?>
												<?php echo get_the_title( $salon_post ); ?>
											<?php } ?>
										</a>
									</div>
									<div class="title ms-auto">

										<?php if ( get_field( 'availability', $post->ID ) ) :
											if ( get_field( 'availability', $post->ID ) === 'green' ) {
												$availability = 'В наличии';
											} elseif ( get_field( 'availability', $post->ID ) === 'info' ) {
												$availability = 'В пути';
											} elseif ( get_field( 'availability', $post->ID ) === 'warning' ) {
												$availability = 'Под заказ';
											}
											?>
											<div class="status <?php echo get_field( 'availability', $post->ID ); ?>">
												<?php echo $availability; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( get_field( 'width' ) || get_field( 'height' ) || get_field( 'depth' ) ) : ?>
							<div class="sizes d-none d-md-flex">
								<?php if ( get_field( 'width' ) ) : ?>
									<div class="width">
										<div class="icon">
											<img
													src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-width.svg"
													alt=""></div> <span>Ширина:</span> <?php the_field( 'width' ); ?> мм
									</div>
								<?php endif; ?>
								<?php if ( get_field( 'height' ) ) : ?>
									<div class="height">
										<div class="icon"><img
													src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-height.svg"
													alt="">
										</div> <span>Высота:</span> <?php the_field( 'height' ); ?> мм
									</div>
								<?php endif; ?>
								<?php if ( get_field( 'depth' ) ) : ?>
									<div class="depth">
										<div class="icon"><img
													src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-depth.svg"
													alt="">
										</div> <span>Глубина:</span> <?php the_field( 'depth' ); ?> мм
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<br>
					</div>
						<div class="description d-none d-md-block">
							<?php the_content(); ?>
						</div>
					<div class="col-md-10 col-info order-md-2 order-1">
						<?php the_title( '<h1 class="page-title mb-4 d-none d-md-block">', '</h1>' ); ?>
						<div class="excerpt">
							<?php echo $post->excerpt !== '' ? $post->excerpt : null; ?>
						</div>

						<div class="metas mb-4 d-none d-md-block">
							<?php if ( have_rows( 'parameters' ) ): ?>
								<h3>Характеристики</h3>
								<?php while ( have_rows( 'parameters' ) ) : the_row(); ?>
									<div class="row">
										<div class="col-12"><?php the_sub_field( 'title' ); ?></div>
										<div class="col-12"><?php the_sub_field( 'value' ); ?></div>
									</div>

								<?php endwhile; endif; ?>
						</div>

						<div class="price d-flex align-items-center d-none d-md-flex">
							<?php
							$price     = get_field( 'price', $post->ID );
							$old_price = get_field( 'old_price', $post->ID );
							?>
							<?php if ( $price ) : ?>
								<div class="regular__price">
									<?php echo number_format( $price, 0, ',', ' ' ); ?> ₽
								</div>
							<?php endif; ?>
							<?php if ( $old_price ) : ?>
								<div class="special__price">
									<?php echo number_format( $old_price, 0, ',', ' ' ); ?> ₽
								</div>
							<?php endif; ?>
							<?php if ( $price && $old_price ) : ?>
								<div class="discount"><?php echo round( ( ( ( (float) $price / (float) $old_price ) * 100 - 100 ) * - 1 ), 1 ); ?>
									%
								</div>
							<?php endif; ?>
						</div>

						<a href="" class="btn btn-primary d-none d-md-block" data-bs-toggle="modal"
						   data-bs-target="#remoteSearch">Заказать</a>
					</div>


				</div>

			</div>
		</div>
	</div>


	<!-- Новости -->
	<section class="news mb-md-4 pt-0 pt-md-3">
		<div class="container">
			<div class="section-header d-flex align-items-center p-0 p-md-3">
				<h3>Рекомендуемые товары</h3>
			</div>

			<div class="swiper news3">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<?php $prods = new WP_Query(
                    	[ 
                        	'post_type' => 'product',
                            'posts_per_page' => 10,
                            'orderby' => 'rand'
                          ]
                       );
					while ( $prods->have_posts() ) : $prods->the_post();
						$thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );
                        
						?>
						<div class="swiper-slide">
							<div class="card card-product border">
								<a href="<?php the_permalink(); ?>">
									<div class="card-img-top"
										 style="background-image: url(<?php echo $thumbnail_url; ?>);">
									</div>
								</a>
								<div class="card-body">
									<a href="<?php the_permalink(); ?>"
									   class="title"><?php the_title(); ?></a>

									<div class="price d-flex align-items-center">
										<?php
										$price     = get_field( 'price', $post->ID );
										$old_price = get_field( 'old_price', $post->ID );
										?>
										<div class="regular__price">
											<?php echo $price ? number_format( $price, 0, ',', ' ' ) . ' ₽' : ''; ?>
										</div>
										<div class="special__price">
											<?php echo $old_price ? number_format( $old_price, 0, ',', ' ' ) . ' ₽' : ''; ?>
										</div>
										<div class="discount"><?php echo ( $price && $old_price ) ? round( ( ( ( (float) $price / (float) $old_price ) * 100 - 100 ) * - 1 ), 1 ) . ' %' : ''; ?></div>
									</div>
								</div>
								<a href="<?php the_permalink(); ?>" class="btn btn-primary">Подробнее</a>

							</div>
						</div>
					<?php endwhile; ?>

				</div>


				<div class="swiper-pagination-block d-flex align-items-center justify-content-center mt-4">
					<div class="news-swiper-button-prev me-auto"></div>
					<div class="news-swiper-pagination"></div>
					<div class="news-swiper-button-next ms-auto"></div>
				</div>
			</div>


		</div>
	</section>

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
<script>
    jQuery(function() {
        jQuery('.product .btn').on('click', function() {
            jQuery(".hde_h1").attr("value", jQuery('.product-template-default .product h1').html());
        })
    })
</script>
<style>
  .hde_h1 {
  	opacity: 0;
    width: 0;
    height: 0;
    visibility: hidden;
    pointer-events: none;
  }
</style>
<?php get_footer();