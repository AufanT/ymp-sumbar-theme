<?php
/*
Template Name: Halaman Hubungi Kami
*/
get_header(); 
?>

<style>
    .contact-header {
        background: linear-gradient(rgba(0, 106, 78, 0.9), rgba(0, 106, 78, 0.8)), url('<?php echo get_template_directory_uri(); ?>/images/contact-bg.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 80px 0;
        margin-bottom: 3rem;
    }
    
    .icon-box {
        width: 60px; height: 60px;
        background-color: #F8F9FA;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        border: 2px solid var(--color-secondary);
        transition: all 0.3s ease;
    }
    .contact-item:hover .icon-box {
        background-color: var(--color-primary);
        border-color: var(--color-primary);
    }
    .contact-item:hover .icon-box i {
        color: white !important;
    }
</style>

<?php if( get_field('contact_bg') ): ?>
<style>
    .contact-header {
        background: linear-gradient(rgba(0, 106, 78, 0.9), rgba(0, 106, 78, 0.8)), url('<?php echo get_field('contact_bg'); ?>');
        background-size: cover; background-position: center;
    }
</style>
<?php endif; ?>

<header class="contact-header text-center">
    <div class="container">
        <h1 class="display-5 fw-bold"><?php echo get_field('contact_title'); ?></h1>
        <p class="lead mb-0 text-yellow"><?php echo get_field('contact_subtitle'); ?></p>
    </div>
</header>

<div class="container py-4">
    <div class="row g-5">
        
        <div class="col-lg-5">
            <h6 class="text-success fw-bold text-uppercase ls-2"><?php echo get_field('info_small_title'); ?></h6>
            <h2 class="fw-bold mb-4"><?php echo get_field('info_main_title'); ?></h2>
            <p class="text-muted mb-5">
                <?php echo get_field('info_desc'); ?>
            </p>

            <div class="d-flex mb-4 contact-item">
                <div class="icon-box flex-shrink-0 me-3">
                    <i class="bi bi-geo-alt-fill fs-4 text-success"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Alamat Kantor</h5>
                    <p class="text-muted small mb-0"><?php echo get_field('contact_address'); ?></p>
                </div>
            </div>

            <?php 
                $wa_number = get_field('contact_wa'); 
                $wa_link = preg_replace('/[^0-9]/', '', $wa_number);
            ?>
            <div class="d-flex mb-4 contact-item">
                <div class="icon-box flex-shrink-0 me-3">
                    <i class="bi bi-whatsapp fs-4 text-success"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">WhatsApp Admin</h5>
                    <p class="mb-0">
                        <a href="https://wa.me/<?php echo $wa_link; ?>" target="_blank" class="text-muted text-decoration-none hover-green">
                            +<?php echo $wa_number; ?>
                        </a>
                    </p>
                    <a href="https://wa.me/<?php echo $wa_link; ?>" target="_blank" class="text-yellow text-decoration-none small fw-bold">Chat Sekarang →</a>
                </div>
            </div>

            <div class="d-flex mb-4 contact-item">
                <div class="icon-box flex-shrink-0 me-3">
                    <i class="bi bi-envelope-fill fs-4 text-success"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Email Resmi</h5>
                    <p class="mb-0">
                        <a href="mailto:<?php echo get_field('contact_email'); ?>" class="text-muted text-decoration-none hover-green">
                            <?php echo get_field('contact_email'); ?>
                        </a>
                    </p>
                </div>
            </div>

            <div class="alert alert-success border-0 bg-opacity-10 mt-4">
                <h6 class="fw-bold mb-2"><i class="bi bi-clock me-2"></i> Jam Operasional:</h6>
                <ul class="list-unstyled mb-0 small">
                    <li>Senin - Jumat: <?php echo get_field('hours_weekdays'); ?></li>
                    <li>Sabtu - Minggu: <?php echo get_field('hours_weekend'); ?></li>
                </ul>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card border-0 shadow h-100 overflow-hidden">
                <div class="card-body p-0">
                    <iframe 
                        src="<?php echo get_field('map_url'); ?>" 
                        width="100%" height="100%" 
                        style="border:0; min-height: 450px;" 
                        allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>