<?php
/**
 * sbs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sbs
 */

/**
 * Theme Settings
 */
require get_template_directory() . '/inc/theme.php';

/**
 * Tools
 */
require get_template_directory() . '/inc/tools.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * CPT Settings
 */
require get_template_directory() . '/inc/cpt.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * ACF Settings
 */
require get_template_directory() . '/inc/acf.php';




