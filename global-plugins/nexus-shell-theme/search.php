<?php
/**
 * Nexus Shell — Search results template
 */

get_header();
?>

<main id="primary" class="site-main" role="main">
  <header class="search-header">
    <h1 class="search-title">Search results for: <?php echo esc_html( get_search_query() ); ?></h1>
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

    <nav class="pagination" aria-label="Search pages">
      <?php the_posts_pagination(); ?>
    </nav>
  <?php else : ?>
    <p>No results found.</p>
  <?php endif; ?>
</main>

<?php
get_footer();
