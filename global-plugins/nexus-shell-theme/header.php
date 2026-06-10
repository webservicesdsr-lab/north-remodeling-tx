<?php
/**
 * Nexus Shell — Header
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
/**
 * KNX Shell global navbar.
 *
 * Rendered directly from the theme so it does not depend on wp_body_open hooks.
 */
if (function_exists('knx_shell_render_navbar')) {
    knx_shell_render_navbar();
}
?>

<div id="page" class="site">