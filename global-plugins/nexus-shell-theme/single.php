<?php
/**
 * Nexus Shell — Single post template
 */

get_header();
?>

<main id="primary" class="site-main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
      <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <footer class="entry-footer">
        <?php the_tags('<p class="tags">Tags: ', ', ', '</p>'); ?>
      </footer>

      <?php
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
      ?>
    </article>
  <?php endwhile; ?>
</main>

<?php
get_footer();
