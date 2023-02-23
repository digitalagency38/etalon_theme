<?php 
/**
*	Template name: Промо страница (Запись)
 Template post type: post, page
*/
 ?>
<?php
    get_header();
?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/assets/css/promo_style.css">
<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/assets/js/promo_main.js">
<script>
  jQuery(function(){
	jQuery('.blocks_red__more').on('click', function() {
    	jQuery(this).toggleClass('isActive');
    	jQuery('.blocks_red__items').toggleClass('isActive');
        if(jQuery(this).hasClass('isActive')) {
			jQuery(this).text('Скрыть')
        } else {
			jQuery(this).text('Смотреть всё')
        }
    });
    


});

</script>
<?php
	$main = get_field( 'main' );
    $promo_prods = $main['promo_prods'];
    
?>
<div class="container block_prom">
    <?php
    if ( function_exists( 'dimox_breadcrumbs' ) ) {
      dimox_breadcrumbs();
    } ?>
	<?php $imgs = ($main['imgs']); ?>	
	<div class="imgs">
		<div class="imgs__big"><img src="<?php echo $imgs['big']; ?>" alt=""></div>
		<div class="imgs__small"><img src="<?php echo $imgs['small']; ?>" alt=""></div>
	</div>
</div>
<?php $times = ($main['times']); ?>	
<? if (!empty($times)): ?>
  <div class="container timer_new">
    <div class="timer_new__text">До конца акции осталось:</div>
    <div class="timer_new__timer"><?php echo do_shortcode($times)?></div>
  </div>
<? endif; ?>
<?php $blocks_red = ($main['blocks_red']); ?>	
<div class="container">
	<div class="blocks_red">
		<div class="blocks_red__items">
			<?php if (is_array($blocks_red)) {
				foreach ($blocks_red as $e) { ?>
					<div class="blocks_red__block">
						<div class="blocks_red__l-side"><?php echo $e['title']; ?></div>
						<div class="blocks_red__r-side"><?php echo $e['text']; ?></div>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="blocks_red__more">Смотреть всё</div>
	</div>
</div>
<?php $form_block = ($main['form_block']); ?>	
<div class="container">
	<div class="form_promo">
	<div class="form_promo__title"><?php echo $form_block['title']; ?></div>
	<div class="form_promo__text"><?php echo $form_block['text']; ?></div>
		<?php echo do_shortcode($form_block['short'])?>
	</div>
</div>




<?php
$check_tax = ($main['check_tax']);
if ($check_tax == '0'): ?>


<?
	$taxes = []; 
    $unique_taxes = [];
    $taxonomies_dump = [];
    foreach( $promo_prods as $post) {
    	setup_postdata($post);
        $taxonomy_names = wp_get_object_terms(get_the_ID(), ['product_cat'],  array("fields" => "names"));
        
        array_push($taxes, $taxonomy_names);
        array_push($taxonomies_dump, $taxonomies);
    }
	
    wp_reset_postdata();
    
    if (!empty($taxes)) {
        foreach( $taxes as $tax) {
         	foreach( $tax as $item) {
                if (!in_array($item, $unique_taxes)) {
                    array_push($unique_taxes, $item);
                }
            }
        }
    }
    
?>
	<script>
    	
        jQuery(document).ready(function() {
    AddClickProducts();
        	jQuery('.tax_filter--js').each(function() {
            	jQuery(this).click(function() {
                
                	let tax = jQuery(this).data('item_tax');
                    console.log(tax);
                    jQuery('.tax_filter--js.isActive').removeClass('isActive');
                    jQuery(this).addClass('isActive');
                    jQuery(`.tax_product--js.isVisible`).removeClass('isVisible');
                    jQuery(`.tax_product--js[data-tax-names*="${tax}"]`).addClass('isVisible');
                    setTimeout(() => {
    const ITEMS_COUNT_PER_CLICK = 8;
    const showButton = document.querySelector('.products__list__more');
    const items = document.querySelectorAll('.tax_product--js.isVisible');
    const itemsCount = items.length;
    let i = ITEMS_COUNT_PER_CLICK;
    for (; i < itemsCount; ++i) {
    items[i].classList.add("isHide");
    }
    i = ITEMS_COUNT_PER_CLICK;
    console.log(items.length);
    const callback = (event) => {
    if (i >= itemsCount) {
    // showButton.removeEventListener('click', callback);
    // showButton.outerHTML = '';
    return;
    }
    items[i++].classList.remove("isHide")
    items[i++].classList.remove("isHide")
    items[i++].classList.remove("isHide")
    if (i < itemsCount) {
    items[i++].classList.remove("isHide")
    }
    };
    showButton.addEventListener('click', callback);
}, 500)
                });                
            })
            //jQuery('.tax_filter--js[data-item_tax="<?= $unique_taxes[0]; ?>"]').addClass('isActive');
            jQuery('.tax_filter--js:first-child').addClass('isActive');
            //jQuery(`.tax_product--js[data-tax-names*="<?= $unique_taxes[0]; ?>"]`).addClass('isVisible');
            jQuery(`.tax_product--js`).addClass('isVisible');
        	console.log('<?= $taxes; ?>');
        });
        
      
      
    </script>



        <div class="container">
        	<div class="categories_titles">Каталог товаров</div>
        	<div class="categories_items">
        	<div class="categories_btns">
				<button class="tax_filter--js" data-item_tax="<?= $taxes; ?>">Все</button>
            	<? foreach( $unique_taxes as $button) { ?>
            		<button class="tax_filter--js" data-item_tax="<?= $button; ?>"><?= $button; ?></button>
                <? }; ?>
            </div></div>
            <main class="products__list">
                <div class="row g-4">
                    <?php foreach( $promo_prods as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>
                    <?php
                    	$thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );
                        $categories = wp_get_post_terms( $post->ID, 'product_cat', array('fields' => 'all') );
                        
                        $taxonomy_names = wp_get_object_terms(get_the_ID(), ['product_cat'],  array("fields" => "names"));
                    ?>
                    <div class="col-md-6 tax_product--js" data-tax-names="<?= print_r($taxonomy_names) ?>">
                        <div class="card card-product">
                            <a href="<?php the_permalink(); ?>">
                                <div class="card-img-top" style="background-image: url(<?php echo $thumbnail_url; ?>);">
                                </div>
                            </a>
                            <div class="card-body">
                                <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); echo print_r($post->ID); ?></a>
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
                                    <div class="discount">
                                        <?php echo ( $price && $old_price ) ? round( ( ( ( (float) $price / (float) $old_price ) * 100 - 100 ) * - 1 ), 1 ) . ' %' : ''; ?>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>

                    <?php } ?>
                    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                </div>
				<div class="products__list__more">Показать ещё</div>
            </main>
        </div>







