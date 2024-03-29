<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

	<div id="primary" class="content-area py-4">
		<div class="page-header">
			<div class="container">
				<?php
				if ( function_exists( 'dimox_breadcrumbs' ) ) {
					dimox_breadcrumbs();
				} ?>

				<? if ( is_page( 'contacts' ) ) : ?>
					<h1 class="contacts-title">Мебельный <br>центр</h1>
				<? else : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>

			</div>
		</div>
		<div class="entry-content">
			<div class="container">

				<?php if ( ! is_page( 'contacts' ) ) { ?>
					<article>

						<?php
						while ( have_posts() ) : the_post();
							the_content();
						endwhile;
						?>

					</article>
				<?php } ?>
				<?php if ( is_page( 'contacts' ) ) { ?>
					<section class="contacts-page">
						<div class="row mb-5">
							<div class="col-md-10">
								<h2 style="font-size: 30px;font-weight: 700;">Контакты</h2>

								<div class="field">
									<label>Адрес</label>
									<address>г.Иркутск
										ул. Партизанская, 63
									</address>
								</div>

								<div class="field">
									<label for="">Почта</label>
									<p><a href="mailto:market@et-invest.ru">market@et-invest.ru</a></p>
								</div>

								<div class="field">
									<label for="">Телефон</label>
									<p><a href="tel:+73952707131">+7(3952)707-131</a></p>
								</div>

								<div class="field">
									<label for="">Бухгалтерия</label>
									<p><a href="tel:+73952707131">+7(3952)707-131</a></p>
								</div>
								<div class="field">
									<label for="">Отдел маркетинга</label>
									<p><a href="tel:+73952707131">+7(3952)707-131</a></p>
								</div>
								<div class="field">
									<label for="">По вопросам аренды</label>
									<p><a href="tel:+73952707131">+7(3952)707-131</a></p>
								</div>
							</div>
							<div class="col-md-14">
								<iframe id="map_393542360" frameborder="0" width="100%" height="600px"
										class="map-contacts"
										sandbox="allow-modals allow-forms allow-scripts allow-same-origin allow-popups allow-top-navigation-by-user-activation"></iframe>
								<script type="text/javascript">(
																		function (e, t) {
																			var r = document.getElementById(e)
																			r.contentWindow.document.open(), r.contentWindow.document.write(atob(t)), r.contentWindow.document.close()
																		}
																	)('map_393542360', 'PGJvZHk+PHN0eWxlPgogICAgICAgIGh0bWwsIGJvZHkgewogICAgICAgICAgICBtYXJnaW46IDA7CiAgICAgICAgICAgIHBhZGRpbmc6IDA7CiAgICAgICAgfQogICAgICAgIGh0bWwsIGJvZHksICNtYXAgewogICAgICAgICAgICB3aWR0aDogMTAwJTsKICAgICAgICAgICAgaGVpZ2h0OiAxMDAlOwogICAgICAgIH0KICAgICAgICAuYnVsbGV0LW1hcmtlciB7CiAgICAgICAgICAgIHdpZHRoOiAyMHB4OwogICAgICAgICAgICBoZWlnaHQ6IDIwcHg7CiAgICAgICAgICAgIGJveC1zaXppbmc6IGJvcmRlci1ib3g7CiAgICAgICAgICAgIGJhY2tncm91bmQtY29sb3I6ICNmZmY7CiAgICAgICAgICAgIGJveC1zaGFkb3c6IDAgMXB4IDNweCAwIHJnYmEoMCwgMCwgMCwgMC4yKTsKICAgICAgICAgICAgYm9yZGVyOiA0cHggc29saWQgIzAyODFmMjsKICAgICAgICAgICAgYm9yZGVyLXJhZGl1czogNTAlOwogICAgICAgIH0KICAgICAgICAucGVybWFuZW50LXRvb2x0aXAgewogICAgICAgICAgICBiYWNrZ3JvdW5kOiBub25lOwogICAgICAgICAgICBib3gtc2hhZG93OiBub25lOwogICAgICAgICAgICBib3JkZXI6IG5vbmU7CiAgICAgICAgICAgIHBhZGRpbmc6IDZweCAxMnB4OwogICAgICAgICAgICBjb2xvcjogIzI2MjYyNjsKICAgICAgICB9CiAgICAgICAgLnBlcm1hbmVudC10b29sdGlwOmJlZm9yZSB7CiAgICAgICAgICAgIGRpc3BsYXk6IG5vbmU7CiAgICAgICAgfQogICAgICAgIC5kZy1wb3B1cF9oaWRkZW5fdHJ1ZSB7CiAgICAgICAgICAgIGRpc3BsYXk6IGJsb2NrOwogICAgICAgIH0KICAgICAgICAubGVhZmxldC1jb250YWluZXIgLmxlYWZsZXQtcG9wdXAgLmxlYWZsZXQtcG9wdXAtY2xvc2UtYnV0dG9uIHsKICAgICAgICAgICAgdG9wOiAwOwogICAgICAgICAgICByaWdodDogMDsKICAgICAgICAgICAgd2lkdGg6IDIwcHg7CiAgICAgICAgICAgIGhlaWdodDogMjBweDsKICAgICAgICAgICAgZm9udC1zaXplOiAyMHB4OwogICAgICAgICAgICBsaW5lLWhlaWdodDogMTsKICAgICAgICB9CiAgICA8L3N0eWxlPjxkaXYgaWQ9Im1hcCI+PC9kaXY+PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiIHNyYz0iaHR0cHM6Ly9tYXBzLmFwaS4yZ2lzLnJ1LzIuMC9sb2FkZXIuanM/cGtnPWZ1bGwmYW1wO3NraW49bGlnaHQiPjwvc2NyaXB0PjxzY3JpcHQ+KGZ1bmN0aW9uKGUsdCl7dmFyIHI9SlNPTi5wYXJzZShlKSxuPUpTT04ucGFyc2UodCk7ZnVuY3Rpb24gYShlKXtyZXR1cm4gZGVjb2RlVVJJQ29tcG9uZW50KGF0b2IoZSkuc3BsaXQoIiIpLm1hcChmdW5jdGlvbihlKXtyZXR1cm4iJSIrKCIwMCIrZS5jaGFyQ29kZUF0KDApLnRvU3RyaW5nKDE2KSkuc2xpY2UoLTIpfSkuam9pbigiIikpfURHLnRoZW4oZnVuY3Rpb24oKXt2YXIgZT1ERy5tYXAoIm1hcCIse2NlbnRlcjpbbi5sYXQsbi5sb25dLHpvb206bi56b29tfSk7REcuZ2VvSlNPTihyLHtzdHlsZTpmdW5jdGlvbihlKXt2YXIgdCxyLG4sYSxvO3JldHVybntmaWxsQ29sb3I6bnVsbD09PSh0PWUpfHx2b2lkIDA9PT10P3ZvaWQgMDp0LnByb3BlcnRpZXMuZmlsbENvbG9yLGZpbGxPcGFjaXR5Om51bGw9PT0ocj1lKXx8dm9pZCAwPT09cj92b2lkIDA6ci5wcm9wZXJ0aWVzLmZpbGxPcGFjaXR5LGNvbG9yOm51bGw9PT0obj1lKXx8dm9pZCAwPT09bj92b2lkIDA6bi5wcm9wZXJ0aWVzLnN0cm9rZUNvbG9yLHdlaWdodDpudWxsPT09KGE9ZSl8fHZvaWQgMD09PWE/dm9pZCAwOmEucHJvcGVydGllcy5zdHJva2VXaWR0aCxvcGFjaXR5Om51bGw9PT0obz1lKXx8dm9pZCAwPT09bz92b2lkIDA6by5wcm9wZXJ0aWVzLnN0cm9rZU9wYWNpdHl9fSxwb2ludFRvTGF5ZXI6ZnVuY3Rpb24oZSx0KXtyZXR1cm4icmFkaXVzImluIGUucHJvcGVydGllcz9ERy5jaXJjbGUodCxlLnByb3BlcnRpZXMucmFkaXVzKTpERy5tYXJrZXIodCx7aWNvbjpmdW5jdGlvbihlKXtyZXR1cm4gREcuZGl2SWNvbih7aHRtbDoiPGRpdiBjbGFzcz0nYnVsbGV0LW1hcmtlcicgc3R5bGU9J2JvcmRlci1jb2xvcjogIitlKyI7Jz48L2Rpdj4iLGNsYXNzTmFtZToib3ZlcnJpZGUtZGVmYXVsdCIsaWNvblNpemU6WzIwLDIwXSxpY29uQW5jaG9yOlsxMCwxMF19KX0oZS5wcm9wZXJ0aWVzLmNvbG9yKX0pfSxvbkVhY2hGZWF0dXJlOmZ1bmN0aW9uKGUsdCl7ZS5wcm9wZXJ0aWVzLmRlc2NyaXB0aW9uJiZ0LmJpbmRQb3B1cChhKGUucHJvcGVydGllcy5kZXNjcmlwdGlvbikse2Nsb3NlQnV0dG9uOiEwLGNsb3NlT25Fc2NhcGVLZXk6ITB9KSxlLnByb3BlcnRpZXMudGl0bGUmJnQuYmluZFRvb2x0aXAoYShlLnByb3BlcnRpZXMudGl0bGUpLHtwZXJtYW5lbnQ6ITAsb3BhY2l0eToxLGNsYXNzTmFtZToicGVybWFuZW50LXRvb2x0aXAifSl9fSkuYWRkVG8oZSl9KX0pKCdbeyJ0eXBlIjoiRmVhdHVyZSIsInByb3BlcnRpZXMiOnsiY29sb3IiOiIjMDI4MWYyIiwidGl0bGUiOiIiLCJkZXNjcmlwdGlvbiI6IiIsInpJbmRleCI6MTAwMDAwMDAwMH0sImdlb21ldHJ5Ijp7InR5cGUiOiJQb2ludCIsImNvb3JkaW5hdGVzIjpbMTA0LjMwNjY3MSw1Mi4yNzc2NDddfSwiaWQiOjExMDh9XScsJ3sibGF0Ijo1Mi4yNzc0MDc0NjU5OTQ2LCJsb24iOjEwNC4zMDcxOTI1NjQwMTA2Mywiem9vbSI6MTd9Jyk8L3NjcmlwdD48c2NyaXB0IGFzeW5jPSIiIHR5cGU9InRleHQvamF2YXNjcmlwdCIgc3JjPSJodHRwczovL3d3dy5nb29nbGV0YWdtYW5hZ2VyLmNvbS9ndGFnL2pzP2lkPVVBLTE1ODg2NjE2OC0xIj48L3NjcmlwdD48c2NyaXB0IHR5cGU9InRleHQvamF2YXNjcmlwdCI+KGZ1bmN0aW9uKGUpe2Z1bmN0aW9uIHQoKXtkYXRhTGF5ZXIucHVzaChhcmd1bWVudHMpfXdpbmRvdy5kYXRhTGF5ZXI9d2luZG93LmRhdGFMYXllcnx8W10sdCgianMiLG5ldyBEYXRlKSx0KCJjb25maWciLGUpLHdpbmRvdy5ndGFnPXR9KSgnVUEtMTU4ODY2MTY4LTEnKTwvc2NyaXB0PjwvYm9keT4=')</script>

							</div>
						</div>


						<h2 class="mb-3">Мебельные салоны</h2>
						<?php $salons = new WP_Query( [ 'post_type' => 'salons' ] );
						while ( $salons->have_posts() ) : $salons->the_post(); ?>
							<div class="row border-bottom py-3 m-0 salons-list">
								<div class="col-md-6 p-3 ps-0 d-flex align-items-center">
									<div class="salon-title"><a
												href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
								</div>
								<div class="col-md-6 d-flex align-items-center"><a
											href="tel:<?php the_field( 'phone' ); ?>"><?php the_field( 'phone' ); ?></a>
								</div>
								<div class="col-md-3 d-flex align-items-center"><?php the_field( 'floor' ); ?></div>
								<div class="col-md-6 text-end d-flex align-items-center">
									<a href="<?php the_field( 'url' ); ?>"
									   target="_blank"><?php echo str_replace( [
												'http://',
												'https://'
										], "", get_field( 'url', $post->ID ) ); ?></a>
								</div>
								<div class="col-md-3 text-end d-flex align-items-center">
									<?php
									if ( have_rows( 'socials', $post->ID ) ):

										while ( have_rows( 'socials', $post->ID ) ) : the_row();
											$type = get_sub_field( 'type' );
											$link = get_sub_field( 'link' );

											if ( $link ) {
												?>

												<a href="<?php echo $link; ?>" target="_blank" style="margin-right: 7px;">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shop-social-icon-<?php echo $type; ?>.svg"
                                                         alt="">
                                                </a>
											<?php }
										endwhile; endif;
									?>
								</div>
							</div>
						<?php endwhile; ?>
					</section>
				<?php } ?>
				<br><br><br>
			</div>
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
	<?php get_template_part( 'template-parts/seo-block' ); ?>
<?php
get_footer();
