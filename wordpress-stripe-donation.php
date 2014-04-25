<?php
/*
Plugin Name: WordPress Donation Plugin
Plugin URI: http://boborchard.com/
Description: A plugin to integrate simple donations via Stripe for non-profits
Author: Bob orchard
Author URI: http://boborchard.com
Contributors: boborchard, ross-hunter
Version: 1.0
*/

/**********************************
* constants and globals
**********************************/

if(!defined('STRIPE_BASE_URL')) {
    define('STRIPE_BASE_URL', plugin_dir_url(__FILE__));
}
if(!defined('STRIPE_BASE_DIR')) {
    define('STRIPE_BASE_DIR', dirname(__FILE__));
}

$stripe_options = get_option('stripe_settings');

/*******************************************
* plugin text domain for translations
*******************************************/

load_plugin_textdomain( 'givesoft_stripe_donations', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**********************************
* includes
**********************************/

if(is_admin()) {
    // load admin includes
    include(STRIPE_BASE_DIR . '/includes/settings.php');
} else {
    // load front-end includes
    include(STRIPE_BASE_DIR . '/includes/scripts.php');
    include(STRIPE_BASE_DIR . '/includes/shortcodes.php');
    include(STRIPE_BASE_DIR . '/includes/process-payment.php');
}