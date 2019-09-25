<?php 
// Load scripts and styles
function load_style_script(){
    
    wp_enqueue_style( 'test-style', get_stylesheet_uri() );
    wp_enqueue_style( 'test-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'test-slick', get_template_directory_uri() . '/css/slick.css' );
    wp_enqueue_style( 'test-slick-theme', get_template_directory_uri() . '/css/slick-theme.css' );
    wp_enqueue_style( 'test-fonts', get_template_directory_uri() . '/css/main.min.css' );

    
    /*-------------------------------------------------*/
    
    wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');
	wp_register_script('jquery-core',  'https://code.jquery.com/jquery-3.3.1.min.js' , false, null, true);
	wp_register_script('jquery', false, array('jquery-core'), null, true);
	wp_enqueue_script('jquery');
    wp_enqueue_script( 'test-poper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '2.5.5', true);
    wp_enqueue_script( 'test-bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), '2.5.5', true);
    wp_enqueue_script( 'test-slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '2.5.5', true);
    wp_enqueue_script( 'test-slideout-js', get_template_directory_uri() . '/js/slideout.min.js', array('jquery'), '2.5.5', true);
    wp_enqueue_script( 'test-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '2.5.5', true);
    

    
}
add_action('wp_enqueue_scripts', 'load_style_script' );

// Simple shortcode, function returns string
function get_hello_world( $atts ){
	 return '<div class="test-shortcode">'. __('Hello Wordl!', 'test') .'</div>;';
}
add_shortcode('helloword', 'get_hello_world');

// Register custom post type News
function register_news_type_init() {
    $labels = array(
        'name' => __('News', 'test'),
        'singular_name' => __('News', 'test'),
        'add_new' => __('Add news', 'test'),
        'add_new_item' => __('Add new news', 'test'),
        'edit_item' => __('Edit news', 'test'),
        'new_item' => __('New news', 'test'),
        'all_items' => __('All news', 'test'),
        'view_item' => __('View news', 'test'),
        'search_items' => __('Search news', 'test'),
        'not_found' =>  __('Not found news', 'test'),
        'not_found_in_trash' => __('Not found in trash', 'test'),
        'menu_name' => __('News', 'test')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'menu_position' => 20, // порядок в меню
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail')
    );
    register_post_type('news', $args);
}
add_action( 'init', 'register_news_type_init' );

// Add thumbnails for News
add_theme_support('post-thumbnails', array('news'));

// Register basic menu
add_action( 'after_setup_theme', function(){
    register_nav_menus( [
        'header_menu' => __('Main menu', 'test')
    ] );
} );


// Add options page
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => __('Settings', 'test'),
        'menu_title'    =>  __('Settings', 'test'),
        'menu_slug'     => 'theme-general-settings',
    ));
    
}

// Woocommerce customize
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering' , 30);

// Class for phone number
class Phone_Number {

    var $number;
    var $vowels;

    function __construct($number, $vowels = [' ', '(', ')', '-'])
    {
        $this->number = $number;
        $this->vowels = $vowels;
    }

    function get_valid_number ()
    {
    return str_replace($this->vowels, '', $this->number);
    }

}