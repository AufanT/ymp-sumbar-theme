<?php get_header(); ?>

<?php 
$hero_bg = get_field('hero_bg'); 
if($hero_bg): 
?>
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 85, 50, 0.85), rgba(0, 85, 50, 0.75)), url('<?php echo $hero_bg; ?>') !important;
        background-size: cover;
        background-position: center bottom !important;
        background-repeat: no-repeat;
    }
</style>
<?php endif; ?>
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">
            <?php 
            $judul_putih = get_field('hero_judul_putih');
            if(!$judul_putih) { $judul_putih = "Membangun Umat,"; } 

            $judul_kuning = get_field('hero_judul_kuning');
            if(!$judul_kuning) { $judul_kuning = "Menebar Manfaat"; } 

            echo $judul_putih . ' <span class="text-yellow">' . $judul_kuning . '</span>';
            ?>
        </h1>
        <p class="lead mb-4 opacity-75">
            <?php echo get_field('hero_deskripsi'); ?>
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#kegiatan" class="btn btn-warning btn-lg px-4 shadow">Lihat Program</a>
            
            <a href="<?php echo home_url('/pendaftaran'); ?>" class="btn btn-outline-light btn-lg px-4">Ikuti Kegiatan</a>
        </div>
    </div>
</section>

<section id="kegiatan" class="py-5">
    <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-success fw-bold text-uppercase ls-2">Aktivitas Kami</h6>
                <h2 class="fw-bold">Program & Kegiatan Unggulan</h2>
                <div style="width: 60px; height: 4px; background-color: var(--color-secondary); margin: 10px auto;">
                </div>
            </div>

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card h-100 position-relative">
                        <img src="<?php echo get_field('prog1_img'); ?>" class="img-fit-program" alt="Program 1">

                        <div class="card-body">
                            <div class="mb-2">
                                <span class="badge bg-success"><?php echo get_field('prog1_cat'); ?></span>
                            </div>
                            <h5 class="card-title fw-bold"><?php echo get_field('prog1_title'); ?></h5>
                            <p class="card-text text-muted small"><?php echo get_field('prog1_desc'); ?></p>

                            <a href="#" class="stretched-link text-success fw-bold text-decoration-none small"
                                data-bs-toggle="modal" data-bs-target="#modalDidik">
                                Lihat Detail <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 position-relative">
                        <img src="<?php echo get_field('prog2_img'); ?>" class="img-fit-program" alt="Program 1">
                            
                        <div class="card-body">
                            <div class="mb-2">
                                <span class="badge bg-success"><?php echo get_field('prog2_cat'); ?></span>
                            </div>
                            <h5 class="card-title fw-bold"><?php echo get_field('prog2_title'); ?></h5>
                            <p class="card-text text-muted small"><?php echo get_field('prog2_desc'); ?></p>

                            <a href="#" class="stretched-link text-success fw-bold text-decoration-none small"
                                data-bs-toggle="modal" data-bs-target="#modalSosial">
                                Lihat Detail <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 position-relative">
                        <img src="<?php echo get_field('prog3_img'); ?>" class="img-fit-program" alt="Program 1">
                            
                        <div class="card-body">
                            <div class="mb-2">
                                <span class="badge bg-success"><?php echo get_field('prog3_cat'); ?></span>
                            </div>
                            <h5 class="card-title fw-bold"><?php echo get_field('prog3_title'); ?></h5>
                            <p class="card-text text-muted small"><?php echo get_field('prog3_desc'); ?></p>

                            <a href="#" class="stretched-link text-success fw-bold text-decoration-none small"
                                data-bs-toggle="modal" data-bs-target="#modalDigital">
                                Lihat Detail <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</section>

