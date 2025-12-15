<!doctype html>
<html lang="id">
<head>
    <?php wp_head(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body <?php body_class(); ?>>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                
                if ( has_custom_logo() ) {
                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/download.png" alt="YMP Sumbar">';
                }
                ?>
                YMP Sumbar
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'utama',
                    'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0 fw-bold',
                    'container'      => false,
                    'depth'          => 2,
                    'fallback_cb'    => false
                ) );
                ?>

                <a href="<?php echo home_url('/pendaftaran'); ?>" class="btn btn-warning rounded-pill px-4 shadow-sm fw-bold ms-lg-3 mt-3 mt-lg-0">
                    <i class="bi bi-pencil-square me-1"></i> Pendaftaran
                </a>

            </div>
        </div>
    </nav>