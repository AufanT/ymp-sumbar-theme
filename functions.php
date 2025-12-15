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
    add_theme_support('custom-logo', array('height'=>100,'width'=>100,'flex-height'=>true,'flex-width'=>true));
    add_theme_support('post-thumbnails'); 
}
add_action('after_setup_theme', 'ymp_theme_support');

function ymp_register_menus() {
    register_nav_menus( array('utama' => __( 'Menu Utama (Header)', 'ymp-sumbar' )) );
}
add_action( 'after_setup_theme', 'ymp_register_menus' );

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'theme_location') && $args->theme_location == 'utama') { $atts['class'] = 'nav-link'; }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function add_menu_li_class( $classes, $item, $args ) {
    if (property_exists($args, 'theme_location') && $args->theme_location == 'utama') { $classes[] = 'nav-item'; }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'add_menu_li_class', 1, 3 );

function ymp_register_pengurus_cpt() {
    register_post_type( 'pengurus', array(
        'labels' => array('name'=>'Data Pengurus','singular_name'=>'Pengurus','menu_name'=>'Data Pengurus','add_new'=>'Tambah Pengurus','add_new_item'=>'Tambah Pengurus Baru','edit_item'=>'Edit Pengurus','all_items'=>'Semua Pengurus'),
        'public' => true, 'publicly_queryable' => false, 'show_ui' => true, 'show_in_menu' => true, 'query_var' => true,
        'rewrite' => array( 'slug' => 'pengurus' ), 'capability_type' => 'post', 'has_archive' => false, 'hierarchical' => false,
        'menu_position' => 7, 'menu_icon' => 'dashicons-id-alt', 'supports' => array( 'title', 'editor', 'thumbnail' ),
    ));
}
add_action( 'init', 'ymp_register_pengurus_cpt' );

function ymp_rename_post_menu() {
    global $menu, $submenu;
    $menu[5][0] = 'Kabar Berita'; 
    $submenu['edit.php'][5][0] = 'Semua Berita';
    $submenu['edit.php'][10][0] = 'Tambah Berita';
}
add_action( 'admin_menu', 'ymp_rename_post_menu' );

function ymp_custom_sidebar_menus() {
    global $menu;
    $front_page_id = get_option('page_on_front');
    
    $link_beranda = 'post.php?post=' . $front_page_id . '&action=edit';
    $p_tentang = get_page_by_path('tentang-kami'); $link_tentang = $p_tentang ? 'post.php?post='.$p_tentang->ID.'&action=edit' : 'edit.php?post_type=page';
    $p_daftar  = get_page_by_path('pendaftaran');  $link_daftar  = $p_daftar  ? 'post.php?post='.$p_daftar->ID.'&action=edit'  : 'edit.php?post_type=page';
    $p_kontak  = get_page_by_path('hubungi-kami'); $link_kontak  = $p_kontak  ? 'post.php?post='.$p_kontak->ID.'&action=edit'  : 'edit.php?post_type=page';
    $link_logo = 'customize.php';

    $menu[4] = array( 'Edit Beranda', 'edit_pages', $link_beranda, '', 'menu-top menu-icon-home', 'menu-posts-beranda', 'dashicons-admin-home' );
    $menu[6] = array( 'Edit Tentang Kami', 'edit_pages', $link_tentang, '', 'menu-top menu-icon-page', 'menu-posts-tentang', 'dashicons-groups' );
    $menu[8] = array( 'Edit Pendaftaran', 'edit_pages', $link_daftar, '', 'menu-top menu-icon-page', 'menu-posts-daftar', 'dashicons-clipboard' );
    $menu[9] = array( 'Edit Kontak', 'edit_pages', $link_kontak, '', 'menu-top menu-icon-page', 'menu-posts-kontak', 'dashicons-phone' );
    $menu[60] = array( 'Ganti Logo & Judul', 'manage_options', $link_logo, '', 'menu-top', 'menu-ganti-logo', 'dashicons-art' );

    remove_menu_page( 'edit.php?post_type=page' ); 
    remove_menu_page( 'edit-comments.php' );      
    foreach ( $menu as $k => $v ) { if ( $v[2] == 'upload.php' ) { $menu[$k][6] = 'dashicons-images-alt2'; } }
}
add_action( 'admin_menu', 'ymp_custom_sidebar_menus', 999 );

function ymp_disable_pages_list_view() {
    global $pagenow;
    if ( $pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'page' ) {
        wp_redirect( admin_url() ); exit;
    }
}
add_action( 'admin_init', 'ymp_disable_pages_list_view' );

function ymp_manage_meta_box_layout() {
    global $post;
    if ( ! $post ) return;
    $screen = get_current_screen();

    if ( $screen->id == 'page' ) {
        remove_meta_box( 'postimagediv', 'page', 'side' ); 
        remove_meta_box( 'pageparentdiv', 'page', 'side' ); 
        remove_meta_box( 'commentstatusdiv', 'page', 'normal' ); 
        
        remove_meta_box( 'submitdiv', 'page', 'side' );
        add_meta_box( 'submitdiv', __('Simpan Perubahan'), 'post_submit_meta_box', 'page', 'normal', 'high' );
    }

    if ( $screen->id == 'post' ) {
        remove_meta_box( 'postcustom', 'post', 'normal' );
        add_meta_box( 'postcustom', __('Custom Fields'), 'post_custom_meta_box', 'post', 'side', 'low' );
    }
}
add_action( 'do_meta_boxes', 'ymp_manage_meta_box_layout' );

?>