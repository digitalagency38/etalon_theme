<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
	return;
}
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
?>
<script src="<?php echo get_theme_file_uri(); ?>/assets/js/mag.js"></script>
<div class="product" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?> data-aos="fade-in" data-aos-delay="200">
	<div class="row">
		<div class="col-md-14 order-md-1 order-2">
			<div class="d-md-none">
				<?php the_title( '<h1 class="page-title mb-4">', '</h1>' ); ?>
			</div>
			<div class="product__photo mt-3">
				<?php $images = get_field( 'gallery', $post->ID ); ?>
				<div class="product__photo-main">
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper">
						<?php
							$attachment_ids = $product->get_gallery_image_ids();
							$id = $product->get_image_id();
							$product_image_url = wp_get_attachment_url( $id );
						?>

								<div class="swiper-slide"
										style="background-image:url(<?php echo $product_image_url; ?>)">
								</div>
							<?php if ( $attachment_ids ) :

								foreach( $attachment_ids as $attachment_id ) {
								$image_link = wp_get_attachment_url( $attachment_id ); ?>
									<div class="swiper-slide"
											style="background-image:url(<?php echo $image_link; ?>)">
									</div>
								<?php } endif; ?>
						</div>

						<!--								<div class="swiper-button-next"></div>-->
						<!--								<div class="swiper-button-prev"></div>-->
					</div>

				</div>
				<div class="swiper-container gallery-thumbs">
					<div class="swiper-wrapper">
						<?php
						if ( $attachment_ids ) :

							if ( $product_image_url ) : ?>
								<div class="swiper-slide">

									<div class="thumb"
											style="background-image:url(<?php echo $product_image_url; ?>)"></div>

								</div>
							<?php endif;

							foreach( $attachment_ids as $attachment_id ) {
								$image_link = wp_get_attachment_url( $attachment_id ); ?>
								<div class="swiper-slide">
									<div class="thumb"
											style="background-image:url(<?php echo $image_link; ?>)"></div>

								</div>
							<?php } endif; ?>
					</div>
				</div>
				<div class="swiper-pagination-block d-flex align-items-center justify-content-center">
					<div class="salon-swiper-button-prev me-auto"></div>
					<div class="salon-swiper-pagination"></div>
					<div class="salon-swiper-button-next ms-auto"></div>
				</div>
			</div>

			<div class="price d-flex align-items-center d-md-none">
              <div class="regular__price">
                <?php echo number_format( $product->get_price(), 0, ',', ' '); ?> ₽
              </div>
              <?php if ($product->get_regular_price()): ?>
					<div class="special__price">
						<?php echo number_format( $product->get_regular_price(), 0, ',', ' ' ); ?> ₽
					</div>
				<?php endif; ?>
				<?php if ( $product->get_price() && $product->get_regular_price() ) : ?>
					<div class="discount"><?php echo round( ( ( ( (float) $product->get_price() / (float) $product->get_regular_price() ) * 100 - 100 ) * - 1 ), 1 ); ?>
						%
					</div>
				<?php endif; ?>
			</div>

			<a href="" class="btn btn-primary d-md-none" data-bs-toggle="modal"
				data-bs-target="#remoteSearch">Заказать</a>
          	<div class="salon_item">
				<?php $salon_id = get_field( 'salon', $post->ID );?>
					<div class="salon mt-5">
						<div class="d-flex align-items-center">
							<div class="logo">
								<?php $salon_post = get_post( $salon_id ); ?>
								<a href="<?php echo get_the_permalink( $salon_post->ID ); ?>">
									<?php if ( get_the_post_thumbnail_url( $salon_post->ID, 'thumbnail' ) ) { ?>
										<img src="<?php echo get_the_post_thumbnail_url( $salon_post->ID, 'medium' ); ?>"
												alt="<?php echo get_the_title( $salon_post ); ?>"
												class="img-fluid">
									<?php } else { ?>
										<?php echo get_the_title( $salon_post ); ?>
									<?php } ?>
								</a>
							</div>
							<div class="title ms-auto">
								<?php if($product->get_stock_quantity() >= '1') { ?>
									<div class="status green">
										В наличии
									</div>
								<?php } else { ?>
									<div class="status warning">
										Под заказ
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php if ($product->get_width() || $product->get_height() || $product->get_length() ) : ?>
					<div class="sizes d-md-none">
						<?php if ( $product->get_width() ) : ?>
							<div class="width">
								<div class="icon">
									<img
											src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-width.svg"
											alt=""></div> <span>Ширина:</span> <?php echo $product->get_width(); ?> мм
							</div>
						<?php endif; ?>
						<?php if ( $product->get_height() ) : ?>
							<div class="height">
								<div class="icon"><img
											src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-height.svg"
											alt="">
								</div> <span>Высота:</span> <?php echo $product->get_height(); ?> мм
							</div>
						<?php endif; ?>
						<?php if ( $product->get_length() ) : ?>
							<div class="depth">
								<div class="icon"><img
											src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-depth.svg"
											alt="">
								</div> <span>Длина:</span> <?php echo $product->get_length(); ?> мм
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ($product->get_width() || $product->get_height() || $product->get_length() ) : ?>
					<div class="sizes d-none d-md-flex">
						<?php if ( $product->get_width() ) : ?>
							<div class="width">
								<div class="icon">
									<img
											src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-width.svg"
											alt=""></div> <span>Ширина:</span> <?php echo $product->get_width(); ?> мм
							</div>
						<?php endif; ?>
						<?php if ( $product->get_height() ) : ?>
							<div class="height">
								<div class="icon"><img
											src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-height.svg"
											alt="">
								</div> <span>Высота:</span> <?php echo $product->get_height(); ?> мм
							</div>
						<?php endif; ?>
						<?php if ( $product->get_length() ) : ?>
							<div class="depth">
								<div class="icon"><img
											src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-depth.svg"
											alt="">
								</div> <span>Длина:</span> <?php echo $product->get_length(); ?> мм
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-10 col-info order-md-2 order-1">
			<div class="prd_info">
				<div class="prd_info__l">
					<?php the_title( '<h1 class="page-title mb-4 d-none d-md-block">', '</h1>' ); ?>
				</div>
				<div class="prd_info__r">
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

					<div class="itm_in">
						<div class="price d-flex align-items-center d-none d-md-flex">
						  <div class="regular__price">
							<?php echo number_format( $product->get_price(), 0, ',', ' '); ?> ₽
						  </div>
						  <?php if ($product->get_regular_price()): ?>
								<div class="special__price">
									<?php echo number_format( $product->get_regular_price(), 0, ',', ' ' ); ?> ₽
								</div>
							<?php endif; ?>
							<?php if ( $product->get_price() && $product->get_regular_price() ) : ?>
								<div class="discount"><?php echo round( ( ( ( (float) $product->get_price() / (float) $product->get_regular_price() ) * 100 - 100 ) * - 1 ), 1 ); ?>
									%
								</div>
							<?php endif; ?>
						</div>
						<a href="" class="btn btn-primary d-none d-md-block" data-bs-toggle="modal" data-bs-target="#remoteSearch">Заказать</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php //echo do_shortcode('[cusrev_reviews]')?>
<?php
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
				<li class="review_tab" id="tab-title-review" role="tab" aria-controls="tab-review">
					<a href="#tab-review">
						Отзывы(<?php echo $product->get_review_count();?>)
					</a>
				</li>
		</ul>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
		<?php endforeach; ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--review panel entry-content wc-tab" id="tab-review" role="tabpanel" aria-labelledby="tab-title-review">
				<div style="display: none;">
    				<?php comments_template();?>
				</div>
				<?php
				if ( ! comments_open() ) {
					return;
				}

				?>
				<div id="reviews" class="woocommerce-Reviews">
					<div id="comments">
						<h2 class="woocommerce-Reviews-title">
							<?php
							$count = $product->get_review_count();
							if ( $count && wc_review_ratings_enabled() ) {
								/* translators: 1: reviews count 2: product name */
								$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'woocommerce' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
								echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
							} else {
								esc_html_e( 'Reviews', 'woocommerce' );
							}
							?>
						</h2>

						<?php if ( have_comments() ) : ?>
						<ol class="commentlist">
							<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
						</ol>

						<?php
						if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
						echo '<nav class="woocommerce-pagination">';
						paginate_comments_links(
							apply_filters(
								'woocommerce_comment_pagination_args',
								array(
									'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
									'next_text' => is_rtl() ? '&larr;' : '&rarr;',
									'type'      => 'list',
								)
							)
						);
						echo '</nav>';
						endif;
						?>
						<?php else : ?>
						<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'woocommerce' ); ?></p>
						<?php endif; ?>
					</div>

					<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
					<div id="review_form_wrapper">
						<div id="review_form">
							<?php
							$commenter    = wp_get_current_commenter();
							$comment_form = array(
								/* translators: %s is product title */
								'title_reply'         => have_comments() ? esc_html__( 'Оставить отзыв', 'woocommerce' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'woocommerce' ), get_the_title() ),
								/* translators: %s is product title */
								'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'woocommerce' ),
								'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
								'title_reply_after'   => '</span>',
								'comment_notes_after' => '',
								'label_submit'        => esc_html__( 'Написать отзыв', 'woocommerce' ),
								'logged_in_as'        => '',
								'comment_field'       => '',
							);

							$name_email_required = (bool) get_option( 'require_name_email', 1 );
							$fields              = array(
								'author' => array(
									'label'    => __( 'Name', 'woocommerce' ),
									'type'     => 'text',
									'value'    => $commenter['comment_author'],
									'required' => $name_email_required,
        							'placeholder' => _x('Ваше имя', 'placeholder', 'woocommerce')
								),
								'email'  => array(
									'label'    => __( 'Email', 'woocommerce' ),
									'type'     => 'email',
									'value'    => $commenter['comment_author_email'],
									'required' => $name_email_required,
        							'placeholder' => _x('Ваш Email', 'placeholder', 'woocommerce')
								),
							);

							$comment_form['fields'] = array();

							foreach ( $fields as $key => $field ) {
								$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
								$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );

								if ( $field['required'] ) {
									$field_html .= '&nbsp;<span class="required">*</span>';
								}

								$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" placeholder="' . esc_attr( $field['placeholder'] ) .'" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';

								$comment_form['fields'][ $key ] = $field_html;
							}

							$account_page_url = wc_get_page_permalink( 'myaccount' );
							if ( $account_page_url ) {
								/* translators: %s opening and closing link tags respectively */
								$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'woocommerce' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
							}

							if ( wc_review_ratings_enabled() ) {
								$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Рейтинг', 'woocommerce' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
													<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
													<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
													<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
													<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
													<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
													<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
												</select></div>';
							}

							$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Текст отзыва', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" placeholder="Текст отзыва" name="comment" cols="45" rows="8" required></textarea></p>';

							comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
							?>
						</div>
					</div>
					<?php else : ?>
					<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>
					<?php endif; ?>

					<div class="clear"></div>
				</div>
			</div>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
	<!-- Новости -->
	<section class="news mb-md-4 pt-0 pt-md-3">
<!-- 			<div class="section-header d-flex align-items-center p-0 p-md-3">
				<h3>Рекомендуемые товары</h3>
			</div> -->
			<?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
			?>

			


	</section>
<script>
    jQuery(function() {
        jQuery('.product .btn').on('click', function() {
            jQuery(".hde_h1").attr("value", jQuery('.product-template-default .product h1').html());
        })
    })
</script>
<style>
  .hde_h1 {
  	opacity: 0;
    width: 0;
    height: 0;
    visibility: hidden;
    pointer-events: none;
  }
</style>