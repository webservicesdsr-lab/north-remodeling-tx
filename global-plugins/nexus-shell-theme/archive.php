<?php
/**
 * Nexus Shell — Archive template
 */

get_header();
?>

<main id="primary" class="site-main" role="main">
  <header class="archive-header">
    <h1 class="archive-title"><?php the_archive_title(); ?></h1>
    <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
  </header>

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
        <header class="entry-header">
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>
        <div class="entry-content">
          <?php the_excerpt(); ?>
        </div>
      </article>
    <?php endwhile; ?>

    <nav class="pagination" aria-label="Archive pages">
      <?php the_posts_pagination(); ?>
    </nav>
  <?php else : ?>
    <p>No results found.</p>
  <?php endif; ?>
</main>

<?php
get_footer();
