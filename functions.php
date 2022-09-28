<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Globals.
define( 'ETALON_VER', time() );
define( 'ETALON_DIR', get_template_directory() );
define( 'ETALON_URL', get_template_directory_uri() );


function etalon_v3_theme_setup() {
	require_once ETALON_DIR . '/inc/breadcrumbs.php';
	require_once ETALON_DIR . '/inc/class-wp-bootstrap-navwalker.php';
	require_once ETALON_DIR . '/inc/cpt.php';

	add_theme_support( 'title-tag' );
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'etalon_v3_theme_setup' );
function my_theme_styles_scripts() {
	// Frontend scripts.
	if ( ! is_admin() ) {
		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js', array(), ETALON_VER, true );
		wp_enqueue_script( 'swiper-js', 'https://unpkg.com/swiper@8/swiper-bundle.min.js', array(), ETALON_VER, true );
		wp_enqueue_script( 'bootstrap-select-js', ETALON_URL . '/assets/js/bootstrap-select.min.js', array(), ETALON_VER, true );
		wp_enqueue_script( 'aos-js', ETALON_URL . '/assets/js/aos.js', array(), ETALON_VER, true );
		wp_enqueue_script( 'inputmask-js', ETALON_URL . '/assets/js/jquery.inputmask.min.js', array(), ETALON_VER, true );

		wp_enqueue_script( 'custom', ETALON_URL . '/assets/js/main.js', array(), ETALON_VER, true );

		wp_enqueue_style( 'swiper', 'https://unpkg.com/swiper@7/swiper-bundle.min.css', array(), ETALON_VER, 'all' );
		wp_enqueue_style( 'styles', ETALON_URL . '/assets/css/main.css', array(), ETALON_VER, 'all' );
		wp_enqueue_style( 'stylesss', ETALON_URL . '/new/style.css', array(), ETALON_VER, 'all' );
	}
}

add_action( 'wp_enqueue_scripts', 'my_theme_styles_scripts' );


if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Настройки сайта',
		'menu_title' => 'Настройки сайта',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}

add_filter( 'pre_get_posts', 'catalog_filter' );

function catalog_filter( $query ) {
	if ( is_tax( 'product_cat' ) && $query->is_main_query() ) {
		$salons      = [];
		$factory     = [];
		$country     = [];
		$product_cat = [];

		if ( isset( $_GET['taxonomy']['product_cat'] ) ) {
			$product_cat = [
				'taxonomy' => 'product_cat',
				'terms'    => $_GET['taxonomy']['product_cat']
			];
		}

		if ( isset( $_GET['taxonomy']['pa_strana_proizvoditel'] ) ) {
			$country = [
				'taxonomy' => 'pa_strana_proizvoditel',
				'terms'    => $_GET['taxonomy']['pa_strana_proizvoditel']
			];
		}


		if ( isset( $_GET['post_type']['salons'] ) ) {
			$salons = [
				'key'   => 'salon',
				'value' => $_GET['post_type']['salons']
			];
		}

		if ( isset( $_GET['post_type']['factory'] ) ) {
			$factory = [
				'key'   => 'factory',
				'value' => $_GET['post_type']['factory']
			];
		}

		if ( $salons && $factory ) {
			$meta_fields = [ 'relation' => 'AND', $salons, $factory ];
		} elseif ( $salons ) {
			$meta_fields = [ 'relation' => 'AND', $salons ];
		} elseif ( $factory ) {
			$meta_fields = [ 'relation' => 'AND', $factory ];
		}

		if ( $product_cat && $country ) {
			$tax_queries = [ 'relation' => 'AND', $product_cat, $country ];
		} elseif ( $product_cat ) {
			$tax_queries = [ 'relation' => 'AND', $product_cat ];
		} elseif ( $country ) {
			$tax_queries = [ 'relation' => 'AND', $country ];
		}

		if ( $meta_fields ) {
			$query->set( 'meta_query', [
				$meta_fields
			] );
		}

		if ( $tax_queries ) {
			$query->set( 'tax_query', [
				$tax_queries
			] );
		}
	}
}

function the_price( $price ) {
	echo number_format( $price, 0, '.', ' ' );
}

add_theme_support( 'post-thumbnails' );