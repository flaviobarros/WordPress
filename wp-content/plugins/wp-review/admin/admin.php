<?php
/**
 * Admin functions for this plugin.
 *
 * @since     1.0
 * @copyright Copyright (c) 2013, MyThemesShop
 * @author    MyThemesShop
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Register admin.css file. */
add_action( 'admin_enqueue_scripts', 'wp_review_admin_style' );

/**
 * Register custom style for the meta box.
 *
 * @since 1.0
 */
function wp_review_admin_style( $hook_suffix ) {
	wp_enqueue_style( 'wp-review-admin-style', WP_REVIEW_ASSETS . 'css/admin.css', array( 'wp-color-picker' ) );
	wp_enqueue_script(
		'wp-review-admin-script',
		WP_REVIEW_ASSETS . 'js/admin.js',
		array( 'wp-color-picker', 'jquery', 'jquery-ui-core', 'jquery-ui-slider', 'jquery-ui-sortable' ),
		false,
		true
	);

	wp_enqueue_style(
		'wp-review-admin-ui-css',
		'//ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/themes/smoothness/jquery-ui.css',
		false,
		null,
		false
	);

	// Load frontend css but not on the post editor screen
	if ( stripos('post.php', $hook_suffix) === false ) {
		wp_enqueue_style( 'wp_review-style', trailingslashit( WP_REVIEW_ASSETS ) . 'css/wp-review.css', array(), WP_REVIEW_PLUGIN_VERSION, 'all' );
	}
}
?>