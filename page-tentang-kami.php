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
        $args = array(
            'post_type'      => 'pengurus', 
            'posts_per_page' => -1,       
            'orderby'        => 'date',  
            'order'          => 'ASC'
        );
        
        $pengurus_query = new WP_Query($args);

        if( $pengurus_query->have_posts() ): 
            while( $pengurus_query->have_posts() ): $pengurus_query->the_post();
                
                $nama = get_the_title(); 
                $deskripsi = get_the_content(); 
                $foto_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                
                $jabatan = get_field('jabatan_pengurus'); 
                $fb = get_field('link_fb_pengurus');
                $ig = get_field('link_ig_pengurus');
                
                $modal_id = 'modalPengurus_' . get_the_ID();
        ?>

            <div class="col-6 col-md-4 col-lg-3">
                <div class="p-3 h-100 group-card">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo $modal_id; ?>" class="text-decoration-none text-dark">
                        <div class="position-relative d-inline-block">
                            <?php if($foto_url): ?>
                                <img src="<?php echo $foto_url; ?>" class="img-fit-person mb-3 shadow transition-hover" alt="<?php echo $nama; ?>">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-user.png" class="img-fit-person mb-3 shadow" alt="Default">
                            <?php endif; ?>
                            
                            <span class="position-absolute bottom-0 end-0 bg-warning text-dark rounded-circle p-1 shadow-sm border border-white" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-info-lg small fw-bold"></i>
                            </span>
                        </div>
                        
                        <h5 class="fw-bold mb-1 fs-6"><?php echo $nama; ?></h5>
                        <span class="badge bg-success rounded-pill px-3 small fw-normal"><?php echo $jabatan; ?></span>
                    </a>
                </div>
            </div>

            <div class="modal fade" id="<?php echo $modal_id; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow-lg overflow-hidden">
                        
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title fw-bold"><i class="bi bi-person-lines-fill me-2 text-yellow"></i> Detail Profil</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body text-start p-4">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0">
                                    <?php if($foto_url): ?>
                                        <img src="<?php echo $foto_url; ?>" class="rounded-circle border border-3 border-warning" style="width: 80px; height: 80px; object-fit: cover;">
                                    <?php endif; ?>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="fw-bold mb-0 text-success"><?php echo $nama; ?></h4>
                                    <p class="text-muted mb-0 small fw-bold text-uppercase ls-1"><?php echo $jabatan; ?></p>
                                </div>
                            </div>

                            <div class="bg-light p-3 rounded mb-4 border-start border-4 border-success">
                                <h6 class="fw-bold text-dark mb-2">Tentang Beliau:</h6>
                                <div class="text-muted small mb-0" style="line-height: 1.6;">
                                    <?php echo $deskripsi ? wpautop($deskripsi) : 'Belum ada deskripsi.'; ?>
                                </div>
                            </div>

                            <?php if($fb || $ig): ?>
                            <div class="text-center mb-3">
                                <p class="small text-muted mb-2">Ikuti Media Sosial Beliau:</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <?php if($fb): ?><a href="<?php echo $fb; ?>" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle"><i class="bi bi-facebook"></i></a><?php endif; ?>
                                    <?php if($ig): ?><a href="<?php echo $ig; ?>" target="_blank" class="btn btn-outline-danger btn-sm rounded-circle"><i class="bi bi-instagram"></i></a><?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="modal-footer bg-light justify-content-center">
                            <?php 
                                $page_kontak = get_page_by_path('hubungi-kami');
                                
                                $kontak_id = $page_kontak ? $page_kontak->ID : 0;

                                $admin_wa = get_field('contact_wa', $kontak_id); 
                                
                                if(!$admin_wa) $admin_wa = "628123456789"; 
                                
                                $wa_link = preg_replace('/[^0-9]/', '', $admin_wa);
                                $pesan = "Assalamualaikum Admin, saya ingin menanyakan informasi / mengundang ustadz *" . $nama . "* dari YMP Sumbar.";
                            ?>
                            <a href="https://wa.me/<?php echo $wa_link; ?>?text=<?php echo urlencode($pesan); ?>" target="_blank" class="btn btn-success w-100 fw-bold shadow-sm">
                                <i class="bi bi-whatsapp me-2"></i> Hubungi Admin Terkait Beliau
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <?php 
            endwhile; 
            wp_reset_postdata(); 
        else: 
        ?>
            <div class="col-12 py-5">
                <p class="text-muted">Belum ada data pengurus yang diinput.</p>
            </div>
        <?php endif; ?>

    </div>

</div>

<?php get_footer(); ?>