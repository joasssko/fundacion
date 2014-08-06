<?php if ( function_exists('add_theme_support') ) {
add_theme_support('post-thumbnails');
add_image_size('big-noticia', 665, 415, true );
add_image_size('mini-noticia', 330, 205, true );
//add_image_size('noticias_destacada', 630, 443, true );
//add_image_size('portada_documento', 70, 100, true ); 

}
add_post_type_support('page', 'excerpt');
;?>
<?php 
/* Add support for wp_nav_menu() */
function register_my_menu() {
	register_nav_menu( 'primary', 'Menú principal');
	register_nav_menu( 'secondary', 'Menú Secundario');
	register_nav_menu( 'third', 'Footer');
}
add_action( 'init', 'register_my_menu' );
?>
<?php
function import_scripts() {
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
    wp_register_script('core', get_template_directory_uri() . '/js/core.js');
}

add_action('wp_print_scripts', 'import_scripts');
?>
<?php 
function call_scripts() {
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
    wp_register_script('core', get_template_directory_uri() . '/js/core.js');

    wp_enqueue_script('jquery');
    wp_enqueue_script('core');
}    
 
add_action('wp_enqueue_scripts', 'call_scripts');

?>
<?php
//Post type register

add_action('init', 'slider_register');
function slider_register() {
    $args = array(
        'label' => 'Sliders',
        'singular_label' => 'Slider',
        'public' => true,
		'menu_position' => 14, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'slider'),
        'supports' => array('title', 'excerpt' , 'thumbnail' )
    );
    register_post_type('slider', $args);
    flush_rewrite_rules();
}





add_action('init', 'clinicas_register');
function clinicas_register() {
    $args = array(
        'label' => 'Clinicas',
        'singular_label' => 'Clinica',
        'public' => true,
		'menu_position' => 15, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => false,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'clinicas'),
        'supports' => array('title' ,'excerpt' , 'thumbnail' )
    );
    register_post_type('clinicas', $args);
    flush_rewrite_rules();
}

add_action('init', 'tips_register');
function tips_register() {
    $args = array(
        'label' => 'Tips',
        'singular_label' => 'Tip',
        'public' => true,
		'menu_position' => 15, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'tips'),
        'supports' => array('title', 'editor', 'excerpt' , 'thumbnail' )
    );
    register_post_type('tips', $args);
    flush_rewrite_rules();
}

add_action('init', 'faqs_register');
function faqs_register() {
    $args = array(
        'label' => 'Preguntas Frecuentes',
        'singular_label' => 'Pregunta',
        'public' => true,
		'menu_position' => 15, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'faqs'),
        'supports' => array('title', 'editor', 'excerpt' , 'thumbnail' )
    );
    register_post_type('faqs', $args);
    flush_rewrite_rules();
}

add_action('init', 'testimonios_register');
function testimonios_register() {
    $args = array(
        'label' => 'Testimonios',
        'singular_label' => 'Testimonio',
        'public' => true,
		'menu_position' => 15, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'testimonios'),
        'supports' => array('title', 'editor', 'excerpt' , 'thumbnail' )
    );
    register_post_type('testimonios', $args);
    flush_rewrite_rules();
}

add_action('init', 'videos_register');
function videos_register() {
    $args = array(
        'label' => 'Videos',
        'singular_label' => 'Video',
        'public' => true,
		'menu_position' => 16, 
        '_builtin' => false,
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'videos'),
        'supports' => array('title', 'editor', 'excerpt' , 'thumbnail' )
    );
    register_post_type('videos', $args);
    flush_rewrite_rules();
}

register_taxonomy("seccion", array('tips', 'testimonios', 'videos' , 'post' , 'faqs'), array("hierarchical" => true, "label" => "Seccion", "singular_label" => "Seccion", "rewrite" => true));




?>
<?php //register sidebars

/* register_sidebar(array(
  'name' => __( 'Home' ),
  'id' => 'home',
  'description' => __( 'Widgets en esta área se mostrarán en el home, utlice esta área para agregar la mini encuesta' ),
  'before_title' => '<h3>',
  'after_title' => '</h3>'
)); */


//add_filter('widget_text', 'do_shortcode');
?>
<?php 
$wp->add_query_var('meta_key');
$wp->add_query_var('meta_value');
$wp->add_query_var('meta_compare');

?>
<?php 
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Vistas";
    }
    return $count.' Vistas';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
?>
<?php 
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');?>
<?php //include_once( rtrim( dirname( __FILE__ ), '/' ) . '/acf-taxonomy-field/taxonomy-field.php' );?>