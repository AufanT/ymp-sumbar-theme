<footer class="bg-dark text-white text-center py-4 mt-5">
    <div class="container">
        <h5 class="fw-bold text-yellow">Yayasan Mubaligh Profesional Sumbar</h5>
        
        <div class="mb-4 mt-3">
            <ul class="list-inline mb-0">
                <li class="list-inline-item mx-2">
                    <a href="<?php echo home_url('/'); ?>" class="text-white-50 text-decoration-none small hover-yellow">Beranda</a>
                </li>
                <li class="list-inline-item mx-2"><span class="text-white-50 small">|</span></li>
                <li class="list-inline-item mx-2">
                    <a href="<?php echo home_url('/tentang-kami'); ?>" class="text-white-50 text-decoration-none small hover-yellow">Tentang Kami</a>
                </li>
                <li class="list-inline-item mx-2"><span class="text-white-50 small">|</span></li>
                <li class="list-inline-item mx-2">
                    <a href="<?php echo home_url('/pendaftaran'); ?>" class="text-white-50 text-decoration-none small hover-yellow">Pendaftaran</a>
                </li>
                <li class="list-inline-item mx-2"><span class="text-white-50 small">|</span></li>
                <li class="list-inline-item mx-2">
                    <a href="<?php echo home_url('/hubungi-kami'); ?>" class="text-white-50 text-decoration-none small hover-yellow">Hubungi Kami</a>
                </li>
            </ul>
        </div>

        <?php 
            $home_id = get_option('page_on_front'); 

            $fb = get_field('sosmed_fb', $home_id);
            $ig = get_field('sosmed_ig', $home_id);
            $yt = get_field('sosmed_yt', $home_id);
            $tt = get_field('sosmed_tiktok', $home_id);

            if( $fb || $ig || $yt || $tt ) :
        ?>
        <div class="my-4">
            <span class="d-block text-white mb-3 fw-bold small ls-1">Follow Media Sosial Kami</span>
            <div class="d-flex justify-content-center gap-3">
                
                <?php if($fb): ?>
                <a href="<?php echo $fb; ?>" target="_blank" class="social-btn" aria-label="Facebook">
                    <i class="bi bi-facebook"></i>
                </a>
                <?php endif; ?>
                
                <?php if($ig): ?>
                <a href="<?php echo $ig; ?>" target="_blank" class="social-btn" aria-label="Instagram">
                    <i class="bi bi-instagram"></i>
                </a>
                <?php endif; ?>
                
                <?php if($yt): ?>
                <a href="<?php echo $yt; ?>" target="_blank" class="social-btn" aria-label="YouTube">
                    <i class="bi bi-youtube"></i>
                </a>
                <?php endif; ?>

                <?php if($tt): ?>
                <a href="<?php echo $tt; ?>" target="_blank" class="social-btn" aria-label="TikTok">
                    <i class="bi bi-tiktok"></i>
                </a>
                <?php endif; ?>

            </div>
        </div>
        <?php endif; ?>
        <a href="https://maps.app.goo.gl/zdGihT5dXA7sTtwt9" class="small text-white mb-2" target="_blank">Komplek Bumi Mas, Kuranji, Padang City, West Sumatra 25175</a>
        <p class="mb-0 small">&copy; <?php echo date('Y'); ?> YMP Sumatera Barat. Hak Cipta Dilindungi.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>