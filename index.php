<?php get_header(); ?>

<section class="bg-success text-white py-5 text-center">
    <div class="container">
        <h1 class="fw-bold display-5">
            <?php 
            if ( is_category() ) {
                echo 'Kategori: '; single_cat_title(); 
            } else {
                echo 'Arsip Berita & Artikel';
            }
            ?>
        </h1>
        <p class="lead opacity-75 mb-0">Update kegiatan dan informasi terbaru YMP Sumbar.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    
                    <div class="col-md-4">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark h-100">
                            <div class="card h-100 border-0 shadow-sm transition-hover">
                                <div class="overflow-hidden position-relative">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url('medium_large'); ?>" class="img-fit-news" alt="<?php the_title(); ?>">
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/download.png" class="img-fit-news bg-light" style="object-fit: contain;" alt="Default Image">                                    <?php endif; ?>

                                    <?php
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo '<span class="position-absolute top-0 start-0 bg-warning text-dark fw-bold px-3 py-1 m-2 rounded small">' . esc_html( $categories[0]->name ) . '</span>';
                                    }
                                    ?>
                                </div>
                                
                                <div class="card-body">
                                    <div class="text-muted small mb-2">
                                        <i class="bi bi-calendar me-1"></i> <?php echo get_the_date('d M Y'); ?>
                                    </div>
                                    <h5 class="card-title fw-bold mb-2"><?php the_title(); ?></h5>
                                    <p class="card-text text-muted small">
                                        <?php echo wp_trim_words( get_the_excerpt(), 12, '...' ); ?>
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-0 pb-3">
                                    <span class="text-success fw-bold small">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endwhile; ?>
                
                <div class="col-12 mt-5">
                    <nav aria-label="Page navigation">
                        <div class="pagination justify-content-center gap-2">
                            <?php 
                            echo paginate_links( array(
                                'prev_text' => '<span class="btn btn-outline-success">← Sebelumnya</span>',
                                'next_text' => '<span class="btn btn-outline-success">Selanjutnya →</span>',
                                'type'      => 'plain', 
                            ) ); 
                            ?>
                        </div>
                    </nav>
                </div>

            <?php else : ?>
                <div class="col-12 text-center py-5">
                    <i class="bi bi-folder-x display-1 text-muted mb-3"></i>
                    <h3>Belum ada berita ditemukan.</h3>
                    <a href="<?php echo home_url(); ?>" class="btn btn-success mt-3">Kembali ke Beranda</a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>