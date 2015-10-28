<?php
/* custom post type Page*/

// Post type  for testimonial

function create_slider_posttype() {

	register_post_type( 'slider',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Slider' ),
				'singular_name' => __( 'Slider' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'slider'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_slider_posttype' );
/*
* Creating a function to create our CPT
*/
add_action( 'init', 'create_slider_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_slider_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Slider', 'taxonomy general name' ),
		'singular_name'     => _x( 'Slider', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Slider' ),
		'all_items'         => __( 'All Slider' ),
		'parent_item'       => __( 'Parent Slider' ),
		'parent_item_colon' => __( 'Parent Slider:' ),
		'edit_item'         => __( 'Edit Slider' ),
		'update_item'       => __( 'Update Slider' ),
		'add_new_item'      => __( 'Add New Slider' ),
		'new_item_name'     => __( 'New Slider Name' ),
		'menu_name'         => __( 'Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'slider' ),
	);

	register_taxonomy( 'slider', array( 'slider' ), $args );

	
}

function custom_slider_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'IProperty' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'IProperty' ),
		'menu_name'           => __( 'Slider', 'IProperty' ),
		'parent_item_colon'   => __( 'Parent Slider', 'IProperty' ),
		'all_items'           => __( 'All Slider', 'IProperty' ),
		'view_item'           => __( 'View Slider', 'IProperty' ),
		'add_new_item'        => __( 'Add New Slider', 'IProperty' ),
		'add_new'             => __( 'Add New', 'IProperty' ),
		'edit_item'           => __( 'Edit Slider', 'IProperty' ),
		'update_item'         => __( 'Update Slider', 'IProperty' ),
		'search_items'        => __( 'Search Slider', 'IProperty' ),
		'not_found'           => __( 'Not Found', 'IProperty' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'IProperty' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Slider', 'IProperty' ),
		'description'         => __( 'Slider news and reviews', 'IProperty' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title','thumbnail' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'slider' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'slider', $args );

}
add_action( 'init', 'custom_slider_post_type', 0 );

add_action('init', 'hide_slider_editor');
    function hide_slider_editor() {
        remove_post_type_support( 'slider', 'editor' );
 }





?>