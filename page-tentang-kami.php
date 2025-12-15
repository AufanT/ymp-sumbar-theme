<?php
/*
Template Name: Halaman Tentang Kami
*/
get_header(); 
?>

<style>
    .page-header {
        background: linear-gradient(rgba(0, 85, 50, 0.9), rgba(0, 85, 50, 0.8)), url('<?php echo get_template_directory_uri(); ?>/images/3.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 80px 0;
        margin-bottom: 3rem;
    }
</style>

<?php 
$hero_bg = get_field('about_bg');
if($hero_bg): 
?>
<style>
    .page-header {
        background: linear-gradient(rgba(0, 85, 50, 0.9), rgba(0, 85, 50, 0.8)), url('<?php echo $hero_bg; ?>') !important;
        background-size: cover !important;
        
        background-position: center !important; 
        
        background-repeat: no-repeat !important;
    }
</style>
<?php endif; ?>

<header class="page-header text-center">
    <div class="container">
        <h1 class="display-5 fw-bold"><?php echo get_field('about_title'); ?></h1>
        <p class="lead mb-0 text-yellow"><?php echo get_field('about_subtitle'); ?></p>
    </div>
</header>

<div class="container py-4">

    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="position-relative">
                <img src="<?php echo get_field('profil_img'); ?>" class="img-fit-profile-main shadow-lg border border-3 border-success" alt="Kegiatan Yayasan">
                <div style="position: absolute; top: -15px; left: -15px; width: 100%; height: 100%; border: 3px solid var(--color-secondary); z-index: -1; border-radius: 10px;"></div>
            </div>
        </div>
        <div class="col-lg-6 ps-lg-5">
            <h6 class="text-success fw-bold text-uppercase ls-2"><?php echo get_field('profil_small_title'); ?></h6>
            <h2 class="fw-bold mb-3"><?php echo get_field('profil_main_title'); ?></h2>
            
            <div class="text-muted">
                <?php echo get_field('profil_desc'); ?>
            </div>

            <div class="d-flex mt-4 gap-4">
                <div class="text-center">
                    <h3 class="fw-bold text-success mb-0"><?php echo get_field('stat_1_num'); ?></h3>
                    <small class="text-muted fw-bold"><?php echo get_field('stat_1_label'); ?></small>
                </div>
                <div class="text-center border-start ps-4">
                    <h3 class="fw-bold text-success mb-0"><?php echo get_field('stat_2_num'); ?></h3>
                    <small class="text-muted fw-bold"><?php echo get_field('stat_2_label'); ?></small>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 opacity-25">

    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-success text-white fw-bold py-3"><i class="bi bi-eye-fill me-2 text-yellow"></i> VISI</div>
                <div class="card-body d-flex align-items-center justify-content-center p-4 bg-light">
                    <div class="card-text fs-5 text-center fst-italic fw-bold text-dark">
                        "<?php echo get_field('visi_content'); ?>"
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-success text-white fw-bold py-3"><i class="bi bi-list-task me-2 text-yellow"></i> MISI</div>
                <div class="card-body p-4">
                    <?php echo get_field('misi_content'); ?>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5 opacity-25">

    <div class="text-center mb-5">
        <h6 class="text-success fw-bold text-uppercase"><?php echo get_field('org_small_title'); ?></h6>
        <h2 class="fw-bold"><?php echo get_field('org_main_title'); ?></h2>
        <div style="width: 60px; height: 4px; background-color: var(--color-secondary); margin: 15px auto;"></div>
    </div>

    <div class="row justify-content-center g-4 text-center">
        
        <?php 
        for ($i = 1; $i <= 6; $i++) { 
            if( get_field('member_'.$i.'_img') ) : 
        ?>
            <div class="col-md-4 col-lg-4">
                <div class="p-3">
                    <img src="<?php echo get_field('member_'.$i.'_img'); ?>" class="img-fit-person mb-3 shadow" alt="Pengurus">
                    <h5 class="fw-bold mb-1"><?php echo get_field('member_'.$i.'_name'); ?></h5>
                    <span class="badge bg-success rounded-pill px-3"><?php echo get_field('member_'.$i.'_job'); ?></span>
                </div>
            </div>
        <?php 
            endif; 
        } 
        ?>

    </div>

</div>

<?php get_footer(); ?>