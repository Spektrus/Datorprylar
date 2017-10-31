<?php
/* ----WOOCOMMERCE SPECIFIC---- */

/* REMOVE SOME DEFAULT SETTINGS */

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_title', 30 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/* CHANGE CONTENT WRAPPER */

add_action( 'woocommerce_before_main_content', 'my_theme_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'my_theme_wrapper_end', 10 );

function my_theme_wrapper_start() {
  echo '<div id="content">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}

/* REMOVE ADD TO CART MESSAGE */

function bbloomer_custom_add_to_cart_message() {
    echo '<style>.woocommerce-message {display: none !important;}</style>';
}
add_filter( 'wc_add_to_cart_message', 'bbloomer_custom_add_to_cart_message' );

/* PRODUCTS PER PAGE */

function products_per_page() {
    if ( is_product_category() ) { // PRODUCT CATEGORIES
        add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 25 ); // PRICE PLACEMENT
        remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
        return 12;
    }
    elseif ( is_shop() ) { // SHOP PAGE
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); // SALE
        add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 1 );
        remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 ); // REMOVE PAGINATION
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // REMOVE ADD TO CART BUTTON
        return 4;
    }
}
add_filter( 'loop_shop_per_page', 'products_per_page', 20 );

/* REMOVE PRODUCT SKU */

function sv_remove_product_page_skus( $enabled ) {
    if ( ! is_admin() && is_product() ) {
        return false;
    }
     return $enabled;
}
add_filter( 'wc_product_sku_enabled', 'sv_remove_product_page_skus' );

/* ORDER OF ELEMENTS PRODUCT PAGE */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price',  10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price',  20);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/* REMOVE DEFAULT CSS */

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/* ENABLE THEME SUPPORT */

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );

/* ----THEME SPECIFIC---- */

/* REGISTER MENUS */

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(array(
		'main-menu' => 'Toppmeny'
	));
}

/* THEME SUPPORT ADDITIONS */

$header = array(
	'width' 		=> 936,
	'height' 		=> 240,
	'uploads' 		=> true,
	);

$logo = array(
    'width'         => 120,
    'height'        => 44,
    'uploads'       => true,
    );

add_theme_support( 'custom-header', $header );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

/* ADD JQUERY */

function add_jquery() {
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'add_jquery' );

/* ADD JQUERY UI */

function add_jquery_ui() {
    wp_enqueue_script( 'jquery-ui-accordion' );
}
add_action( 'wp_enqueue_scripts', 'add_jquery_ui' );


?>