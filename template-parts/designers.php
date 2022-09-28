<?php

$designers = new WP_Query( [ 'post_type' => 'designers', 'posts_per_page' => - 1 ] );

?>

<div class="row g-3 designers-list">
	<?php
	while ( $designers->have_posts() ) :
		$designers->the_post(); ?>
		<div class="col-md-3">
			<div class="item">
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
