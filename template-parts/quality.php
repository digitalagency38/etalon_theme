<!-- Качественная и модная мебель -->
<section class="favorites" data-aos="fade-in" data-aos-delay="200">
	<div class="container">
		<div class="section-header d-flex align-items-center">
			<h3>Качественная и модная мебель</h3>
			<a href="<?php echo get_site_url( '/catalog' ); ?>" class="btn btn-primary ms-auto d-none d-md-block">Смотреть
				всё</a>
		</div>
		<div class="row g-3">
			<?php

			$category_ids = get_field( 'category_favorites', get_option( 'page_on_front' ) );
			$terms        = get_terms( [ 'taxonomy' => 'product_cat', 'include' => $category_ids ] );
			?>
			<div class="col-md-11">
				<div class="row g-3">
					<div class="col-md-24 first">
						<?php if ( $terms[0] ) {
							get_template_part( 'template-parts/quality-card', null, [
									'bg'    => get_field( 'photo', $terms[0] ),
									'link'  => get_term_link( $terms[0] ),
									'title' => get_field( 'title', $terms[0] ) ? get_field( 'title', $terms[0] ) : $terms[0]->name,
									'price' => get_field( 'price', $terms[0] ),
							] );
						} ?>
					</div>
					<div class="col-md-12 vertical">
						<?php if ( $terms[1] ) {
							get_template_part( 'template-parts/quality-card', null, [
									'bg'    => get_field( 'photo', $terms[1] ),
									'link'  => get_term_link( $terms[1] ),
									'title' => get_field( 'title', $terms[1] ) ? get_field( 'title', $terms[1] ) : $terms[1]->name,
									'price' => get_field( 'price', $terms[1] ),
							] );
						} ?>
					</div>
					<div class="col-md-12 vertical">
						<?php if ( $terms[2] ) {
							get_template_part( 'template-parts/quality-card', null, [
									'bg'    => get_field( 'photo', $terms[2] ),
									'link'  => get_term_link( $terms[2] ),
									'title' => get_field( 'title', $terms[2] ) ? get_field( 'title', $terms[2] ) : $terms[2]->name,
									'price' => get_field( 'price', $terms[2] ),
							] );
						} ?>
					</div>
				</div>
			</div>
			<div class="col-md-13 d-flex flex-column align-items-stretch">
				<?php if ( $terms[3] ) {
					get_template_part( 'template-parts/quality-card', null, [
							'bg'    => get_field( 'photo', $terms[3] ),
							'link'  => get_term_link( $terms[3] ),
							'title' => get_field( 'title', $terms[3] ) ? get_field( 'title', $terms[3] ) : $terms[3]->name,
							'price' => get_field( 'price', $terms[3] ),
							'class' => 'big1'
					] );
				} ?>

				<?php if ( $terms[4] ) {
					get_template_part( 'template-parts/quality-card', null, [
							'bg'    => get_field( 'photo', $terms[4] ),
							'link'  => get_term_link( $terms[4] ),
							'title' => get_field( 'title', $terms[4] ) ? get_field( 'title', $terms[4] ) : $terms[4]->name,
							'price' => get_field( 'price', $terms[4] ),
							'class' => 'big2'
					] );
				} ?>

			</div>
		</div>
	</div>
</section>
