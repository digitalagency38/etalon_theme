<?php 
/**
*	Template name: Страница Портфолио
*/
 ?>
<?php
    get_header();
?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/assets/css/promo_style.css">
<div class="container block_prom">
    <?php
    if ( function_exists( 'dimox_breadcrumbs' ) ) {
      dimox_breadcrumbs();
    } ?>
	<h1><?php echo get_the_title(); ?></h1>
</div>
<div class="container">
	<div class="blocks_simple">
		<?php $port_all = get_field('port_all'); ?>
		<?php foreach( $port_all as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) 
			$thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );?>
		<?php setup_postdata($post);?>
			<div class="blocks_simple__block">
				<a href="<?php echo get_permalink(); ?>" class="blocks_simple__img">
					<img src="<?php echo get_field('img'); ?>" alt="<?php the_title(); ?>">
					<div class="blocks_simple__date"><?php echo get_the_date(); ?></div>
				</a>
				<div class="blocks_simple__info">
					<div class="blocks_simple__top">
						<a href="<?php echo get_permalink(); ?>" class="blocks_simple__title"><?php the_title(); ?></a>
						
							<?php $proj_list = get_field('dis_maker'); ?>
							<?php foreach( $proj_list as $post) { // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
							<?php $thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );?>	
								<div class="blocks_simple__dis">
									<img src="<?php echo $thumbnail_url; ?>" alt="">
									<span><?php the_title(); ?></span>
								</div>
								<?php } ?>
					</div>
					<a href="<?php echo get_permalink(); ?>" class="blocks_simple__link">Подробнее</a>
				</div>
			</div>
			<?php } ?>
			<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
	</div>
</div>
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
<?php
    get_footer();
?>