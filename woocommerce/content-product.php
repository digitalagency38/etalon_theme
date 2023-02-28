<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
	return;
}
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
?>
<div class="col-md-8">
	<div class="card card-product">
		<a href="<?= $product->get_permalink(); ?>" class="card-img-top"><?= $product->get_image('large'); ?></a>
		<div class="card-body">
			<div class="card_info">
				<?php if ( $rating_count > 0 ) : ?>
				  <div class="woocommerce-product-rating">
					<?php echo wc_get_rating_html( $average, $rating_count ); ?><b><?php echo $product -> get_average_rating();?> </b>
					<?php echo '(Отзывов: ' . $review_count . ')'; ?> <!-- Количество отзывов -->
				  </div>
				<?php endif; ?> 
				<?php if( !empty(get_field('stat_tov')) ): ?>
				<div class="card_info_stat" style="background: <?= get_field('cvet_tov'); ?>"><?= get_field('stat_tov'); ?></div>
				<?php endif; ?>
			</div>
			<div class="card_block">
				<a href="<?= $product->get_permalink(); ?>" class="title"><?= $product->get_name(); ?></a>
				<div class="price d-flex align-items-center">
					<div class="regular__price"><?= number_format($product->get_price(), 0, ',', ' ' ); ?> ₽</div>
					<?php if ($product->get_regular_price()): ?>	
						<div class="special__price"><?php echo number_format($product->get_regular_price(), 0, ',', ' ' ); ?> ₽</div>
						<div class="discount"><?php echo round( ( ( ( (float) $product->get_price() / (float) $product->get_regular_price() ) * 100 - 100 ) * - 1 ), 1 ); ?> %</div>
					<?php endif ?>
				</div>
			</div>
			<a href="<?= $product->get_permalink(); ?>" class="btn btn-primary">Подробнее</a>
		</div>
	</div>
</div>
