<?php
/*
Template Name: Halaman Pendaftaran
*/
get_header(); 
?>

<style>
    .reg-header {
        background: linear-gradient(rgba(0, 106, 78, 0.9), rgba(0, 106, 78, 0.8)), url('<?php echo get_template_directory_uri(); ?>/images/contact-bg.jpg');
        background-size: cover; background-position: center;
        color: white; padding: 80px 0; margin-bottom: 3rem;
    }
</style>

<?php if( get_field('reg_bg') ): ?>
<style>
    .reg-header {
        background: linear-gradient(rgba(0, 106, 78, 0.9), rgba(0, 106, 78, 0.8)), url('<?php echo get_field('reg_bg'); ?>');
        background-size: cover; background-position: center;
    }
</style>
<?php endif; ?>

<header class="reg-header text-center">
    <div class="container">
        <h1 class="display-5 fw-bold"><?php echo get_field('reg_title'); ?></h1>
        <p class="lead mb-0 text-yellow"><?php echo get_field('reg_subtitle'); ?></p>
    </div>
</header>

<div class="container py-4 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="text-center mb-5">
                <h2 class="fw-bold text-success"><?php echo get_field('intro_title'); ?></h2>
                <p class="text-muted"><?php echo get_field('intro_desc'); ?></p>
                <div style="width: 60px; height: 4px; background-color: var(--color-secondary); margin: 10px auto;"></div>
            </div>

            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-header bg-success text-white p-4 text-center">
                    <h4 class="fw-bold mb-0"><i class="bi bi-file-earmark-text me-2 text-yellow"></i> <?php echo get_field('card_title'); ?></h4>
                </div>

                <div class="card-body p-4 p-md-5">

                    <?php if( get_field('alert_msg') ): ?>
                    <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                        <div>
                            <strong>Pemberitahuan:</strong><br>
                            <?php echo get_field('alert_msg'); ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="mb-4">
                        <?php echo get_field('main_content'); ?>
                    </div>

                    <hr class="my-4">

                    <h5 class="fw-bold text-center mb-4">Pilih Metode Pendaftaran:</h5>

                    <div class="d-grid gap-3">

                        <?php if( get_field('gform_url') ): ?>
                        <a href="<?php echo get_field('gform_url'); ?>" target="_blank" class="btn btn-outline-success btn-lg py-3">
                            <i class="bi bi-google me-2"></i> Isi Formulir via Google Form
                        </a>
                        <?php endif; ?>

                        <div class="text-center text-muted small">- ATAU -</div>

                        <?php 
                            $wa_num = get_field('wa_number');
                            if( $wa_num ):
                                $wa_link = preg_replace('/[^0-9]/', '', $wa_num);
                        ?>
                        <a href="https://wa.me/<?php echo $wa_link; ?>?text=Assalamualaikum,%20saya%20ingin%20mendaftar%20kegiatan/pelatihan%20Mubaligh." 
                            target="_blank" class="btn btn-success btn-lg py-3 shadow-sm">
                            <i class="bi bi-whatsapp me-2"></i> Daftar Cepat via WhatsApp
                        </a>
                        <?php endif; ?>

                    </div>

                    <p class="text-center text-muted mt-4 small">
                        Butuh bantuan? Hubungi Admin di <a href="<?php echo home_url('/hubungi-kami'); ?>" class="text-success fw-bold">Halaman Kontak</a>.
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>