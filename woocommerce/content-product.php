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
?>
<div class="col-md-8">
	<div class="card card-product">
		<a href="<?= $product->get_permalink(); ?>" class="card-img-top"><?= $product->get_image('large'); ?></a>
		<div class="card-body">
			<a href="<?= $product->get_permalink(); ?>" class="title"><?= $product->get_name(); ?></a>
			<div class="price d-flex align-items-center">
				<div class="regular__price"><?= number_format($product->get_price(), 0, ',', ' ' ); ?> ₽</div>
        		<?php if ($product->get_sale_price()): ?>	
					<div class="special__price"><?php echo number_format($product->get_sale_price(), 0, ',', ' ' ); ?> ₽</div>
					<div class="discount"><?php echo round( ( ( ( (float) $product->get_price() / (float) $product->get_sale_price() ) * 100 - 100 ) * - 1 ), 1 ); ?> %</div>
        		<?php endif ?>
			</div>
			<br>
			<a href="<?= $product->get_permalink(); ?>" class="btn btn-primary">Перейти</a>
		</div>
	</div>
</div>
