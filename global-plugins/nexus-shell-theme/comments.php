<?php
/**
 * Nexus Shell — Comments template
 */

if ( post_password_required() ) {
  return;
}
?>

<section id="comments" class="comments-area">
  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
      <?php
      $count = get_comments_number();
      echo esc_html( $count === 1 ? '1 Comment' : $count . ' Comments' );
      ?>
    </h2>

    <ol class="comment-list">
      <?php wp_list_comments(); ?>
    </ol>

    <?php the_comments_pagination(); ?>
  <?php endif; ?>

  <?php comment_form(); ?>
</section>
