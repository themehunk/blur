<?php 

class Blur_theme_option{

    /**
     * Menu page title
     *
     * @since 1.0
     * @var array $menu_page_title
     */
    static public $menu_page_title = 'Blur';

    /**
     * Current Slug
     *
     * @since 1.0
     * @var array $current_slug
     */
    static public $current_slug = 'general';

    function __construct(){

    add_action('admin_enqueue_scripts', array($this, 'blur_enqueue_scripts'));
    add_action('admin_menu', array($this, 'blur_register_settings_menu'),99);
      
    }

    function blur_register_settings_menu() {

    $menu_title = sprintf( esc_html__( '%s Options', 'blur' ), apply_filters( 'thsm_page_title', __( 'Blur', 'blur' ) ) );

    add_theme_page(esc_html__('Blur', 'blur'), $menu_title, 'edit_theme_options', 'blur_thunk_started', array($this, 'blur_settings_page'));   
   
  }


   function blur_plugin_status($plugin_slug){

   $status = is_dir( WP_PLUGIN_DIR . '/' . $slug );

   if($status){

      if(is_plugin_active('th-all-in-one-woo-cart/th-all-in-one-woo-cart.php')){
        $thiowc_active = true; 
      }else{
        $thiowc_active = false;
      }

   }else{

    
   }


  }
   
   function blur_enqueue_scripts() {
    
    if(is_plugin_active('th-all-in-one-woo-cart/th-all-in-one-woo-cart.php')){
      $thiowc_active = true; 
    }else{
      $thiowc_active = false;
    }

    if(is_plugin_active('th-advance-product-search/th-advance-product-search.php')){
      $thaps_active = 'active'; 
    }else{
      $thaps_active = 'active-now';
    }

    if(is_dir( WP_PLUGIN_DIR . '/th-all-in-one-woo-cart' )){
      $thiowc_instl = 'install'; 
    }else{
      $thiowc_instl = 'install-now';
    }

    if(is_dir( WP_PLUGIN_DIR . '/th-advance-product-search' )){
      $thaps_instl = true; 
    }else{
      $thaps_instl = false;
    }

    wp_enqueue_style( 'blur-settings-css', get_template_directory_uri() . '/theme-option/build/style-index.css', array(), '1.0.0', false );

    wp_enqueue_script( 'blur-settings-js', get_template_directory_uri() . '/theme-option/build/index.js', array( 'wp-element', 'wp-i18n' ), '1.0', true );
    
    wp_localize_script(
        'blur-settings-js',
        'wpapi',
        array(
          'homeUrl' => get_home_url(),
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
          'wpnonce' => wp_create_nonce( "ajaxnonce" ),
          'thiowc_status' => array(
             'thiowc_instl' => $thiowc_instl,
             'thiowc_active' => $thiowc_active,
           ),
           'thaps_status' => array(
            'thaps_instl' => $thaps_instl,
            'thaps_active' => $thaps_active,
          ),
        )
    );
   }

   function blur_settings_page() {
    ?>
        <div id="blur-theme-setting-page" class="blur-theme-setting-page">
        </div>
    <?php

  }
  
}

$obj = new Blur_theme_option();

/************************ */
// plugin data deatial
/************************* */

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v1/', 'blur', array(
        'methods' => 'GET',
        'callback' => 'blur_theme_option_endpoint_callback',
    ) );
} );

