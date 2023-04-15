<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related upsells products">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h3><?php echo esc_html( $heading ); ?></h3>
		<?php endif; ?>
		
		<?php woocommerce_product_loop_start(); ?>
			<div class="swiper news4">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">

			<?php foreach ( $related_products as $related_product ) : ?>

						<div class="swiper-slide">
					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>
				</div>

			<?php endforeach; ?>
				</div>

			</div>	
				<div class="swiper-pagination-block d-flex align-items-center justify-content-center mt-4">
					<div class="ar-swiper-button-prev me-auto"></div>
					<div class="ar-swiper-pagination"></div>
					<div class="ar-swiper-button-next ms-auto"></div>
				</div>

		<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();
