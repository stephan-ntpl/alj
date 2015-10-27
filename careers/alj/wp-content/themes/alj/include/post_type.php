<?php
/* custom post type Page*/

// Post type  for testimonial

function create_testimonial_posttype() {

	register_post_type( 'testimonial',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Testimonial' ),
				'singular_name' => __( 'Testimonial' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'testimonial'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_testimonial_posttype' );
/*
* Creating a function to create our CPT
*/
add_action( 'init', 'create_testimonial_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_testimonial_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Testimonial', 'taxonomy general name' ),
		'singular_name'     => _x( 'Testimonial', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Testimonial' ),
		'all_items'         => __( 'All Testimonial' ),
		'parent_item'       => __( 'Parent Testimonial' ),
		'parent_item_colon' => __( 'Parent Testimonial:' ),
		'edit_item'         => __( 'Edit Testimonial' ),
		'update_item'       => __( 'Update Testimonial' ),
		'add_new_item'      => __( 'Add New Testimonial' ),
		'new_item_name'     => __( 'New Testimonial Name' ),
		'menu_name'         => __( 'Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'testimonial' ),
	);

	register_taxonomy( 'testimonial', array( 'testimonial' ), $args );

	
}

function custom_testimonial_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Testimonial', 'Post Type General Name', 'IProperty' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'IProperty' ),
		'menu_name'           => __( 'Testimonial', 'IProperty' ),
		'parent_item_colon'   => __( 'Parent Testimonial', 'IProperty' ),
		'all_items'           => __( 'All Testimonial', 'IProperty' ),
		'view_item'           => __( 'View Testimonial', 'IProperty' ),
		'add_new_item'        => __( 'Add New Testimonial', 'IProperty' ),
		'add_new'             => __( 'Add New', 'IProperty' ),
		'edit_item'           => __( 'Edit Testimonial', 'IProperty' ),
		'update_item'         => __( 'Update Testimonial', 'IProperty' ),
		'search_items'        => __( 'Search Testimonial', 'IProperty' ),
		'not_found'           => __( 'Not Found', 'IProperty' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'IProperty' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Testimonial', 'IProperty' ),
		'description'         => __( 'Testimonial news and reviews', 'IProperty' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor','thumbnail' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'testimonial' ),
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
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'custom_testimonial_post_type', 0 );

// testimonial custom meta field
function testimonial_add_meta_box() {
	$screens = array( 'testimonial' );
	foreach ( $screens as $screen ) {
		add_meta_box(
			'myplugin_sectionid',
			__( 'Testimonial Fields', 'testimonial_meta_box' ),
			'testimonial_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'testimonial_add_meta_box' );

function testimonial_meta_box_callback( $post ) {
	wp_nonce_field( 'blog_save_meta_box_data', 'testimonial_meta_box_nonce' );
	$author = get_post_meta( $post->ID, '_author', true );
	$link = get_post_meta( $post->ID, '_link', true );
   
	echo '<label for="Blog Date">';
	_e( 'Author Name:-', 'testimonial_meta_box' );
	echo '</label> ';
	echo '<input type="text" id="author" class="author" name="author" value="' . esc_attr( $author ) . '" size="62" />'."<br/><br/>";
    
	echo '<label for="Blog Date">';
	_e( 'Title Link:-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'testimonial_meta_box' );
	echo '</label> ';
	echo '<input type="text" id="link" class="link" name="link" value="' . esc_attr( $link ) . '" size="62" />'."<br/><br/>";
	echo '<label for="Blog Date">';
	_e( 'Placeholder Image:-', 'testimonial_meta_box' );
	echo '</label> ';
	echo '<input id="upload_image" type="text" size="36" name="upload_image" value="" />';
	echo '<input id="upload_image_button" type="button" value="Upload Image" />';
}

function blog_save_meta_box_data( $post_id ) {

	if ( ! isset( $_POST['testimonial_meta_box_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['testimonial_meta_box_nonce'], 'blog_save_meta_box_data' ) ) {
		return;
	}
	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	// Make sure that it is set.
    if ( ! isset( $_POST['author'] ) ) {
		return;
	}
	if ( ! isset( $_POST['link'] ) ) {
		return;
	}
	// Sanitize user input.
    $author_field= sanitize_text_field( $_POST['author'] );
	$Link_field= sanitize_text_field( $_POST['link'] );
	// Update the meta field in the database.
    update_post_meta( $post_id, '_author', $author_field);
	update_post_meta( $post_id, '_link', $Link_field );

}
add_action( 'save_post', 'blog_save_meta_box_data' );



?>