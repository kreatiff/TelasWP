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
			'capability_type' 		=> array( 'telas_course', 'telas_courses' ),
			'map_meta_cap'			=> true
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
			'capability_type'		=> array( 'telas_assessment', 'telas_assessments' ),
			'map_meta_cap'			=> true
		) );
	}


	function add_course_submitters_role() {
		if ( get_option( 'course_submitters_role_version' ) < 1 ) {
			$role_capabilites_args = array(
				'read' => true,
				'edit_posts' => false,
				'delete_posts' => false,
				'publish_posts' => false,
				'upload_files' => false,
			);
			add_role( 'telas_course_submitters', 'Course Submitters', $role_capabilites_args );
			update_option( 'course_submitters_role_version', 1 );
		}
		
	}

	function add_self_assessor_role() {
		if ( get_option( 'self_assessor_role_version' ) < 1 ) {
			$role_capabilites_args = array(
				'read' => true,
				'edit_posts' => false,
				'delete_posts' => false,
				'publish_posts' => false,
				'upload_files' => false,
			);
			add_role( 'telas_self_assessor', 'Self Assessor', $role_capabilites_args );
			update_option( 'self_assessor_role_version', 1 );
		}
	}

	function add_certified_reviewers_role() {
		if ( get_option( 'certified_reviewers_role_version' ) < 1 ) {
			$role_capabilites_args = array(
				'read' => true,
				'edit_posts' => false,
				'delete_posts' => false,
				'publish_posts' => false,
				'upload_files' => false,
			);
			add_role( 'telas_certified_reviewers', 'Certified Reviewers', $role_capabilites_args );
			update_option( 'certified_reviewers_role_version', 1 );
		}
	}
	function add_telas_administrator_role() {
		if ( get_option( 'telas_administrator_role_version' ) < 1 ) {
			$role_capabilites_args = array(
				'read' => true,
				'edit_posts' => false,
				'delete_posts' => false,
				'publish_posts' => false,
				'upload_files' => false,
			);
			add_role( 'telas_telas_administrator', 'TELAS Administrator', $role_capabilites_args );
			update_option( 'telas_administrator_role_version', 1 );
		}
	}
	function add_custom_post_type_capabilites_for_super_admin() {
		$role = get_role( 'administrator' );
		$role->add_cap( 'read' );
		$role->add_cap( 'read_telas_course');
		$role->add_cap( 'read_private_telas_courses' );
		$role->add_cap( 'edit_telas_course' );
		$role->add_cap( 'edit_telas_courses' );
		$role->add_cap( 'edit_others_telas_courses' );
		$role->add_cap( 'edit_published_telas_courses' );
		$role->add_cap( 'publish_telas_courses' );
		$role->add_cap( 'delete_others_telas_courses' );
		$role->add_cap( 'delete_private_telas_courses' );
		$role->add_cap( 'delete_published_telas_courses' );
		//Cap for assessments
		$role->add_cap( 'read_telas_assessment');
		$role->add_cap( 'read_private_telas_assessments' );
		$role->add_cap( 'edit_telas_assessment' );
		$role->add_cap( 'edit_telas_assessments' );
		$role->add_cap( 'edit_others_telas_assessments' );
		$role->add_cap( 'edit_published_telas_assessments' );
		$role->add_cap( 'publish_telas_assessments' );
		$role->add_cap( 'delete_others_telas_assessments' );
		$role->add_cap( 'delete_private_telas_assessments' );
		$role->add_cap( 'delete_published_telas_assessments' );
	}
	
	function add_custom_post_type_capabilites_for_telas_telas_administrator() {
		$role = get_role( 'telas_telas_administrator' );
		$role->add_cap( 'read' );
		$role->add_cap( 'read_telas_course');
		$role->add_cap( 'read_private_telas_courses' );
		$role->add_cap( 'edit_telas_course' );
		$role->add_cap( 'edit_telas_courses' );
		$role->add_cap( 'edit_others_telas_courses' );
		$role->add_cap( 'edit_published_telas_courses' );
		$role->add_cap( 'publish_telas_courses' );
		$role->add_cap( 'delete_others_telas_courses' );
		$role->add_cap( 'delete_private_telas_courses' );
		$role->add_cap( 'delete_published_telas_courses' );
		//Cap for assessments
		$role->add_cap( 'read_telas_assessment');
		$role->add_cap( 'read_private_telas_assessments' );
		$role->add_cap( 'edit_telas_assessment' );
		$role->add_cap( 'edit_telas_assessments' );
		$role->add_cap( 'edit_others_telas_assessments' );
		$role->add_cap( 'edit_published_telas_assessments' );
		$role->add_cap( 'publish_telas_assessments' );
		$role->add_cap( 'delete_others_telas_assessments' );
		$role->add_cap( 'delete_private_telas_assessments' );
		$role->add_cap( 'delete_published_telas_assessments' );
	}
	function add_custom_cap_for_course_submitters_role() {
		$role = get_role( 'telas_course_submitters' );
		$role->add_cap( 'read' );
		$role->add_cap( 'read_telas_course');
		$role->add_cap( 'read_private_telas_courses' );
		$role->add_cap( 'edit_telas_course' );
		$role->add_cap( 'edit_telas_courses' );
		$role->add_cap( 'edit_others_telas_courses' );
		$role->add_cap( 'edit_published_telas_courses' );
		$role->add_cap( 'publish_telas_courses' );
		$role->add_cap( 'delete_others_telas_courses' );
		$role->add_cap( 'delete_private_telas_courses' );
		$role->add_cap( 'delete_published_telas_courses' );
		//temp
		$role->remove_cap( 'read_telas_assessments');
		$role->remove_cap( 'read_private_telas_assessments' );
		$role->remove_cap( 'edit_telas_assessment' );
		$role->remove_cap( 'edit_telas_assessments' );
		$role->remove_cap( 'edit_others_telas_assessments' );
		$role->remove_cap( 'edit_published_telas_assessments' );
		$role->remove_cap( 'publish_telas_assessments' );
		$role->remove_cap( 'delete_others_telas_assessments' );
		$role->remove_cap( 'delete_private_telas_assessments' );
		$role->remove_cap( 'delete_published_telas_assessments' );
	}

	function add_custom_cap_for_self_assessor_role() {
		$role = get_role( 'telas_self_assessor' );
		$role->add_cap( 'read' );
		$role->add_cap( 'read_telas_course');
		$role->remove_cap( 'read_private_telas_courses' );
		$role->add_cap( 'edit_telas_course' );
		$role->add_cap( 'edit_telas_courses' );
		
		$role->add_cap( 'read_telas_assessment');
		$role->add_cap( 'read_private_telas_assessments' );
		$role->add_cap( 'edit_telas_assessment' );
		$role->add_cap( 'edit_telas_assessments' );
		$role->add_cap( 'edit_others_telas_assessments' );
		$role->add_cap( 'edit_published_telas_assessments' );
		$role->add_cap( 'publish_telas_assessments' );
		$role->remove_cap( 'delete_others_telas_assessments' );
		$role->add_cap( 'delete_private_telas_assessments' );
		$role->add_cap( 'delete_published_telas_assessments' );
	}
	
	
	function add_custom_cap_for_certified_reviews_role() {
		$role = get_role( 'telas_certified_reviewers' );
		$role->add_cap( 'read' );
		$role->add_cap( 'read_telas_course');
		$role->remove_cap( 'read_private_telas_courses' );
		$role->add_cap( 'edit_telas_course' );
		$role->add_cap( 'edit_telas_courses' );
		
		$role->add_cap( 'read_telas_assessment');
		$role->add_cap( 'read_private_telas_assessments' );
		$role->add_cap( 'edit_telas_assessment' );
		$role->add_cap( 'edit_telas_assessments' );
		$role->add_cap( 'edit_others_telas_assessments' );
		$role->add_cap( 'edit_published_telas_assessments' );
		$role->add_cap( 'publish_telas_assessments' );
		$role->remove_cap( 'delete_others_telas_assessments' );
		$role->add_cap( 'delete_private_telas_assessments' );
		$role->add_cap( 'delete_published_telas_assessments' );
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

	function register_assessment_field() {
		if( function_exists('acf_add_local_field_group') ):
			acf_add_local_field_group(array(
				'key' => 'group_5d7b2f1716679',
				'title' => 'Course Assessment— Self-Assessor',
				'fields' => array(
					array(
						'key' => 'field_5d7b30969d223',
						'label' => 'The online learning environment is inclusive.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 1,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b31b0a3a42',
						'label' => 'Learning environment ensures content is available through a variety of formats',
						'name' => 'self_assessor_question_one',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => 0,
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b32606795e',
						'label' => 'Language used is appropriate and inclusive (including consistent tone, voice, person)',
						'name' => 'self_assessor_question_two',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b32856795f',
						'label' => 'There is evidence that diverse perspec ves are respected',
						'name' => 'self_assessor_question_three',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b329afa188',
						'label' => 'The online environment is responsive across devices and platforms.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 0,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b32b9fa18a',
						'label' => 'The online environment is responsive across different contemporary devices, e.g. screen size adjusting',
						'name' => 'self_assessor_question_four',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3361e8963',
						'label' => 'The online environment and integrated technology are compatible with contemporary browsers.',
						'name' => 'self_assessor_question_five',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3388e8964',
						'label' => 'The online environment and integrated technology are compatible across multiple platforms and',
						'name' => 'self_assessor_question_six',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b33fde8966',
						'label' => 'Students have opportunities, and are explicitly invited, to provide feedback.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 0,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b33cae8965',
						'label' => 'Students have opportunities, and are explicitly invited, to provide feedback.',
						'name' => 'self_assessor_question_seven',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => 0,
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3418e8967',
						'label' => 'Students are informed about how their feedback is going to be collected and used.',
						'name' => 'self_assessor_question_eight',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => 0,
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b342ee8968',
						'label' => 'Self-Assessor Comments',
						'name' => 'self_assessor_comments',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => 4,
						'new_lines' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'telas_assessment',
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
				'key' => 'group_5d7b3775b7a26',
				'title' => 'Course Assessment—Combined Review',
				'fields' => array(
					array(
						'key' => 'field_5d7b3775be4ba',
						'label' => 'The online learning environment is inclusive.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 1,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b3775be504',
						'label' => 'Learning environment ensures content is available through a variety of formats',
						'name' => 'combined_review_question_one',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3775be58b',
						'label' => 'Language used is appropriate and inclusive (including consistent tone, voice, person)',
						'name' => 'combined_review_question_two',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3775be5cd',
						'label' => 'There is evidence that diverse perspectives are respected',
						'name' => 'combined_review_question_three',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3775be610',
						'label' => 'The online environment is responsive across devices and plaƞorms.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 0,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b3775be652',
						'label' => 'The online environment is responsive across different contemporary devices, e.g. screen size adjusting',
						'name' => 'combined_review_question_four',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3775be697',
						'label' => 'The online environment and integrated technology are compatible with contemporary browsers.',
						'name' => 'combined_review_question_five',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3775be6db',
						'label' => 'The online environment and integrated technology are compatible across multiple platforms and',
						'name' => 'combined_review_question_six',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3775be75a',
						'label' => 'Students have opportunites, and are explicitly invited, to provide feedback.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 0,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b3775be79d',
						'label' => 'Students have opportunities to provide feedback.',
						'name' => 'combined_review_question_seven',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3775be7e0',
						'label' => 'Students are informed about how their feedback is going to be collected and used.',
						'name' => 'combined_review_question_eight',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3775be823',
						'label' => 'Second Reviewer Comments',
						'name' => 'combined_review_comments',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => 0,
						'new_lines' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'telas_assessment',
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
				'key' => 'group_5d7b34873648a',
				'title' => 'Course Assessment—First Reviewer',
				'fields' => array(
					array(
						'key' => 'field_5d7b35032b2ea',
						'label' => 'The online learning environment is inclusive.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 1,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b350c2b2eb',
						'label' => 'Learning environment ensures content is available through a variety of formats',
						'name' => 'first_reviewer_question_one',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b35422b2ec',
						'label' => 'Language used is appropriate and inclusive (including consistent tone, voice, person)',
						'name' => 'first_reviewer_question_two',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b357d2b2ee',
						'label' => 'There is evidence that diverse perspectives are respected',
						'name' => 'first_reviewer_question_three',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b35962b2ef',
						'label' => 'The online environment is responsive across devices and plaƞorms.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 0,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b359e2b2f0',
						'label' => 'The online environment is responsive across different contemporary devices, e.g. screen size adjusting',
						'name' => 'first_reviewer_question_four',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b35c62b2f1',
						'label' => 'The online environment and integrated technology are compatible with contemporary browsers.',
						'name' => 'first_reviewer_question_five',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b35dc2b2f2',
						'label' => 'The online environment and integrated technology are compatible across multiple platforms and',
						'name' => 'first_reviewer_question_six',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b35ff2b2f3',
						'label' => 'Students have opportunites, and are explicitly invited, to provide feedback.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 0,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b362a2b2f5',
						'label' => 'Students have opportunities to provide feedback.',
						'name' => 'first_reviewer_question_seven',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b364b2b2f6',
						'label' => 'Students are informed about how their feedback is going to be collected and used.',
						'name' => 'first_reviewer_question_eight',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b36542b2f7',
						'label' => 'First Reviewer Comments',
						'name' => 'first_reviewer_comments',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => 0,
						'new_lines' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'telas_assessment',
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
				'key' => 'group_5d7b370412edd',
				'title' => 'Course Assessment—Second Reviewer',
				'fields' => array(
					array(
						'key' => 'field_5d7b370418796',
						'label' => 'The online learning environment is inclusive.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 1,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b3704187ec',
						'label' => 'Learning environment ensures content is available through a variety of formats',
						'name' => 'second_reviewer_question_one',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b370418830',
						'label' => 'Language used is appropriate and inclusive (including consistent tone, voice, person)',
						'name' => 'second_reviewer_question_two',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b370418873',
						'label' => 'There is evidence that diverse perspectives are respected',
						'name' => 'second_reviewer_question_three',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3704188b6',
						'label' => 'The online environment is responsive across devices and plaƞorms.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 0,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b3704188fb',
						'label' => 'The online environment is responsive across different contemporary devices, e.g. screen size adjusting',
						'name' => 'second_reviewer_question_four',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b37041893e',
						'label' => 'The online environment and integrated technology are compatible with contemporary browsers.',
						'name' => 'second_reviewer_question_five',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b370418981',
						'label' => 'The online environment and integrated technology are compatible across multiple platforms and',
						'name' => 'second_reviewer_question_six',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b3704189c3',
						'label' => 'Students have opportunites, and are explicitly invited, to provide feedback.',
						'name' => '',
						'type' => 'accordion',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'open' => 0,
						'multi_expand' => 0,
						'endpoint' => 0,
					),
					array(
						'key' => 'field_5d7b370418a08',
						'label' => 'Students have opportunities to provide feedback.',
						'name' => 'second_reviewer_question_seven',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b370418a4d',
						'label' => 'Students are informed about how their feedback is going to be collected and used.',
						'name' => 'second_reviewer_question_eight',
						'type' => 'radio',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							0 => '0',
							1 => '1',
							2 => '2',
							3 => '3',
						),
						'allow_null' => 0,
						'other_choice' => 0,
						'default_value' => '',
						'layout' => 'horizontal',
						'return_format' => 'value',
						'save_other_choice' => 0,
					),
					array(
						'key' => 'field_5d7b370418a90',
						'label' => 'Second Reviewer Comments',
						'name' => 'second_reviewer_comments',
						'type' => 'textarea',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => 0,
						'new_lines' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'telas_assessment',
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

		endif;
	}

	function register_routes() {
		$version = '1';
		$namespace = 'extended-telasweb/v' . $version;
		$base = 'register';
		register_rest_route( $namespace, '/' . $base, array(
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'register_user_callback' ),
			)
		));
	}

	function register_user_callback( $request ) {
		$all_params = $request->get_params();
		$new_user_data = array(
			'user_login' => $all_params['email'],
			'user_nicename' => $all_params['firstName'] . ' ' . $all_params['lastName'],
			'user_email' => $all_params['email'],
			'display_name' => $all_params['firstName'] . ' ' . $all_params['lastName'],
			'first_name' => $all_params['firstName'],
			'last_name' => $all_params['lastName'],
			'role' => $all_params['telasRole'],
			'nickname' => $all_params['firstName'].$all_params['lastName'],
			'user_pass' => NULL

		);
		$new_user_id = wp_insert_user( $new_user_data );
		if ( is_wp_error( $new_user_id ) ) {
			$error_code = $new_user_id->get_error_code();
			return new WP_Error(
				'[extend_telas] ' . $error_code,
				$new_user_id->get_error_message( $error_code ),
				array(
					'status' => 403,
				)
			);
		}
		update_user_meta( $new_user_id, 'position', $all_params['position'] );
		update_user_meta( $new_user_id, 'faculty', $all_params['faculty'] );
		update_user_meta( $new_user_id, 'institution_name', $all_params['institutionName'] );
		update_user_meta( $new_user_id, 'institution_campus', $all_params['institutionCampus'] );
		update_user_meta( $new_user_id, 'institution_state', $all_params['institutionState'] );
		update_user_meta( $new_user_id, 'institution_country', $all_params['institutionCountry'] );
		$data = array(
			'full_name'         => $all_params['firstName'] . ' ' . $all_params['lastName'],
			'user_id'           => $new_user_id,
			'user_email'        => $all_params['email']
		);

		return apply_filters( 'extend_telas_before_dispatch', $data );
	}

	function register_acf_field_for_users() {
		if( function_exists('acf_add_local_field_group') ):
			acf_add_local_field_group(array(
				'key' => 'group_5d805f37e4856',
				'title' => 'User Fields',
				'fields' => array(
					array(
						'key' => 'field_5d805f3e1d321',
						'label' => 'Position',
						'name' => 'position',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5d805f4e1d322',
						'label' => 'Faculty/Dept',
						'name' => 'faculty',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5d805f831d323',
						'label' => 'Institution Name',
						'name' => 'institution_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5d805f901d324',
						'label' => 'Institution Campus',
						'name' => 'institution_campus',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5d805f971d325',
						'label' => 'Institution State / Region',
						'name' => 'institution_state',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5d805f9f1d326',
						'label' => 'Institution Country',
						'name' => 'institution_country',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'user_role',
							'operator' => '==',
							'value' => 'all',
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

		endif;
	}
}
