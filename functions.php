<?php
function ymp_load_assets() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
    
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css');

    wp_enqueue_style('ymp-main-style', get_stylesheet_uri());

    wp_enqueue_style('ymp-custom-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('ymp-index-style', get_template_directory_uri() . '/assets/css/index.css');

    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'ymp_load_assets');

function ymp_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('post-thumbnails'); 
}
add_action('after_setup_theme', 'ymp_theme_support');

function ymp_register_menus() {
    register_nav_menus( array(
        'utama' => __( 'Menu Utama (Header)', 'ymp-sumbar' ),
    ) );
}
add_action( 'after_setup_theme', 'ymp_register_menus' );

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'theme_location') && $args->theme_location == 'utama') {
        $atts['class'] = 'nav-link'; 
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function add_menu_li_class( $classes, $item, $args ) {
    if (property_exists($args, 'theme_location') && $args->theme_location == 'utama') {
        $classes[] = 'nav-item'; 
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'add_menu_li_class', 1, 3 );

?>