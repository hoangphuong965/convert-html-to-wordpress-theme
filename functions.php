<?php
// echo get_stylesheet_uri();
// echo get_template_directory_uri();
// exit();

function mytheme_theme_setup() {
	add_theme_support('custom-logo');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_image_size('home-featured', 580, 400, array('center', 'center'));
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus(array(
		'primary' => __('Primary Menu', 'mytheme')
	));
}
add_action('after_setup_theme', 'mytheme_theme_setup');


function mytheme_scripts_enqueue() {
    wp_enqueue_style('style', get_stylesheet_uri());

    wp_enqueue_script('jquery');
    wp_enqueue_script('mytheme-browser', get_template_directory_uri().'/assets/js/browser.min.js');
    wp_enqueue_script('mytheme-breakpoints', get_template_directory_uri().'/assets/js/breakpoints.min.js');
    wp_enqueue_script('mytheme-util', get_template_directory_uri().'/assets/js/util.js');
    wp_enqueue_script('mytheme-main', get_template_directory_uri().'/assets/js/main.js');    
}
add_action('wp_enqueue_scripts', 'mytheme_scripts_enqueue');

function mytheme_widgets_init() {
	register_sidebar(array(
		'name' => __('Main Sidebar', 'mytheme'),
		'id' => 'main-sidebar',
		'description' => 'Primary Right Sidebar',
		'before_widget' => '<section id="%1$s" class="box %2$s" >',
		'after_widget' => '</section>',
		'before_title' => '<header><h3 class="widget-title" >',
		'after_title' => '</h3></header>' 
	));

	register_sidebar(array(
		'name' => __('Footer Widget 1', 'mytheme'),
		'id' => 'footer-widget-1',
		'description' => 'Footer Widget 1',
		'before_widget' => '<section id="%1$s" class="widget %2$s" >',
		'after_widget' => '</section>',
		'before_title' => '<header><h2 class="widget-title" >',
		'after_title' => '</h2></header>' 
	));

	register_sidebar(array(
		'name' => __('Footer Widget 2', 'mytheme'),
		'id' => 'footer-widget-2',
		'description' => 'Footer Widget 2',
		'before_widget' => '<section id="%1$s" class="widget %2$s" >',
		'after_widget' => '</section>',
		'before_title' => '<header><h2 class="widget-title" >',
		'after_title' => '</h2></header>' 
	));

	register_sidebar(array(
		'name' => __('Footer Widget 3', 'mytheme'),
		'id' => 'footer-widget-3',
		'description' => 'Footer Widget 3',
		'before_widget' => '<section id="%1$s" class="widget %2$s" >',
		'after_widget' => '</section>',
		'before_title' => '<header><h2 class="widget-title" >',
		'after_title' => '</h2></header>' 
	));

	register_sidebar(array(
		'name' => __('Footer Widget 4', 'mytheme'),
		'id' => 'footer-widget-4',
		'description' => 'Footer Widget 4',
		'before_widget' => '<p>',
		'after_widget' => '</p>'
	));
}
add_action('widgets_init', 'mytheme_widgets_init');

// Adding Portfolio Custom Post Type
require get_template_directory().'/includes/portfolio.php';