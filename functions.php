<?php

require_once ('wp-bootstrap-walker.php');

add_theme_support('post-thumbnail');
function sheikh_alshabab_add_styles(){
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/fontawesome.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css');
}

function sheikh_alshabab_add_scripts(){
    wp_deregister_script('jquery');
    wp_register_script('jquery',includes_url('js/jquery/jquery.js'),array(),false,true);
    wp_enqueue_script('jquery',includes_url('js/jquery/jquery.js'),array(),false,true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'),false,true);
    wp_enqueue_script('fontawesome-js', get_template_directory_uri() . '/js/fontawesome.min.js',array(),false,true);
}

add_action('wp_enqueue_scripts','sheikh_alshabab_add_styles');
add_action('wp_enqueue_scripts','sheikh_alshabab_add_scripts');

function sheikh_alshabab_add_menu(){
    register_nav_menus(array(
        'bootstrap-menu' => 'Navigation Bar',
    ));
}
function sheikh_alshabab_display_menu(){
    wp_nav_menu(array(
        'theme_location'  => 'bootstrap-menu',
        'menu_class'      => 'nav navbar-nav navbar-right',
        'container'       => false,
        'walker'          => new  wp_bootstrap_navwalker()
    ));
}
add_action('init','sheikh_alshabab_add_menu');

function wpdocs_my_plugin_menu() {
	add_posts_page(
		__( 'My Plugin Posts Page', 'textdomain' ),
		__( 'My Plugin', 'textdomain' ),
		'read',
		'my-unique-identifier',
		'wpdocs_my_plugin_function'
	);
}
add_action( 'admin_menu', 'wpdocs_my_plugin_menu');

function slider_custom_post_type() {
    register_post_type( 'sliders', array(
            'labels' => array(
                'name' => __( 'Sliders' ),
                'singular_name' => __( 'sliders' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'sliders'),
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'taxonomies' => array('category' ),
        )
    );
 }
add_action( 'init', 'slider_custom_post_type' );


function testimonals_custom_post_type() {
    register_post_type( 'testimonals', array(
            'labels' => array(
                'name' => __( 'Testimonals' ),
                'singular_name' => __( 'testimonals' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'testimonals'),
            'show_in_rest' => true,
            'supports' => array( 'title','image','text', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'taxonomies' => array('category' ),
        )
    );
 }
add_action( 'init', 'testimonals_custom_post_type' );

function numbering_pagination(){
    global $wp_query;
    $all_pages = $wp_query->max_num_pages;
    $current_page = max(1,get_query_var('paged'));
    if ($all_pages != 0){
        echo 'Page '. $current_page . ' of ' . $all_pages;
    }
}