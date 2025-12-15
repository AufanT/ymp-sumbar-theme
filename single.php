<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="container py-5">
    
    <nav aria-label="breadcrumb" class="breadcrumb-custom">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Beranda</a></li>
            <li class="breadcrumb-item">
                <a href="<?php echo get_post_type_archive_link( 'post' ); ?>">Berita</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo wp_trim_words( get_the_title(), 5 ); ?></li>
        </ol>
    </nav>

    <div class="article-container">
        
        <div class="mb-4">
            <div class="d-flex flex-wrap align-items-center mb-2">
                <?php
                $categories = get_the_category();
                foreach($categories as $cat) {
                    echo '<span class="badge bg-success badge-category me-1">' . $cat->name . '</span>';
                }
                ?>
            </div>
            
            <h1 class="article-title fw-bold"><?php the_title(); ?></h1>
            
            <div class="article-meta d-flex align-items-center flex-wrap text-muted small">

                <span class="me-3"><i class="bi bi-calendar me-1"></i> <?php echo get_the_date('d M Y'); ?></span>

                <?php 
                $lokasi = get_field('post_location'); 
                if( $lokasi ) :
                ?>
                    <span class="me-3">
                        <i class="bi bi-geo-alt-fill me-1"></i> <?php echo $lokasi; ?>
                    </span>
                <?php endif; ?>
                
                <span class="me-3"><i class="bi bi-person me-1"></i> <?php the_author(); ?></span>
                
                <span class="me-3">
                    <i class="bi bi-clock me-1"></i>
                    <?php 
                        $content = get_post_field('post_content', $post->ID);
                        $word_count = str_word_count(strip_tags($content));
                        $reading_time = ceil($word_count / 200);
                        echo $reading_time . ' menit membaca';
                    ?>
                </span>
            </div>
        </div>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image mb-4">
                <img src="<?php the_post_thumbnail_url('full'); ?>" class="w-100 rounded" style="object-fit: cover; max-height: 500px;" alt="<?php the_title(); ?>">
            </div>
        <?php endif; ?>

        <article class="article-content">
            <?php the_content(); ?>
        </article>

        <div class="share-buttons mt-5 pt-4 border-top">
            <p class="d-inline me-3 fw-bold">Bagikan:</p>
            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="bi bi-facebook"></i> Facebook</a>
            <a href="#" class="btn btn-outline-info btn-sm me-2"><i class="bi bi-twitter"></i> Twitter</a>
            <a href="https://wa.me/?text=<?php the_permalink(); ?>" target="_blank" class="btn btn-outline-success btn-sm"><i class="bi bi-whatsapp"></i> WhatsApp</a>
        </div>

    </div>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>