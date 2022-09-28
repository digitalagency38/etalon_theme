<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$filters = [
		'product_cat'            => [
				'title' => 'Категория',
				'type'  => 'taxonomy'
		],
		'salons'                 => [
				'title' => 'Салон',
				'type'  => 'post_type'
		],
		'pa_fabrika'             => [
				'title' => 'Фабрика',
				'type'  => 'taxonomy'
		],
		'pa_strana_proizvoditel' => [
				'title' => 'Страна производитель',
				'type'  => 'taxonomy'
		],
];

function map_taxonomies( $item ) {
	return [ 'title' => $item->name, 'slug' => $item->slug, 'id' => $item->term_id ];
}

function map_post_types( $item ) {
	return [
			'title' => $item->post_title,
			'slug'  => $item->post_name,
			'id'    => $item->ID,
			'image' => get_the_post_thumbnail_url( $item->ID, 'post-thumbnail' )
	];
}

foreach ( $filters as $slug => $filter ) {
	
	$options = [];
	if ( $filter['type'] == 'taxonomy' ) {
		$parent  = $slug === 'product_cat' ? get_queried_object()->term_id : 0;
		$exclude = $slug === 'product_cat' ? [ 15 ] : [];
		$data    = get_terms( [
				'taxonomy'   => $slug,
				'hide_empty' => false,
				'parent'     => $parent,
				'exclude'    => $exclude
		] );
		$filters[ $slug ]['options'] = array_map( 'map_taxonomies', $data );
	}

	if ( $filter['type'] == 'post_type' ) {
		$data = get_posts( [
				'post_type'      => $slug,
				'posts_per_page' => - 1,
		] );

		$filters[ $slug ]['options'] = array_map( 'map_post_types', $data );
	}
}

get_header(); ?>

	<div id="primary" class="content-area py-4">
		<div class="container">
			<header class="page-header py-md-4">
				<?php if ( function_exists( 'dimox_breadcrumbs' ) ) {
					dimox_breadcrumbs();
				} ?>

				<h1 class="page-title"><?php single_term_title( '' ); ?></h1>
			</header><!-- .page-header -->

			<div class="row">
				<div class="col-md-8">
					<aside>
						<div class="sidebar">
							<button class="btn btn-default filter-drop d-md-none">
								Фильтр
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-settings.svg"
									 alt="" class="icon-filter">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-close-dark.svg"
									 alt="" class="icon-close">
							</button>
							<div class="filter">
								<form action="">
									<div class="filters">
										<?php
										foreach ( $filters as $key => $filter ) : ?>
                                        	
											<?php if ( $filter['options'] ) : ?>
												<section class="filter__section<? if ( count($filter['options']) > 6) { echo ' isFieldsHidden'; };?>">
													<h5 class="filter__section-title"><?php echo $filter['title']; ?></h5>
													<?php foreach ( $filter['options'] as $option ) :
														$checked = isset( $_GET[ $filter['type'] ][ $key ] ) && in_array( $option['id'], $_GET[ $filter['type'] ][ $key ] );
														?>
														<div class="form-check">
															<input class="form-check-input"
																   type="checkbox"
																   value="<?php echo $option['id']; ?>"
																   id="filter_by_<?php echo $option['slug']; ?>"
																   name="<?php echo $filter['type']; ?>[<?php echo $key; ?>][]"
																	<?php echo $checked ? 'checked="checked"' : ''; ?>
															>
															<label class="form-check-label"
																   for="filter_by_<?php echo $option['slug']; ?>">
																<?php if ( $key === 'salons' && $option['image'] ) { ?>
																	<img src="<?php echo $option['image']; ?>" alt="">
																<?php } else { ?>
																	<?php echo $option['title']; ?>
																<?php } ?>

															</label>
														</div>
													<?php endforeach; ?>
                                                    <? if ( count($filter['options']) > 6) { ?>
                                                        <div class="button button__show-more">Показать еще</div>
                                                    <? }; ?>
												</section>
                                                
											<?php endif; ?>
										<?php endforeach; ?>
									</div>
									<input type="submit" class="btn btn-danger btn-filter__submit" value="Применить">
								</form>

							</div>
						</div>
					</aside>
				</div>
				<div class="col-md-16">
					<main class="products__list">
						<div class="row g-4">
                          <?php get_template_part( 'template-parts/form_cat' ); ?>
							<?php
							if ( have_posts() ) :
								while ( have_posts() ) : the_post();
									$thumbnail_url = get_the_post_thumbnail_url( $post->ID, 'large' );
									?>
									<div class="col-md-8">
										<div class="card card-product">
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
							<?php else : ?>
								<h3>Ничего не найдено</h3>
							<?php endif; ?>
							<?php the_posts_pagination(); ?>
						</div>
					</main>
				</div>
			</div>
		</div>
	</div>

<?php get_template_part( 'template-parts/remote-search' ); ?>
<?
$term = get_queried_object();


// vars
$seo_title = get_field('seo_title', $term);
$seo_text = get_field('seo_text', $term);
?>
<section class="seo-block">
	<div class="container">
		<h2><?= $seo_title; ?></h2>

		<?= $seo_text; ?>
	</div>
</section>

<?php get_footer();