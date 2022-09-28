<!-- Modal -->
<div class="modal fade" id="remoteSearch" tabindex="-1"
	 aria-labelledby="remoteSearchLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"
				 style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/order_form_image.png">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h2>Заказ товара</h2>
				<p>Мы свяжемся с вами в течение 2-х часов. Мы работаем с 10:00 до 20:00.</p>
				<?php echo do_shortcode( '[contact-form-7 id="13641" title="Заказ товара из карточки"]' ); ?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="feedback" tabindex="-1"
	 aria-labelledby="remoteSearchLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"
				 style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/remote-search.jpg">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<h2>Удаленный подбор</h2>
				<p>Также как консультация с широким активом влечет за собой процесс внедрения и модернизации вывода
					текущих активов.</p>
				<?php echo do_shortcode( '[contact-form-7 id="11338" title="Оставить заявку"]' ); ?>
			</div>
		</div>
	</div>
</div>

<footer class="site-footer py-5 mt-auto">
	<div class="container">
		<div class="row gy-3">
			<div class="col-md-6 order-2 order-md-1">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg"
					 alt="<?php bloginfo(); ?>" class="mb-5 d-none d-md-block">

				<p>Использование материалов сайта <br> без официального разрешения <br> ООО «Эталон Инвест» преследуются <br> по
					закону</p>

				<div class="widgets">
					<div class="widget widget-yandex">
						<div class="title">
							Яндекс <span>4.2</span>
						</div>
						<div class="stars">
							<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
							<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
							<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
							<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
							<div class="star-half">
								<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
								<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star-half.svg' ); ?>
							</div>
						</div>
					</div>
					<div class="widget widget-2gis">
						<div class="title">
							2GIS <span>4.3</span>
						</div>
						<div class="stars">
							<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
							<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
							<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
							<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
							<div class="star-half">
								<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star.svg' ); ?>
								<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-star-half.svg' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-18 order-1 order-md-2">
				<div class="row gy-md-3 footer-menu">
					<div class="col-md-6 footer-menu__block">

						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.svg"
							 alt="<?php bloginfo(); ?>" class="mb-5 d-md-none">

						<h4>Меню</h4>
                        	<?php
                                wp_nav_menu(
                                    array(
                                        'menu'            => 'Меню в хэдере',
                                        'theme_location'  => '',
                                        'container'       => 'ul'
                                    )
                                );
                            ?>
					</div>
					<div class="col-md-6 footer-menu__block">
						<h4>Покупателям</h4>
                        	<?php
                                wp_nav_menu(
                                    array(
                                        'menu'            => 'Покупателям',
                                        'theme_location'  => '',
                                        'container'       => 'ul'
                                    )
                                );
                            ?>
					</div>
					<div class="col-md-6 footer-menu__block">
						<h4>Каталог</h4>
						<ul>
							<?php $catalog_terms = get_terms( [
									'taxonomy'   => 'product_cat',
									'hide_empty' => false,
									'parent'     => 0,
									'exclude'    => [ 15 ]
							] );

							foreach ( $catalog_terms as $catalog_term ) {
								?>
								<li>
									<a href="<?php echo get_term_link( $catalog_term->term_id ); ?>"><?php echo $catalog_term->name; ?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div class="col-md-6 footer-menu__block">
						<h4>Наши контакты:</h4>
						<ul>
							<li>г.Иркутск ул. Партизанская, 63</li>
							<li><a href="tel:+73952707131">+7 (3952) 707-131</a></li>
							<li><a href="mailto:market@et-invest.ru">market@et-invest.ru</a></li>
							<li>с 9:00 до 19:00</li>
							<li>
								<div class="d-flex align-items-center social-icons">
									<?php $rows = get_field( 'socials', get_option( 'page_on_front' ) );
									if ( $rows ) {
										foreach ( $rows as $row ) {
											?>

											<a href="<?php echo $row['link'] ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/social-icon-<?php echo $row['type'] ?>-w.svg"
													 alt="<?php echo $row['title'] ?>">
											</a>

											<?php
										}
									} ?>

								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<? wp_footer(); ?>
</body>
</html>