<?php get_header(); ?>

<div id="primary" class="content-area py-5">
	<div class="page-header">
		<div class="container">
			<?php
			if ( function_exists( 'dimox_breadcrumbs' ) ) {
				dimox_breadcrumbs();
			} ?>
			<h1>
				<? the_title(); ?>
			</h1>
		</div>
	</div>
	<div class="entry-content d-flex align-items-center justify-content-center">
		<div class="container">
			<div class="error404-content text-center">
				<div class="title">4<span>0</span>4</div>
				<p>Такая страница не найдена</p>

				<a href="<?php echo get_site_url(); ?>" class="btn btn-primary">Вернуться на главную</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
