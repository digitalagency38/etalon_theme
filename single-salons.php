<?php

/**
 * Index
 *
 * Theme index.
 *
 * @since   1.0.0
 * @package WPGulp
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


get_header(); ?>

	<div id="primary" class="content-area pt-5">
		<div class="container">
			<header class="page-header py-2">
				<?php if ( function_exists( 'dimox_breadcrumbs' ) ) {
					dimox_breadcrumbs();
				} ?>

				<div class="d-flex align-items-center">
					<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
					<div class="meta ms-auto d-flex align-items-center">
						<div class="floor ms-auto px-2"><?php the_field( 'floor' ); ?></div>
						<div class="floor ms-auto px-2"><a
									href="tel:<?php the_field( 'phone' ); ?>"><?php the_field( 'phone' ); ?></a></div>
						<div class="floor ms-auto px-2"><a href="<?php the_field( 'url' ); ?>"
														   target="_blank"><?php echo str_replace( [
										'http://',
										'https://'
								], "", get_field( 'url', $post->ID ) ); ?></a>
						</div>
						<div class="floor ms-auto px-2"><?php
							if ( have_rows( 'socials', $post->ID ) ):

								while ( have_rows( 'socials', $post->ID ) ) : the_row();

									$type = get_sub_field( 'type' );
									$link = get_sub_field( 'link' );

									if ( $link ) {
										?>

										<a href="<?php echo $link; ?>"
										   target="_blank">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shop-social-icon-<?php echo $type; ?>.svg"
													 alt="" style="width:40px;"></a>
									<?php }
								endwhile;
							endif;
							?></div>
					</div>

				</div>
			</header><!-- .page-header -->

			<div class="entry-content">
				<div class="content">
					<?php the_content(); ?>
				</div>

				<?php $images = get_field( 'photos', $post->ID ); ?>
				<div class="salon__photo-main">
					<div  thumbsSlider="" class="swiper-container gallery-top">
						<div class="swiper-wrapper">
							<?php if ( $images ) :

								foreach ( $images as $image ) { ?>
									<div class="swiper-slide"
										 style="background-image:url(<?php echo $image['url']; ?>)">

									</div>
								<?php } endif; ?>
						</div>

						<!--								<div class="swiper-button-next"></div>-->
						<!--								<div class="swiper-button-prev"></div>-->
					</div>

				</div>
              <div class="thumbs_slider_wrapper" >
				<div  thumbsSlider="" class="swiper-container gallery-thumbs">
					<div class="swiper-wrapper">
						<?php
						if ( $images ) :
							foreach ( $images as $image ) { ?>
								<div class="swiper-slide">
									<div class="thumb"
										 style="background-image:url(<?php echo $image['url']; ?>)"></div>

								</div>
							<?php } endif; ?>
					</div>
					
				</div>

					<div class="salon-gallery__pagination">
						<div class="salon-swiper-button-prev"></div>
						<div class="salon-swiper-button-next"></div>
					</div>
              </div>
				<section class="advantages py-5">
					<h2 class="mb-4">Преимущества</h2>
					<div class="row">
						<?php while ( have_rows( 'advantages' ) ) : the_row(); ?>
							<div class="col-md-6">
								<?php if ( get_sub_field( 'icon', $post->ID ) ) { ?>
									<div class="icon">
										<img src="<?php the_sub_field( 'icon' ); ?>"
											 alt="<?php the_sub_field( 'title' ); ?>">
									</div>
								<?php } ?>
								<h4>
									<?php the_sub_field( 'title' ); ?>
								</h4>
								<p><?php the_sub_field( 'description' ); ?></p>
							</div>
						<?php endwhile; ?>
					</div>
				</section>

				<div class="p-3 d-inline-block mb-3">
					<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'medium' ); ?>" alt="" style="max-width:247px;">
				</div>
				<div class="short-content">
					<?php the_field( 'short' ); ?>
				</div>
			</div>

		</div>
		<br>
		<br>
		<?php get_template_part( 'template-parts/sales' ); ?>
        <div class="container">
	<?php
            $terms = get_terms( [
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'parent'     => 0,
                'exclude'    => [ 15 ],
                'include'    => get_field( 'categories' )
            ] );

            ?>

            <div class="row g-5 catalog__categories-list">
                <?php
                $i = 0;
                foreach ( $terms as $term ) {
                    $image_id      = get_term_meta( $term->term_id, 'thumbnail_id', true );
                    $thumbnail_url = wp_get_attachment_image_url( $image_id, 'medium' );
                    $i ++;
                    ?>

                    <div class="col-md-12">
                        <div class="card"
                             <?php if ( get_field( 'photo', $term ) ) : ?>style="background-image: url(<?php echo get_field( 'photo', $term ); ?>);"<?php endif; ?>>
                            <img src="<?php echo get_field( 'photo', $term ); ?>" alt="" class="d-md-none ">
                            <div class="card-body">
                                <div class="h4 title mb-4">
                                    <a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
                                </div>

                                <?php $child_terms = get_terms( [
                                    'taxonomy'   => 'product_cat',
                                    'hide_empty' => false,
                                    'parent'     => $term->term_id,
                                ] ); ?>

                                <ul class="child-terms">
                                    <?php foreach ( $child_terms as $child_term ) { ?>
                                        <li>
                                            <a href="<?php echo get_term_link( $child_term->term_id ); ?>"><?php echo $child_term->name; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php
                } ?>
            </div>
        </div>
	</div>

<?php get_template_part( 'template-parts/remote-search' ); ?>
<?php get_template_part( 'template-parts/seo-block' ); ?>
<?php get_footer();