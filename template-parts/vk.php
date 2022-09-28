<?php
$id = get_queried_object_id();
$vkb = get_field( 'test2', $id );
?>
<section class="news news2" data-aos="fade-in" data-aos-delay="200">
	<div class="container">
          <div class="section-header d-flex align-items-center">
            <h3><?php echo $vkb['title']; ?></h3>
              <a href="<?php echo $vkb['link']; ?>" class="btn btn-primary ms-auto d-none d-md-block">Перейти в ВКонтакте</a>
      	</div>
	<?php $c_d_f = ($vkb['catalog']); ?>
		<div class="swiper">
			<div class="swiper-wrapper">
			<?php if (is_array($c_d_f)) {
				foreach ($c_d_f as $e) { ?>
              <div class="swiper-slide">
                <div class="card">
                  <?php echo $e['txt']; ?>
                </div>
              </div>
				<?php } ?>
			<?php } ?>
			</div>
			<div class="swiper-pagination-block d-flex align-items-center justify-content-center">
				<div class="news-swiper-button-prev me-auto"></div>
				<div class="news-swiper-pagination"></div>
				<div class="news-swiper-button-next ms-auto"></div>
			</div>
		</div>

		<a href="<?php echo $vkb['link']; ?>" class="btn btn-primary ms-auto d-md-none w-100">Перейти в ВКонтакте</a>

	</div>
</section>