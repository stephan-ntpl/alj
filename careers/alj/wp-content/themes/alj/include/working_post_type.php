<?php
/* custom post type Page*/

// Post type  for testimonial

function create_working_posttype() {

	register_post_type( 'working',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Working' ),
				'singular_name' => __( 'Working' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'working'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_working_posttype' );
/*
* Creating a function to create our CPT
*/
add_action( 'init', 'create_working_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_working_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Working', 'taxonomy general name' ),
		'singular_name'     => _x( 'Working', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Working' ),
		'all_items'         => __( 'All Working' ),
		'parent_item'       => __( 'Parent Working' ),
		'parent_item_colon' => __( 'Parent Working:' ),
		'edit_item'         => __( 'Edit Working' ),
		'update_item'       => __( 'Update Working' ),
		'add_new_item'      => __( 'Add New Working' ),
		'new_item_name'     => __( 'New Working Name' ),
		'menu_name'         => __( 'Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'working' ),
	);

	register_taxonomy( 'working', array( 'working' ), $args );

	
}

function custom_working_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Working', 'Post Type General Name', 'IProperty' ),
		'singular_name'       => _x( 'Working', 'Post Type Singular Name', 'IProperty' ),
		'menu_name'           => __( 'Working', 'IProperty' ),
		'parent_item_colon'   => __( 'Parent Working', 'IProperty' ),
		'all_items'           => __( 'All Working', 'IProperty' ),
		'view_item'           => __( 'View Working', 'IProperty' ),
		'add_new_item'        => __( 'Add New Working', 'IProperty' ),
		'add_new'             => __( 'Add New', 'IProperty' ),
		'edit_item'           => __( 'Edit Working', 'IProperty' ),
		'update_item'         => __( 'Update Working', 'IProperty' ),
		'search_items'        => __( 'Search Working', 'IProperty' ),
		'not_found'           => __( 'Not Found', 'IProperty' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'IProperty' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Working', 'IProperty' ),
		'description'         => __( 'Working news and reviews', 'IProperty' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title','thumbnail' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'working' ),
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
	register_post_type( 'working', $args );

}
add_action( 'init', 'custom_working_post_type', 0 );







?>