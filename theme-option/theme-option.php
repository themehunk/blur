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
    
    if(is_plugin_active('th-all-in-one-woo-cart/th-all-in-one-woo-cart.php') && !is_plugin_active('th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php')){
      $thiowc_active = false; 
    }elseif(!is_plugin_active('th-all-in-one-woo-cart/th-all-in-one-woo-cart.php') && is_plugin_active('th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php')){
      $thiowc_active = true; 
    }elseif(is_plugin_active('th-all-in-one-woo-cart/th-all-in-one-woo-cart.php')){
      $thiowc_active = true; 
    }elseif(is_plugin_active('th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php')){
      $thiowc_active = true; 
    }else{
      $thiowc_active = false;
    }

    if(is_plugin_active('th-advance-product-search/th-advance-product-search.php') && !is_plugin_active('th-advance-product-search-pro/th-advance-product-search-pro.php')){
      $thaps_active = false; 
    }elseif(!is_plugin_active('th-advance-product-search/th-advance-product-search.php') && is_plugin_active('th-advance-product-search-pro/th-advance-product-search-pro.php')){
      $thaps_active = true; 
    }elseif(is_plugin_active('th-advance-product-search/th-advance-product-search.php')){
      $thaps_active = true; 
    }elseif(is_plugin_active('th-advance-product-search-pro/th-advance-product-search-pro.php')){
      $thaps_active = true; 
    }else{
      $thaps_active = false;
    }

    if(is_plugin_active('th-product-compare/th-product-compare.php') && !is_plugin_active('th-product-compare-pro/th-product-compare-pro.php')){
      $thpc_active = false; 
    }elseif(!is_plugin_active('th-product-compare/th-product-compare.php') && is_plugin_active('th-product-compare-pro/th-product-compare-pro.php')){
      $thpc_active = true; 
    }elseif(is_plugin_active('th-product-compare/th-product-compare.php')){
      $thpc_active = true; 
    }elseif(is_plugin_active('th-product-compare-pro/th-product-compare-pro.php')){
      $thpc_active = true; 
    }else{
      $thpc_active = false;
    }

    if(is_plugin_active('th-variation-swatches/th-variation-swatches.php') && !is_plugin_active('th-variation-swatches-pro/th-variation-swatches-pro.php')){
      $thvs_active = false; 
    }elseif(!is_plugin_active('th-variation-swatches/th-variation-swatches.php') && is_plugin_active('th-variation-swatches-pro/th-variation-swatches-pro.php')){
      $thvs_active = true; 
    }elseif(is_plugin_active('th-variation-swatches/th-variation-swatches.php')){
      $thvs_active = true; 
    }elseif(is_plugin_active('th-variation-swatches-pro/th-variation-swatches-pro.php')){
      $thvs_active = true; 
    }else{
      $thvs_active = false;
    }

    if(is_plugin_active('lead-form-builder/lead-form-builder.php') && !is_plugin_active('lead-form-builder-pro/lead-form-builder-pro.php')){
      $thlf_active = false; 
    }elseif(!is_plugin_active('lead-form-builder/lead-form-builder.php') && is_plugin_active('lead-form-builder-pro/lead-form-builder-pro.php')){
      $thlf_active = true; 
    }elseif(is_plugin_active('lead-form-builder/lead-form-builder.php')){
      $thlf_active = true; 
    }elseif(is_plugin_active('lead-form-builder-pro/lead-form-builder-pro.php')){
      $thlf_active = true; 
    }else{
      $thlf_active = false;
    }


    if(is_plugin_active('wp-popup-builder/wp-popup-builder.php') && !is_plugin_active('wp-popup-builder-pro/wp-popup-builder-pro.php')){
      $thwpbl_active = false; 
    }elseif(!is_plugin_active('wp-popup-builder/wp-popup-builder.php') && is_plugin_active('wp-popup-builder-pro/wp-popup-builder-pro.php')){
      $thwpbl_active = true; 
    }elseif(is_plugin_active('wp-popup-builder/wp-popup-builder.php')){
      $thwpbl_active = true; 
    }elseif(is_plugin_active('wp-popup-builder-pro/wp-popup-builder-pro.php')){
      $thwpbl_active = true; 
    }else{
      $thwpbl_active = false;
    }

  
    if(is_plugin_active('unlimited_blocks/unlimited_blocks.php')){
      $thulb_active = true; 
    }else{
      $thulb_active = false;
    }
    if(is_plugin_active('woocommerce/woocommerce.php')){
      $woo_active = true; 
    }else{
      $woo_active = false;
    }
    if(is_plugin_active('yith-woocommerce-wishlist/init.php')){
      $yithwlst_active = true; 
    }else{
      $yithwlst_active = false;
    }

    if(is_dir( WP_PLUGIN_DIR . '/th-all-in-one-woo-cart' ) || is_dir( WP_PLUGIN_DIR . '/th-all-in-one-woo-cart-pro' )){
      $thiowc_instl = 'installed'; 
    }else{
      $thiowc_instl = 'install-now';
    }

    if(is_dir( WP_PLUGIN_DIR . '/th-advance-product-search' ) || is_dir( WP_PLUGIN_DIR . '/th-advance-product-search-pro' )){
      $thaps_instl = 'installed'; 
    }else{
      $thaps_instl = 'install-now';
    }

    if(is_dir( WP_PLUGIN_DIR . '/th-product-compare' ) || is_dir( WP_PLUGIN_DIR . '/th-product-compare-pro' )){
      $thpc_instl = 'installed'; 
    }else{
      $thpc_instl = 'install-now';
    }

    if(is_dir( WP_PLUGIN_DIR . '/th-variation-swatches' ) || is_dir( WP_PLUGIN_DIR . '/th-variation-swatches-pro' )){
      $thvs_instl = 'installed'; 
    }else{
      $thvs_instl = 'install-now';
    }

    if(is_dir( WP_PLUGIN_DIR . '/lead-form-builder' ) || is_dir( WP_PLUGIN_DIR . '/lead-form-builder-pro' )){
      $thlf_instl = 'installed'; 
    }else{
      $thlf_instl = 'install-now';
    }

    if(is_dir( WP_PLUGIN_DIR . '/wp-popup-builder' )|| is_dir( WP_PLUGIN_DIR . '/wp-popup-builder-pro' )){
      $thwpbl_instl = 'installed'; 
    }else{
      $thwpbl_instl = 'install-now';
    }

    if(is_dir( WP_PLUGIN_DIR . '/unlimited_blocks' )){
      $thulb_instl = 'installed'; 
    }else{
      $thulb_instl = 'install-now';
    }
    if(is_dir( WP_PLUGIN_DIR . '/woocommerce' )){
      $woo_instl = 'installed'; 
    }else{
      $woo_instl = 'install-now';
    }
    if(is_dir( WP_PLUGIN_DIR . '/yith-woocommerce-wishlist' )){
      $yithwlst_instl = 'installed'; 
    }else{
      $yithwlst_instl = 'install-now';
    }


    // for pro plugin

    if(is_dir( WP_PLUGIN_DIR . '/th-product-compare-pro' )){

      if(!is_plugin_active('th-product-compare/th-product-compare.php') || !is_plugin_active('th-product-compare-pro/th-product-compare-pro.php')){
        
        $thpc_proActivate = 'pro-activate';

      }elseif(is_plugin_active('th-product-compare/th-product-compare.php') || !is_plugin_active('th-product-compare-pro/th-product-compare-pro.php')){
        
        $thpc_proActivate = 'pro-activate';

      }

    }else{
        
        $thpc_proActivate = '';

      }

      if(is_dir( WP_PLUGIN_DIR . '/th-advance-product-search-pro' )){

        if(!is_plugin_active('th-advance-product-search/th-advance-product-search.php') || !is_plugin_active('th-advance-product-search-pro/th-advance-product-search-pro.php')){
          
          $thaps_proActivate = 'pro-activate';
  
        }elseif(is_plugin_active('th-advance-product-search/th-advance-product-search.php') || !is_plugin_active('th-advance-product-search-pro/th-advance-product-search-pro.php')){
          
          $thaps_proActivate = 'pro-activate';
  
        }
  
      }else{
          
          $thaps_proActivate = '';
  
        }

        if(is_dir( WP_PLUGIN_DIR . '/th-all-in-one-woo-cart-pro' )){

          if(!is_plugin_active('th-all-in-one-woo-cart/th-all-in-one-woo-cart.php') || !is_plugin_active('th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php')){
            
            $thiowc_proActivate = 'pro-activate';
    
          }elseif(is_plugin_active('th-all-in-one-woo-cart/th-all-in-one-woo-cart.php') || !is_plugin_active('th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php')){
            
            $thiowc_proActivate = 'pro-activate';
    
          }
    
        }else{
            
            $thiowc_proActivate = '';
    
          }

          if(is_dir( WP_PLUGIN_DIR . '/th-variation-swatches-pro' )){

            if(!is_plugin_active('th-variation-swatches/th-variation-swatches.php') || !is_plugin_active('th-variation-swatches-pro/th-variation-swatches-pro.php')){
              
              $thvs_proActivate = 'pro-activate';
      
            }elseif(is_plugin_active('th-variation-swatches/th-variation-swatches.php') || !is_plugin_active('th-variation-swatches-pro/th-variation-swatches-pro.php')){
              
              $thvs_proActivate = 'pro-activate';
      
            }
      
          }else{
              
              $thvs_proActivate = '';
      
            }

            if(is_dir( WP_PLUGIN_DIR . '/lead-form-builder-pro' )){

              if(!is_plugin_active('lead-form-builder/lead-form-builder.php') || !is_plugin_active('lead-form-builder-pro/lead-form-builder-pro.php')){
                
                $thlf_proActivate = 'pro-activate';
        
              }elseif(is_plugin_active('lead-form-builder/lead-form-builder.php') || !is_plugin_active('lead-form-builder-pro/lead-form-builder-pro.php')){
                
                $thlf_proActivate = 'pro-activate';
        
              }
        
            }else{
                
                $thlf_proActivate = '';
        
              }

              if(is_dir( WP_PLUGIN_DIR . '/wp-popup-builder-pro' )){

                if(!is_plugin_active('wp-popup-builder/wp-popup-builder.php') || !is_plugin_active('wp-popup-builder-pro/wp-popup-builder-pro.php')){
                  
                  $thwpbl_proActivate = 'pro-activate';
          
                }elseif(is_plugin_active('wp-popup-builder/wp-popup-builder.php') || !is_plugin_active('wp-popup-builder-pro/wp-popup-builder-pro.php')){
                  
                  $thwpbl_proActivate = 'pro-activate';
          
                }
          
              }else{
                  
                  $thwpbl_proActivate = '';
          
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
          'blurUri' => trailingslashit(get_template_directory_uri()),
          'thiowc_status' => array(
             'thiowc_instl' => $thiowc_instl,
             'thiowc_active' => $thiowc_active,
             'thiowc_pro_active' => $thiowc_proActivate,
           ),
           'thaps_status' => array(
            'thaps_instl' => $thaps_instl,
            'thaps_active' => $thaps_active,
            'thaps_pro_active' => $thaps_proActivate,
          ),
          'thpc_status' => array(
            'thpc_instl' => $thpc_instl,
            'thpc_active' => $thpc_active,
            'thpc_pro_active' => $thpc_proActivate,
          ),
          'thvs_status' => array(
            'thvs_instl' => $thvs_instl,
            'thvs_active' => $thvs_active,
            'thvs_pro_active' => $thvs_proActivate,
          ),
          'thlf_status' => array(
            'thlf_instl' => $thlf_instl,
            'thlf_active' => $thlf_active,
            'thlf_pro_active' => $thlf_proActivate,
          ),
          'thwpbl_status' => array(
            'thwpbl_instl' => $thwpbl_instl,
            'thwpbl_active' => $thwpbl_active,
            'thwpbl_pro_active' => $thwpbl_proActivate,
          ),
          'thulb_status' => array(
            'thulb_instl' => $thulb_instl,
            'thulb_active' => $thulb_active,
          ),
          'woo_status' => array(
            'woo_instl' => $woo_instl,
            'woo_active' => $woo_active,
          ),
          'yithwlst_status' => array(
            'yithwlst_instl' => $yithwlst_instl,
            'yithwlst_active' => $yithwlst_active,
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
           'pro_plugin' => array(
                               'slug'=>'th-all-in-one-woo-cart-pro',
                               'init'=>'th-all-in-one-woo-cart-pro/th-all-in-one-woo-cart-pro.php',
                               'admin_link'=>'th-all-in-one-woo-cart-pro',
                               'docs'=>esc_url('https://themehunk.com/docs/th-all-in-one-woo-cart/'),
                               'prolink'=>esc_url('https://themehunk.com/th-all-in-one-woo-cart/'),
                               )
           ),
           'th_advance_product_search' => array(
            'name' => esc_html__( 'Th Advance Product Search', 'blur' ),
            'imgUrl' => 'https://ps.w.org/th-advance-product-search/assets/icon-128x128.gif',
            'pro_link' => esc_url('https://themehunk.com/advance-product-search/'),
            'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            'slug'=> 'th-advance-product-search',
            'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=th-advance-product-searchs&amp;TB_iframe=true&amp;width=772&amp;height=500',
            'pro_plugin' => array(
                       'slug'=>'th-advance-product-search-pro',
                       'init'=>'th-advance-product-search-pro/th-advance-product-search-pro.php',
                       'admin_link'=>'th-advance-product-search-pro',
                       'docs'=>esc_url('https://themehunk.com/docs/th-advance-product-search/'),
                       'prolink'=>esc_url('https://themehunk.com/th-advance-product-search/'),
                    )
        ),
        'th_product_compare' => array(
          'name' => esc_html__( 'TH Product Compare', 'blur' ),
          'imgUrl' => 'https://ps.w.org/th-product-compare/assets/icon-128x128.gif',
          'pro_link' => esc_url('https://themehunk.com/th-product-compare/'),
          'active_filename' => 'th-product-compare/th-product-compare.php',
          'slug'=> 'th-product-compare',
          'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=th-product-compare&amp;TB_iframe=true&amp;width=772&amp;height=500',
          'pro_plugin' => array(
                     'slug'=>'th-product-compare-pro',
                     'init'=>'th-product-compare-pro/th-product-compare-pro.php',
                     'admin_link'=>'th-product-compare-pro',
                     'docs'=>esc_url('https://themehunk.com/docs/th-product-compare/'),
                     'prolink'=>esc_url('https://themehunk.com/th-product-compare/'),

                  )
      ),
      'th_variation_swatches' => array(
        'name' => esc_html__( 'Th Variation Swatches', 'blur' ),
        'imgUrl' => 'https://ps.w.org/th-variation-swatches/assets/icon-128x128.gif',
        'pro_link' => esc_url('https://themehunk.com/th-variation-swatches/'),
        'active_filename' => 'th-variation-swatches/th-variation-swatches.php',
        'slug'=> 'th-variation-swatches',
        'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=th-variation-swatches&amp;TB_iframe=true&amp;width=772&amp;height=500',
        'pro_plugin' => array(
                  'slug'=>'th-variation-swatches',
                  'init'=>'th-variation-swatches-pro/th-variation-swatches-pro.php',
                   'admin_link'=>'th-variation-swatches',
                   'docs'=>esc_url('https://themehunk.com/docs/th-variation-swatches-plugin/'),
                   'prolink'=>esc_url('https://themehunk.com/th-variation-swatches/'),
                )
      ), 
      'lead_form_builder' => array(
        'name' => esc_html__( 'Lead Form Builder', 'blur' ),
        'imgUrl' => 'https://ps.w.org/lead-form-builder/assets/icon-128x128.png',
        'pro_link' => esc_url('https://themehunk.com/product/lead-form-builder-pro/'),
        'active_filename' => 'lead-form-builder/lead-form-builder.php',
        'slug'=> 'lead-form-builder',
        'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=lead-form-builder&amp;TB_iframe=true&amp;width=772&amp;height=500',
        'pro_plugin' => array(
                 'slug'=>'lead-form-builder',
                  'init'=>'lead-form-builder/init.php',
                    'admin_link'=>'wplf-plugin-menu',
                    'docs'=>esc_url('https://themehunk.com/docs/lead-form-builder-pro/'),
                    'prolink'=>esc_url('https://themehunk.com/lead-form-builder/'),
                )
    ),
    'wp_popup_builder' => array(
        'name' => esc_html__( 'WP Popup Builder ??? Popup Forms & Newsletter', 'blur' ),
        'imgUrl' => 'https://ps.w.org/wp-popup-builder/assets/icon-128x128.png',
        'pro_link' => esc_url('https://themehunk.com/wp-popup-builder-pro/'),
        'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
        'slug'=> 'wp-popup-builder',
        'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=wp-popup-builder&amp;TB_iframe=true&amp;width=772&amp;height=500',
        'pro_plugin' => array(
                 'slug'=>'wp-popup-builder',
                  'init'=>'wp-popup-builder-pro/wp-popup-builder.php',
                  'admin_link'=>'wppb',
                  'docs'=>esc_url('https://themehunk.com/docs/wp-popup-builder-pro/'),
                  'prolink'=>esc_url('https://themehunk.com/wp-popup-builder/'),
                )
    ),
    'unlimited_blocks' => array(
      'name' => esc_html__( 'Unlimited blocks For Gutenberg', 'blur' ),
      'imgUrl' => 'https://ps.w.org/unlimited-blocks/assets/icon-128x128.png',
      'pro_link' => '',
      'active_filename' => 'unlimited-blocks/unlimited-blocks.php',
      'slug'=> 'unlimited-blocks',
      'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=unlimited-blocks&amp;TB_iframe=true&amp;width=772&amp;height=500',
     
    ),
    'woocommerce' => array(
      'name' => esc_html__( 'Woocommerce', 'blur' ),
      'imgUrl' => 'https://ps.w.org/woocommerce/assets/icon-128x128.png',
      'pro_link' => '',
      'active_filename' => 'woocommerce/woocommerce.php',
      'slug'=> 'woocommerce',
      'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=woocommerce&amp;TB_iframe=true&amp;width=772&amp;height=500',
     
    ),
    'yith_woocommerce_wishlist' => array(
      'name' => esc_html__( 'YITH WooCommerce Wishlist', 'blur' ),
      'imgUrl' => 'https://ps.w.org/yith-woocommerce-wishlist/assets/icon-128x128.jpg',
      'pro_link' => '',
      'active_filename' => 'yith-woocommerce-wishlist/init.php',
      'slug'=> 'yith-woocommerce-wishlist',
      'detail_link' => get_home_url().'/wp-admin/plugin-install.php?tab=plugin-information&amp;plugin=yith-woocommerce-wishlist&amp;TB_iframe=true&amp;width=772&amp;height=500',
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


if (! is_plugin_active($plugin_init) && $instl == 'install-now') {

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