<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script src="<?php echo get_theme_file_uri(); ?>/assets/js/mag.js"></script>
<div class="tax-product_cat">
  <div class="content-area py-4">
  	<div class="container">
      <div class="row">
          <div class="col-md-8">
              <aside>
                  <div class="sidebar">
					  <div class="filter_sort">Фильтр</div>
                      <div class="filter"><?php echo do_shortcode('[br_filters_group group_id=18798]')?></div>
                  </div>
              </aside>
          </div>
          <div class="col-md-16">
              <main class="products__list">
                  <div class="row g-4">