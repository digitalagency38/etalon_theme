<?php
$portfolio_simple = get_field('portfolioall');
if( $portfolio_simple ):  ?>
	<div class="dis__tabs">
		<div class="dis__block__tab port_block">
			<div class="dis__block--tit">Портфолио<span></span></div>
			<div class="dis__block--content">
				<div class="simple_blocks">
					<?php foreach( $portfolio_simple as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
					<?php setup_postdata($post);?>
					<a href="<?php echo get_permalink(); ?>" class="simple_block">
						<span class="simple_block__img">
							<img src="<?php echo get_field('img'); ?>" alt="<?php the_title(); ?>">
						</span>
						<span class="simple_block__title"><?php the_title(); ?></span>
					</a>
					<?php endforeach; ?>
				</div>
				<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
				<a href="/port" class="dis__block--link">Смотреть всё</a>
			</div>
		</div>
	</div>
<?php endif;?>