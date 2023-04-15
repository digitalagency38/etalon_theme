<?php 
/**
*	Template name: Страница дизайнеров тест
*/

 ?>
<?php
    get_header();
	$link1 = get_field('link1');
	$link2 = get_field('link2');
?>
<link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/assets/css/promo_style.css">
<script src="<?php echo get_theme_file_uri(); ?>/assets/js/dis_main.js"></script>
<div class="container block_prom">
    <?php
    if ( function_exists( 'dimox_breadcrumbs' ) ) {
      dimox_breadcrumbs();
    } ?>
	<h1><?php echo get_the_title(); ?></h1>
</div>
<div class="container">
	<div class="dis__text"><?php the_content(); ?></div>
	<div class="dis__blocks">
		<?php $port_all = new WP_Query( [ 'post_type' => 'designers', 'posts_per_page' => - 1 ] ); ?>
			<?php
			while ( $port_all->have_posts() ) :
		$port_all->the_post();
			$thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );?>
			<div class="dis__block">
				<div class="dis__block__top">
					<div class="dis__block__img">
						<img src="<?php echo $thumbnail_url; ?>" alt="">
					</div>
					<div class="dis__block__info">
						<div class="dis__block__name"><?php the_title(); ?></div>
						<div class="dis__block__txt"><?php the_content(); ?></div>
					</div>
				</div>
				<?php
				$post_objects = get_field('blogall', $post->ID );
				if( $post_objects ):  ?>
				<div class="dis__tabs">
					<div class="dis__block__tab dis_block">
						<div class="dis__block--tit">Блог дизайнера<span></span></div>
						<div class="dis__block--content">
							<div class="simple_blocks">
								<?php foreach( $post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
								<?php setup_postdata($post); ?>
								<a href="<?php echo get_permalink(); ?>" class="simple_block">
									<span class="simple_block__img">
										<img src="<?php echo the_field('img'); ?>" alt="<?php the_title(); ?>">
									</span>
									<span class="simple_block__title"><?php the_title(); ?></span>
								</a>
								<?php endforeach; ?>
							</div>
							<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
							<a href="/dis" class="dis__block--link">Смотреть всё</a>
						</div>
					</div>
				</div>
				<?php endif;?>
				
				<?php	
				if (isset($_GET["increase"])) {
    global $wp_query;

    echo var_dump($wp_query);

}
				$portfolio_simple = get_field('portfolioall', $post->ID );
				var_dump($portfolio_simple);
				if( $portfolio_simple ):
				?>
					<div class="dis__tabs">
						<div class="dis__block__tab port_block">
							<div class="dis__block--tit">Портфолио<span></span></div>
							<div class="dis__block--content">
								<div class="simple_blocks">
									<?php foreach( $portfolio_simple as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
									<?php setup_postdata($post);?>
									<a href="<?php echo get_permalink(); ?>" class="simple_block">
										<span class="simple_block__img">
											<img src="<?php echo the_field('img'); ?>" alt="<?php the_title(); ?>">
										</span>
										<span class="simple_block__title"><?php the_title(); ?></span>
									</a>
									<?php endforeach; ?>
								</div>
								<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
								<a href="/port" class="dis__block--link">Смотреть всё</a>
							</div>
						</div>
					</div>
				<?php endif;?>
			</div>
	<?php
	endwhile;
	wp_reset_postdata(); ?>
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