<?php

if ( get_field( 'categories' ) ) {
	return;
}
?>

<div class="container">
	<?php
    echo get_field( 'categories' );
	$terms = get_terms( [
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
		'parent'     => 0,
		'exclude'    => [ 15 ],
		'include'    => get_field( 'categories' )
	] );

	?>

    <div class="row g-5 catalog__categories-list">
		<?php
		$i = 0;
		foreach ( $terms as $term ) {
			$image_id      = get_term_meta( $term->term_id, 'thumbnail_id', true );
			$thumbnail_url = wp_get_attachment_image_url( $image_id, 'medium' );
			$i ++;
			?>

            <div class="col-md-12">
                <div class="card"
				     <?php if ( get_field( 'photo', $term ) ) : ?>style="background-image: url(<?php echo get_field( 'photo', $term ); ?>);"<?php endif; ?>>
                    <img src="<?php echo get_field( 'photo', $term ); ?>" alt="" class="d-md-none ">
                    <div class="card-body">
                        <div class="h4 title mb-4">
                            <a href="<?php echo get_term_link( $term->term_id ); ?>"><?php echo $term->name; ?></a>
                        </div>

						<?php $child_terms = get_terms( [
							'taxonomy'   => 'product_cat',
							'hide_empty' => false,
							'parent'     => $term->term_id,
						] ); ?>

                        <ul class="child-terms">
							<?php foreach ( $child_terms as $child_term ) { ?>
                                <li>
                                    <a href="<?php echo get_term_link( $child_term->term_id ); ?>"><?php echo $child_term->name; ?></a>
                                </li>
							<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

			<?php
		} ?>
    </div>
</div>