function blur_theme_option_endpoint_callback() {

    $data = array(
    
        'th_all_in_one_woo_cart' => array(
           'name' => esc_html__( 'Th All In One Woo Cart', 'blur' ),
           'imgUrl' => 'https://ps.w.org/th-all-in-one-woo-cart/assets/icon-128x128.png',
           'pro_link' => esc_url('https://themehunk.com/th-all-in-one-woo-cart/'),
           'active_filename' => 'th-all-in-one-woo-cart/th-all-in-one-woo-cart.php',
           'slug'=> 'th-all-in-one-woo-cart',
           'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=th-all-in-one-woo-cart&amp;TB_iframe=true&amp;width=772&amp;height=500',
           'pro-plugin' => array(
                               'slug'=>'th-all-in-one-woo-cart-pro',
                               'init'=>'th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php',
                               'admin_link'=>'th-all-in-one-woo-cart-pro',
                               'docs'=>esc_url('https://themehunk.com/docs/th-all-in-one-woo-cart/'),
    
                               )
           ),
           'th_advance_product_search' => array(
            'name' => esc_html__( 'Th Advance Product Search', 'blur' ),
            'imgUrl' => 'https://ps.w.org/th-advance-product-search/assets/icon-128x128.gif',
            'pro_link' => esc_url('https://themehunk.com/advance-product-search/'),
            'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            'slug'=> 'th-advance-product-search',
            'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=th-advance-product-searchs&amp;TB_iframe=true&amp;width=772&amp;height=500',
            'pro-plugin' => array(
                       'slug'=>'th-advance-product-search-pro',
                       'init'=>'th-advance-product-search-pro/th-advance-product-search-pro.php',
                       'admin_link'=>'th-advance-product-search-pro',
                       'docs'=>esc_url('https://themehunk.com/docs/th-advance-product-search/'),

                    )
        ),
       
    );

    return rest_ensure_response($data);

}

function blur_install_plugin() {

if ( ! current_user_can( 'administrator' ) ) {

    wp_die( - 1, 403 );
    
}

check_ajax_referer( 'ajaxnonce', 'nonce' );

$init = $_POST["init"];
$slug = $_POST["slug"];
$instl = $_POST["instl"];

$plugin_init = (isset($init)) ? esc_attr($init) : '';


if (! is_plugin_active($plugin_init) && $instl == 'install') {

  $status = array(
		'install' => 'plugin',
		'slug'    => sanitize_key( wp_unslash( $slug ) ),
	);

  if ( ! current_user_can( 'install_plugins' ) ) {
		$status['errorMessage'] = __( 'Sorry, you are not allowed to install plugins on this site.' );
		wp_send_json_error( $status );
	}

  $api = plugins_api(
		'plugin_information',
		array(
			'slug'   => sanitize_key( wp_unslash( $slug ) ),
			'fields' => array(
				'sections' => false,
			),
		)
	);

  if ( is_wp_error( $api ) ) {

		$status['errorMessage'] = $api->get_error_message();
		wp_send_json_error( $status );

	}

  $status['pluginName'] = $api->name;
  $skin     = new WP_Ajax_Upgrader_Skin();
	$upgrader = new Plugin_Upgrader( $skin );
  $result   = $upgrader->install( $api->download_link );

  $install_status = install_plugin_install_status( $api );

	$pagenow        = isset( $_POST['pagenow'] ) ? sanitize_key( $_POST['pagenow'] ) : '';

	// If installation request is coming from import page, do not return network activation link.

	$plugins_url = ( 'import' === $pagenow ) ? admin_url( 'plugins.php' ) : network_admin_url( 'plugins.php' );

	if ( current_user_can( 'activate_plugin', $install_status['file'] ) && is_plugin_inactive( $install_status['file'] ) ) {
		$status['activateUrl'] = add_query_arg(
			array(
				'_wpnonce' => wp_create_nonce( 'activate-plugin_' . $install_status['file'] ),
				'action'   => 'activate',
				'plugin'   => $install_status['file'],
			),
			$plugins_url
		);

	}
  
  if ( is_multisite() && current_user_can( 'manage_network_plugins' ) && 'import' !== $pagenow ) {
		$status['activateUrl'] = add_query_arg( array( 'networkwide' => 1 ), $status['activateUrl'] );
	}
  
$activate = activate_plugin($plugin_init);

if (is_wp_error($activate)) {
    wp_send_json_error(
      array(
        'success' => false,
        'message' => $activate->get_error_message(),
      )
    );
  }

  wp_send_json_success(
    array(
      'success' => true,
      'message' => __('Plugin Successfully Activated', 'blur'),
    )
  );

}elseif(! is_plugin_active($plugin_init)){

  $activate = activate_plugin($plugin_init);

  if (is_wp_error($activate)) {
      wp_send_json_error(
        array(
          'success' => false,
          'message' => $activate->get_error_message(),
        )
      );
    }
  
    wp_send_json_success(
      array(
        'success' => true,
        'message' => __('Plugin Successfully Activated', 'blur'),
      )
    );

}

die();

}

add_action('wp_ajax_blur_install_plugin', 'blur_install_plugin');
add_action('wp_ajax_nopriv_blur_install_plugin', 'blur_install_plugin');

include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');