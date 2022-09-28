<div class="card <?php echo $args['class']; ?>">
	<div class="card-img-top"
		 style="background-image: url(<?php echo $args['bg']; ?>);">
	</div>
	<div class="card-body">
		<a href="<?php echo $args['link']; ?>"><?php echo $args['title']; ?></a>
		<?php if ( $args['price'] ) : ?>
			<div class="price"><span>от</span> <?php echo number_format( $args['price'], 0, ' ', ' ' ); ?>
				<span>Р.</span>
			</div>
		<?php endif; ?>
		<br>
		<a href="<?php echo $args['link']; ?>" class="btn btn-primary">Перейти</a>
	</div>
</div>
