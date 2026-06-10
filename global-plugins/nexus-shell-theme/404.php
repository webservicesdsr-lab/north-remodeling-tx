<?php
/**
 * Nexus Shell — 404
 */

get_header();
?>

<div class="nexus-wrap">
  <div class="nexus-card">
    <div class="icon">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/nexus-404.svg' ); ?>" alt="404" />
    </div>
    <h1>Page not found</h1>
    <p>That route doesn’t exist, or it’s been moved.</p>
    <div class="actions">
      <a class="home" href="<?php echo esc_url( home_url('/') ); ?>">Go Home</a>
      <a class="back" href="javascript:history.back()">Go Back</a>
    </div>
  </div>
</div>

<?php
get_footer();
