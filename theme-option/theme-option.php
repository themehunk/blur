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
   
   function blur_enqueue_scripts() {

    wp_enqueue_style( 'blur-settings-css', get_template_directory_uri() . '/theme-option/build/style-index.css', array(), '1.0.0', false );

    wp_enqueue_script( 'blur-settings-js', get_template_directory_uri() . '/theme-option/build/index.js', array( 'wp-element', 'wp-i18n' ), '1.0', true );
    
    wp_localize_script(
        'blur-settings-js',
        'wpapi',
        array(
          'homeUrl' => get_home_url(),
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
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
           'name' => esc_html__( 'Th All In One Woo Cart', 'th-shop-mania' ),
           'imgUrl' => 'https://ps.w.org/th-all-in-one-woo-cart/assets/icon-128x128.png',
           'pro_link' => esc_url('https://themehunk.com/th-all-in-one-woo-cart/'),
           'active_filename' => 'th-all-in-one-woo-cart/th-all-in-one-woo-cart.php',
           'slug'=> 'th-all-in-one-woo-cart',
           'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=hunk-companion&amp;TB_iframe=true&amp;width=772&amp;height=500',
           'pro-plugin' => array('slug'=>'th-all-in-one-woo-cart-pro',
                               'init'=>'th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php',
                                'admin_link'=>'th-all-in-one-woo-cart-pro',
                                'docs'=>esc_url('https://themehunk.com/docs/th-all-in-one-woo-cart/'),
    
                               )
       )
       
    );

    return rest_ensure_response($data);

}

function blur_install_plugin() {

$decoded_data = json_decode( $_POST['data'], true );

$init = $decoded_data["init"];
$slug = $decoded_data["slug"];

$plugin_init = (isset($init)) ? esc_attr($init) : '';

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

die();

}

add_action('wp_ajax_blur_install_plugin', 'blur_install_plugin');
add_action('wp_ajax_nopriv_blur_install_plugin', 'blur_install_plugin');

include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');