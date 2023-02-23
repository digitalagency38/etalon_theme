<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shumof
 */

$type = get_post_type();

?>
	<div id="primary" class="content-area py-5">
      <div class="container">
        <?php
        if ( function_exists( 'dimox_breadcrumbs' ) ) {
          dimox_breadcrumbs();
        } ?>

        <article>
			<?php
			the_content();
			?>
        </article>

      </div>
	</div>