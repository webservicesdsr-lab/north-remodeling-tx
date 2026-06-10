<?php
/**
 * Nexus Shell — Page template
 */

get_header();
?>

<main id="primary" class="site-main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php
get_footer();
