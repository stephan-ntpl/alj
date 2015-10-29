<?php
/* custom post type Page*/

// Post type  for testimonial

function create_banner_posttype() {

	register_post_type( 'banner',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Header Banner' ),
				'singular_name' => __( 'Header Banner' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'banner'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_banner_posttype' );
/*
* Creating a function to create our CPT
*/
add_action( 'init', 'create_banner_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_banner_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Header Banner', 'taxonomy general name' ),
		'singular_name'     => _x( 'Header Banner', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Header Banner' ),
		'all_items'         => __( 'All Header Banner' ),
		'parent_item'       => __( 'Parent Header Banner' ),
		'parent_item_colon' => __( 'Parent Header Banner:' ),
		'edit_item'         => __( 'Edit Header Banner' ),
		'update_item'       => __( 'Update Header Banner' ),
		'add_new_item'      => __( 'Add New Header Banner' ),
		'new_item_name'     => __( 'New Header Banner Name' ),
		'menu_name'         => __( 'Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'banner' ),
	);

	register_taxonomy( 'banner', array( 'banner' ), $args );

	
}

function custom_banner_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Header Banner', 'Post Type General Name', 'IProperty' ),
		'singular_name'       => _x( 'Header Banner', 'Post Type Singular Name', 'IProperty' ),
		'menu_name'           => __( 'Header Banner', 'IProperty' ),
		'parent_item_colon'   => __( 'Parent Header Banner', 'IProperty' ),
		'all_items'           => __( 'All Header Banner', 'IProperty' ),
		'view_item'           => __( 'View Header Banner', 'IProperty' ),
		'add_new_item'        => __( 'Add New Header Banner', 'IProperty' ),
		'add_new'             => __( 'Add New', 'IProperty' ),
		'edit_item'           => __( 'Edit Header Banner', 'IProperty' ),
		'update_item'         => __( 'Update Header Banner', 'IProperty' ),
		'search_items'        => __( 'Search Header Banner', 'IProperty' ),
		'not_found'           => __( 'Not Found', 'IProperty' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'IProperty' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'Header Banner', 'IProperty' ),
		'description'         => __( 'Header Banner news and reviews', 'IProperty' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title','thumbnail' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'banner' ),
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
	register_post_type( 'banner', $args );

}
add_action( 'init', 'custom_banner_post_type', 0 );

add_action('init', 'hide_banner_editor');
    function hide_banner_editor() {
        remove_post_type_support( 'banner', 'editor' );
 }

// shortcode for banner
add_shortcode ( 'working-banner','working_banner');
function working_banner(){
ob_start();
global $wpdb,$post; 

$ourteam_category_check = '21';

    $niche_ourteam_args = array(
            'post_type' => 'banner',
           // 'cat'   => $ourteam_category_check,                 
            'orderby' => 'post_date',               
            'order' => 'DESC',
            'post_status' => 'publish',
			'post_per_page'=>'1',
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ),
            ),
       'tax_query' => array(
            array(
                'taxonomy' => 'banner',
                'field' => 'term_id',
                'terms'    => $ourteam_category_check
            ),
       ),
   ); 
$working_loop = new WP_Query( $niche_ourteam_args );

if( $working_loop->have_posts() ) {
	while ($working_loop->have_posts()) : $working_loop->the_post();
      if ( has_post_thumbnail() ) {
		   $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
            ?>
			<img src="<?php echo $feat_image_url ;?>" alt="" class="top-bg"/>
			<div class="b-top">
						<div class="top valign">
							<h1><?php echo the_title();?></h1>
						</div>
			</div>
			<?php
        }
	
	endwhile; 
}												
wp_reset_query();
return ob_get_clean();
}

add_shortcode ( 'living-banner','living_banner');
function living_banner(){
ob_start();
global $wpdb,$post; 

$living_fet_id = '22';

    $living_args = array(
            'post_type' => 'banner',
           // 'cat'   => $ourteam_category_check,                 
            'orderby' => 'post_date',               
            'order' => 'DESC',
            'post_status' => 'publish',
			'post_per_page'=>'1',
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ),
            ),
       'tax_query' => array(
            array(
                'taxonomy' => 'banner',
                'field' => 'term_id',
                'terms'    => $living_fet_id
            ),
       ),
   ); 
$living_loop = new WP_Query( $living_args );

if( $living_loop->have_posts() ) {
	while ($living_loop->have_posts()) : $living_loop->the_post();
      if ( has_post_thumbnail() ) {
		   $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
            ?>
			<img src="<?php echo $feat_image_url ;?>" alt="" class="top-bg"/>
			<div class="b-top">
						<div class="top valign">
							<h1><?php echo the_title();?></h1>
						</div>
			</div>
			<?php
        }
	
	endwhile; 
}												
wp_reset_query();
return ob_get_clean();
}

add_shortcode ( 'who-banner','who_banner');
function who_banner(){
ob_start();
global $wpdb,$post; 

$who_fet_id = '23';

    $who_args = array(
            'post_type' => 'banner',
           // 'cat'   => $ourteam_category_check,                 
            'orderby' => 'post_date',               
            'order' => 'DESC',
            'post_status' => 'publish',
			'post_per_page'=>'1',
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ),
            ),
       'tax_query' => array(
            array(
                'taxonomy' => 'banner',
                'field' => 'term_id',
                'terms'    => $who_fet_id
            ),
       ),
   ); 
$who_loop = new WP_Query( $who_args );

if( $who_loop->have_posts() ) {
	while ($who_loop->have_posts()) : $who_loop->the_post();
      if ( has_post_thumbnail() ) {
		   $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
            ?>
			<img src="<?php echo $feat_image_url ;?>" alt="" class="top-bg"/>
			<div class="b-top">
						<div class="top valign">
							<h1><?php echo the_title();?></h1>
						</div>
			</div>
			<?php
        }
	
	endwhile; 
}												
wp_reset_query();
return ob_get_clean();
}

?>