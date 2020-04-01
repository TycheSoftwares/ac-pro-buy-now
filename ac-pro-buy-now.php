<?php
/**
 * Plugin Name: AC Pro - Buy Now plugin compatibility
 * Plugin URI: https://tychesoftwares.com/
 * Description: AC Pro - Buy Now plugin compatibility
 * Version: 1.0.0
 * Author: Tyche Softwares
 * Author URI: https://tychesoftwares.com/
 *
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'wcap_load_buy_now_atc_script', 1, 1 );

add_filter( 'wcap_add_custom_atc_template', 'wcap_add_atc_template_data', 10, 1 );

function wcap_load_buy_now_atc_script( $param ) {

    wp_enqueue_style( 'wcap_abandoned_details_modal', WCAP_PLUGIN_URL . '/assets/css/frontend/wcap_atc_detail_modal.min.css' );

    wp_enqueue_script(
        'wcap_vue_js',
        WCAP_PLUGIN_URL . '/assets/js/vue.min.js',
        '',
        '',
        true
    );
}

function wcap_add_atc_template_data( $wcap_atc_modal ) {
    ob_start();
    include( WCAP_PLUGIN_PATH . '/includes/template/add_to_cart/wcap_add_to_cart.php' );
    $wcap_atc_modal = ob_get_clean();
    return $wcap_atc_modal;
}
