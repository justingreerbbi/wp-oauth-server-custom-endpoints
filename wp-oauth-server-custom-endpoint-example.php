<?php
/**
 * Plugin Name: WP OAuth Server Custom Endpoints
 * Plugin Url: https://wp-oauth.com
 * Author: Justin Greer <justin@justin-greer.com>
 * Version: 1.0.0
 */

/**
 * EXAMPLES
 *
 * 1. WP REST API Route with authentication
 * 2. Custom Login Form for Auth Code authentication
 *
 * @author Justin Greer <justin@justin-greer.com>
 *
 * @package WP OAuth Server
 */
add_action( 'rest_api_init', function () {
	register_rest_route( 'oauth2/', '/test/(?P<id>\d+)', array(
		'methods'             => 'GET',
		'callback'            => 'wp_oauth_my_function',
		//'permission_callback' => function () {
		//	return current_user_can( 'manage_options' );
		//}
	) );
} );

function wp_oauth_my_function() {
	$user_id = get_current_user_id();

	return array(
		'status'  => true,
		'message' => 'Congrats! You successfully made an authenticated request to a protected endpoint',
		'user_id' => $user_id
	);
}