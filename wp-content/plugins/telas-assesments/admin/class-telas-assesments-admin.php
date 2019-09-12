<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.telas.edu.au 
 * @since      1.0.0
 *
 * @package    Telas_Assesments
 * @subpackage Telas_Assesments/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Telas_Assesments
 * @subpackage Telas_Assesments/admin
 * @author     TELAS <telas@contactus.com>
 */
class Telas_Assesments_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Telas_Assesments_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Telas_Assesments_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/telas-assesments-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Telas_Assesments_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Telas_Assesments_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/telas-assesments-admin.js', array( 'jquery' ), $this->version, false );

	}

	function register_post_types() {
		register_post_type( 'telas_courses', array(
			'labels'                => array(
				'name'                  => __( 'Courses', 'telas-web' ),
				'singular_name'         => __( 'Course', 'telas-web' ),
				'all_items'             => __( 'All Courses', 'telas-web' ),
				'archives'              => __( 'Courses Archives', 'telas-web' ),
				'attributes'            => __( 'Courses Attributes', 'telas-web' ),
				'insert_into_item'      => __( 'Insert into Courses', 'telas-web' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Courses', 'telas-web' ),
				'featured_image'        => _x( 'Featured Image', 'telas-courses', 'telas-web' ),
				'set_featured_image'    => _x( 'Set featured image', 'telas-courses', 'telas-web' ),
				'remove_featured_image' => _x( 'Remove featured image', 'telas-courses', 'telas-web' ),
				'use_featured_image'    => _x( 'Use as featured image', 'telas-courses', 'telas-web' ),
				'filter_items_list'     => __( 'Filter Courses list', 'telas-web' ),
				'items_list_navigation' => __( 'Courses list navigation', 'telas-web' ),
				'items_list'            => __( 'Courses list', 'telas-web' ),
				'new_item'              => __( 'New Course', 'telas-web' ),
				'add_new'               => __( 'Add New', 'telas-web' ),
				'add_new_item'          => __( 'Add New Course', 'telas-web' ),
				'edit_item'             => __( 'Edit Course', 'telas-web' ),
				'view_item'             => __( 'View Course', 'telas-web' ),
				'view_items'            => __( 'View Courses', 'telas-web' ),
				'search_items'          => __( 'Search Courses', 'telas-web' ),
				'not_found'             => __( 'No Courses found', 'telas-web' ),
				'not_found_in_trash'    => __( 'No Courses found in trash', 'telas-web' ),
				'parent_item_colon'     => __( 'Parent Courses:', 'telas-web' ),
				'menu_name'             => __( 'Courses', 'telas-web' ),
			),
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpts', 'comments'  ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'telas-courses',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		) );
		register_post_type( 'telas_assessment', array(
			'labels'                => array(
				'name'                  => __( 'Assessments', 'telas-web' ),
				'singular_name'         => __( 'Assessment', 'telas-web' ),
				'all_items'             => __( 'All Assessments', 'telas-web' ),
				'archives'              => __( 'Assessment Archives', 'telas-web' ),
				'attributes'            => __( 'Assessment Attributes', 'telas-web' ),
				'insert_into_item'      => __( 'Insert into Assessment', 'telas-web' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Assessment', 'telas-web' ),
				'featured_image'        => _x( 'Featured Image', 'telas-assessment', 'telas-web' ),
				'set_featured_image'    => _x( 'Set featured image', 'telas-assessment', 'telas-web' ),
				'remove_featured_image' => _x( 'Remove featured image', 'telas-assessment', 'telas-web' ),
				'use_featured_image'    => _x( 'Use as featured image', 'telas-assessment', 'telas-web' ),
				'filter_items_list'     => __( 'Filter Assessments list', 'telas-web' ),
				'items_list_navigation' => __( 'Assessments list navigation', 'telas-web' ),
				'items_list'            => __( 'Assessments list', 'telas-web' ),
				'new_item'              => __( 'New Assessment', 'telas-web' ),
				'add_new'               => __( 'Add New', 'telas-web' ),
				'add_new_item'          => __( 'Add New Assessment', 'telas-web' ),
				'edit_item'             => __( 'Edit Assessment', 'telas-web' ),
				'view_item'             => __( 'View Assessment', 'telas-web' ),
				'view_items'            => __( 'View Assessments', 'telas-web' ),
				'search_items'          => __( 'Search Assessments', 'telas-web' ),
				'not_found'             => __( 'No Assessments found', 'telas-web' ),
				'not_found_in_trash'    => __( 'No Assessments found in trash', 'telas-web' ),
				'parent_item_colon'     => __( 'Parent Assessment:', 'telas-web' ),
				'menu_name'             => __( 'Assessments', 'telas-web' ),
			),
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'telas-assessment',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		) );
	}

	function change_capabilities_of_telas_courses( $args, $post_type ) {
		if ( 'telas_courses' !== $post_type ) {
			return args;
		}

		$args['capabilities'] = array(
			'edit_post'  => 'edit_telas_courses',
			'edit_posts' => 'edit_telas_courses',
			'edit_others_posts' => 'edit_other_telas_courses',
			'publish_posts' => 'publish_telas_courses',
			'read_post' => 'read_telas_courses',
			'read_private_posts' => 'read_private_telas_courses',
			'delete_posts' => 'delete_telas_courses'
		);
		return $args;
	}
	
	function change_capabilities_of_telas_assessment( $args, $post_type ) {
		if ( 'telas_assessment' !== $post_type ) {
			return args;
		}

		$args['capabilities'] = array(
			'edit_post'  => 'edit_telas_assessment',
			'edit_posts' => 'edit_telas_assessment',
			'edit_others_posts' => 'edit_other_telas_assessment',
			'publish_posts' => 'publish_telas_assessment',
			'read_post' => 'read_telas_assessment',
			'read_private_posts' => 'read_private_telas_assessment',
			'delete_posts' => 'delete_telas_assessment'
		);
		return $args;
	}
	
	
	function register_post_type_relationship_fields() {
		if( function_exists('acf_add_local_field_group') ):
			acf_add_local_field_group(array(
				'key' => 'group_5d78c19436bee',
				'title' => 'Assessment',
				'fields' => array(
					array(
						'key' => 'field_5d78c1ae132d9',
						'label' => '',
						'name' => 'course_assessment',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'telas-assessment',
						),
						'taxonomy' => '',
						'filters' => array(
							0 => 'search',
						),
						'elements' => '',
						'min' => 1,
						'max' => 1,
						'return_format' => 'object',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'telas-courses',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));

			acf_add_local_field_group(array(
				'key' => 'group_5d78c2940405d',
				'title' => 'Course',
				'fields' => array(
					array(
						'key' => 'field_5d78c2bb7b542',
						'label' => '',
						'name' => 'assigned_course',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'telas-courses',
						),
						'taxonomy' => '',
						'filters' => array(
							0 => 'search',
						),
						'elements' => '',
						'min' => 1,
						'max' => 1,
						'return_format' => 'object',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'telas-assessment',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'left',
				'instruction_placement' => 'field',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));
		endif;
	}
}
