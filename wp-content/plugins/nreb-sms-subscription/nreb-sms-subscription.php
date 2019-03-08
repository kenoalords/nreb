<?php

/*
Plugin name: NERBlog Sms Subscription
Description: Sms notification sign up form
Author: Alordiah Keno
*/

add_action( 'rest_api_init', function(){
	register_rest_route( 'nreb/v1', '/check-subscription', 
		array( 'methods'=> 'GET', 'callback'=> 'check_subscription' )
	);
	register_rest_route( 'nreb/v1', '/post-subscription', 
		array( 'methods'=> 'POST', 'callback'=> 'post_subscription' )
	);
	register_rest_route( 'nreb/v1', '/email-subscription', 
		array( 'methods'=> 'POST', 'callback'=> 'email_subscription' )
	);
});


function check_subscription(){
	global $wpdb;
	$table = $wpdb->prefix . 'subscription';
	$uid = (isset($_COOKIE['__nreb__'])) ? $_COOKIE['__nreb__'] : false;
	
	if ( $uid ){
		$query = $wpdb->get_row("SELECT * FROM $table WHERE uid='$uid'");
		if ( !$query ){
			return new WP_REST_Response(false, 200);
		} else {
			return new WP_REST_Response(true, 200);
		}
	} else {
		return new WP_REST_Response('no uid', 200);
	}
}

function post_subscription(WP_REST_Request $request){
	$phone = $request['phone'];
	$interests = $request['interests'];
	if ( strlen($phone) < 11 || strlen($phone) > 15 ){
		return new WP_Error('phone', 'Please check your phone number and try again');
	}
	$uid = $_COOKIE['__nreb__'];
	global $wpdb, $reader;
	$table = $wpdb->prefix . 'subscription';
	$geoip = null;
	try{
		$geoip = $reader->city(get_client_ip_server());
	} catch ( Exception $e ){

	}
	
	$insert = $wpdb->insert($table, array(
		'uid'	=> $uid,
		'phone'	=> esc_attr( $phone ),
		'interest'=> implode(', ', $interests),
		'state'	=> ($geoip !== null) ? $geoip->mostSpecificSubdivision->name : null,
	));
	if ( $insert )
		return new WP_REST_Response(true, 200);
	else
		return new WP_Error('db-error', 'Something went wrong!');
}

function email_subscription(WP_REST_Request $request){
	$email = $request['email'];
	if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
		return new WP_Error('email', 'Invalid email');
	}
	global $wpdb;
	$table = $wpdb->prefix . 'email_subscription';
	$uid = (isset($_COOKIE['__nreb__'])) ? $_COOKIE['__nreb__'] : null;
	$insert = $wpdb->insert($table, array('email'=> $email, 'page'=> $request['page'], 'uid' => $uid));
	if ( $insert ){
		return new WP_REST_Response(true, 200);
	} else {
		return new WP_Error('db-error', 'An error occurred while saving record');
	}
}