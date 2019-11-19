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
		// add_action( 'wp_mail_failed', array( $this, 'onMailError' ), 10, 1 );

		// add_action( 'init', array( $this, 'new_user_notification' ) );
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
			'supports'              => array( 'title', 'author' ),
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

	function add_assessor_role() {
		if ( get_option( 'telas_assessor' ) < 1 ) {
			$role_capabilites_args = array(
				'read' => true,
				'edit_posts' => false,
				'delete_posts' => false,
				'publish_posts' => false,
				'upload_files' => false,
			);
			add_role( 'telas_assessor', 'Assessor', $role_capabilites_args );
			update_option( 'telas_assessor', 1 );
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
		$role->add_cap( 'list_users' );
	}
	
	function add_custom_post_type_capabilites_for_telas_telas_administrator() {
		$role = get_role( 'telas_telas_administrator' );

		$role->add_cap( 'list_users' );
		$role->add_cap('delete_users');
		$role->add_cap('delete_user');
		$role->add_cap('remove_users');
		$role->add_cap('remove_user');
		
		
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
		$role->add_cap( 'list_users' );
	}

	function add_custom_cap_for_telas_assessor_role() {
		$role = get_role( 'telas_assessor' );
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
		$role->add_cap( 'list_users' );
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
		register_rest_route( $namespace, '/' . 'register', array(
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( $this, 'register_user_callback' ),
			)
		));
		register_rest_field( 'user', 'user_extra', array(
			'get_callback' => function ($user) {
				return array(
					'first_name' => $user['first_name'],
					'last_name' => $user['last_name'],
					'user_email' => $user['email'],
					'user_meta' => get_user_meta( $user['id'] )
				);
			},
			'update_callback' => null,
			'schema' => null,
		));
		register_rest_route( $namespace, '/' . 'update-user', array(
			array(
				'methods' => WP_REST_Server::CREATABLE,
				'callback' => array( $this, 'update_user_callback' ),
			)
		));
		register_rest_route( $namespace, '/' . 'submit-course', array(
			'methods' => WP_REST_Server::CREATABLE,
			'callback' => array( $this, 'submit_course_callback' ),
			'permission_callback' => array( $this, 'submit_course_permission_callback' )
		));
		register_rest_route( $namespace, '/' . 'telas-users', array(
			'methods' => WP_REST_Server::READABLE,
			'callback' => array( $this, 'get_telas_users' )
		));
		register_rest_route( $namespace, '/' . 'telas-user', array(
			'methods' => WP_REST_Server::READABLE,
			'callback' => array( $this, 'get_tela_user_by_id' )
		));
		register_rest_field( 'telas_courses',
			'post_meta', // Add it to the response
			array(
				'get_callback'    => array( $this, 'prepare_post_meta' ), // Callback function - returns the value
				'update_callback' => null,
				'schema'          => null,
			)
		);
		register_rest_field( 'telas_courses',
			'featured_images', // Add it to the response
			array(
				'get_callback'    => array( $this, 'prepare_featured_image' ), // Callback function - returns the value
				'update_callback' => null,
				'schema'          => null,
			)
		);
		register_rest_field( 'telas_courses',
			'author_name',
			array(
				'get_callback' => array( $this, 'prepare_author_name' ),
				'update_callback' => null,
				'schema' => null,
			)
		);
		register_rest_field( 'telas_assessment',
			'course_detail',
			array(
				'get_callback' => array( $this, 'prepare_assessment_meta' ),
				'update_callback' => null,
				'schema' => null,
			)
		);
		register_rest_route( $namespace, '/' . 'create-assessment', array(
			array(
				'methods' => WP_REST_Server::CREATABLE,
				'callback' => array( $this, 'assign_assessors_callback' ),
				'permission_callback' => array( $this, 'assign_assessors_permission_callback' ),
			)
		));
		register_rest_route( $namespace, '/' . 'user-actions', array(
			array(
				'methods' => WP_REST_Server::CREATABLE,
				'callback' => array( $this, 'user_actions_callback' ),
				'permission_callback' => array( $this, 'user_actions_permission_callback' ),
			),
		));
		register_rest_route( $namespace, '/' . 'update-assessment', array(
			array(
				'methods' => WP_REST_Server::CREATABLE,
				'callback' => array( $this, 'update_assessment_callback' ),
			),
		));
		register_rest_field( 'telas_courses',
			'assesment_data',
			array(
				'get_callback' => array( $this, 'prepare_assessment_data' ),
				'update_callback' => null,
				'schema' => null,
			)
		);
	}
	function user_actions_permission_callback() {
		return current_user_can( 'delete_others_telas_assessments' );
	}
	function user_actions_callback( $request ) {
		$all_params = $request->get_params();
		if ( $all_params['action'] === 'approve' ) {
			update_user_meta( $all_params['user_id'], 'activated_by_admin', 'yes' );
			$user_data = get_userdata( $all_params['user_id'] );
			$user_role = in_array( 'telas_assessor', $user_data->roles ) ? get_user_meta( $user_data->ID, 'telas_assessor_level', true ) : $user_data->roles;
			$user_role = in_array( 'telas_course_submitters', $user_data->roles ) ? 'telas_course_submitters' : $user_data->roles;
			$user_role = in_array( 'telas_telas_administrator', $user_data->roles ) ? 'telas_telas_administrator' : $user_data->roles;
			if ( in_array( 'telas_assessor', $user_data->roles ) ) {
				$user_role = ! empty( get_user_meta( $user_data->ID, 'telas_assessor_level', true ) ) ? get_user_meta( $user_data->ID, 'telas_assessor_level', true ) : 'telas_interim_reviewers';
			} else if ( in_array( 'telas_course_submitters', $user_data->roles ) ) {
				$user_role = 'telas_course_submitters';
			} else if ( in_array( 'telas_telas_administrator', $user_data->roles ) ) {
				$user_role = 'telas_telas_administrator';
			} else {
				$user_role = '';
			}
			$user_details_meta_fields['first_name'] = $user_data->first_name; 
			$user_details_meta_fields['last_name'] = $user_data->last_name; 
			$user_details_meta_fields['user_email'] = $user_data->user_email;
			$user_details_meta_fields['user_role'] = $user_role;
			$user_details_meta_fields['user_id'] = $user_data->ID;
			$user_details_meta_fields['position'] = get_user_meta( $user_data->ID, 'position', true );
			$user_details_meta_fields['faculty'] = get_user_meta( $user_data->ID, 'faculty', true );
			$user_details_meta_fields['institution_name'] = get_user_meta( $user_data->ID, 'institution_name', true );
			$user_details_meta_fields['institution_campus'] = get_user_meta( $user_data->ID, 'institution_campus', true );
			$user_details_meta_fields['institution_state'] = get_user_meta( $user_data->ID, 'institution_state', true );
			$user_details_meta_fields['institution_country'] = get_user_meta( $user_data->ID, 'institution_country', true );
			$user_details_meta_fields['is_first_time'] = get_user_meta( $user_data->ID, 'is_first_time_updating', true );
			$user_details_meta_fields['activated_by_admin'] = get_user_meta( $user_data->ID, 'activated_by_admin', true );
			$user_details_meta_fields['status'] = 'approved';
			$this->new_user_approve_notification(  $user_data );
			return $user_details_meta_fields;
		}
	}
	
	function prepare_post_meta( $object, $field_name, $request ) {
		return get_post_meta( $object['id'] );
	}
	
	function prepare_featured_image( $object, $field_name, $request ) {
		return get_the_post_thumbnail_url( $object['id'], 'post-thumbnail' );
	}

	// function prepare_assessment_data_for_courses( $object, $field_name, $request ) {
	// 	return get_post_meta( $object['id'], 'assessments', true );
	// }
	
	function submit_course_permission_callback( $request ) {
		return current_user_can( 'publish_telas_courses' );
	}

	function prepare_author_name( $object, $field_name, $request ) {
		return get_user_meta( $object['author'], 'first_name', true ) . ' ' . get_user_meta( $object['author'], 'last_name', true );
	}

	function prepare_assessment_data( $object, $field_name, $request ) {
		$post_id = $object['id'];
		$assessment_status = get_post_meta( $post_id, 'assessment_status', true );
		
		$assigned_admin_reviewer_user_id = get_post_meta( $post_id, 'assigned_admin_reviewer_user_id', true );
		$assigned_admin_reviewer_status = get_post_meta( $post_id, 'assigned_admin_reviewer_status', true );
		$assigned_admin_reviewer_user_email = $assigned_admin_reviewer_user_id ? get_userdata($assigned_admin_reviewer_user_id)->user_email : '';
		
		$assigned_interim_reviewer_user_id = get_post_meta( $post_id, 'assigned_interim_reviewer_user_id', true );
		$assigned_interim_reviewer_status = get_post_meta( $post_id, 'assigned_interim_reviewer_status', true );
		$assigned_interim_reviewer_user_email = $assigned_interim_reviewer_user_id ? get_userdata($assigned_interim_reviewer_user_id)->user_email : '';
		
		$assigned_first_reviewer_user_id = get_post_meta( $post_id, 'assigned_first_reviewer_user_id', true );
		$assigned_first_reviewer_status = get_post_meta( $post_id, 'assigned_first_reviewer_status', true);
		$assigned_first_reviewer_user_email = $assigned_first_reviewer_user_id ? get_userdata($assigned_first_reviewer_user_id)->user_email : '';
		
		
		$assigned_second_reviewer_user_id = get_post_meta( $post_id, 'assigned_second_reviewer_user_id', true );
		$assigned_second_reviewer_status = get_post_meta( $post_id, 'assigned_second_reviewer_status', true );
		$assigned_second_reviewer_user_email = $assigned_second_reviewer_user_id ? get_userdata($assigned_second_reviewer_user_id)->user_email : '';
		// var_dump( $assigned_admin_reviewer_user_id, $assigned_first_reviewer_user_id, $assigned_second_reviewer_user_id, $assigned_interim_reviewer_user_id );
		$assigned_admin_reviewer_assessment_ids = ! empty(  $assigned_admin_reviewer_user_id ) ? get_user_meta( $assigned_admin_reviewer_user_id, 'assigned_assessments', true ) : array();
		$assigned_first_reviewer_assessment_ids = ! empty( $assigned_first_reviewer_user_id ) ? get_user_meta( $assigned_first_reviewer_user_id, 'assigned_assessments', true ) : array();
		$assigned_second_reviewer_assessment_ids = ! empty( $assigned_second_reviewer_user_id ) ? get_user_meta( $assigned_second_reviewer_user_id, 'assigned_assessments', true ) : array();
		$assigned_interim_reviewer_assessment_ids = ! empty( $assigned_interim_reviewer_user_id ) ? get_user_meta( $assigned_interim_reviewer_user_id, 'assigned_assessments', true ) : array();

		$completed_assessments = get_post_meta( $post_id, 'completed_assessments', true );
		$admin_assessment_id = array_intersect( $completed_assessments, $assigned_admin_reviewer_assessment_ids );
		$first_assessment_id = array_intersect( $completed_assessments, $assigned_first_reviewer_assessment_ids );
		$second_assessment_id = array_intersect( $completed_assessments, $assigned_second_reviewer_assessment_ids );
		$interim_assessment_id = array_intersect( $completed_assessments, $assigned_interim_reviewer_assessment_ids );
		return array(
			'is_assigned_admin_reviewer' => $assigned_admin_reviewer_user_id ? 'yes' : 'no',
			'has_admin_reviewer_completed' => $assigned_admin_reviewer_status === 'completed' ? 'yes' : 'no',
			'is_assigned_interim_reviewer' => $assigned_interim_reviewer_user_id ? 'yes' : 'no',
			'has_interim_reviewer_completed' => $assigned_interim_reviewer_status === 'completed' ? 'yes' : 'no',
			'is_assigned_first_reviewer' => $assigned_first_reviewer_user_id ? 'yes' : 'no',
			'has_first_reviewer_completed' => $assigned_first_reviewer_status === 'completed' ? 'yes' : 'no',
			'is_assigned_second_reviewer' => $assigned_second_reviewer_user_id ? 'yes' : 'no',
			'has_second_reviewer_completed' => $assigned_second_reviewer_status === 'completed' ? 'yes' : 'no',
			'assigned_admin_reviewer_status' => $assigned_admin_reviewer_status,
			'assigned_interim_reviewer_status' => $assigned_interim_reviewer_status,
			'assigned_first_reviewer_status' => $assigned_first_reviewer_status,
			'assigned_second_reviewer_status' => $assigned_second_reviewer_status,
			'assigned_admin_reviewer_user_email' => $assigned_admin_reviewer_user_email,
			'assigned_interim_reviewer_user_email' => $assigned_interim_reviewer_user_email,
			'assigned_first_reviewer_user_email' => $assigned_first_reviewer_user_email,
			'assigned_second_reviewer_user_email' => $assigned_second_reviewer_user_email,
			'admin_reviewer_assessment_id' => reset( $admin_assessment_id ),
			'first_reviewer_assessment_id' => reset( $first_assessment_id ),
			'second_reviewer_assessment_id' => reset( $second_assessment_id ),
			'interim_review_assessment_id' => reset( $interim_assessment_id ),
			'assessments' => get_post_meta( $post_id, 'assessments', true ),
		);
		
	}
	
	function get_tela_user_by_id( $request ) {
		$all_params = $request->get_params();
		$user_data = get_userdata( $all_params['user_id'] );
		
		$user_role = in_array( 'telas_assessor', $user_data->roles ) ? get_user_meta( $user_data->ID, 'telas_assessor_level', true ) : $user_data->roles;
		$user_role = in_array( 'telas_course_submitters', $user_data->roles ) ? 'telas_course_submitters' : $user_data->roles;

		$user_role = in_array( 'telas_telas_administrator', $user_data->roles ) ? 'telas_telas_administrator' : $user_data->roles;
		
		if ( in_array( 'telas_assessor', $user_data->roles ) ) {
			$user_role = ! empty( get_user_meta( $user_data->ID, 'telas_assessor_level', true ) ) ? get_user_meta( $user_data->ID, 'telas_assessor_level', true ) : 'telas_interim_reviewers';
		} else if ( in_array( 'telas_course_submitters', $user_data->roles ) ) {
			$user_role = 'telas_course_submitters';
		} else if ( in_array( 'telas_telas_administrator', $user_data->roles ) ) {
			$user_role = 'telas_telas_administrator';
		} else {
			$user_role = '';
		}
		
		$user_details_meta_fields['first_name'] = $user_data->first_name; 
		$user_details_meta_fields['last_name'] = $user_data->last_name; 
		$user_details_meta_fields['user_email'] = $user_data->user_email;
		$user_details_meta_fields['user_role'] = $user_role;
		$user_details_meta_fields['user_id'] = $user_data->ID;
		$user_details_meta_fields['position'] = get_user_meta( $user_data->ID, 'position', true );
		$user_details_meta_fields['faculty'] = get_user_meta( $user_data->ID, 'faculty', true );
		$user_details_meta_fields['institution_name'] = get_user_meta( $user_data->ID, 'institution_name', true );
		$user_details_meta_fields['institution_campus'] = get_user_meta( $user_data->ID, 'institution_campus', true );
		$user_details_meta_fields['institution_state'] = get_user_meta( $user_data->ID, 'institution_state', true );
		$user_details_meta_fields['institution_country'] = get_user_meta( $user_data->ID, 'institution_country', true );
		$user_details_meta_fields['is_first_time'] = get_user_meta( $user_data->ID, 'is_first_time_updating', true );
		$user_details_meta_fields['activated_by_admin'] = get_user_meta( $user_data->ID, 'activated_by_admin', true );
		return $user_details_meta_fields;
	}

	function get_telas_users( $request ) {
		$all_params = $request->get_params();
		$role = empty( $all_params['role'] ) ?  $all_params['role'] : 'telas_course_submitters';
		$page = empty( $all_params['page'] ) ? 1 : $all_params['page'];
		$per_page = empty( $all_params['per_page'] ) ? 10 : $all_params['per_page'];
		
		$user_query_args = array(
			'role'         => $role,
			'orderby'      => 'login',
			'order'        => 'ASC',
			'number'       => $per_page,
			'paged' 	   => $page,
		);
		return apply_filters( 'extend_telas_before_dispath_users', get_users( $user_query_args ) );
	}
	
	function update_assessment_callback( $request ) {
		$all_params = $request->get_params();
		$assessment_data = $all_params['assessment_data'];
		$assessment_id = $all_params['assessments_id'];
		$percentage_completed = $all_params['percentage_completed'];
		$comment = $all_params['comment'];
		$assigned_course_id = get_post_meta( $assessment_id, 'assigned_course', true );
		$prev_assessment_data = empty( get_post_meta( $assessment_id, 'assessment_answer_data', true ) ) ? array() : get_post_meta( $assessment_id, 'assessment_answer_data', true );\
		update_post_meta( $assessment_id, 'assessment_answer_data', array_merge( $assessment_data, $prev_assessment_data ) );
		update_post_meta( $assessment_id, 'comment', $comment );
		update_post_meta( $assessment_id, 'percentage_completed', $percentage_completed );
		update_post_meta( $assessment_id, 'assessment_status', 'in-progress' );
		if ( $all_params['action'] === 'complete' ) {
			update_post_meta( $assessment_id, 'assessment_status', 'completed' );
			$assessment_level = get_post_meta( $assigned_course_id, 'assessment_level', true );
			$all_assessments = ! empty( get_post_meta( $assigned_course_id, 'assessments', true ) ) ? get_post_meta( $assigned_course_id, 'assessments', true ) : array();
			$all_completed_assessments = ! empty( get_post_meta( $assigned_course_id, 'completed_assessments', true ) ) ? get_post_meta( $assigned_course_id, 'completed_assessments', true ) : array();
			array_push( $all_completed_assessments, $assessment_id );
			update_post_meta( $assigned_course_id, 'completed_assessments', array_unique( $all_completed_assessments ) );
			switch ($assessment_level) {
				case 'admin_reviewer':
					$all_assessments['admin_reviewer']['status'] = 'completed';
					update_post_meta( $assigned_course_id, 'assessments', $all_assessments );
					update_post_meta( $assigned_course_id, 'assigned_admin_reviewer_status', 'completed' );
					break;
				case 'interim_reviewer':
					$all_assessments['interim_reviewer']['status'] = 'completed';
					update_post_meta( $assigned_course_id, 'assessments', $all_assessments );
					update_post_meta( $assigned_course_id, 'assigned_interim_reviewer_status', 'completed' );
					update_post_meta( $assigned_course_id, 'assessment_progress', 'complete' );
					break;
				case 'first_reviewer':
					$all_assessments['first_reviewer']['status'] = 'completed';
					update_post_meta( $assigned_course_id, 'assessments', $all_assessments );
					update_post_meta( $assigned_course_id, 'assigned_first_reviewer_status', 'completed' );
					break;
				case 'second_reviewer':
					$all_assessments['second_reviewer']['status'] = 'completed';
					update_post_meta( $assigned_course_id, 'assessments', $all_assessments );
					update_post_meta( $assigned_course_id, 'assigned_second_reviewer_status', 'completed' );
					update_post_meta( $assigned_course_id, 'assessment_progress', 'complete' );
					break;
				
				default:
					# code...
					break;
			}
		}
		$assessment_object = get_post( $assessment_id );
    	$postController = new \WP_REST_Posts_Controller($assessment_object->post_type);
    	$response = $postController->prepare_item_for_response( $assessment_object, $request );
    	return rest_ensure_response( $response );
	}

	function prepare_assessment_meta( $object, $field_name, $request ) {
		$assessment_id = $object['id'];
		$course_id = get_post_meta( $assessment_id, 'assigned_course', true );
		$course_details = array(
			'title' => get_the_title( $course_id ),
			'review_status' => get_post_meta( $assessment_id, 'percentage_completed', true ),
			'previous_assessments' => get_post_meta( $course_id, 'completed_assessments', true ),
		);
		$all_meta = get_post_meta( $assessment_id );
		return array(
			'course_detail' => $course_details,
			'all_meta' => $all_meta,
			'assessment_data' => empty( get_post_meta( $assessment_id, 'assessment_answer_data', true ) ) ? array() : get_post_meta( $assessment_id, 'assessment_answer_data', true ),
			'comment' => empty( get_post_meta( $assessment_id, 'comment', true ) ) ? '' : get_post_meta( $assessment_id, 'comment', true ),
		);
	}
	
	function submit_course_callback( $request ) {
		$all_params = $request->get_params();
		if ( ! current_user_can( 'publish_telas_courses' ) ) {
			return new WP_Error(
				'[extend_telas]' . '403',
				'permission_denied',
				array(
					'status' => 403
				)
			);
		}
		$new_course_args = array(
			'post_title' => $all_params['coursePackageName'],
			'post_type' => 'telas_courses',
			'meta_input' => $request->get_params(),
			'post_status' => 'publish',
		);
		$new_course_id = wp_insert_post( $new_course_args );
		if ( is_wp_error( $new_course_id ) ) {
			$error_code = $new_course_id->get_error_code();
			return new WP_Error(
				'[extend-telas] ' . $error_code,
				$new_course_id->get_error_message( $error_code ),
				array(
					'status' => 403,
				)
			);
		}
		$data = array(
			'course_title'      => $all_params['coursePackageName'],
			'message'           => 'Course Submitted',
			'status'			=> 200
		);

		return apply_filters( 'extend_telas_before_dispatch', $data );
	}

	function register_user_callback( $request ) {
		$all_params = $request->get_params();
		$new_user_data = array(
			'user_login' => $all_params['email'],
			'user_email' => $all_params['email'],
			'user_pass' => $all_params['password'],
			'role' => 'subscriber',

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
		update_user_meta( $new_user_id, 'position',  '' );
		update_user_meta( $new_user_id, 'faculty',  '' );
		update_user_meta( $new_user_id, 'institution_name',  '' );
		update_user_meta( $new_user_id, 'institution_campus',  '' );
		update_user_meta( $new_user_id, 'institution_state',  '' );
		update_user_meta( $new_user_id, 'institution_country',  '' );
		update_user_meta( $new_user_id, 'is_first_time_updating', 'yes' );
		update_user_meta( $new_user_id, 'activated_by_admin', 'no' );
		$data = array(
			'user_id'           => $new_user_id,
			'user_email'        => $all_params['email'],
			'status' 			=> 200
		);
		$this->new_user_notification( $new_user_id, $all_params['password'] );
		return apply_filters( 'extend_telas_new_user_before_dispatch', $data );
	}

	function update_user_callback( $request ) {
		$all_params = $request->get_params();
		$user_id = $all_params['user_id'];
		$role = $all_params['telasRole'] === 'telas_course_submitters' ? 'telas_course_submitters' : 'telas_assessor';
		$update_user_args = array(
			'ID' => $user_id,
			'first_name' => $all_params['firstName'],
			'last_name' => $all_params['lastName'],
			'role' => $role,
		);
		$updated_user_id = wp_update_user( $update_user_args );
		if ( is_wp_error( $updated_user_id ) ) {
			$error_code = $updated_user_id->get_error_code();
			return new WP_Error(
				'[extend_telas] ' . $error_code,
				$updated_user_id->get_error_message( $error_code ),
				array(
					'status' => 403,
				)
			);
		}
		update_user_meta( $updated_user_id, 'position',  $all_params['position'] );
		update_user_meta( $updated_user_id, 'faculty',  $all_params['faculty'] );
		update_user_meta( $updated_user_id, 'institution_name',  $all_params['institutionName'] );
		update_user_meta( $updated_user_id, 'institution_campus',  $all_params['institutionCampus'] );
		update_user_meta( $updated_user_id, 'institution_state',  $all_params['institutionState'] );
		update_user_meta( $updated_user_id, 'institution_country',  $all_params['institutionCountry'] );
		$is_user_updating_first_time = get_user_meta( $updated_user_id, 'is_first_time_updating', true );
		$user_data = get_userdata( $updated_user_id );
		$user_object = new WP_User( $updated_user_id );
		if ( $is_user_updating_first_time == 'yes' ) {
			
			foreach( $user_data->roles as $role ) {
				$user_object->remove_role( $role );
			} 
			$user_object->add_role( $role );
			update_user_meta( $updated_user_id, 'is_first_time_updating', 'no' );
			if ( $role === 'telas_assessor' ) {
				update_user_meta( $updated_user_id, 'telas_assessor_level', $all_params['telasRole'] );
			}
			$this->send_notifiction_to_telas_admin( $user_object );
		}
		if ( in_array( 'telas_assessor', $user_data->roles ) ) {
			$user_role = ! empty( get_user_meta( $updated_user_id, 'telas_assessor_level', true ) ) ? get_user_meta( $updated_user_id, 'telas_assessor_level', true ) : 'telas_interim_reviewers';
		} else if ( in_array( 'telas_course_submitters', $user_data->roles ) ) {
			$user_role = 'telas_course_submitters';
		} else if ( in_array( 'telas_telas_administrator', $user_data->roles ) ) {
			$user_role = 'telas_telas_administrator';
		} else {
			$user_role = '';
		}
		$user_details_meta_fields = get_fields( 'user_'. $updated_user_id);
		$user_details_meta_fields['first_name'] = $user_data->first_name; 
		$user_details_meta_fields['last_name'] = $user_data->last_name; 
		$user_details_meta_fields['user_email'] = $user_data->user_email; 
		$user_details_meta_fields['user_role'] = $user_role;
		$user_details_meta_fields['user_id'] = $updated_user_id;
		$user_details_meta_fields['position'] = $all_params['position'];
		$user_details_meta_fields['faculty'] = $all_params['faculty'];
		$user_details_meta_fields['institution_name'] = $all_params['institutionName'];
		$user_details_meta_fields['institution_campus'] = $all_params['institutionCampus'];
		$user_details_meta_fields['institution_state'] = $all_params['institutionState'];
		$user_details_meta_fields['institution_country'] = $all_params['institutionCountry'];
		$user_details_meta_fields['is_first_time'] = get_user_meta( $updated_user_id, 'is_first_time_updating', true );
		$user_details_meta_fields['activated_by_admin'] = get_user_meta( $updated_user_id, 'activated_by_admin', true );
		return apply_filters( 'extend_telas_update_before_dispatch', $user_details_meta_fields );
	}

	function assign_assessors_callback( $request ) {
		$all_params = $request->get_params();
		$reviewer_user_id = $all_params['key'];
		$course_id = $all_params['courseId'];
		$course_has_assessment = $all_params['courseHasAssesment'];
		$course_title = get_the_title( $course_id );
		$reviewer_level = $all_params['reviewerLevel'];
		$coureses_assigned_to_the_user = get_user_meta( $reviewer_user_id, 'courses_assigned', true );
		if ( empty( $coureses_assigned_to_the_user ) ) {
			$coureses_assigned_to_the_user = array( $course_id );
		} else {
			$coureses_assigned_to_the_user = array_unique( array_push( $coureses_assigned_to_the_user, $course_id ) );
		}
		$assigned_reviewers_to_a_course = get_post_meta( $course_id, 'reviewers_assigned', true );
		if ( empty( $assigned_reviewers_to_a_course ) ) {
			$assigned_reviewers_to_a_course = array( $reviewer_user_id );
		} else {
			$assigned_reviewers_to_a_course = array_unique( array_push( $assigned_reviewers_to_a_course, $reviewer_user_id ) );
		}
		$assigned_assessments = empty( get_user_meta( $reviewer_user_id, 'assigned_assessments', true ) ) ? array() : get_user_meta( $reviewer_user_id, 'assigned_assessments', true );
		switch ($reviewer_level) {
			case 'admin_reviewer':
				$create_new_assessment_args = array(
					'post_type' => 'telas_assessment',
					'post_title' => 'Admin Reviewer Assessment for ' . $course_title,
					'post_status' => 'publish',
					'post_author' => $reviewer_user_id,
				);
				$new_assessment_id = wp_insert_post( $create_new_assessment_args );
				update_post_meta( $new_assessment_id, 'assigned_course', $course_id );
				update_post_meta( $course_id, 'assigned_admin_reviewer_user_id', $reviewer_user_id );
				update_post_meta( $course_id, 'assigned_admin_reviewer_status', 'assigned' );
				update_post_meta( $course_id, 'assigned_admin_reviewer_assessment', $new_assessment_id );
				update_user_meta( $reviewer_user_id, 'assigned_courses', $coureses_assigned_to_the_user );
				update_post_meta( $course_id, 'reviewers_assigned', $assigned_reviewers_to_a_course );
				update_user_meta( $reviewer_user_id, 'assigned_reviewer_role', 'admin_reviewer' );
				update_post_meta( $new_assessment_id, 'assessment_status', 'assigned' );
				update_post_meta( $new_assessment_id, 'assessment_assigned_user_level', 'admin_reviewer' );
				update_post_meta( $course_id, 'assessment_level', 'admin_reviewer' );
				array_push( $assigned_assessments, $new_assessment_id );
				update_user_meta( $reviewer_user_id, 'assigned_assessments', $assigned_assessments );
				update_post_meta( 
					$course_id,
					'assessments',
					array(
						'telas_admin_reviewers' => 
						array(
							'asessment_id' => $new_assessment_id,
							'assessment_status' => 'assigned',
						)
					)
				);
			break;
			case 'interim_reviewer':
				$create_new_assessment_args = array(
					'post_type' => 'telas_assessment',
					'post_title' => 'Interim Reviewer Assessment for ' . $course_title,
					'post_status' => 'publish',
					'post_author' => $reviewer_user_id,
				);
				$new_assessment_id = wp_insert_post( $create_new_assessment_args );
				update_post_meta( $new_assessment_id, 'assigned_course', $course_id );
				update_post_meta( $course_id, 'assigned_interim_reviewer_user_id', $reviewer_user_id );
				update_post_meta( $course_id, 'assigned_admin_reviewer_status', 'completed' );
				update_post_meta( $course_id, 'assigned_interim_reviewer_status', 'assigned' );
				update_post_meta( $course_id, 'assigned_interim_reviewer_assessment', $new_assessment_id );
				update_user_meta( $reviewer_user_id, 'assigned_courses', $coureses_assigned_to_the_user );
				update_post_meta( $course_id, 'reviewers_assigned', $assigned_reviewers_to_a_course );
				update_user_meta( $reviewer_user_id, 'assigned_reviewer_role', 'interim_reviewer' );
				update_post_meta( $new_assessment_id, 'assessment_status', 'assigned' );
				update_post_meta( $course_id, 'assessment_level', 'interim_reviewer' );
				update_post_meta( $new_assessment_id, 'assessment_assigned_user_level', 'interim_reviewer' );
				array_push( $assigned_assessments, $new_assessment_id );
				update_user_meta( $reviewer_user_id, 'assigned_assessments', $assigned_assessments );
				update_post_meta( 
					$course_id,
					'assessments',
					array(
						'telas_interim_reviewers' => 
						array(
							'asessment_id' => $new_assessment_id,
							'assessment_status' => 'assigned',
						)
					)
				);
			break;
			case 'first_reviewer':
				$create_new_assessment_args = array(
					'post_type' => 'telas_assessment',
					'post_title' => 'First Reviewer Assessment for ' . $course_title,
					'post_status' => 'publish',
					'post_author' => $reviewer_user_id,
				);
				$new_assessment_id = wp_insert_post( $create_new_assessment_args );
				update_post_meta( $new_assessment_id, 'assigned_course', $course_id );
				update_post_meta( $course_id, 'assigned_first_reviewer_user_id', $reviewer_user_id );
				update_post_meta( $course_id, 'assigned_first_reviewer_status', 'assigned' );
				update_post_meta( $course_id, 'assigned_first_reviewer_assessment', $new_assessment_id );
				update_post_meta( $course_id, 'assigned_admin_reviewer_status', 'completed' );
				update_user_meta( $reviewer_user_id, 'assigned_courses', $coureses_assigned_to_the_user );
				update_post_meta( $course_id, 'reviewers_assigned', $assigned_reviewers_to_a_course );
				update_user_meta( $reviewer_user_id, 'assigned_reviewer_role', 'first_reviewer' );
				update_post_meta( $new_assessment_id, 'assessment_status', 'assigned' );
				update_post_meta( $course_id, 'assessment_level', 'first_reviewer' );
				update_post_meta( $new_assessment_id, 'assessment_assigned_user_level', 'first_reviewer' );
				array_push( $assigned_assessments, $new_assessment_id );
				update_user_meta( $reviewer_user_id, 'assigned_assessments', $assigned_assessments );
				update_post_meta(
					$course_id,
					'assessments',
					array(
						'first_reviewer' => 
						array(
							'asessment_id' => $new_assessment_id,
							'assessment_status' => 'assigned',
						)
					)
				);
			break;
			case 'second_reviewer':
				$create_new_assessment_args = array(
					'post_type' => 'telas_assessment',
					'post_title' => 'Second Reviewer Assessment for ' . $course_title,
					'post_status' => 'publish',
					'post_author' => $reviewer_user_id,
				);
				$new_assessment_id = wp_insert_post( $create_new_assessment_args );
				update_post_meta( $new_assessment_id, 'assigned_course', $course_id );
				update_post_meta( $course_id, 'assigned_second_reviewer_user_id', $reviewer_user_id );
				update_post_meta( $course_id, 'assigned_second_reviewer_status', 'assigned' );
				update_post_meta( $course_id, 'assigned_second_reviewer_assessment', $new_assessment_id );
				update_post_meta( $course_id, 'assigned_admin_reviewer_status', 'completed' );
				update_post_meta( $course_id, 'assigned_first_reviewer_status', 'completed' );
				update_user_meta( $reviewer_user_id, 'assigned_courses', $coureses_assigned_to_the_user );
				update_post_meta( $course_id, 'reviewers_assigned', $assigned_reviewers_to_a_course );
				update_user_meta( $reviewer_user_id, 'assigned_reviewer_role', 'second_reviewer' );
				update_post_meta( $new_assessment_id, 'assessment_status', 'assigned' );
				update_post_meta( $course_id, 'assessment_level', 'second_reviewer' );
				update_post_meta( $new_assessment_id, 'assessment_assigned_user_level', 'second_reviewer' );
				update_post_meta( $course_id, 'assessment_progress', 'in-progress' );
				array_push( $assigned_assessments, $new_assessment_id );
				update_user_meta( $reviewer_user_id, 'assigned_assessments', $assigned_assessments );
				update_post_meta( 
					$course_id,
					'assessments',
					array(
						'second_reviewer' => 
						array(
							'asessment_id' => $new_assessment_id,
							'assessment_status' => 'assigned',
						)
					)
				);
			break;
			
			default:
				# code...
				break;
		}
		$course_object = get_post( $course_id );
    	$postController = new \WP_REST_Posts_Controller($course_object->post_type);
    	$response = $postController->prepare_item_for_response( $course_object, $request );
    	return rest_ensure_response( $response );
	}
	function assign_assessors_permission_callback() {
		return current_user_can( 'delete_others_telas_assessments' );
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
	function register_acf_field_for_course_details() {
		if( function_exists('acf_add_local_field_group') ):
			acf_add_local_field_group(array(
				'key' => 'group_5d81ea9bcdcb2',
				'title' => 'Course Details',
				'fields' => array(
					array(
						'key' => 'field_5d81eb69cd3a9',
						'label' => 'Course Submission Date',
						'name' => 'courseSubmissionDateString',
						'type' => 'date_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'display_format' => 'd/m/Y',
						'return_format' => 'd/m/Y',
						'first_day' => 1,
					),
					array(
						'key' => 'field_5d81eaa1cd3a3',
						'label' => 'Course Package Name',
						'name' => 'coursePackageName',
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
						'key' => 'field_5d81eae7cd3a4',
						'label' => 'Course Package Type',
						'name' => 'coursePackageType',
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
						'key' => 'field_5d81eb03cd3a5',
						'label' => 'Course Module Name',
						'name' => 'courseModuleName',
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
						'key' => 'field_5d81eb18cd3a6',
						'label' => 'Course Module Identifier',
						'name' => 'courseModuleIdentifier',
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
						'key' => 'field_5d81eb31cd3a7',
						'label' => 'Institution Name',
						'name' => 'institutionName',
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
						'key' => 'field_5d81eb4acd3a8',
						'label' => 'Faculty/Dept',
						'name' => 'facultyDept',
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
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'telas_courses',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => array(
					0 => 'the_content',
				),
				'active' => true,
				'description' => '',
			));

		endif;
	}
	
	function modify_jwt_authentication_response( $data, $user ) {
		$user_data = get_userdata( $data['user_id']);
		$user_roles = $user_data->roles;
		$assigned_courses = '';
		if ( in_array( 'telas_assessor', $user_data->roles ) ) {
			$user_role = ! empty( get_user_meta( $data['user_id'], 'telas_assessor_level', true ) ) ? get_user_meta( $data['user_id'], 'telas_assessor_level', true ) : 'telas_interim_reviewers';
			$assigned_courses = get_user_meta( $data['user_id'], 'assigned_courses', true );
		} else if ( in_array( 'telas_course_submitters', $user_data->roles ) ) {
			$user_role = 'telas_course_submitters';
		} else if ( in_array( 'telas_telas_administrator', $user_data->roles ) ) {
			$user_role = 'telas_telas_administrator';
		} else {
			$user_role = '';
		}
		$data['user_meta'] = get_fields( 'user_'. $user_data->ID );
		$data['user_role'] = $user_role;
		$data['is_first_time'] = get_user_meta( $user_data->ID, 'is_first_time_updating', true );
		$data['activated_by_admin'] = get_user_meta( $user_data->ID, 'activated_by_admin', true );
		$data['assigned_courses'] = $assigned_courses;
		$data['assessment_assigned'] = get_user_meta( $user_data->ID, 'assigned_assessments', true );
		return $data;
	}

    function new_user_notification( $user_id, $plaintext_pass = '' ) {
        $user = new WP_User( $user_id );
		$user_login = stripslashes( $user->user_login );
		$user_email = stripslashes( $user->user_email );
		$blogname = get_option('blogname');
		$subject = sprintf( '[%s] Your credentials.', $blogname );
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$to = $user_email;
		$message_title = 'Verify Your E-mail.';
		$header_image = '';
		$message_heading = 'Please login to complete your TELAS registration';
		$message_body = "";
		$site_url = get_option('siteurl');
		$signature = "";
		$has_aside = true;
		$button_link = 'https://suspicious-archimedes-ed7114.netlify.com/login';
		$button_text = 'Complete Registration';
		$message = Telas_Assesments_Helper::get_email_body( $message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text );
		wp_mail( $to, $subject, $message, $headers );
	}

	function new_user_approve_notification( $user ) {
		$user_login = stripslashes( $user->user_login );
		$user_email = stripslashes( $user->user_email );
		$blogname = get_option('blogname');
		$subject = sprintf( '[%s] Profile Approved.', $blogname );
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$to = $user_email;
		$message_title = 'Your submitted profile has been approved';
		$header_image = '';
		$message_heading = 'Please login to continue your work.';
		$message_body = "";
		$site_url = get_option('siteurl');
		$signature = "";
		$has_aside = true;
		$button_link = 'https://suspicious-archimedes-ed7114.netlify.com/login';
		$button_text = 'Login';
		$message = Telas_Assesments_Helper::get_email_body( $message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text );
		wp_mail( $to, $subject, $message, $headers );
	}

	function send_notifiction_to_telas_admin( $user_object ) {
		$message_title = 'Please verify this newly created Account';
		$header_image = '';
		$message_heading = 'User Details:';
		
		$message_body = '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message_body .= "<tr style='background: #eee;'><td><strong>First Name:</strong> </td><td>" . $user_object->first_name . "</td></tr>";
		$message_body .= "<tr><td><strong>Last Name:</strong> </td><td>" . $user_object->last_name . "</td></tr>";
		$message_body .= "<tr><td><strong>Position: </strong> </td><td>" . get_user_meta( $user_object->ID, 'position', true ) . "</td></tr>";
		$message_body .= "<tr><td><strong>Faculty/Dept: </strong> </td><td>" . get_user_meta( $user_object->ID, 'faculty', true ) . "</td></tr>";
		$message_body .= "<tr><td><strong>Institution Name:</strong> </td><td>" . get_user_meta( $user_object->ID, 'institution_name', true ) . "</td></tr>";
		$message_body .= "<tr><td><strong>Institution Campus:</strong> </td><td>" . get_user_meta( $user_object->ID, 'institution_campus', true ) . "</td></tr>";
		$addURLS = $_POST['addURLS'];
		$message_body .= "<tr><td><strong>Institution State / Region:</strong> </td><td>" . get_user_meta( $user_object->ID, 'institution_state', true ) . "</td></tr>";
		$message_body .= "<tr><td><strong>Institution Country:</strong> </td><td>" . get_user_meta( $user_object->ID, 'institution_country', true ) . "</td></tr>";
		$message_body .= "<tr><td><strong>Email Address:</strong> </td><td>" . $user_object->user_email . "</td></tr>";
		$message_body .= "<tr><td><strong>TELAS Role:</strong> </td><td>" . reset($user_object->roles) . "</td></tr>";
		$message_body .= "</table>";
		$signature = '';
		$has_aside = true;
		$button_link = 'https://suspicious-archimedes-ed7114.netlify.com/user-profile/' . $user_object->ID;
		$button_text = 'Apporve/Decline';
		$blogname = get_option('blogname');
		$subject = sprintf( '[%s] Please verify this newly created Account.', $blogname );
		$headers = array('Content-Type: text/html; charset=UTF-8');
		
		$message = Telas_Assesments_Helper::get_email_body( $message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text );

		$all_telas_admin_emails = Telas_Assesments_Helper::get_telas_admin_emails();
		foreach( $all_telas_admin_emails as $to_emails ) {
			wp_mail( $to_emails, $subject, $message, $headers );
		}
		update_user_meta( $user_object->ID, 'mail_sent_for_approval', 'yes' );
	}

	function onMailError( $wp_error ) {
		echo "<pre>";
		print_r($wp_error);
		echo "</pre>";
	}   

	function check_login_submit($user, $username, $password) {
		if ( is_wp_error( $user ) ) {
			$user->errors['incorrect_password'][0] = "The password you entered for the username {$username} is incorrect.";
			$user->errors['invalid_username'][0] = "Invalid Username.";
		}
		return $user;
	}

	/**
	 * Removes `has_published_posts` from the query args so even users who have not
	 * published content are returned by the request.
	 *
	 * @see https://developer.wordpress.org/reference/classes/wp_user_query/
	 *
	 * @param array           $prepared_args Array of arguments for WP_User_Query.
	 * @param WP_REST_Request $request       The current request.
	 *
	 * @return array
	 */
	function prefix_remove_has_published_posts_from_wp_api_user_query( $prepared_args, $request ) {
		unset( $prepared_args['has_published_posts'] );
		return $prepared_args;
	}


	function modify_rest_user_query( $prepared_args, $request ) {
		$all_params = $request->get_params();
		if ( empty( $all_params['meta'] ) ) {
			return $prepared_args;
		}
		$prepared_args['meta_query']['relation'] = 'AND';
		foreach( $all_params['meta'] as $meta_query_value ) {
			$prepared_args['meta_query'][] = array(
				'key' => $meta_query_value['key'],
				'value' => $meta_query_value['value'],
				'compare' => 'LIKE',
			);
		}
		return $prepared_args;
	}
	
	
}