<section id="berita" class="py-5 bg-light">
    <div class="container">

        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h6 class="text-success fw-bold text-uppercase ls-2">Kabar Yayasan</h6>
                <h2 class="fw-bold">Berita & Artikel</h2>
                <div style="width: 60px; height: 4px; background-color: var(--color-secondary); margin-top: 10px;"></div>
            </div>
            <a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="btn btn-outline-success btn-sm d-none d-md-inline-block">Lihat Semua</a>        </div>

        <div class="row g-4">

            <?php
            $news_args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,      
                'order'          => 'DESC', 
                'orderby'        => 'date'
            );
            $news_query = new WP_Query($news_args);
        
            if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
            ?>

                <div class="col-md-4">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark h-100">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="overflow-hidden">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium_large'); ?>" class="img-fit-news" alt="<?php the_title(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png" class="img-fit-news" style="object-fit: contain; padding: 20px;">
                                <?php endif; ?>
                            </div>
                                
                            <div class="card-body">
                                <div class="mb-2">
                                    <?php
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo '<span class="badge bg-success">' . esc_html( $categories[0]->name ) . '</span>';
                                    }
                                    ?>
                                    <small class="text-muted ms-2"><?php echo get_the_date('d M Y'); ?></small>
                                </div>
                                
                                <h5 class="card-title fw-bold"><?php the_title(); ?></h5>
                                
                                <div class="card-text text-muted small">
                                    <?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                                
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <p class="text-center">Belum ada berita terbaru.</p>
            <?php endif; ?>
            
        </div>
    </div>

</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-6 mb-4">
                <h3 class="fw-bold text-success mb-3">Galeri Video</h3>
                <div class="card border-0 shadow p-2">
                    <div class="ratio ratio-16x9 rounded overflow-hidden">
                        <?php 
                        $video = get_field('video_youtube');

                        if($video) {
                            echo $video;
                        } else {
                            echo '<iframe src="https://www.youtube.com/embed/DMjTjSPHm1g" allowfullscreen></iframe>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="fw-bold text-success mb-0">Dokumentasi Foto</h3>
                </div>
                
                <div class="row g-2">
                    <div class="col-6">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto1">
                            <img src="<?php echo get_field('galeri_1'); ?>" class="img-fit-gallery shadow-sm" alt="Dokumentasi 1">
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto2">
                            <img src="<?php echo get_field('galeri_2'); ?>" class="img-fit-gallery shadow-sm" alt="Dokumentasi 2">
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto3">
                            <img src="<?php echo get_field('galeri_3'); ?>" class="img-fit-gallery shadow-sm" alt="Dokumentasi 3">
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto4">
                            <img src="<?php echo get_field('galeri_4'); ?>" class="img-fit-gallery shadow-sm" alt="Dokumentasi 4">
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<div class="modal fade" id="modalDidik" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold"><i class="bi bi-book-half me-2"></i> Detail Program</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?php echo get_field('prog1_img'); ?>" class="w-100 rounded mb-3" style="height: 300px; object-fit: cover;">
                <h4 class="fw-bold text-success"><?php echo get_field('prog1_title'); ?></h4>
                <div class="mt-3"><?php echo get_field('prog1_modal'); ?></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                
                <a href="<?php echo get_permalink( 194 ); ?>" class="btn btn-warning fw-bold px-4">
                    Ikuti
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSosial" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title fw-bold"><i class="bi bi-heart-fill me-2"></i> Detail Program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?php echo get_field('prog2_img'); ?>" class="w-100 rounded mb-3" style="height: 300px; object-fit: cover;">
                <h4 class="fw-bold text-dark"><?php echo get_field('prog2_title'); ?></h4>
                <div class="mt-3"><?php echo get_field('prog2_modal'); ?></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                
                <a href="<?php echo get_permalink( 194 ); ?>" class="btn btn-success fw-bold px-4">
                    Ikuti
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDigital" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title fw-bold"><i class="bi bi-wifi me-2"></i> Detail Program</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="<?php echo get_field('prog3_img'); ?>" class="w-100 rounded mb-3" style="height: 300px; object-fit: cover;">
                <h4 class="fw-bold text-success"><?php echo get_field('prog3_title'); ?></h4>
                <div class="mt-3"><?php echo get_field('prog3_modal'); ?></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                
                <a href="<?php echo get_permalink( 194 ); ?>" class="btn btn-danger fw-bold px-4">
                    <i class="bi bi-pencil-square me-1"></i> Ikuti
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFoto1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 p-0 mb-2">
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img src="<?php echo get_field('galeri_1'); ?>" class="img-fluid rounded shadow-lg">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFoto2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 p-0 mb-2">
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img src="<?php echo get_field('galeri_2'); ?>" class="img-fluid rounded shadow-lg">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFoto3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 p-0 mb-2">
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img src="<?php echo get_field('galeri_3'); ?>" class="img-fluid rounded shadow-lg">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFoto4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0 p-0 mb-2">
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img src="<?php echo get_field('galeri_4'); ?>" class="img-fluid rounded shadow-lg">
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>