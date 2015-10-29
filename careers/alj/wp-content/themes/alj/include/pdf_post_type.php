<?php
/* custom post type Page*/

// Post type  for testimonial

function create_pdf_posttype() {

	register_post_type( 'pdf',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'PDF' ),
				'singular_name' => __( 'PDF' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'pdf'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_pdf_posttype' );
/*
* Creating a function to create our CPT
*/
add_action( 'init', 'create_pdf_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_pdf_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'PDF', 'taxonomy general name' ),
		'singular_name'     => _x( 'PDF', 'taxonomy singular name' ),
		'search_items'      => __( 'Search PDF' ),
		'all_items'         => __( 'All PDF' ),
		'parent_item'       => __( 'Parent PDF' ),
		'parent_item_colon' => __( 'Parent PDF:' ),
		'edit_item'         => __( 'Edit PDF' ),
		'update_item'       => __( 'Update PDF' ),
		'add_new_item'      => __( 'Add New PDF' ),
		'new_item_name'     => __( 'New PDF Name' ),
		'menu_name'         => __( 'Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'pdf' ),
	);

	register_taxonomy( 'pdf', array( 'pdf' ), $args );

	
}

function custom_pdf_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'PDF', 'Post Type General Name', 'IProperty' ),
		'singular_name'       => _x( 'PDF', 'Post Type Singular Name', 'IProperty' ),
		'menu_name'           => __( 'PDF', 'IProperty' ),
		'parent_item_colon'   => __( 'Parent PDF', 'IProperty' ),
		'all_items'           => __( 'All PDF', 'IProperty' ),
		'view_item'           => __( 'View PDF', 'IProperty' ),
		'add_new_item'        => __( 'Add New PDF', 'IProperty' ),
		'add_new'             => __( 'Add New', 'IProperty' ),
		'edit_item'           => __( 'Edit PDF', 'IProperty' ),
		'update_item'         => __( 'Update PDF', 'IProperty' ),
		'search_items'        => __( 'Search PDF', 'IProperty' ),
		'not_found'           => __( 'Not Found', 'IProperty' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'IProperty' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'PDF', 'IProperty' ),
		'description'         => __( 'PDF news and reviews', 'IProperty' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title','thumbnail' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'pdf' ),
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
	register_post_type( 'pdf', $args );

}
add_action( 'init', 'custom_pdf_post_type', 0 );

add_action('init', 'hide_pdf_editor');
    function hide_pdf_editor() {
        remove_post_type_support( 'pdf', 'editor' );
 }





?>