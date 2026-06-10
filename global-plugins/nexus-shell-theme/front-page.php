<?php
/**
 * Nexus Shell - Front Page
 *
 * Owns the homepage and loads the dedicated theme homepage file directly.
 *
 * @package Nexus_Shell_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$home_page_file = get_template_directory() . '/pages/home-page.php';

if (file_exists($home_page_file)) {
    require_once $home_page_file;

    if (function_exists('knx_render_home_content')) {
        echo knx_render_home_content();
    }
}

get_footer();