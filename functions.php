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
		wp_enqueue_style( 'mag', ETALON_URL . '/new/mag.css', array(), ETALON_VER, 'all' );
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


function the_price( $price ) {
	echo number_format( $price, 0, '.', ' ' );
}

add_theme_support( 'post-thumbnails' );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );



// Add catalog order by arguments
function wc_add_catalog_orderby_args( $sort_args ) {

	$orderby_value = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

	switch( $orderby_value ) {

		case 'name':
			$sort_args['orderby'] = 'title';
			$sort_args['order']   = 'asc';
		break;

		case 'name-desc':
			$sort_args['orderby']  = 'title';
			$sort_args['order']    = 'desc';
		break;

		case 'price':
			WC()->query->remove_ordering_args();    // remove ordering queries
			$sort_args['meta_key'] = '_price';
			$sort_args['orderby']  = ['meta_value_num' => 'asc', 'title' => 'asc'];
		break;

		case 'price-desc':
			WC()->query->remove_ordering_args();    // remove ordering queries
			$sort_args['meta_key'] = '_price';
			$sort_args['orderby']  = ['meta_value_num' => 'desc', 'title' => 'asc'];
		break;
	}

	return $sort_args;
}
add_filter( 'woocommerce_get_catalog_ordering_args', 'wc_add_catalog_orderby_args' );

// Custom default catalog orderby options
function wc_custom_catalog_orderby_options( $orderby ) {

	// Remove "Default sorting"
	if ( isset( $orderby['menu_order'] ) )      unset( $orderby['menu_order'] );

        // Remove "Sort by popularity"
	if ( isset( $orderby['popularity'] ) )      unset( $orderby['popularity'] );

        // Remove "Sort by average rating"
	if ( isset( $orderby['rating'] ) )          unset( $orderby['rating'] );

        // Remove "Sort by newness"
	if ( isset( $orderby['date'] ) )            unset( $orderby['date'] );

        // Remove "Sort by price: low to high"
	if ( isset( $orderby['price'] ) )           unset( $orderby['price'] );

        // Remove "Sort by price: high to low"
	if ( isset( $orderby['price-desc'] ) )      unset( $orderby['price-desc'] );

	$orderby['name']        = "Sort by Name: A to Z";
	$orderby['name-desc'] 	= "Sort by Name: Z to A";
	$orderby['price'] 	= "Sort by Price: low to high";
	$orderby['price-desc'] 	= "Sort by Price: high to low";

	return $orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'wc_custom_catalog_orderby_options' );
add_filter( 'woocommerce_default_catalog_orderby_options', 'wc_custom_catalog_orderby_options' );


// add_action( 'init', 'true_register_post_type_init' );
 
// function true_register_post_type_init() {
 
// 	$dis_labels = array(
// 		'name' => 'Блог дизайнера',
// 		'singular_name' => 'Запись',
// 		'add_new' => 'Добавить Запись',
// 		'add_new_item' => 'Добавить Запись',
// 		'edit_item' => 'Редактировать Запись',
// 		'new_item' => 'Новая Запись',
// 		'all_items' => 'Все Записи',
// 		'search_items' => 'Искать Запись',
// 		'not_found' =>  'Записи по заданным критериям не найдено.',
// 		'not_found_in_trash' => 'В корзине нет Записей.',
// 		'menu_name' => 'Блог дизайнера'
// 	);
 
// 	$dis_args = array(
// 		'labels' => $dis_labels,
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'has_archive' => false,
// 		'menu_icon' => 'dashicons-star-filled',
// 		'menu_position' => 3,
// 		'supports' => array( 'title' )
// 	);
// 	$port_labels = array(
// 		'name' => 'Портфолио',
// 		'singular_name' => 'Запись',
// 		'add_new' => 'Добавить Запись',
// 		'add_new_item' => 'Добавить Запись',
// 		'edit_item' => 'Редактировать Запись',
// 		'new_item' => 'Новая Запись',
// 		'all_items' => 'Все Записи',
// 		'search_items' => 'Искать Запись',
// 		'not_found' =>  'Записи по заданным критериям не найдено.',
// 		'not_found_in_trash' => 'В корзине нет Записей.',
// 		'menu_name' => 'Портфолио'
// 	);
 
// 	$port_args = array(
// 		'labels' => $port_labels,
// 		'public' => true,
// 		'publicly_queryable' => true,
// 		'has_archive' => false,
// 		'menu_icon' => 'dashicons-star-filled',
// 		'menu_position' => 3,
// 		'supports' => array( 'title' )
// 	);
  
// 	register_post_type( 'dis', $dis_args );
// 	register_post_type( 'port', $port_args );
// }