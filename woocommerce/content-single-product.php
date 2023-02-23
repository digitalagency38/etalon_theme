<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="product" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?> data-aos="fade-in" data-aos-delay="200">
	<div class="row">
		<div class="col-md-14 order-md-1 order-2">
			<div class="d-md-none">
				<?php the_title( '<h1 class="page-title mb-4">', '</h1>' ); ?>
			</div>
			<div class="product__photo mt-3">
				<?php $images = get_field( 'gallery', $post->ID ); ?>
				<div class="product__photo-main">
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper">
						<?php
							$attachment_ids = $product->get_gallery_image_ids();
							$id = $product->get_image_id();
							$product_image_url = wp_get_attachment_url( $id );
						?>

								<div class="swiper-slide"
										style="background-image:url(<?php echo $product_image_url; ?>)">
								</div>
							<?php if ( $attachment_ids ) :

								foreach( $attachment_ids as $attachment_id ) {
								$image_link = wp_get_attachment_url( $attachment_id ); ?>
									<div class="swiper-slide"
											style="background-image:url(<?php echo $image_link; ?>)">
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
						if ( $attachment_ids ) :

							if ( $product_image_url ) : ?>
								<div class="swiper-slide">

									<div class="thumb"
											style="background-image:url(<?php echo $product_image_url; ?>)"></div>

								</div>
							<?php endif;

							foreach( $attachment_ids as $attachment_id ) {
								$image_link = wp_get_attachment_url( $attachment_id ); ?>
								<div class="swiper-slide">
									<div class="thumb"
											style="background-image:url(<?php echo $image_link; ?>)"></div>

								</div>
							<?php } endif; ?>
					</div>
				</div>
			</div>
			<?php if ($product->get_width() || $product->get_height() || $product->get_length() ) : ?>
				<div class="sizes d-md-none">
					<?php if ( $product->get_width() ) : ?>
						<div class="width">
							<div class="icon">
								<img
										src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-width.svg"
										alt=""></div> <span>Ширина:</span> <?php echo $product->get_width(); ?> мм
						</div>
					<?php endif; ?>
					<?php if ( $product->get_height() ) : ?>
						<div class="height">
							<div class="icon"><img
										src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-height.svg"
										alt="">
							</div> <span>Высота:</span> <?php echo $product->get_height(); ?> мм
						</div>
					<?php endif; ?>
					<?php if ( $product->get_length() ) : ?>
						<div class="depth">
							<div class="icon"><img
										src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-depth.svg"
										alt="">
							</div> <span>Длина:</span> <?php echo $product->get_length(); ?> мм
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>


			<div class="metas mb-4 d-md-none">
					<h3>Характеристики</h3>

					<?
						$attributes = $product->get_attributes();

						foreach ($attributes as $attribute):
							$attr = wc_get_attribute($attribute['id']);
							if ($attribute['visible']):
					?>
						<div class="row">
							<div class="col-12"><?= $attr->name; ?></div>
							<div class="col-12"><?= $attr_value = $product->get_attribute( $attribute['name'] );?></div>
						</div>
						<?endif;?>
					<?endforeach;?>
			</div>

			<div class="price d-flex align-items-center d-md-none">
              <div class="regular__price">
                <?php echo number_format( $product->get_price(), 0, ',', ' '); ?> ₽
              </div>
              <?php if ($product->get_regular_price()): ?>
					<div class="special__price">
						<?php echo number_format( $product->get_regular_price(), 0, ',', ' ' ); ?> ₽
					</div>
				<?php endif; ?>
				<?php if ( $product->get_price() && $product->get_regular_price() ) : ?>
					<div class="discount"><?php echo round( ( ( ( (float) $product->get_price() / (float) $product->get_regular_price() ) * 100 - 100 ) * - 1 ), 1 ); ?>
						%
					</div>
				<?php endif; ?>
			</div>

			<a href="" class="btn btn-primary d-md-none" data-bs-toggle="modal"
				data-bs-target="#remoteSearch">Заказать</a>
          	
			<?php $salon_id = get_field( 'salon', $post->ID );?>
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
                          	<?php if($product->get_stock_quantity() >= '1') { ?>
								<div class="status green">
									В наличии
								</div>
							<?php } else { ?>
								<div class="status warning">
									Под заказ
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php if ($product->get_width() || $product->get_height() || $product->get_length() ) : ?>
				<div class="sizes d-none d-md-flex">
					<?php if ( $product->get_width() ) : ?>
						<div class="width">
							<div class="icon">
								<img
										src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-width.svg"
										alt=""></div> <span>Ширина:</span> <?php echo $product->get_width(); ?> мм
						</div>
					<?php endif; ?>
					<?php if ( $product->get_height() ) : ?>
						<div class="height">
							<div class="icon"><img
										src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-height.svg"
										alt="">
							</div> <span>Высота:</span> <?php echo $product->get_height(); ?> мм
						</div>
					<?php endif; ?>
					<?php if ( $product->get_length() ) : ?>
						<div class="depth">
							<div class="icon"><img
										src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-depth.svg"
										alt="">
							</div> <span>Длина:</span> <?php echo $product->get_length(); ?> мм
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
					<h3>Характеристики</h3>

					<?
						$attributes = $product->get_attributes();

						foreach ($attributes as $attribute):
							$attr = wc_get_attribute($attribute['id']);
							if ($attribute['visible']):
					?>
						<div class="row">
							<div class="col-12"><?= $attr->name; ?></div>
							<div class="col-12"><?= $attr_value = $product->get_attribute( $attribute['name'] );?></div>
						</div>
						<?endif;?>
					<?endforeach;?>
			</div>
			<div class="price d-flex align-items-center d-none d-md-flex">
              <div class="regular__price">
                <?php echo number_format( $product->get_price(), 0, ',', ' '); ?> ₽
              </div>
              <?php if ($product->get_regular_price()): ?>
					<div class="special__price">
						<?php echo number_format( $product->get_regular_price(), 0, ',', ' ' ); ?> ₽
					</div>
				<?php endif; ?>
				<?php if ( $product->get_price() && $product->get_regular_price() ) : ?>
					<div class="discount"><?php echo round( ( ( ( (float) $product->get_price() / (float) $product->get_regular_price() ) * 100 - 100 ) * - 1 ), 1 ); ?>
						%
					</div>
				<?php endif; ?>
			</div>

			<a href="" class="btn btn-primary d-none d-md-block" data-bs-toggle="modal"
				data-bs-target="#remoteSearch">Заказать</a>
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
                <?php
                  global $product;
                  $orderby = 'rand';
                  $columns = 4;
                  $related = $product->get_related( 20 );
                  $args = array(
                    'post_type' => 'product',
                    'no_found_rows' => 1,
                    'posts_per_page' => 10,
                    'ignore_sticky_posts' => 1,
                    'orderby' => $orderby,
                    'post__in' => $related,
                    'post__not_in' => array($product->id),
                    'meta_key'             => '_stock_status',
                    'meta_value'           => 'instock',
                    'compare'              => '!='
                  );?> 
                  <?php 

                  $loop = new WP_Query( $args );
                      while ( $loop->have_posts() ) : $loop->the_post(); 
                      global $product;
                  ?>
						<div class="swiper-slide">
							<div class="card card-product border">
								<a href="<?php the_permalink(); ?>">
									<div class="card-img-top"
										 style='background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);'>
                                      <?php echo get_the_post_thumbnail(); ?>
									</div>
								</a>
								<div class="card-body">
									<a href="<?php the_permalink(); ?>"
									   class="title"><?php the_title(); ?></a>

                                  <div class="price d-flex align-items-center">
                                    <div class="regular__price">
                                      <?php echo number_format( $product->get_price(), 0, ',', ' ' ); ?> ₽
                                    </div>
                                    <?php if ($product->get_regular_price()): ?>
                                          <div class="special__price">
                                              <?php echo number_format( $product->get_regular_price(), 0, ',', ' ' ); ?> ₽
                                          </div>
                                      <?php endif; ?>
                                      <?php if ( $product->get_price() && $product->get_regular_price() ) : ?>
                                          <div class="discount"><?php echo round( ( ( ( (float) $product->get_price() / (float) $product->get_regular_price() ) * 100 - 100 ) * - 1 ), 1 ); ?>
                                              %
                                          </div>
                                      <?php endif; ?>
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