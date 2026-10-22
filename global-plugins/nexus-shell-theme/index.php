<?php
/**
 * North Texas Remodel — Index Entry Point
 *
 * Main entry file for the North Texas Remodel frontend system.
 * Routes to custom NTR pages based on query parameters.
 */

get_header();

// Detect hub/company request
$hub_slug = isset( $_GET['hub'] ) ? sanitize_title( $_GET['hub'] ) : '';

// Template directory path
$template_dir = get_template_directory();
$ntr_pages_dir = $template_dir . '/ntr-pages/';

// Determine which page to load
if ( ! empty( $hub_slug ) ) {
  // Company profile mode
  $page_file = $ntr_pages_dir . 'company-profile.php';
  $fallback_title = 'Company Profile';
  $fallback_message = 'Company profile page is being built.';
} else {
  // Default landing page
  $page_file = $ntr_pages_dir . 'explore-home.php';
  $fallback_title = 'Welcome to North Texas Remodel';
  $fallback_message = 'Home page is being configured.';
}
?>

<main id="primary" class="site-main" role="main">
  <?php
  // Load the appropriate NTR page
  if ( file_exists( $page_file ) ) {
    include $page_file;
  } else {
    // Graceful fallback if file is missing
    ?>
    <div class="ntr-empty-state">
      <div class="ntr-empty-card">
        <h1><?php echo esc_html( $fallback_title ); ?></h1>
        <p><?php echo esc_html( $fallback_message ); ?></p>
        <div class="ntr-empty-actions">
          <a class="btn btn-primary" href="<?php echo esc_url( home_url('/') ); ?>">Go Home</a>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
</main>

<?php
get_footer();
