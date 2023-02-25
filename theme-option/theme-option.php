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
    register_rest_route( 'wp1/blur/', 'avd', array(
        'methods' => 'GET',
        'callback' => 'my_custom_endpoint_callback',
    ) );
} );

function my_custom_endpoint_callback() {
    $data = array(
        'title' => 'My Custom Title',
        'description' => 'This is my custom description.',
        'image_url' => 'https://example.com/images/my-custom-image.jpg',
    );

    $json_data = json_encode( $data );

    return register_rest_route($json_data);

}