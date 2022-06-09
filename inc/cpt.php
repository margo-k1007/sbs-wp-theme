<?php
/**
 * Custom Post Types (CPT) Settings
 *
 * @package sbs
 */

/* ==========================================================================
 *  Register Custom Post Type
 * ========================================================================== */
add_action( 'init', 'register_post_types' );
function register_post_types() {

    register_taxonomy( 'case-studies-service', 'case-studies', array(
            'hierarchical' => true,
            'label' => '',
            'labels'                => [
                'name'              => 'Services',
                'singular_name'     => 'Service',
                'search_items'      => 'Search Service',
                'all_items'         => 'All Services',
                'view_item '        => 'View Service',
                'parent_item'       => 'Parent Services',
                'parent_item_colon' => 'Parent Services:',
                'edit_item'         => 'Edit Services',
                'update_item'       => 'Update Services',
                'add_new_item'      => 'Add New Services',
                'new_item_name'     => 'New Services Name',
                'menu_name'         => 'Services',
            ],
            'sort' => true,
            'query_var' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'public' => true,
            'has_archive' => false,
            'default_term' => 'residential-property',
            'hierarchical' => true,
        )
    );

    register_taxonomy( 'case-studies-category', 'case-studies', array(
            'hierarchical' => true,
            'label' => '',
            'labels'                => [
                'name'              => 'Categories',
                'singular_name'     => 'Category',
                'search_items'      => 'Search Category',
                'all_items'         => 'All Categories',
                'view_item '        => 'View Category',
                'parent_item'       => 'Parent Categories',
                'parent_item_colon' => 'Parent Categories:',
                'edit_item'         => 'Edit Categories',
                'update_item'       => 'Update Categories',
                'add_new_item'      => 'Add New Categories',
                'new_item_name'     => 'New Categories Name',
                'menu_name'         => 'Categories',
            ],
            'sort' => true,
            'query_var' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'public' => true,
            'has_archive' => false,
            'hierarchical' => true,
        )
    );

//    register_post_type( 'services', [
//        'label'                 => 'Service',
//        'labels'                => array(
//            'name'              => 'Services',
//            'singular_name'     => 'Service',
//            'menu_name'         => 'Services',
//        ),
//        'public'              => true,
//        'publicly_queryable'  => true,
//        'show_ui'             => true,
//        'rest_base'           => '',
//        'show_in_menu'        => true,
//        'hierarchical'        => false,
//        'has_archive'         => false,
//        'query_var'           => true,
//        'supports'            => array( 'title', 'thumbnail', 'excerpt'),
//        'menu_icon' => 'dashicons-portfolio',
//    ] );

    register_post_type( 'case-studies', [
        'label'                 => 'Case Study',
        'labels'                => array(
            'name'              => 'Case Studies',
            'singular_name'     => 'Case Study',
            'menu_name'         => 'Case Studies',
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'hierarchical'        => false,
        'has_archive'         => false,
        'query_var'           => true,
        'supports'            => array( 'title', 'thumbnail'),
        'menu_icon' => 'dashicons-building',
    ] );

    register_post_type( 'testimonials', [
        'label'                 => 'Testimonial',
        'labels'                => array(
            'name'              => 'Testimonials',
            'singular_name'     => 'Testimonial',
            'menu_name'         => 'Testimonials',
        ),
        'public'              => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'hierarchical'        => false,
        'has_archive'         => false,
        'query_var'           => false,
        'supports'            => array( 'title', 'editor'),
        'menu_icon' => 'dashicons-testimonial',
    ] );

}

/* ==========================================================================
 *  Add the data to the custom columns for post type
 * ========================================================================== */
add_filter( 'manage_case-studies_posts_columns', 'set_custom_edit_case_studies_columns' );
function set_custom_edit_case_studies_columns($columns) {

    foreach($columns as $key=>$value) {
        if($key=='date') {
            $new['case-studies-service'] = __( 'Service', 'sbs' );
            $new['case-studies-category'] = __( 'Category', 'sbs' );
        }
        $new[$key]=$value;
    }

    return $new;
}

add_action( 'manage_case-studies_posts_custom_column' , 'custom_case_studies_column', 10, 2 );
function custom_case_studies_column( $column, $post_id ) {
    switch ( $column ) {

        case 'case-studies-service' :
            $terms = get_the_term_list( $post_id , 'case-studies-service' , '' , ',' , '' );
            if ( is_string( $terms ) )
                echo $terms;
            else
                _e( 'Unable to get service(s)', 'sbs' );
            break;

        case 'case-studies-category' :
            $terms = get_the_term_list( $post_id , 'case-studies-category' , '' , ',' , '' );
            if ( is_string( $terms ) )
                echo $terms;
            else
                _e( 'Unable to get category(es)', 'sbs' );
            break;

    }
}