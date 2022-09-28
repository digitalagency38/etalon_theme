<?php
  $id = get_queried_object_id();
  if ( is_archive() ) {
    $term   = $wp_query->get_queried_object();
    $entity2 = $term;
  } else {
    $entity2 = $post;
  }
?>
<?php if (get_field( 'form_top', $entity2 )): ?>
  <div class="block_form_list">
    <div class="block_form_list__title"><?= get_field( 'zagolovok_title', $entity2 ); ?></div>
    <div class="block_form_list__text"><?= get_field( 'zagolovok_text', $entity2 ); ?></div>
    <div class="block_form_list__form">
      <?php echo do_shortcode(get_field( 'form_top', $entity2 ))?>
    </div>
  </div>
<?php endif ?>