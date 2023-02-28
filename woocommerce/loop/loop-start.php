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
      <div class="row">
<!--           <div class="col-md-8">
              <aside>
                  <div class="sidebar">
					  <div class="filter_sort">Фильтр</div>
                      <div class="filter"><?php // echo do_shortcode('[br_filters_group group_id=18798]')?></div>
                  </div>
              </aside>
          </div> -->
          <div class="col-md-16">
			  <div class="block_top">
                    <div class="orderby-block">
                        <span>Сортировать по:</span>
                        <div class="orderby-blocks">
                            <?php
                                switch ($_GET['orderby']) :
                                    case 'price' :
                                        echo '	<a href="?orderby=price-desc" class="orderby-link orderby-desc-active">цена</a>';
                                    break;
                                    case 'price-desc' :
                                        echo '<a href="?orderby=price" class="orderby-link orderby-asc-active">цена</a>';
                                    break;
                                    default:
                                    echo '<a href="?orderby=price" id="orderby-link" class="orderby-link orderby-asc-active">цена</a>';
                                endswitch;		
                                switch ($_GET['orderby']) :
                                    case 'popularity' :
                                        echo '	<a href="?orderby=popularity-desc" class="orderby-link orderby-asc-active">популярность</a>';
                                    break;
                                    case 'popularity-desc' :
                                        echo '<a href="?orderby=popularity" class="orderby-link orderby-desc-active">популярность</a>';
                                    break;
                                    default:
                                    echo '<a href="?orderby=popularity" class="orderby-link">популярность</a>';
                                endswitch;	
                            ?>
                        </div>
                    </div>
                    <div class="filter_bl">Фильтры</div>
				  	<div class="filter_bg"></div>
                    <div class="filter_body"><div class="filter_close"></div><div class="filter_title">Фильтры</div><?php echo do_shortcode('[br_filters_group group_id=18798]')?></div>
              </div>
              <main class="products__list">
                  <div class="row g-4">