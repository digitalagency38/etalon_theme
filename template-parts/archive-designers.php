<div class="row g-3 designers-list">
	<?php
	$i = 0;
	while ( have_posts() ) :
		the_post();
		$i ++; ?>
		<div class="col-md-3">
			<div class="item" data-aos="fade-in" data-aos-delay="<?php
			echo 200 * $i; ?>">
				<a href="<?php
				the_permalink(); ?>">
					<div class="thumbnail">
						<img src="<?php
						echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
					</div>
					<?php
					the_title( '<h4>', '</h4>' ); ?>
					<div class="meta">
						<p>Опыт работы: <?php
							echo get_post_meta( $post->ID, 'experience', true ); ?> лет
							<br>Проектов: <?php
							echo get_post_meta( $post->ID, 'project_count', true ); ?></p>
					</div>
				</a>
			</div>
		</div>
	<?php
	endwhile;
	wp_reset_postdata(); ?>
</div>
