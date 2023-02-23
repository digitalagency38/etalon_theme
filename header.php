<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<!DOCTYPE html>
<html lang="ru" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?v=2.0.0"
          type="image/x-icon"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PVMT7FZ');</script>
<!-- End Google Tag Manager -->

	
	<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>
	<meta name="yandex-verification" content="e168fe5a521f2840" />
	<meta name="google-site-verification" content="VrrjVXrJYXO9Qw1ma6QV4rBnb5ndKyMzwU-Le8mOuOE" />
</head>

<body <? body_class( "d-flex flex-column h-100" ); ?>>
<div class="backdrop"></div>
<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 order-1">
                <div class="logo">
                    <a href="<?php echo get_site_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"
                             alt="<?php bloginfo(); ?>" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="justify-content-between col-md-4 d-flex align-items-center social-icons d-none d-lg-flex order-2">

				<?php $rows = get_field( 'socials', get_option( 'page_on_front' ) );
				if ( $rows ) {
					foreach ( $rows as $row ) {
						?>

                        <a href="<?php echo $row['link'] ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social-icon-<?php echo $row['type'] ?>.svg"
                                 alt="<?php echo $row['title'] ?>">
                        </a>


						<?php
					}
				} ?>


            </div>
            <div class="col-12 col-md-11 d-flex align-items-center search order-5 px-3 order-md-4">
                <!--<form name="s">
                    <input class="form-control" type="search" placeholder="Поиск" aria-label="Поиск">
                    <button class="btn" type="submit"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-search.svg" alt="">
                    </button>
                </form>-->
              <?php echo do_shortcode('[wpdreams_ajaxsearchlite]');?>
            </div>
            <div class="col-12 col-md-4 d-flex align-items-center order-3 order-md-4 phone">
                <a href="tel:+73952707131"><span>+7(3952)</span> 707-131</a>
            </div>
            <div class="col-lg-24 col-12 order-2 order-md-5 d-flex">
                <nav class="navbar navbar-expand-lg navbar-light px-0 w-100">
                    <button class="btn btn-primary navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Меню">
                        Меню
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-catalog-btn.svg"
                             alt="" class="icon-catalog">
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <header class="header-collapser d-lg-none">
                            <div class="row">
                                <div class="col-12 d-flex align-items-center">
									<?php if ( is_home() || is_front_page() ) { ?>
                                        <div class="logo">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"
                                                 alt="<?php bloginfo(); ?>">
                                        </div>
									<?php } else { ?>
                                        <div class="logo">
                                            <a href="<?php echo get_site_url(); ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"
                                                     alt="<?php bloginfo(); ?>">
                                            </a>
                                        </div>
									<?php } ?>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <button class="btn btn-primary ms-auto" data-bs-toggle="collapse"
                                            data-bs-target="#navbarSupportedContent"
                                            aria-controls="navbarSupportedContent"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-close.svg"
                                                alt="" class="icon-close"></button>
                                </div>
                            </div>
                        </header>
                        <div class="navbar-catalog">
                            <button class="btn btn-primary">Каталог
                                <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-catalog-btn.svg"
                                        alt="" class="icon-catalog">
                                <img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-close.svg"
                                        alt="" class="icon-close">
                            </button>
                            <div class="catalog-btn__list">
                                <ul class="main-categories">
									<?php $catalog_terms = get_terms( [
										'taxonomy'   => 'product_cat',
										'hide_empty' => false,
										'parent'     => 0,
										'exclude'    => [ 15 ]
									] );

									foreach ( $catalog_terms as $catalog_term ) { ?>
										<?php $catalog_subterms = get_terms( [
											'taxonomy'   => 'product_cat',
											'hide_empty' => false,
											'parent'     => $catalog_term->term_id
										] ); ?>
                                        <li class="<?php echo $catalog_subterms ? 'has-subcategory' : ''; ?>">
                                            <a href="<?php echo get_term_link( $catalog_term->term_id ); ?>">
												<?php
												$icon_url = get_field( 'icon', $catalog_term );
												if ( $icon_url ) :
													?>

                                                    <div class="icon">
														<?php echo file_get_contents( $icon_url ); ?>
                                                    </div>
												<?php endif; ?>

												<?php echo $catalog_term->name; ?>

												<?php if ( $catalog_subterms ) { ?>
                                                    <div class="icon-arrow">
														<?php echo file_get_contents( get_template_directory() . '/assets/img/icon-menu-arrow.svg' ); ?>
                                                    </div>
												<?php } ?>
                                            </a>
											<?php if ( $catalog_subterms ) { ?>
                                                <div class="subcategory">
                                                    <a href="" class="subcategory_back"><img
                                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-arrow-left.svg'"
                                                                alt=""><?php echo $catalog_term->name; ?></a>
                                                    <div class="row">
                                                        <div class="col-md-25">
															<?php $catalog_subterms = get_terms( [
																'taxonomy'   => 'product_cat',
																'hide_empty' => false,
																'parent'     => $catalog_term->term_id
															] ); ?>
                                                            <ul>
                                                              <li class="main_title_menu"><?php echo $catalog_term->name; ?></li>
																<?php foreach ( $catalog_subterms as $catalog_subterm ) { ?>
                                                                    <li>
                                                                        <a href="<?php echo get_term_link( $catalog_subterm->term_id ); ?>">
																			<?php echo $catalog_subterm->name; ?>
                                                                        </a>
                                                                    </li>
																<?php } ?>
                                                            </ul>
                                                        </div>
                                                        <!-- <div class="col-12"></div> -->
                                                    </div>
                                                </div>
											<?php } ?>
                                        </li>
									<?php } ?>
                                </ul>
                            </div>
                        </div>
						<?php wp_nav_menu( array(
							'menu'            => 'main',
							'depth'           => 2,
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'navbar-nav mx-auto justify-content-between w-100',
							'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							'walker'          => new WP_Bootstrap_Navwalker(),
						) ); ?>

                        <div class="d-flex social-icons d-md-none mt-4 mt-md-0">
                            <a href="">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social-icon-whatsapp.svg"
                                     alt="WhatsApp">
                            </a>
                            <a href="">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social-icon-instagram.svg"
                                     alt="Instagram">
                            </a>
                            <a href="">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social-icon-youtube.svg"
                                     alt="YouTube">
                            </a>
                            <a href="">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social-icon-vk.svg"
                                     alt="ВКонтакте">
                            </a>
                            <a href="">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social-icon-fb.svg"
                                     alt="Facebook">
                            </a>
                        </div>

                        <div class="phone  d-md-none">
                            <a href="tel:+73952707131"><span>+7(3952)</span> 707-131</a>
                        </div>
                    </div><!--// .collapse	-->
                </nav>
            </div>
        </div>
    </div>
</header>