<script>
function AddClickProducts() {
setTimeout(() => {
    const ITEMS_COUNT_PER_CLICK = 8;
    const showButton = document.querySelector('.products__list__more');
    const items = document.querySelectorAll('.tax_product--js.isVisible');
    const itemsCount = items.length;
    let i = ITEMS_COUNT_PER_CLICK;
    for (; i < itemsCount; ++i) {
    items[i].classList.add("isHide");
    }
    i = ITEMS_COUNT_PER_CLICK;
    console.log(items.length);
    const callback = (event) => {
    if (i >= itemsCount) {
    // alert('Больше товаров нет!');
    // showButton.removeEventListener('click', callback);
    // showButton.outerHTML = '';
    return;
    }
    items[i++].classList.remove("isHide")
    items[i++].classList.remove("isHide")
    items[i++].classList.remove("isHide")
    if (i < itemsCount) {
    items[i++].classList.remove("isHide")
    }
    };
    showButton.addEventListener('click', callback);
}, 500)
    }; 
  </script>

<?php endif; ?>




<?php $promo_red = ($main['promo_red']); ?>
<div class="container">
	<div class="promo_block_red">
		<div class="promo_block_red__info">
			<div class="promo_block_red__title"><?php echo $promo_red['title']; ?></div>
			<div class="promo_block_red__text"><?php echo $promo_red['text']; ?></div>
		</div>
		<?php if ($promo_red['link']): ?>		
			<a href="<?php echo $promo_red['link']; ?>" class="promo_block_red__btn"><?php echo $promo_red['txt_btn']; ?></a>
		<?php endif ?>
	</div>
</div>
<div class="block_prom2">
	<?php get_template_part( 'template-parts/news' ); ?>
</div>
<?php
    get_footer();
?>