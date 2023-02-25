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



add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v1/', 'blur', array(
        'methods' => 'GET',
        'callback' => 'blur_theme_option_endpoint_callback',
    ) );
} );

function blur_theme_option_endpoint_callback() {

    $data = array(

        'hunkcompanion' => array(
            'name' => esc_html__( 'Hunk Companion', 'th-shop-mania' ),
            'imgUrl' => 'https://ps.w.org/hunk-companion/assets/icon-128x128.png',
            'pro_link' =>'',
            'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=hunk-companion&amp;TB_iframe=true&amp;width=772&amp;height=500',
            'active_filename' => 'hunk-companion/hunk-companion.php',
            'slug'=> 'hunk-companion',
       ),
    
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
       ),
       'lead-form-builder' => array(
           'name' => esc_html__( 'Lead Form Builder', 'th-shop-mania' ),
           'img' => 'icon-128x128.png',
           'pro_link' => esc_url('https://themehunk.com/product/lead-form-builder-pro/'),
           'active_filename' => 'lead-form-builder/lead-form-builder.php',
           'pro-plugin' => array('slug'=>'lead-form-builder',
                               'init'=>'lead-form-builder/init.php',
                                 'admin_link'=>'wplf-plugin-menu',
                                 'docs'=>esc_url('https://themehunk.com/docs/lead-form-builder-pro/'),
                               )
       ),
       'wp-popup-builder' => array(
           'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'th-shop-mania' ),
           'img' => 'icon-128x128.png',
           'pro_link' => esc_url('https://themehunk.com/wp-popup-builder-pro/'),
           'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
           'pro-plugin' => array('slug'=>'wp-popup-builder',
                               'init'=>'wp-popup-builder-pro/wp-popup-builder.php',
                               'admin_link'=>'wppb',
                               'docs'=>esc_url('https://themehunk.com/docs/wp-popup-builder-pro/'),
                               )
       ),
    
       'th-advance-product-search' => array(
           'name' => esc_html__( 'Th Advance Product Search', 'th-shop-mania' ),
           'img' => 'icon-128x128.gif',
           'pro_link' => esc_url('https://themehunk.com/advance-product-search/'),
           'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
           'pro-plugin' => array('slug'=>'th-advance-product-search-pro',
                               'init'=>'th-advance-product-search-pro/th-advance-product-search-pro.php',
                                'admin_link'=>'th-advance-product-search-pro',
                                'docs'=>esc_url('https://themehunk.com/docs/th-advance-product-search/'),
    
                               )
       ),
       'th-product-compare' => array(
           'name' => esc_html__( 'Th Product Compare', 'th-shop-mania' ),
           'img' => 'icon-128x128.png',
           'pro_link' => esc_url('https://themehunk.com/th-product-compare/'),
           'active_filename' => 'th-product-compare/th-product-compare.php',
           'pro-plugin' => array('slug'=>'th-product-compare-pro',
                               'init'=>'th-product-compare-pro/th-product-compare-pro.php',
                                'admin_link'=>'th-product-compare-pro',
                                'docs'=>esc_url('https://themehunk.com/docs/th-product-compare/'),
    
                               )
       ),
       'th-variation-swatches' => array(
           'name' => esc_html__( 'Th Variation Swatches', 'th-shop-mania' ),
           'img' => 'icon-128x128.gif',
           'pro_link' => esc_url('https://themehunk.com/th-variation-swatches/'),
           'active_filename' => 'th-variation-swatches/th-variation-swatches.php',
           'pro-plugin' => array('slug'=>'th-variation-swatches',
                               'init'=>'th-variation-swatches-pro/th-variation-swatches-pro.php',
                                'admin_link'=>'th-variation-swatches',
                                'docs'=>esc_url('https://themehunk.com/docs/th-variation-swatches-plugin/'),
                               )
       ), 
       'yith-woocommerce-wishlist' => array(
            'name' => esc_html__( 'YITH WooCommerce Wishlist', 'th-shop-mania' ),
             'img' => 'icon-128x128.jpg',
             'pro_link' => '',
            'active_filename' => 'yith-woocommerce-wishlist/init.php',
        ),
       
    );


    return rest_ensure_response($data);

}