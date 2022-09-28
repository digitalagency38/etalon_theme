<?php get_header(); ?>
<?php get_template_part( 'template-parts/main-slider' ); ?>
<?php get_template_part( 'template-parts/news' ); ?>
<?php get_template_part( 'template-parts/quality' ); ?>
<?php get_template_part( 'template-parts/sales' ); ?>
<?php get_template_part( 'template-parts/shops' ); ?>
<!-- Удаленный подбор -->

<?php
	$id = get_queried_object_id();
	$form = get_field( 'forma', $id );
?>
<section class="remote-search">
	<div class="container h-100">
		<div class="row h-100">
			<div class="col-md-12 px-md-3 d-flex justify-content-center flex-column">
				<h3><?= $form['zagolovok_formy']; ?></h3>
				<p><?= $form['tekst_formy']; ?></p>
				<?php
				
					echo do_shortcode( $form['cf7_shortcode'] );

				?>
			</div>
			<div class="col-md-12">
				<div class="fluid-right">
					<!--<div class="fluid-right-content"
						 style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/remote-search.jpg"></div>-->
                  <div class="fluid-right-content"
						 style="background-image: url(<?php echo $form['kartinka_formy']; ?>"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/vk' ); ?>
<?php get_template_part( 'template-parts/map' ); ?>
<?php get_footer(); ?>

