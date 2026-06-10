<?php
/**
 * Nexus Shell — Theme setup
 */

function nexus_shell_setup() {
  add_theme_support('title-tag');
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script',
  ));

  register_nav_menus(array(
    'primary' => __('Primary Menu', 'nexus-shell'),
  ));
}
add_action('after_setup_theme', 'nexus_shell_setup');

function nexus_shell_enqueue_styles() {
  wp_enqueue_style('nexus-shell-style', get_stylesheet_uri(), array(), '1.1.0');

  wp_enqueue_style(
    'nexus-shell-fontawesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
    array(),
    '6.5.1'
  );
}
add_action('wp_enqueue_scripts', 'nexus_shell_enqueue_styles');

/**
 * Print global Nexus UI variables.
 */
function nexus_shell_print_global_vars() {
  $theme = get_option('knx_ui_theme', array());

  if (!is_array($theme)) {
    $theme = array();
  }

  $primary = !empty($theme['primary']) ? sanitize_hex_color($theme['primary']) : '#0B793A';
  $bg      = !empty($theme['bg']) ? sanitize_hex_color($theme['bg']) : '#f7f8f9';
  $card    = !empty($theme['card']) ? sanitize_hex_color($theme['card']) : '#ffffff';

  if (empty($primary)) {
    $primary = '#0B793A';
  }

  if (empty($bg)) {
    $bg = '#f7f8f9';
  }

  if (empty($card)) {
    $card = '#ffffff';
  }

  echo "\n" . '<style id="nexus-shell-global-vars">
    :root {
      --nxs-primary: ' . esc_html($primary) . ';
      --nxs-bg: ' . esc_html($bg) . ';
      --nxs-card: ' . esc_html($card) . ';
      --nxs-text: #111827;
      --nxs-muted: #6b7280;
    }
  </style>' . "\n";
}
add_action('wp_head', 'nexus_shell_print_global_vars', 1);
add_action('admin_head', 'nexus_shell_print_global_vars', 1);

add_action('after_setup_theme', function() {
  show_admin_bar(false);
});