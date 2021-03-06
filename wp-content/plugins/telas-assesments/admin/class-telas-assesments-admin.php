<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link  www.telas.edu.au
 * @since 1.0.0
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
     * @since  1.0.0
     * @access private
     * @var    string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since 1.0.0
     * @param string $plugin_name The name of this plugin.
     * @param string $version     The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;
        // add_action( 'init', array( $this, 'download_pdf_callback' ) );
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since 1.0.0
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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/telas-assesments-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since 1.0.0
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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/telas-assesments-admin.js', array( 'jquery' ), $this->version, false);

    }

    public function register_post_types() {
        register_post_type(
            'telas_courses',
            array(
            'labels'                => array(
            'name'                  => __('Courses', 'telas-web'),
            'singular_name'         => __('Course', 'telas-web'),
            'all_items'             => __('All Courses', 'telas-web'),
            'archives'              => __('Courses Archives', 'telas-web'),
            'attributes'            => __('Courses Attributes', 'telas-web'),
            'insert_into_item'      => __('Insert into Courses', 'telas-web'),
            'uploaded_to_this_item' => __('Uploaded to this Courses', 'telas-web'),
            'featured_image'        => _x('Featured Image', 'telas-courses', 'telas-web'),
            'set_featured_image'    => _x('Set featured image', 'telas-courses', 'telas-web'),
            'remove_featured_image' => _x('Remove featured image', 'telas-courses', 'telas-web'),
            'use_featured_image'    => _x('Use as featured image', 'telas-courses', 'telas-web'),
            'filter_items_list'     => __('Filter Courses list', 'telas-web'),
            'items_list_navigation' => __('Courses list navigation', 'telas-web'),
            'items_list'            => __('Courses list', 'telas-web'),
            'new_item'              => __('New Course', 'telas-web'),
            'add_new'               => __('Add New', 'telas-web'),
            'add_new_item'          => __('Add New Course', 'telas-web'),
            'edit_item'             => __('Edit Course', 'telas-web'),
            'view_item'             => __('View Course', 'telas-web'),
            'view_items'            => __('View Courses', 'telas-web'),
            'search_items'          => __('Search Courses', 'telas-web'),
            'not_found'             => __('No Courses found', 'telas-web'),
            'not_found_in_trash'    => __('No Courses found in trash', 'telas-web'),
            'parent_item_colon'     => __('Parent Courses:', 'telas-web'),
            'menu_name'             => __('Courses', 'telas-web'),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpts', 'comments' ),
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-admin-post',
            'show_in_rest'          => true,
            'rest_base'             => 'telas-courses',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'capability_type'       => array( 'telas_course', 'telas_courses' ),
            'map_meta_cap'          => true,
            )
        );

        register_post_type(
            'telas_assessment',
            array(
            'labels'                => array(
            'name'                  => __('Assessments', 'telas-web'),
            'singular_name'         => __('Assessment', 'telas-web'),
            'all_items'             => __('All Assessments', 'telas-web'),
            'archives'              => __('Assessment Archives', 'telas-web'),
            'attributes'            => __('Assessment Attributes', 'telas-web'),
            'insert_into_item'      => __('Insert into Assessment', 'telas-web'),
            'uploaded_to_this_item' => __('Uploaded to this Assessment', 'telas-web'),
            'featured_image'        => _x('Featured Image', 'telas-assessment', 'telas-web'),
            'set_featured_image'    => _x('Set featured image', 'telas-assessment', 'telas-web'),
            'remove_featured_image' => _x('Remove featured image', 'telas-assessment', 'telas-web'),
            'use_featured_image'    => _x('Use as featured image', 'telas-assessment', 'telas-web'),
            'filter_items_list'     => __('Filter Assessments list', 'telas-web'),
            'items_list_navigation' => __('Assessments list navigation', 'telas-web'),
            'items_list'            => __('Assessments list', 'telas-web'),
            'new_item'              => __('New Assessment', 'telas-web'),
            'add_new'               => __('Add New', 'telas-web'),
            'add_new_item'          => __('Add New Assessment', 'telas-web'),
            'edit_item'             => __('Edit Assessment', 'telas-web'),
            'view_item'             => __('View Assessment', 'telas-web'),
            'view_items'            => __('View Assessments', 'telas-web'),
            'search_items'          => __('Search Assessments', 'telas-web'),
            'not_found'             => __('No Assessments found', 'telas-web'),
            'not_found_in_trash'    => __('No Assessments found in trash', 'telas-web'),
            'parent_item_colon'     => __('Parent Assessment:', 'telas-web'),
            'menu_name'             => __('Assessments', 'telas-web'),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array( 'title', 'author', 'custom-fields' ),
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-admin-post',
            'show_in_rest'          => true,
            'rest_base'             => 'telas-assessment',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'capability_type'       => array( 'telas_assessment', 'telas_assessments' ),
            'map_meta_cap'          => true,
            )
        );

        register_post_type(
            'telas_report',
            array(
            'labels'                => array(
            'name'                  => __('Reports', 'telas-web'),
            'singular_name'         => __('Report', 'telas-web'),
            'all_items'             => __('All Reports', 'telas-web'),
            'archives'              => __('Report Archives', 'telas-web'),
            'attributes'            => __('Report Attributes', 'telas-web'),
            'insert_into_item'      => __('Insert into Report', 'telas-web'),
            'uploaded_to_this_item' => __('Uploaded to this Report', 'telas-web'),
            'featured_image'        => _x('Featured Image', 'telas-assessment', 'telas-web'),
            'set_featured_image'    => _x('Set featured image', 'telas-assessment', 'telas-web'),
            'remove_featured_image' => _x('Remove featured image', 'telas-assessment', 'telas-web'),
            'use_featured_image'    => _x('Use as featured image', 'telas-assessment', 'telas-web'),
            'filter_items_list'     => __('Filter Reports list', 'telas-web'),
            'items_list_navigation' => __('Reports list navigation', 'telas-web'),
            'items_list'            => __('Reports list', 'telas-web'),
            'new_item'              => __('New Report', 'telas-web'),
            'add_new'               => __('Add New', 'telas-web'),
            'add_new_item'          => __('Add New Report', 'telas-web'),
            'edit_item'             => __('Edit Report', 'telas-web'),
            'view_item'             => __('View Report', 'telas-web'),
            'view_items'            => __('View Reports', 'telas-web'),
            'search_items'          => __('Search Reports', 'telas-web'),
            'not_found'             => __('No Reports found', 'telas-web'),
            'not_found_in_trash'    => __('No Reports found in trash', 'telas-web'),
            'parent_item_colon'     => __('Parent Report:', 'telas-web'),
            'menu_name'             => __('Reports', 'telas-web'),
            ),
            'public'                => true,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_nav_menus'     => true,
            'supports'              => array( 'title', 'author', 'custom-fields' ),
            'has_archive'           => true,
            'rewrite'               => true,
            'query_var'             => true,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-admin-post',
            'show_in_rest'          => true,
            'rest_base'             => 'telas-report',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'capability_type'       => array( 'telas_report', 'telas_reports' ),
            'map_meta_cap'          => true,
            )
        );
    }

    public function add_course_submitters_role() {
        if (get_option('course_submitters_role_version') < 1 ) {
            $role_capabilites_args = array(
            'read'          => true,
            'edit_posts'    => false,
            'delete_posts'  => false,
            'publish_posts' => false,
            'upload_files'  => false,
            );
            add_role('telas_course_submitters', 'Course Submitters', $role_capabilites_args);
            update_option('course_submitters_role_version', 1);
        }

    }

    public function add_assessor_role() {
        if (get_option('telas_assessor') < 1 ) {
            $role_capabilites_args = array(
            'read'          => true,
            'edit_posts'    => false,
            'delete_posts'  => false,
            'publish_posts' => false,
            'upload_files'  => false,
            );
            add_role('telas_assessor', 'Assessor', $role_capabilites_args);
            update_option('telas_assessor', 1);
        }
    }

    public function add_telas_administrator_role() {
        if (get_option('telas_administrator_role_version') < 1 ) {
            $role_capabilites_args = array(
            'read'          => true,
            'edit_posts'    => false,
            'delete_posts'  => false,
            'publish_posts' => false,
            'upload_files'  => false,
            );
            add_role('telas_telas_administrator', 'TELAS Administrator', $role_capabilites_args);
            update_option('telas_administrator_role_version', 1);
        }
    }
    public function add_custom_post_type_capabilites_for_super_admin() {
        $role = get_role('administrator');
        $role->add_cap('read');
        $role->add_cap('read_telas_course');
        $role->add_cap('read_private_telas_courses');
        $role->add_cap('edit_telas_course');
        $role->add_cap('edit_telas_courses');
        $role->add_cap('edit_others_telas_courses');
        $role->add_cap('edit_published_telas_courses');
        $role->add_cap('publish_telas_courses');
        $role->add_cap('delete_others_telas_courses');
        $role->add_cap('delete_private_telas_courses');
        $role->add_cap('delete_published_telas_courses');
        // Cap for assessments
        $role->add_cap('read_telas_assessment');
        $role->add_cap('read_private_telas_assessments');
        $role->add_cap('edit_telas_assessment');
        $role->add_cap('edit_telas_assessments');
        $role->add_cap('edit_others_telas_assessments');
        $role->add_cap('edit_published_telas_assessments');
        $role->add_cap('publish_telas_assessments');
        $role->add_cap('delete_others_telas_assessments');
        $role->add_cap('delete_private_telas_assessments');
        $role->add_cap('delete_published_telas_assessments');
        $role->add_cap('list_users');
        // Cap for reports
        $role->add_cap('read_telas_report');
        $role->add_cap('read_private_telas_reports');
        $role->add_cap('edit_telas_report');
        $role->add_cap('edit_telas_reports');
        $role->add_cap('edit_others_telas_reports');
        $role->add_cap('edit_published_telas_reports');
        $role->add_cap('publish_telas_reports');
        $role->add_cap('delete_others_telas_reports');
        $role->add_cap('delete_private_telas_reports');
        $role->add_cap('delete_published_telas_reports');
    }

    public function add_custom_post_type_capabilites_for_telas_telas_administrator() {
        $role = get_role('telas_telas_administrator');

        $role->add_cap('list_users');
        $role->add_cap('delete_users');
        $role->add_cap('delete_user');
        $role->add_cap('remove_users');
        $role->add_cap('remove_user');

        $role->add_cap('read');
        $role->add_cap('read_telas_course');
        $role->add_cap('read_private_telas_courses');
        $role->add_cap('edit_telas_course');
        $role->add_cap('edit_telas_courses');
        $role->add_cap('edit_others_telas_courses');
        $role->add_cap('edit_published_telas_courses');
        $role->add_cap('publish_telas_courses');
        $role->add_cap('delete_others_telas_courses');
        $role->add_cap('delete_telas_courses');
        $role->add_cap('delete_private_telas_courses');
        $role->add_cap('delete_published_telas_courses');
        // Cap for assessments
        $role->add_cap('read_telas_assessment');
        $role->add_cap('read_private_telas_assessments');
        $role->add_cap('edit_telas_assessment');
        $role->add_cap('edit_telas_assessments');
        $role->add_cap('edit_others_telas_assessments');
        $role->add_cap('edit_published_telas_assessments');
        $role->add_cap('publish_telas_assessments');
        $role->add_cap('delete_others_telas_assessments');
        $role->add_cap('delete_private_telas_assessments');
        $role->add_cap('delete_published_telas_assessments');
        // Cap for reports
        $role->add_cap('read_telas_report');
        $role->add_cap('read_private_telas_reports');
        $role->add_cap('edit_telas_report');
        $role->add_cap('edit_telas_reports');
        $role->add_cap('edit_others_telas_reports');
        $role->add_cap('edit_published_telas_reports');
        $role->add_cap('publish_telas_reports');
        $role->add_cap('delete_others_telas_reports');
        $role->add_cap('delete_private_telas_reports');
        $role->add_cap('delete_published_telas_reports');

    }
    public function add_custom_cap_for_course_submitters_role() {
        $role = get_role('telas_course_submitters');
        $role->add_cap('read');
        $role->add_cap('read_telas_course');
        $role->add_cap('read_private_telas_courses');
        $role->add_cap('edit_telas_course');
        $role->add_cap('edit_telas_courses');
        $role->add_cap('edit_others_telas_courses');
        $role->add_cap('edit_published_telas_courses');
        $role->add_cap('publish_telas_courses');
        $role->add_cap('delete_others_telas_courses');
        $role->add_cap('delete_private_telas_courses');
        $role->add_cap('delete_published_telas_courses');
        // temp
        $role->remove_cap('read_telas_assessments');
        $role->remove_cap('read_private_telas_assessments');
        $role->remove_cap('edit_telas_assessment');
        $role->remove_cap('edit_telas_assessments');
        $role->remove_cap('edit_others_telas_assessments');
        $role->remove_cap('edit_published_telas_assessments');
        $role->remove_cap('publish_telas_assessments');
        $role->remove_cap('delete_others_telas_assessments');
        $role->remove_cap('delete_private_telas_assessments');
        $role->remove_cap('delete_published_telas_assessments');
        $role->add_cap('list_users');
        // Cap for reports
        $role->add_cap('read_telas_report');
    }

    public function add_custom_cap_for_telas_assessor_role() {
        $role = get_role('telas_assessor');
        $role->add_cap('read');
        $role->add_cap('read_telas_course');
        $role->remove_cap('read_private_telas_courses');
        $role->add_cap('edit_telas_course');
        $role->add_cap('edit_telas_courses');
        $role->add_cap('read_telas_assessment');
        $role->add_cap('read_private_telas_assessments');
        $role->add_cap('edit_telas_assessment');
        $role->add_cap('edit_telas_assessments');
        $role->add_cap('edit_others_telas_assessments');
        $role->add_cap('edit_published_telas_assessments');
        $role->add_cap('publish_telas_assessments');
        $role->remove_cap('delete_others_telas_assessments');
        $role->add_cap('delete_private_telas_assessments');
        $role->add_cap('delete_published_telas_assessments');
        $role->add_cap('list_users');
        // Cap for reports
        $role->add_cap('read_telas_report');
        $role->add_cap('read_private_telas_reports');
        $role->add_cap('edit_telas_report');
        $role->add_cap('edit_telas_reports');
        $role->add_cap('edit_others_telas_reports');
        $role->add_cap('edit_published_telas_reports');
        $role->add_cap('publish_telas_reports');
        $role->add_cap('delete_others_telas_reports');
        $role->add_cap('delete_private_telas_reports');
        $role->add_cap('delete_published_telas_reports');
    }

    public function register_post_type_relationship_fields() {
        if (function_exists('acf_add_local_field_group') ) :
            acf_add_local_field_group(
                array(
                'key'                   => 'group_5d78c19436bee',
                'title'                 => 'Assessment',
                'fields'                => array(
                array(
                'key'               => 'field_5d78c1ae132d9',
                'label'             => '',
                'name'              => 'course_assessment',
                'type'              => 'relationship',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'post_type'         => array(
                0 => 'telas-assessment',
                ),
                'taxonomy'          => '',
                'filters'           => array(
                0 => 'search',
                ),
                'elements'          => '',
                'min'               => 1,
                'max'               => 1,
                'return_format'     => 'object',
                ),
                ),
                'location'              => array(
                array(
                array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'telas-courses',
                ),
                ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
                )
            );

            acf_add_local_field_group(
                array(
                'key'                   => 'group_5d78c2940405d',
                'title'                 => 'Course',
                'fields'                => array(
                array(
                'key'               => 'field_5d78c2bb7b542',
                'label'             => '',
                'name'              => 'assigned_course',
                'type'              => 'relationship',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'post_type'         => array(
                0 => 'telas-courses',
                ),
                'taxonomy'          => '',
                'filters'           => array(
                0 => 'search',
                ),
                'elements'          => '',
                'min'               => 1,
                'max'               => 1,
                'return_format'     => 'object',
                ),
                ),
                'location'              => array(
                array(
                array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'telas-assessment',
                ),
                ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'left',
                'instruction_placement' => 'field',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
                )
            );
        endif;
    }

    public function register_assessment_field() {
        if (function_exists('acf_add_local_field_group') ) :
            acf_add_local_field_group(
                array(
                'key'                   => 'group_5d7b2f1716679',
                'title'                 => 'Course Assessment??? Self-Assessor',
                'fields'                => array(
                array(
                'key'               => 'field_5d7b30969d223',
                'label'             => 'The online learning environment is inclusive.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 1,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b31b0a3a42',
                'label'             => 'Learning environment ensures content is available through a variety of formats',
                'name'              => 'self_assessor_question_one',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => 0,
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b32606795e',
                'label'             => 'Language used is appropriate and inclusive (including consistent tone, voice, person)',
                'name'              => 'self_assessor_question_two',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b32856795f',
                'label'             => 'There is evidence that diverse perspec ves are respected',
                'name'              => 'self_assessor_question_three',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b329afa188',
                'label'             => 'The online environment is responsive across devices and platforms.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 0,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b32b9fa18a',
                'label'             => 'The online environment is responsive across different contemporary devices, e.g. screen size adjusting',
                'name'              => 'self_assessor_question_four',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3361e8963',
                'label'             => 'The online environment and integrated technology are compatible with contemporary browsers.',
                'name'              => 'self_assessor_question_five',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3388e8964',
                'label'             => 'The online environment and integrated technology are compatible across multiple platforms and',
                'name'              => 'self_assessor_question_six',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b33fde8966',
                'label'             => 'Students have opportunities, and are explicitly invited, to provide feedback.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 0,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b33cae8965',
                'label'             => 'Students have opportunities, and are explicitly invited, to provide feedback.',
                'name'              => 'self_assessor_question_seven',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => 0,
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3418e8967',
                'label'             => 'Students are informed about how their feedback is going to be collected and used.',
                'name'              => 'self_assessor_question_eight',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => 0,
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b342ee8968',
                'label'             => 'Self-Assessor Comments',
                'name'              => 'self_assessor_comments',
                'type'              => 'textarea',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'maxlength'         => '',
                'rows'              => 4,
                'new_lines'         => '',
                ),
                ),
                'location'              => array(
                array(
                array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'telas_assessment',
                ),
                ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
                )
            );

            acf_add_local_field_group(
                array(
                'key'                   => 'group_5d7b3775b7a26',
                'title'                 => 'Course Assessment???Combined Review',
                'fields'                => array(
                array(
                'key'               => 'field_5d7b3775be4ba',
                'label'             => 'The online learning environment is inclusive.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 1,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be504',
                'label'             => 'Learning environment ensures content is available through a variety of formats',
                'name'              => 'combined_review_question_one',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be58b',
                'label'             => 'Language used is appropriate and inclusive (including consistent tone, voice, person)',
                'name'              => 'combined_review_question_two',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be5cd',
                'label'             => 'There is evidence that diverse perspectives are respected',
                'name'              => 'combined_review_question_three',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be610',
                'label'             => 'The online environment is responsive across devices and pla??orms.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 0,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be652',
                'label'             => 'The online environment is responsive across different contemporary devices, e.g. screen size adjusting',
                'name'              => 'combined_review_question_four',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be697',
                'label'             => 'The online environment and integrated technology are compatible with contemporary browsers.',
                'name'              => 'combined_review_question_five',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be6db',
                'label'             => 'The online environment and integrated technology are compatible across multiple platforms and',
                'name'              => 'combined_review_question_six',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be75a',
                'label'             => 'Students have opportunites, and are explicitly invited, to provide feedback.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 0,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be79d',
                'label'             => 'Students have opportunities to provide feedback.',
                'name'              => 'combined_review_question_seven',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be7e0',
                'label'             => 'Students are informed about how their feedback is going to be collected and used.',
                'name'              => 'combined_review_question_eight',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3775be823',
                'label'             => 'Second Reviewer Comments',
                'name'              => 'combined_review_comments',
                'type'              => 'textarea',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'maxlength'         => '',
                'rows'              => 0,
                'new_lines'         => '',
                ),
                ),
                'location'              => array(
                array(
                array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'telas_assessment',
                ),
                ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
                )
            );

            acf_add_local_field_group(
                array(
                'key'                   => 'group_5d7b34873648a',
                'title'                 => 'Course Assessment???First Reviewer',
                'fields'                => array(
                array(
                'key'               => 'field_5d7b35032b2ea',
                'label'             => 'The online learning environment is inclusive.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 1,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b350c2b2eb',
                'label'             => 'Learning environment ensures content is available through a variety of formats',
                'name'              => 'first_reviewer_question_one',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b35422b2ec',
                'label'             => 'Language used is appropriate and inclusive (including consistent tone, voice, person)',
                'name'              => 'first_reviewer_question_two',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b357d2b2ee',
                'label'             => 'There is evidence that diverse perspectives are respected',
                'name'              => 'first_reviewer_question_three',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b35962b2ef',
                'label'             => 'The online environment is responsive across devices and pla??orms.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 0,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b359e2b2f0',
                'label'             => 'The online environment is responsive across different contemporary devices, e.g. screen size adjusting',
                'name'              => 'first_reviewer_question_four',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b35c62b2f1',
                'label'             => 'The online environment and integrated technology are compatible with contemporary browsers.',
                'name'              => 'first_reviewer_question_five',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b35dc2b2f2',
                'label'             => 'The online environment and integrated technology are compatible across multiple platforms and',
                'name'              => 'first_reviewer_question_six',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b35ff2b2f3',
                'label'             => 'Students have opportunites, and are explicitly invited, to provide feedback.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 0,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b362a2b2f5',
                'label'             => 'Students have opportunities to provide feedback.',
                'name'              => 'first_reviewer_question_seven',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b364b2b2f6',
                'label'             => 'Students are informed about how their feedback is going to be collected and used.',
                'name'              => 'first_reviewer_question_eight',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b36542b2f7',
                'label'             => 'First Reviewer Comments',
                'name'              => 'first_reviewer_comments',
                'type'              => 'textarea',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'maxlength'         => '',
                'rows'              => 0,
                'new_lines'         => '',
                ),
                ),
                'location'              => array(
                array(
                array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'telas_assessment',
                ),
                ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
                )
            );

            acf_add_local_field_group(
                array(
                'key'                   => 'group_5d7b370412edd',
                'title'                 => 'Course Assessment???Second Reviewer',
                'fields'                => array(
                array(
                'key'               => 'field_5d7b370418796',
                'label'             => 'The online learning environment is inclusive.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 1,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b3704187ec',
                'label'             => 'Learning environment ensures content is available through a variety of formats',
                'name'              => 'second_reviewer_question_one',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b370418830',
                'label'             => 'Language used is appropriate and inclusive (including consistent tone, voice, person)',
                'name'              => 'second_reviewer_question_two',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b370418873',
                'label'             => 'There is evidence that diverse perspectives are respected',
                'name'              => 'second_reviewer_question_three',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3704188b6',
                'label'             => 'The online environment is responsive across devices and pla??orms.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 0,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b3704188fb',
                'label'             => 'The online environment is responsive across different contemporary devices, e.g. screen size adjusting',
                'name'              => 'second_reviewer_question_four',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b37041893e',
                'label'             => 'The online environment and integrated technology are compatible with contemporary browsers.',
                'name'              => 'second_reviewer_question_five',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b370418981',
                'label'             => 'The online environment and integrated technology are compatible across multiple platforms and',
                'name'              => 'second_reviewer_question_six',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b3704189c3',
                'label'             => 'Students have opportunites, and are explicitly invited, to provide feedback.',
                'name'              => '',
                'type'              => 'accordion',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'open'              => 0,
                'multi_expand'      => 0,
                'endpoint'          => 0,
                ),
                array(
                'key'               => 'field_5d7b370418a08',
                'label'             => 'Students have opportunities to provide feedback.',
                'name'              => 'second_reviewer_question_seven',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b370418a4d',
                'label'             => 'Students are informed about how their feedback is going to be collected and used.',
                'name'              => 'second_reviewer_question_eight',
                'type'              => 'radio',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'choices'           => array(
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                ),
                'allow_null'        => 0,
                'other_choice'      => 0,
                'default_value'     => '',
                'layout'            => 'horizontal',
                'return_format'     => 'value',
                'save_other_choice' => 0,
                ),
                array(
                'key'               => 'field_5d7b370418a90',
                'label'             => 'Second Reviewer Comments',
                'name'              => 'second_reviewer_comments',
                'type'              => 'textarea',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'maxlength'         => '',
                'rows'              => 0,
                'new_lines'         => '',
                ),
                ),
                'location'              => array(
                array(
                array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'telas_assessment',
                ),
                ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
                )
            );

        endif;
    }
     public function register_routes() {
        $version   = '1';
        $namespace = 'extended-telasweb/v' . $version;
        register_rest_route(
            $namespace,
            '/' . 'register',
            array(
                array(
                    'methods'  => WP_REST_Server::CREATABLE,
                    'callback' => array( $this, 'register_user_callback' ),
                ),
            )
        );
        register_rest_field(
            'user',
            'user_extra',
            array(
                'get_callback'    => array( $this, 'get_user_meta_callback' ),
                'update_callback' => null,
                'schema'          => null,
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'update-user',
            array(
                array(
                    'methods'  => WP_REST_Server::CREATABLE,
                    'callback' => array( $this, 'update_user_callback' ),
                ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'submit-course',
            array(
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => array( $this, 'submit_course_callback' ),
                'permission_callback' => array( $this, 'submit_course_permission_callback' ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'telas-users',
            array(
                'methods'  => WP_REST_Server::READABLE,
                'callback' => array( $this, 'get_telas_users' ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'telas-user',
            array(
                'methods'  => WP_REST_Server::READABLE,
                'callback' => array( $this, 'get_telas_user_by_id' ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'assessment-calc/(?P<id>\d+)',
            array(
                'methods'  => WP_REST_Server::READABLE,
                'callback' => array( $this, 'get_assessment_calculation' ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'send-accreditation',
            array(
                'methods'  => WP_REST_Server::CREATABLE,
                'callback' => array( $this, 'send_accreditation_badge' ),
            )
        );
        register_rest_field(
            'telas_courses',
            'post_meta', // Add it to the response
            array(
                'get_callback'    => array( $this, 'prepare_post_meta' ), // Callback function - returns the value
                'update_callback' => null,
                'schema'          => null,
            )
        );
        register_rest_field(
            'telas_courses',
            'featured_images', // Add it to the response
            array(
                'get_callback'    => array( $this, 'prepare_featured_image' ), // Callback function - returns the value
                'update_callback' => null,
                'schema'          => null,
            )
        );
        register_rest_field(
            'telas_courses',
            'author_name',
            array(
                'get_callback'    => array( $this, 'prepare_author_name' ),
                'update_callback' => null,
                'schema'          => null,
            )
        );
        register_rest_field(
            'telas_assessment',
            'course_detail',
            array(
                'get_callback'    => array( $this, 'prepare_assessment_meta' ),
                'update_callback' => null,
                'schema'          => null,
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'create-assessment',
            array(
                array(
                    'methods'             => WP_REST_Server::CREATABLE,
                    'callback'            => array( $this, 'assign_assessors_callback' ),
                    'permission_callback' => array( $this, 'assign_assessors_permission_callback' ),
                ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'user-actions',
            array(
                array(
                    'methods'             => WP_REST_Server::CREATABLE,
                    'callback'            => array( $this, 'user_actions_callback' ),
                    'permission_callback' => array( $this, 'user_actions_permission_callback' ),
                ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'update-assessment',
            array(
            array(
                'methods'  => WP_REST_Server::CREATABLE,
                'callback' => array( $this, 'update_assessment_callback' ),
            ),
            )
        );
        register_rest_field(
            'telas_courses',
            'assesment_data',
            array(
                'get_callback'    => array( $this, 'prepare_assessment_data' ),
                'update_callback' => null,
                'schema'          => null,
            )
        );
        register_rest_field(
            'telas_report',
            'report_details',
            array(
                'get_callback'    => array( $this, 'prepare_get_telas_report_fields' ),
                'update_callback' => array( $this, 'update_combined_review_fields' ),
                'schema'          => array( 'report_details', 'All Custom Fields of Report' ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'email-template',
            array(
                array(
                    'methods'  => WP_REST_Server::CREATABLE,
                    'callback' => array( $this, 'email_template_create_callback' ),
                ),
                array(
                    'methods'  => WP_REST_Server::READABLE,
                    'callback' => array( $this, 'email_template_get_callback' ),
                ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'assessment-questions',
            array(
                array(
                    'methods'  => WP_REST_Server::CREATABLE,
                    'callback' => array( $this, 'assessment_questions_create_callback' ),
                ),
                array(
                    'methods'  => WP_REST_Server::READABLE,
                    'callback' => array( $this, 'assessment_questions_get_callback' ),
                ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'download-pdf',
            array(
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => array( $this, 'download_pdf_callback' ),
                'permission_callback' => array( $this, 'download_pdf_permission_callback' ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'download-combined-report-pdf',
            array(
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => array( $this, 'download_combined_review_pdf_callback' ),
                'permission_callback' => array( $this, 'download_pdf_permission_callback' ),
            )
        );
        register_rest_route(
            $namespace,
            '/' . 'remove-pdf',
            array(
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => array( $this, 'remove_pdf_callback' ),
                'permission_callback' => array( $this, 'download_pdf_permission_callback' ),
            )
        );

    }
    public function download_pdf_callback( $request ) {
        $params = $request->get_params();
        if ( $params['isReport'] !== 'yes' ) {
            $assessment_id = $params['assessmentId'];
            $assessment_data = get_post_meta( $assessment_id );
            $course_id = $assessment_data['assigned_course'][0];
            $assessment_data['assessment_title'] = get_the_title( $assessment_id );
            $assessment_data['course_name'] = get_the_title( $course_id );
            $assessment_data['course_package_type'] = get_post_meta( $course_id, 'coursePackageType', true );
            $assessment_data['course_package_identifier'] = get_post_meta( $course_id, 'coursePackageIdentifier', true );
            $assessment_data['course_module_identifier'] = get_post_meta( $course_id, 'courseModuleIdentifier', true );
            $assessment_data['study_area'] = get_post_meta( $course_id, 'studyLevel', true );
            $assessment_data['course_level'] = get_post_meta( $course_id, 'courseLevel', true );
            $assessment_data['institutionName'] = get_post_meta( $course_id, 'institution_Name', true );
            $assessment_data['faculty'] = get_post_meta( $course_id, 'facultyDept', true );
            $review_level = get_post_meta( $assessment_id, 'assessment_assigned_user_level', true );
            $assessment_start_date = get_post_meta( $course_id, $review_level . '_commencement_date', true  );
            $assessment_end_date = get_post_meta( $course_id, $review_level . '_completion_date', true  );
            $assessment_data['commencement_date'] = $assessment_start_date;
            $assessment_data['completion_date'] = $assessment_end_date;
            $assessment_data['assessment_assigned_user_level'] = get_post_meta( $assessment_id, 'assessment_assigned_user_level', true );
            $assessment_data['assessment_id'] = $assessment_id;
            $pdf_helper = new Telas_Generate_Pdf_Helper();
            $pdf_data = $pdf_helper->generate_assessment_pdf($assessment_data);
            return $pdf_data;
        } else {
            $assessment_id = $params['assessmentId'];
            $pdf_data = $this->prepare_combined_review_summary_pdf_data( $assessment_id );
            return $pdf_data;
        }
    }

    function prepare_combined_review_summary_pdf_data( $assessment_id ) {
        $course_id = get_post_meta( $assessment_id, 'course_id', true );
        $course_submitter_first_name = get_post_meta( $course_id, 'courseSubmitterName', true );
		$course_submitter_user_id = get_post_meta( $course_id, 'courseSubmitterId', true );
		$course_submitter_user_data = get_userdata( $course_submitter_user_id );
		$course_submitter_user_email = $course_submitter_user_data->user_email;
		$course_name = get_post_meta( $course_id, 'coursePackageName', true );
		$course_package_type = get_post_meta( $course_id, 'coursePackageType', true );
		$course_package_identifier = get_post_meta( $course_id, 'coursePackageIdentifier', true );
		$course_module_identifier = get_post_meta( $course_id, 'courseModuleIdentifier', true );
		$study_level = get_post_meta( $course_id, 'studyLevel', true );
		$course_level = get_post_meta( $course_id, 'courseLevel', true );
		$institution_name = get_post_meta( $course_id, 'institutionName', true );
		$faculty = get_post_meta( $course_id, 'facultyDept', true );
		$submit_for_accreditation = get_post_meta( $course_id, 'submitForAccreditation', true);
		$enroller_name = get_post_meta( $course_id, 'enrollerName', true);
		$enroller_email = get_post_meta( $course_id, 'enrollerEmail', true);
		$enroller_phone = get_post_meta( $course_id, 'enrollerPhone', true);
		$combined_review_commencement_date = get_post_meta( $course_id, 'combined_review_commencement_date', true );
		$combined_review_completion_date = get_post_meta( $course_id, 'combined_review_completion_date', true );
		$submit_for_accreditation = get_post_meta( $course_id, 'submitForAccreditation', true );

        $has_report_created = get_post_meta( $course_id, 'has_report_created', true );
        if ( empty( $has_report_created ) || $has_report_created === 'no' ) {
            return false;
        }
        $report_id = get_post_meta( $course_id, 'report_post_id', true );

        $assigned_course_id         = get_post_meta($report_id, 'assigned_course', true);
        $current_report_status = get_post_meta($report_id, 'assessment_status', true) === 'completed' ? 'complete' : get_post_meta($report_id, 'assessment_status', true) ;
        if ($current_report_status !== 'complete') {
            return false;
        }
        $all_completed_assessments          = get_post_meta( $report_id, 'assessment_data', true );
        $combined_review_assessments_value  = $all_completed_assessments['first_reviewer']['review_data'];
        $pattern                      = '/domain*/';
        $all_domain_entry_keys        = array_filter(
            array_keys($combined_review_assessments_value),
            function ( $entry ) use ( $pattern ) {
                return preg_match($pattern, $entry);
            }
        );
        $all_domain_entry_keys        = array_values($all_domain_entry_keys);
        $all_domain_entries           = array();
        $first_domain_selected_total  = 0;
        $second_domain_selected_total = 0;
        $third_domain_selected_total  = 0;
        $fourth_domain_selected_total = 0;
        foreach ( $all_domain_entry_keys as $domain_entry_key ) {
            $domain_entry_key_segment = explode('_', $domain_entry_key);
            if ($domain_entry_key_segment[1] === '1' ) {
                $all_domain_entries['first']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $first_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } elseif ($domain_entry_key_segment[1] === '2' ) {
                $all_domain_entries['second']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $second_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } elseif ($domain_entry_key_segment[1] === '3' ) {
                $all_domain_entries['third']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $third_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } else {
                $all_domain_entries['fourth']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $fourth_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            }
        }

        $all_domain_entries['first']['selected_total']  = round($first_domain_selected_total, 2);
        $all_domain_entries['second']['selected_total'] = round($second_domain_selected_total, 2);
        $all_domain_entries['third']['selected_total']  = round($third_domain_selected_total, 2);
        $all_domain_entries['fourth']['selected_total'] = round($fourth_domain_selected_total, 2);

        $first_domain_badge_level  = round(( $first_domain_selected_total / 25 ) * 100);
        $first_domain_badge = $this->get_badge_value( $first_domain_badge_level );

        $second_domain_badge_level = round(( $second_domain_selected_total / 25 ) * 100);
        $second_domain_badge = $this->get_badge_value( $second_domain_badge_level );

        $third_domain_badge_level  = round(( $third_domain_selected_total / 25 ) * 100);
        $third_domain_badge = $this->get_badge_value( $third_domain_badge_level );

        $fourth_domain_badge_level = round(( $fourth_domain_selected_total / 25 ) * 100);
        $fourth_domain_badge = $this->get_badge_value( $fourth_domain_badge_level );

        $accreditation_percentage  = round(( ( $first_domain_badge_level + $second_domain_badge_level + $third_domain_badge_level + $fourth_domain_badge_level ) / 4 ));

        $overall_badge = $this->get_badge_value( $accreditation_percentage );


        $all_domain_entries['first']['badge_level']     = $first_domain_badge_level;
        $all_domain_entries['first']['badge']     = $first_domain_badge;

        $all_domain_entries['second']['badge_level']    = $second_domain_badge_level;
        $all_domain_entries['second']['badge']    = $second_domain_badge;

        $all_domain_entries['third']['badge_level']     = $third_domain_badge_level;
        $all_domain_entries['third']['badge']     = $third_domain_badge;

        $all_domain_entries['fourth']['badge_level']    = $fourth_domain_badge_level;
        $all_domain_entries['fourth']['badge']    = $fourth_domain_badge;

        $all_domain_entries['accreditation_percentage'] = $accreditation_percentage;
        $all_domain_entries['accreditation_badge']      = $overall_badge;

        if ( $accreditation_percentage <= 49 ) {
            $eligible = false;
        } else {
           $eligible = true;
        }

        $for_test = get_post_meta( $course_id, 'forTest', true );
        $interim_reviewer_data = false;

        if ( $for_test === 'yes' ) {
            $interim_reviewer_id = get_post_meta( $assessment_id, 'first_reviewer_id', true );
            $admin_assessment_id = get_post_meta( $course_id, 'assigned_admin_reviewer_assessment', true );
            $all_interim_reviews = get_post_meta( $course_id, 'assigned_interim_reviews_obj', true );
            $interim_reviewer_assessment_id = $all_interim_reviews[$interim_reviewer_id]['assessment_id'];
            $interim_reviewer_commencement_date = $all_interim_reviews[$interim_reviewer_id]['commencement_date'];
            $interim_reviewer_completed_date = $all_interim_reviews[$interim_reviewer_id]['completed_date'];
            $interim_reviewer_comments = get_post_meta( $interim_reviewer_assessment_id, 'comment', true );
            $admin_reviewer_comments = get_post_meta( $admin_assessment_id, 'comment', true );
            $interim_reviewer_data = array(
                'interim_reviewer_assessment_id' => $interim_reviewer_assessment_id,
                'interim_reviewer_commencement_date' => $interim_reviewer_commencement_date,
                'interim_reviewer_completed_date' => $interim_reviewer_completed_date,
                'interim_reviewer_comments' => $interim_reviewer_comments,
                'admin_reviewer_comments' => $admin_reviewer_comments,
                'interim_reviewer_id' => $interim_reviewer_id,
            );
        }

        $assessment_pdf_data = array(
			'course_name' => $course_name,
			'course_package_type' => $course_package_type,
			'course_package_identifier' => $course_package_identifier,
			'course_module_identifier' => $course_module_identifier,
			'study_area' => $study_level,
			'course_level' => $course_level,
			'institution_name' => $institution_name,
			'faculty' => $faculty,
			'combined_review_start_date' => $combined_review_commencement_date,
			'combined_review_end_date' => $combined_review_completion_date,
			'domain_one_badge' => $all_domain_entries['first']['badge'],
			'domain_two_badge' => $all_domain_entries['second']['badge'],
			'domain_three_badge' => $all_domain_entries['third']['badge'],
			'domain_four_badge' => $all_domain_entries['fourth']['badge'],
            'overall_badge' => $overall_badge,
			'submit_for_accreditation' => $submit_for_accreditation,
            'comments'=> serialize(get_post_meta( $assessment_id, 'comments', true )),
            'all_assessment_values' => get_post_meta( $assessment_id, 'assessment_data', true ),
            'assessment_id' => $assessment_id,
            'course_id' => $course_id,
            'interim_reviewer_data' => $interim_reviewer_data,
		);
		$assessment_pdf_instance = new Telas_Generate_Pdf_Helper();
		$assessment_attachment = $assessment_pdf_instance->generate_assessment_summary_pdf( $assessment_pdf_data, $eligible, true );
        return $assessment_attachment;
    }

    public function download_combined_review_pdf_callback( $request ) {
        $params = $request->get_params();
        $assessment_id = $params['reportId'];
        $assessment_pdf_instance = new Telas_Generate_Pdf_Helper();
        $assessment_attachment = $assessment_pdf_instance->generate_assessment_report_pdf( $assessment_id );
        // return $pdf_data;
    }
    public function remove_pdf_callback( $request ) {
        $params = $request->get_params();
        $file_name = plugin_dir_path( dirname( __FILE__ ) ) . 'pdf/' . $params['fileName'];
        // sleep(30);
        // plugin_dir_path( __FILE__ ) . $file_name
        unlink($file_name);
        return true;
    }

    public function download_pdf_permission_callback() {
        return current_user_can('edit_telas_assessments');
    }

    public function assessment_questions_get_callback( $request ) {
        $original_questions = get_option( 'telas_admin_domain_answers' );
        foreach( $original_questions as $original_question_key => $original_question_value ) {
            foreach( $original_question_value['content']  as $content_key => $content_value ) {
                $order = array('Yes', 'Yes But', 'No', 'No But');
                $original_domain_score = $content_value['domainScore'];
                uasort($original_domain_score, function ($a, $b) use ($order) {
                    $pos_a = array_search($a, $order);
                    $pos_b = array_search($b, $order);
                    return $pos_a - $pos_b;
                });
                $original_questions[$original_question_key]['content'][$content_key]['domainScore'] = $original_domain_score;
            }
        }
        // var_dump( $original_questions );
        return $original_questions;
    }
    public function assessment_questions_create_callback( $request ) {
        $all_params = $request->get_params();
        $steps = $all_params['steps'];
        update_option( 'telas_admin_domain_answers', $steps );
        return get_option( 'telas_admin_domain_answers' );
    }
    public function get_user_meta_callback( $user ) {
        $user_object = get_userdata($user['id']);
        return array(
        'first_name' => $user_object->first_name,
        'last_name'  => $user_object->last_name,
        'user_email' => $user_object->user_email,
        'user_meta'  => get_user_meta($user['id']),
        );
    }
    public function user_actions_permission_callback() {
        return current_user_can('delete_others_telas_assessments');
    }
    public function user_actions_callback( $request ) {
        $all_params = $request->get_params();
        if ($all_params['action'] === 'approve' ) {
            $user_role = $all_params['user_role'];
            update_user_meta($all_params['user_id'], 'activated_by_admin', 'yes');
            $user_data = get_userdata($all_params['user_id']);
            // $user_role = in_array('telas_assessor', $user_data->roles) ? get_user_meta($user_data->ID, 'telas_assessor_level', true) : $user_data->roles;
            // $user_role = in_array('telas_course_submitters', $user_data->roles) ? 'telas_course_submitters' : $user_data->roles;
            // $user_role = in_array('telas_telas_administrator', $user_data->roles) ? 'telas_telas_administrator' : $user_data->roles;
            // if (in_array('telas_assessor', $user_data->roles) ) {
            //     $user_role = ! empty(get_user_meta($user_data->ID, 'telas_assessor_level', true)) ? get_user_meta($user_data->ID, 'telas_assessor_level', true) : 'telas_interim_reviewers';
            // } elseif (in_array('telas_course_submitters', $user_data->roles) ) {
            //     $user_role = 'telas_course_submitters';
            // } elseif (in_array('telas_telas_administrator', $user_data->roles) ) {
            //     $user_role = 'telas_telas_administrator';
            // } else {
            //     $user_role = '';
            // }
            $user_details_meta_fields['first_name']          = $user_data->first_name;
            $user_details_meta_fields['last_name']           = $user_data->last_name;
            $user_details_meta_fields['user_email']          = $user_data->user_email;
            $user_details_meta_fields['user_role']           = $user_role;
            $user_details_meta_fields['user_id']             = $user_data->ID;
            $user_details_meta_fields['position']            = get_user_meta($user_data->ID, 'position', true);
            $user_details_meta_fields['faculty']             = get_user_meta($user_data->ID, 'faculty', true);
            $user_details_meta_fields['institution_name']    = get_user_meta($user_data->ID, 'institution_name', true);
            $user_details_meta_fields['institution_campus']  = get_user_meta($user_data->ID, 'institution_campus', true);
            $user_details_meta_fields['institution_state']   = get_user_meta($user_data->ID, 'institution_state', true);
            $user_details_meta_fields['institution_country'] = get_user_meta($user_data->ID, 'institution_country', true);
            $user_details_meta_fields['is_first_time']       = get_user_meta($user_data->ID, 'is_first_time_updating', true);
            $user_details_meta_fields['activated_by_admin']  = get_user_meta($user_data->ID, 'activated_by_admin', true);
            $user_details_meta_fields['nickname']            = get_user_meta($user_data->ID, 'nickname', true);
            $user_details_meta_fields['status']              = 'approved';
            Telas_Assesments_Helper::profile_approved_notification_email($user_data, $user_role);
            return $user_details_meta_fields;
        }
    }

    public function prepare_post_meta( $object, $field_name, $request ) {
        return get_post_meta($object['id']);
    }

    public function prepare_featured_image( $object, $field_name, $request ) {
        return get_the_post_thumbnail_url($object['id'], 'post-thumbnail');
    }

    // function prepare_assessment_data_for_courses( $object, $field_name, $request ) {
    // return get_post_meta( $object['id'], 'assessments', true );
    // }

    public function submit_course_permission_callback( $request ) {
        return current_user_can('publish_telas_courses');
    }

    public function prepare_author_name( $object, $field_name, $request ) {
        return get_user_meta($object['author'], 'first_name', true) . ' ' . get_user_meta($object['author'], 'last_name', true);
    }

    public function prepare_assessment_data( $object, $field_name, $request ) {
        $post_id           = $object['id'];
        $assessment_status = get_post_meta($post_id, 'assessment_status', true);

        $assigned_admin_reviewer_user_id           = get_post_meta($post_id, 'assigned_admin_reviewer_user_id', true);
        $assigned_admin_reviewer_status            = get_post_meta($post_id, 'assigned_admin_reviewer_status', true);
        $assigned_admin_reviewer_user_email        = $assigned_admin_reviewer_user_id ? get_userdata($assigned_admin_reviewer_user_id)->user_email : '';
        $assigned_admin_reviewer_user_display_name = $assigned_admin_reviewer_user_id ? get_userdata($assigned_admin_reviewer_user_id)->display_name : '';

        $assigned_interim_reviewer_user_id           = get_post_meta($post_id, 'assigned_interim_reviewer_user_id', true);
        $assigned_interim_reviewer_status            = get_post_meta($post_id, 'assigned_interim_reviewer_status', true);
        $assigned_interim_reviewer_user_email        = $assigned_interim_reviewer_user_id ? get_userdata($assigned_interim_reviewer_user_id)->user_email : '';
        $assigned_interim_reviewer_user_display_name = $assigned_interim_reviewer_user_id ? get_userdata($assigned_interim_reviewer_user_id)->display_name : '';

        $assigned_first_reviewer_user_id           = get_post_meta($post_id, 'assigned_first_reviewer_user_id', true);
        $assigned_first_reviewer_status            = get_post_meta($post_id, 'assigned_first_reviewer_status', true);
        $assigned_first_reviewer_user_email        = $assigned_first_reviewer_user_id ? get_userdata($assigned_first_reviewer_user_id)->user_email : '';
        $assigned_first_reviewer_user_display_name = $assigned_first_reviewer_user_id ? get_userdata($assigned_first_reviewer_user_id)->display_name : '';

        $assigned_second_reviewer_user_id           = get_post_meta($post_id, 'assigned_second_reviewer_user_id', true);
        $assigned_second_reviewer_status            = get_post_meta($post_id, 'assigned_second_reviewer_status', true);
        $assigned_second_reviewer_user_email        = $assigned_second_reviewer_user_id ? get_userdata($assigned_second_reviewer_user_id)->user_email : '';
        $assigned_second_reviewer_user_display_name = $assigned_second_reviewer_user_id ? get_userdata($assigned_second_reviewer_user_id)->display_name : '';
        $assigned_admin_reviewer_assessment_ids     = ! empty($assigned_admin_reviewer_user_id) ? get_user_meta($assigned_admin_reviewer_user_id, 'assigned_assessments', true) : array();
        $assigned_first_reviewer_assessment_ids     = ! empty($assigned_first_reviewer_user_id) ? get_user_meta($assigned_first_reviewer_user_id, 'assigned_assessments', true) : array();
        $assigned_second_reviewer_assessment_ids    = ! empty($assigned_second_reviewer_user_id) ? get_user_meta($assigned_second_reviewer_user_id, 'assigned_assessments', true) : array();
        $assigned_interim_reviewer_assessment_ids   = ! empty($assigned_interim_reviewer_user_id) ? get_user_meta($assigned_interim_reviewer_user_id, 'assigned_assessments', true) : array();

        $completed_assessments = get_post_meta($post_id, 'completed_assessments', true) ? get_post_meta($post_id, 'completed_assessments', true) : array();
        $admin_assessment_id   = array_intersect($completed_assessments, $assigned_admin_reviewer_assessment_ids);
        $first_assessment_id   = array_intersect($completed_assessments, $assigned_first_reviewer_assessment_ids);
        $second_assessment_id  = array_intersect($completed_assessments, $assigned_second_reviewer_assessment_ids);
        $interim_assessment_id = array_intersect($completed_assessments, $assigned_interim_reviewer_assessment_ids);
        $is_test_course = (get_post_meta($post_id, 'forTest', true) && get_post_meta($post_id, 'forTest', true) === 'yes');

        $interim_reviewer_data = $is_test_course ? array(
            'assigned_interim_reviewer_user_ids' => get_post_meta($post_id, 'assigned_interim_reviewer_user_ids', true),
            'assigned_interim_review_ids' => get_post_meta($post_id, 'assigned_interim_review_ids', true),
            'assigned_interim_reviews_obj' => get_post_meta($post_id, 'assigned_interim_reviews_obj', true),
        ) : false;
        return array(
            'current_assessment_level'                    => get_post_meta($post_id, 'assessment_level', true),
            'is_assigned_admin_reviewer'                  => $assigned_admin_reviewer_user_id ? 'yes' : 'no',
            'has_admin_reviewer_completed'                => $assigned_admin_reviewer_status === 'completed' ? 'yes' : 'no',
            'is_assigned_interim_reviewer'                => $assigned_interim_reviewer_user_id ? 'yes' : 'no',
            'has_interim_reviewer_completed'              => $assigned_interim_reviewer_status === 'completed' ? 'yes' : 'no',
            'is_assigned_first_reviewer'                  => $assigned_first_reviewer_user_id ? 'yes' : 'no',
            'has_first_reviewer_completed'                => $assigned_first_reviewer_status === 'completed' ? 'yes' : 'no',
            'is_assigned_second_reviewer'                 => $assigned_second_reviewer_user_id ? 'yes' : 'no',
            'has_second_reviewer_completed'               => $assigned_second_reviewer_status === 'completed' ? 'yes' : 'no',
            'assigned_admin_reviewer_status'              => $assigned_admin_reviewer_status,
            'assigned_interim_reviewer_status'            => $assigned_interim_reviewer_status,
            'assigned_first_reviewer_status'              => $assigned_first_reviewer_status,
            'assigned_second_reviewer_status'             => $assigned_second_reviewer_status,
            'assigned_admin_reviewer_user_email'          => $assigned_admin_reviewer_user_email,
            'assigned_admin_reviewer_user_display_name'   => $assigned_admin_reviewer_user_display_name,
            'assigned_interim_reviewer_user_display_name' => $assigned_interim_reviewer_user_display_name,
            'assigned_first_reviewer_user_display_name'   => $assigned_first_reviewer_user_display_name,
            'assigned_second_reviewer_user_display_name'  => $assigned_second_reviewer_user_display_name,
            'assigned_interim_reviewer_user_email'        => $assigned_interim_reviewer_user_email,
            'assigned_first_reviewer_user_email'          => $assigned_first_reviewer_user_email,
            'assigned_second_reviewer_user_email'         => $assigned_second_reviewer_user_email,
            'admin_reviewer_assessment_id'                => reset($admin_assessment_id),
            'first_reviewer_assessment_id'                => reset($first_assessment_id),
            'second_reviewer_assessment_id'               => reset($second_assessment_id),
            'interim_reviewer_assessment_id'              => reset($interim_assessment_id),
            'all_completed_assessment_data'               => get_post_meta($post_id, 'assessments', true),
            'completed_assessments'                       => get_post_meta($post_id, 'completed_assessments', true),
            'all_assigned_reviewers'                      => get_post_meta($post_id, 'reviewers_assigned', true),
            'has_report'                                  => get_post_meta($post_id, 'has_report_created', true) === 'yes' ? 'yes' : 'no',
            'assigned_report'                             => ! empty(get_post_meta($post_id, 'report_post_id', true)) ? get_post_meta($post_id, 'report_post_id', true) : 0,
            'assigned_admin_reviewer_assessment_id'       => get_post_meta($post_id, 'assigned_admin_reviewer_assessment', true),
            'assigned_interim_reviewer_assessment_id'     => get_post_meta($post_id, 'assigned_interim_reviewer_assessment', true),
            'assigned_first_reviewer_assessment_id'       => get_post_meta($post_id, 'assigned_first_reviewer_assessment', true),
            'assigned_second_reviewer_assessment_id'      => get_post_meta($post_id, 'assigned_second_reviewer_assessment', true),
            'current_review_status'                       => get_post_meta($post_id, 'current_review_status', true) ? get_post_meta($post_id, 'current_review_status', true) : 'none',
            'last_status_update'                          => get_post_meta($post_id, 'last_status_update', true) ? get_post_meta($post_id, 'last_status_update', true) : get_the_date(),
            'interim_reviewer_commencement_date'          => get_post_meta($post_id, 'interim_reviewer_commencement_date', true) ? get_post_meta($post_id, 'interim_reviewer_commencement_date', true) : 'none',
            'interim_reviewer_completion_date'            => get_post_meta($post_id, 'interim_reviewer_completion_date', true) ? get_post_meta($post_id, 'interim_reviewer_completion_date', true) : 'none',
            'first_reviewer_commencement_date'            => get_post_meta($post_id, 'first_reviewer_commencement_date', true) ? get_post_meta($post_id, 'first_reviewer_commencement_date', true) : 'none',
            'admin_reviewer_commencement_date'            => get_post_meta($post_id, 'admin_reviewer_commencement_date', true) ? get_post_meta($post_id, 'admin_reviewer_commencement_date', true) : 'none',
            'admin_reviewer_completion_date'              => get_post_meta($post_id, 'admin_reviewer_completion_date', true) ? get_post_meta($post_id, 'admin_reviewer_completion_date', true) : 'none',
            'first_reviewer_completion_date'              => get_post_meta($post_id, 'first_reviewer_completion_date', true) ? get_post_meta($post_id, 'first_reviewer_completion_date', true) : 'none',
            'second_reviewer_commencement_date'           => get_post_meta($post_id, 'second_reviewer_commencement_date', true) ? get_post_meta($post_id, 'second_reviewer_commencement_date', true) : 'none',
            'second_reviewer_completion_date'             => get_post_meta($post_id, 'second_reviewer_completion_date', true) ? get_post_meta($post_id, 'second_reviewer_completion_date', true) : 'none',
            'combined_review_commencement_date'           => get_post_meta($post_id, 'combined_review_commencement_date', true) ? get_post_meta($post_id, 'combined_review_commencement_date', true) : 'none',
            'combined_review_completion_date'             => get_post_meta($post_id, 'combined_review_completion_date', true) ? get_post_meta($post_id, 'combined_review_completion_date', true) : 'none',
            'admin_assessment_assigned_date'              => get_post_meta($post_id, 'assigned_admin_reviewer_assessment', true) ? get_the_date(get_option('date_format'), get_post_meta($post_id, 'assigned_admin_reviewer_assessment', true)) : 'none',
            'interim_assessment_assigned_date'            => get_post_meta($post_id, 'assigned_interim_reviewer_assessment', true) ? get_the_date(get_option('date_format'), get_post_meta($post_id, 'assigned_interim_reviewer_assessment', true)) : 'none',
            'first_assessment_assigned_date'              => get_post_meta($post_id, 'assigned_first_reviewer_assessment', true) ? get_the_date(get_option('date_format'), get_post_meta($post_id, 'assigned_first_reviewer_assessment', true)) : 'none',
            'second_assessment_assigned_date'             => get_post_meta($post_id, 'assigned_second_reviewer_assessment', true) ? get_the_date(get_option('date_format'), get_post_meta($post_id, 'assigned_second_reviewer_assessment', true)) : 'none',
            'combined_review_status' => get_post_meta($post_id, 'combined_review_status', true) ? get_post_meta($post_id, 'combined_review_status', true) : 'assigned',
            'interim_reviewer_data' => $interim_reviewer_data,
        );

    }

    public function get_telas_user_by_id( $request ) {
        $all_params = $request->get_params();
        $user_data  = get_userdata($all_params['user_id']);

        $user_role = in_array('telas_assessor', $user_data->roles) ? get_user_meta($user_data->ID, 'telas_assessor_level', true) : $user_data->roles;
        $user_role = in_array('telas_course_submitters', $user_data->roles) ? 'telas_course_submitters' : $user_data->roles;

        $user_role = in_array('telas_telas_administrator', $user_data->roles) ? 'telas_telas_administrator' : $user_data->roles;

        if (in_array('telas_assessor', $user_data->roles) ) {
            $user_role = ! empty(get_user_meta($user_data->ID, 'telas_assessor_level', true)) ? get_user_meta($user_data->ID, 'telas_assessor_level', true) : 'telas_interim_reviewers';
        } elseif (in_array('telas_course_submitters', $user_data->roles) ) {
            $user_role = 'telas_course_submitters';
        } elseif (in_array('telas_telas_administrator', $user_data->roles) ) {
            $user_role = 'telas_telas_administrator';
        } else {
            $user_role = '';
        }

        $user_details_meta_fields['first_name']          = $user_data->first_name;
        $user_details_meta_fields['last_name']           = $user_data->last_name;
        $user_details_meta_fields['user_email']          = $user_data->user_email;
        $user_details_meta_fields['user_role']           = $user_role;
        $user_details_meta_fields['user_id']             = $user_data->ID;
        $user_details_meta_fields['position']            = get_user_meta($user_data->ID, 'position', true);
        $user_details_meta_fields['faculty']             = get_user_meta($user_data->ID, 'faculty', true);
        $user_details_meta_fields['institution_name']    = get_user_meta($user_data->ID, 'institution_name', true);
        $user_details_meta_fields['institution_campus']  = get_user_meta($user_data->ID, 'institution_campus', true);
        $user_details_meta_fields['institution_state']   = get_user_meta($user_data->ID, 'institution_state', true);
        $user_details_meta_fields['institution_country'] = get_user_meta($user_data->ID, 'institution_country', true);
        $user_details_meta_fields['is_first_time']       = get_user_meta($user_data->ID, 'is_first_time_updating', true);
        $user_details_meta_fields['activated_by_admin']  = get_user_meta($user_data->ID, 'activated_by_admin', true);
        return $user_details_meta_fields;
    }

    public function get_telas_users( $request ) {
        $all_params = $request->get_params();
        $role       = empty($all_params['role']) ? $all_params['role'] : 'telas_course_submitters';
        $page       = empty($all_params['page']) ? 1 : $all_params['page'];
        $per_page   = empty($all_params['per_page']) ? 10 : $all_params['per_page'];

        $user_query_args = array(
        'role'    => $role,
        'orderby' => 'login',
        'order'   => 'ASC',
        'number'  => $per_page,
        'paged'   => $page,
        );
        return apply_filters('extend_telas_before_dispatch_users', get_users($user_query_args));
    }

    public function update_assessment_callback( $request ) {
        $date_format          = get_option('date_format');
        $all_params           = $request->get_params();
        $assessment_data      = $all_params['assessment_data'];
        $assessment_id        = $all_params['assessments_id'];
        $percentage_completed = $all_params['percentage_completed'];
        $comment              = $all_params['comment'];
        $assigned_course_id   = get_post_meta($assessment_id, 'assigned_course', true);
        $prev_assessment_data = empty(get_post_meta($assessment_id, 'assessment_answer_data', true)) ? array() : get_post_meta($assessment_id, 'assessment_answer_data', true);
        update_post_meta($assessment_id, 'assessment_answer_data', array_merge($prev_assessment_data, $assessment_data));
        update_post_meta($assessment_id, 'comment', $comment);
        update_post_meta($assessment_id, 'percentage_completed', $percentage_completed);
        update_post_meta($assessment_id, 'assessment_status', 'in-progress');
        update_post_meta($assigned_course_id, 'last_status_update', date($date_format, current_time('timestamp', 0)));
        $assessment_level      = get_post_meta($assessment_id, 'assessment_assigned_user_level', true);
        update_post_meta($assigned_course_id, 'current_review_status', str_replace('er', '', str_replace('_', ' ', $assessment_level)) . 'In Progress');
        $assessment_start_date = get_post_meta($assessment_id, 'assessment_start_date', true);
        if (empty($assessment_start_date) ) {
            update_post_meta($assessment_id, 'assessment_start_date', $all_params['assessmentStartDate']);
        }
        if (empty(get_post_meta($assigned_course_id, $assessment_level . '_commencement_date', true)) ) {
            update_post_meta($assigned_course_id, $assessment_level . '_commencement_date', $all_params['assessmentStartDate']);
        }
        $post_author_id = get_post_meta($assessment_id, 'assigned_reviewer_user_id', true);
        $is_test_course = (get_post_meta($assigned_course_id, 'forTest', true) && get_post_meta($assigned_course_id, 'forTest', true) === 'yes');
        if ($is_test_course && $assessment_level === 'interim_reviewer' ) {
            $assigned_interim_reviews_obj = get_post_meta($assigned_course_id, 'assigned_interim_reviews_obj', true);
            $assigned_interim_reviews_obj[$post_author_id]['status'] = 'in_progress';
            if ( empty( $assigned_interim_reviews_obj[$post_author_id]['commencement_date'] ) ) {
                $assigned_interim_reviews_obj[$post_author_id]['commencement_date'] =  date($date_format, current_time('timestamp', 0));
            }
            $assigned_interim_reviews_obj[$post_author_id]['review_data'] = $assessment_data;
            update_post_meta($assigned_course_id, 'assigned_interim_reviews_obj', $assigned_interim_reviews_obj);
        }
        if ($all_params['action'] === 'complete' ) {
            update_post_meta($assessment_id, 'assessment_status', 'completed');
            $all_assessments           = ! empty(get_post_meta($assigned_course_id, 'assessments', true)) ? get_post_meta($assigned_course_id, 'assessments', true) : array();
            $all_completed_assessments = ! empty(get_post_meta($assigned_course_id, 'completed_assessments', true)) ? get_post_meta($assigned_course_id, 'completed_assessments', true) : array();
            array_push($all_completed_assessments, $assessment_id);
            update_post_meta($assigned_course_id, 'completed_assessments', array_unique($all_completed_assessments));
            update_user_meta($post_author_id, 'user_available', 'yes');
            $is_test_course = $all_params['is_test_course'];
            switch ( $assessment_level ) {
                case 'admin_reviewer':
                    $all_assessments['admin_reviewer']['status']      = 'completed';
                    $all_assessments['admin_reviewer']['assessment_id'] = $assessment_id;
                    $all_assessments['admin_reviewer']['review_data'] = $assessment_data;
                    update_post_meta($assigned_course_id, 'assessments', $all_assessments);
                    update_post_meta($assigned_course_id, 'assigned_admin_reviewer_status', 'completed');
                    update_post_meta($assigned_course_id, 'assessment_progress', 'in-progress');
                    update_post_meta($assigned_course_id, 'admin_reviewer_completion_date', date($date_format, current_time('timestamp', 0)));
                    update_post_meta($assigned_course_id, 'current_review_status', 'Admin Review Completed');
                    break;
                case 'interim_reviewer':
                    $assigned_interim_reviews_obj = get_post_meta($assigned_course_id, 'assigned_interim_reviews_obj', true);
                    $assigned_interim_reviews_obj[$post_author_id]['status'] = 'completed';
                    $assigned_interim_reviews_obj[$post_author_id]['completed_date'] =  date($date_format, current_time('timestamp', 0));
                    update_post_meta($assigned_course_id, 'assigned_interim_reviews_obj', $assigned_interim_reviews_obj);
                    $this->create_interim_reviewer_report($assigned_course_id, $assigned_interim_reviews_obj, $post_author_id);
                    // $all_assessments['interim_reviewer']['status']      = 'completed';
                    // $all_assessments['interim_reviewer']['review_data'] = $assessment_data;
                    // update_post_meta($assigned_course_id, 'assessments', $all_assessments);
                    // update_post_meta($assigned_course_id, 'assigned_interim_reviewer_status', 'completed');
                    // update_post_meta($assigned_course_id, 'assessment_progress', 'complete');
                    // update_post_meta($assigned_course_id, 'interim_review_completion_date', date($date_format, current_time('timestamp', 0)));
                    // update_post_meta($assigned_course_id, 'current_review_status', 'Interim Review Completed');
                    break;
                case 'first_reviewer':
                    $all_assessments['first_reviewer']['status']      = 'completed';
                    $all_assessments['first_reviewer']['assessment_id'] = $assessment_id;
                    $all_assessments['first_reviewer']['review_data'] = $assessment_data;
                    update_post_meta($assigned_course_id, 'assessments', $all_assessments);
                    update_post_meta($assigned_course_id, 'assigned_first_reviewer_status', 'completed');
                    update_post_meta($assigned_course_id, 'assessment_progress', 'in-progress');
                    update_post_meta($assigned_course_id, 'first_reviewer_completion_date', date($date_format, current_time('timestamp', 0)));
                    update_post_meta($assigned_course_id, 'current_review_status', 'First Review Completed');
                    $second_review_status = get_post_meta( $assigned_course_id, 'assigned_second_reviewer_status', true );
                    if ( $second_review_status === 'completed' ) {
                        update_post_meta($assigned_course_id, 'compare_ready', 'yes');
                        update_post_meta($assigned_course_id, 'assessment_progress', 'complete');
                        // update_user_meta($course_id, 'user_available', 'yes');
                        $this->create_combined_review($assigned_course_id, $all_assessments);
                    }
                    // update_user_meta($course_id, 'user_available', 'yes');
                    break;
                case 'second_reviewer':
                    $all_assessments['second_reviewer']['status']      = 'completed';
                    $all_assessments['second_reviewer']['assessment_id'] = $assessment_id;
                    $all_assessments['second_reviewer']['review_data'] = $assessment_data;
                    update_post_meta($assigned_course_id, 'assessments', $all_assessments);
                    update_post_meta($assigned_course_id, 'assigned_second_reviewer_status', 'completed');
                    update_post_meta($assigned_course_id, 'second_reviewer_completion_date', date($date_format, current_time('timestamp', 0)));
                    update_post_meta($assigned_course_id, 'current_review_status', 'Second Review Completed');
                    $first_review_status = get_post_meta( $assigned_course_id, 'assigned_first_reviewer_status', true );
                    if ( $first_review_status === 'completed' ) {
                        update_post_meta($assigned_course_id, 'compare_ready', 'yes');
                        update_post_meta($assigned_course_id, 'assessment_progress', 'complete');
                        // update_user_meta($course_id, 'user_available', 'yes');
                        $this->create_combined_review($assigned_course_id, $all_assessments);
                    }
                    break;

                default:
                    // code...
                    break;
            }
            // $this->assessment_completed_admin_notification($assessment_level, $assigned_course_id, $assessment_id);
        }
        $assessment_object = get_post($assessment_id);
        $postController    = new \WP_REST_Posts_Controller($assessment_object->post_type);
        $response          = $postController->prepare_item_for_response($assessment_object, $request);
        // var_dump( $response );
        return rest_ensure_response($response);
    }

    public function prepare_assessment_meta( $object, $field_name, $request ) {
        $assessment_id  = $object['id'];
        $course_id      = get_post_meta($assessment_id, 'assigned_course', true);
        $admin_assessment_id =  get_post_meta($course_id, 'assigned_admin_reviewer_assessment', true);
        $admin_assessment_comment = $admin_assessment_id ? get_post_meta($admin_assessment_id, 'comment', true) : false;

        $first_assessment_id = get_post_meta($course_id, 'assigned_first_reviewer_assessment', true);
        $first_assessment_comment = $first_assessment_id ? get_post_meta($first_assessment_id, 'comment', true) : false;

        $second_assessment_id = get_post_meta($course_id, 'assigned_second_reviewer_assessment', true);
        $second_assessment_comment = $second_assessment_id ? get_post_meta($second_assessment_id, 'comment', true) : false;
        $previous_comments = array(
            'admin_review_comment' => $admin_assessment_comment,
            'first_review_comment' => $first_assessment_comment,
            'second_review_comment' => $second_assessment_comment,
        );
        $author_id = get_post_field('post_author' , $assessment_id);
        $course_details = array(
            'title'                 => get_the_title($course_id),
            'review_status'         => get_post_meta($assessment_id, 'percentage_completed', true),
            'previous_assessments'  => get_post_meta($course_id, 'completed_assessments', true),
            'institution_name'      => get_post_meta($course_id, 'institutionName', true),
            'assigned_date'         => get_the_date(get_option('date_format'), $assessment_id),
            'courseID'              => $course_id,
            'assessmentId'          => $assessment_id,
            'assessment_user_level' => get_post_meta($assessment_id, 'assessment_assigned_user_level', true),
            'assessmentName'        => get_the_title($assessment_id),
            'faculty'               => get_post_meta($course_id, 'facultyDept', true),
            'studyArea'             => get_post_meta($course_id, 'studyLevel', true),
            'courseLevel'           => get_post_meta($course_id, 'courseLevel', true),
            'previous_comments'     => $previous_comments,
            'reviewer_name'         => get_the_author_meta( 'display_name', $author_id ),
            'is_test_course'        => get_post_meta( $course_id, 'forTest', true ) === 'yes',
        );

        $all_meta       = get_post_meta($assessment_id);
        return array(
        'course_detail'   => $course_details,
        'all_meta'        => $all_meta,
        'assessment_data' => empty(get_post_meta($assessment_id, 'assessment_answer_data', true)) ? array() : get_post_meta($assessment_id, 'assessment_answer_data', true),
        'admin_assessment_data' => get_post_meta($assessment_id, 'assessment_assigned_user_level', true) !== 'admin_reviewer' ? get_post_meta($course_id, 'assessments', true)['admin_reviewer']['review_data'] : false,
        'comment'         => empty(get_post_meta($assessment_id, 'comment', true)) ? array(
            'standard_0_comment' => '',
            'standard_1_comment' => '',
            'standard_2_comment' => '',
            'standard_3_comment' => '',
            'standard_4_comment' => '',
            'standard_5_comment' => '',
            'standard_6_comment' => '',
            'standard_7_comment' => '',
        ) : get_post_meta($assessment_id, 'comment', true),
        );
    }

    public function submit_course_callback( $request ) {
        $all_params = $request->get_params();
        if (! current_user_can('publish_telas_courses') ) {
            return new WP_Error(
                '[extend_telas]' . '403',
                'permission_denied',
                array(
                'status' => 403,
                )
            );
        }
        $new_course_args = array(
        'post_title'  => $all_params['coursePackageName'],
        'post_type'   => 'telas_courses',
        'meta_input'  => $request->get_params(),
        'post_status' => 'publish',
        );
        $new_course_id   = wp_insert_post($new_course_args);
        if (is_wp_error($new_course_id) ) {
            $error_code = $new_course_id->get_error_code();
            return new WP_Error(
                '[extend-telas] ' . $error_code,
                $new_course_id->get_error_message($error_code),
                array(
                'status' => 403,
                )
            );
        }
        $data = array(
            'course_title' => $all_params['coursePackageName'],
            'message'      => 'Course Submitted',
            'status'       => 200,
        );

        Telas_Assesments_Helper::new_course_submitted_notification($new_course_id, $all_params);
        return apply_filters('extend_telas_before_dispatch', $data);
    }

    public function register_user_callback( $request ) {
        $all_params    = $request->get_params();
        $new_user_data = array(
            'user_login' => $all_params['email'],
            'user_email' => $all_params['email'],
            'user_pass'  => $all_params['password'],
            'role'       => 'subscriber',
        );
        $new_user_id = wp_insert_user($new_user_data);
        if (is_wp_error($new_user_id) ) {
            $error_code = $new_user_id->get_error_code();
            if ( $error_code === 'existing_user_login' ) {
                return new WP_Error(
                    '[extend_telas] ' . 'existing_user_email',
                    'Sorry, that email address is already used!',
                    array(
                        'status' => 403,
                    )
                );
            }
            return new WP_Error(
                '[extend_telas] ' . $error_code,
                $new_user_id->get_error_message($error_code),
                array(
                    'status' => 403,
                )
            );
        }
        update_user_meta($new_user_id, 'position', '');
        update_user_meta($new_user_id, 'faculty', '');
        update_user_meta($new_user_id, 'institution_name', '');
        update_user_meta($new_user_id, 'institution_campus', '');
        update_user_meta($new_user_id, 'institution_state', '');
        update_user_meta($new_user_id, 'institution_country', '');
        update_user_meta($new_user_id, 'is_first_time_updating', 'yes');
        update_user_meta($new_user_id, 'activated_by_admin', 'no');
        $data = array(
            'user_id'    => $new_user_id,
            'user_email' => $all_params['email'],
            'status'     => 200,
        );
        // $this->new_user_notification( $new_user_id, $all_params['password'] );
        Telas_Assesments_Helper::send_new_user_welcome_email($new_user_id);
        return apply_filters('extend_telas_new_user_before_dispatch', $data);
    }

    public function update_user_callback( $request ) {
        $all_params       = $request->get_params();
        $user_id          = $all_params['user_id'];
        $role             = 'telas_course_submitters' === $all_params['telasRole'] ? 'telas_course_submitters' : 'telas_assessor';
        $role_changed_flag = (! empty( $request['roleChanged'] ) && $request['roleChanged'] === 'yes');
        $update_user_args = array(
            'ID'           => $user_id,
            'first_name'   => $all_params['firstName'],
            'last_name'    => $all_params['lastName'],
            'nickname'     => $all_params['firstName'] . ' ' . $all_params['lastName'],
            'display_name' => $all_params['firstName'] . ' ' . $all_params['lastName'],
        );
        if (! empty($all_params['telasRole']) ) {
            $update_user_args['role'] = $role;
        }
        $updated_user_id  = wp_update_user($update_user_args);
        if (is_wp_error($updated_user_id) ) {
            $error_code = $updated_user_id->get_error_code();
            return new WP_Error(
                '[extend_telas] ' . $error_code,
                $updated_user_id->get_error_message($error_code),
                array(
                'status' => 403,
                )
            );
        }
        update_user_meta($updated_user_id, 'position', $all_params['position']);
        update_user_meta($updated_user_id, 'faculty', $all_params['faculty']);
        update_user_meta($updated_user_id, 'institution_name', $all_params['institutionName']);
        update_user_meta($updated_user_id, 'institution_campus', $all_params['institutionCampus']);
        update_user_meta($updated_user_id, 'institution_state', $all_params['institutionState']);
        update_user_meta($updated_user_id, 'institution_country', $all_params['institutionCountry']);
        update_user_meta($updated_user_id, 'nickname', $all_params['firstName'] . ' ' . $all_params['lastName']);
        update_user_meta($updated_user_id, 'display_name', $all_params['firstName'] . ' ' . $all_params['lastName']);
        $is_user_updating_first_time = get_user_meta($updated_user_id, 'is_first_time_updating', true);
        $user_data                   = get_userdata($updated_user_id);
        $user_object                 = new WP_User($updated_user_id);
        if ($is_user_updating_first_time == 'yes' ) {
            foreach ( $user_data->roles as $role ) {
                $user_object->remove_role($role);
            }
            $user_object->add_role($role);
            update_user_meta($updated_user_id, 'user_available', 'yes');
            update_user_meta($updated_user_id, 'is_first_time_updating', 'no');
            $this->send_notification_to_telas_admin($user_object, $all_params['telasRole']);
            Telas_Assesments_Helper::send_profile_completion_notification_email($updated_user_id, $all_params['telasRole']);
        }
        if ('telas_assessor' === $role && ! empty($all_params['telasRole']) ) {
            update_user_meta($updated_user_id, 'telas_assessor_level', $all_params['telasRole']);
        }
        if (in_array('telas_assessor', $user_data->roles) ) {
            $user_role = ! empty(get_user_meta($updated_user_id, 'telas_assessor_level', true)) ? get_user_meta($updated_user_id, 'telas_assessor_level', true) : 'telas_interim_reviewers';
        } elseif (in_array('telas_course_submitters', $user_data->roles) ) {
            $user_role = 'telas_course_submitters';
        } elseif (in_array('telas_telas_administrator', $user_data->roles) ) {
            $user_role = 'telas_telas_administrator';
        } else {
            $user_role = '';
        }
        $user_details_meta_fields                        = get_fields('user_' . $updated_user_id);
        $user_details_meta_fields['first_name']          = $user_data->first_name;
        $user_details_meta_fields['last_name']           = $user_data->last_name;
        $user_details_meta_fields['user_email']          = $user_data->user_email;
        $user_details_meta_fields['user_role']           = $user_role;
        $user_details_meta_fields['user_id']             = $updated_user_id;
        $user_details_meta_fields['position']            = $all_params['position'];
        $user_details_meta_fields['faculty']             = $all_params['faculty'];
        $user_details_meta_fields['institution_name']    = $all_params['institutionName'];
        $user_details_meta_fields['institution_campus']  = $all_params['institutionCampus'];
        $user_details_meta_fields['institution_state']   = $all_params['institutionState'];
        $user_details_meta_fields['institution_country'] = $all_params['institutionCountry'];
        $user_details_meta_fields['is_first_time']       = get_user_meta($updated_user_id, 'is_first_time_updating', true);
        $user_details_meta_fields['activated_by_admin']  = get_user_meta($updated_user_id, 'activated_by_admin', true);
        if ($role_changed_flag && ( $is_user_updating_first_time === 'no' ) ) {
            Telas_Assesments_Helper::send_role_changed_notification($updated_user_id, $all_params['telasRole']);
        }
        return apply_filters('extend_telas_update_before_dispatch', $user_details_meta_fields);
    }

    public function assign_assessors_callback( $request ) {
        $date_format                  = get_option('date_format');
        $all_params                   = $request->get_params();
        $reviewer_user_id             = $all_params['key'];
        $course_id                    = $all_params['courseId'];
        $course_has_assessment        = $all_params['courseHasAssesment'];
        $course_title                 = get_the_title($course_id);
        $reviewer_level               = $all_params['reviewerLevel'];
        $re_assign_flag = $all_params['reAssign'];
        $courses_assigned_to_the_user = get_user_meta($reviewer_user_id, 'courses_assigned', true);
        $assessments = get_post_meta($course_id, 'linked_assessments', true) ? get_post_meta($course_id, 'linked_assessments', true) : array();

        if (empty($courses_assigned_to_the_user) ) {
            $courses_assigned_to_the_user = array( $course_id );
        } else {
            $courses_assigned_to_the_user = array_unique(array_push($courses_assigned_to_the_user, $course_id));
        }
        $assigned_reviewers_to_a_course = get_post_meta($course_id, 'reviewers_assigned', true);
        if (empty($assigned_reviewers_to_a_course) ) {
            $assigned_reviewers_to_a_course = array( $reviewer_user_id );
        } else {
            array_push($assigned_reviewers_to_a_course, $reviewer_user_id);
            $assigned_reviewers_to_a_course = array_unique($assigned_reviewers_to_a_course);
        }
        $assigned_assessments = empty(get_user_meta($reviewer_user_id, 'assigned_assessments', true)) ? array() : get_user_meta($reviewer_user_id, 'assigned_assessments', true);
        if ($re_assign_flag === 'yes') {
            $this->re_assign_reviewer($course_id, $reviewer_level, $reviewer_user_id);
        }
        switch ( $reviewer_level ) {
            case 'telas_admin_reviewers':
                $create_new_assessment_args = array(
                    'post_type'   => 'telas_assessment',
                    'post_title'  => 'Admin Reviewer Assessment for ' . $course_title,
                    'post_status' => 'publish',
                    'post_author' => $reviewer_user_id,
                );
                $course_submitter_id = get_post_meta( $course_id, 'courseSubmitterId', true );
                $new_assessment_id          = wp_insert_post($create_new_assessment_args);
                update_post_meta($new_assessment_id, 'assigned_course', $course_id);
                update_post_meta($course_id, 'assigned_admin_reviewer_user_id', $reviewer_user_id);
                update_post_meta($course_id, 'assigned_admin_reviewer_status', 'assigned');
                update_post_meta($course_id, 'assigned_admin_reviewer_assessment', $new_assessment_id);
                update_user_meta($reviewer_user_id, 'assigned_courses', $courses_assigned_to_the_user);
                update_post_meta($course_id, 'reviewers_assigned', $assigned_reviewers_to_a_course);
                update_user_meta($reviewer_user_id, 'assigned_reviewer_role', 'admin_reviewer');
                update_post_meta($new_assessment_id, 'assessment_status', 'assigned');
                update_post_meta($new_assessment_id, 'assessment_assigned_user_level', 'admin_reviewer');
                update_post_meta($course_id, 'assessment_level', 'admin_reviewer');
                array_push($assigned_assessments, $new_assessment_id);
                update_user_meta($reviewer_user_id, 'assigned_assessments', $assigned_assessments);
                update_post_meta($course_id, 'assessment_progress', 'in-progress');
                update_post_meta($course_id, 'current_review_status', 'Admin Reviewer Assigned');
                update_post_meta($course_id, 'last_status_update', date($date_format, current_time('timestamp', 0)));
                update_post_meta($new_assessment_id, 'assigned_reviewer_user_id', $reviewer_user_id);
                update_post_meta( $new_assessment_id, 'course_submitter_id', $course_submitter_id );
                // update_post_meta( $course_id, 'admin_review_commencement_date', date( $date_format, current_time( 'timestamp', 0 ) ) );
                update_user_meta($reviewer_user_id, 'user_available', 'no');
                array_push($assessments, $new_assessment_id);
                update_post_meta($course_id, 'linked_assessments', $assessments);
                $is_test_course = get_post_meta( $course_id, 'forTest', true ) === 'yes' ? 'yes' : 'no';
                update_post_meta( $new_assessment_id, 'linked_to_test_course', $is_test_course );
                break;
            case 'interim_reviewer':
                $this->assign_interim_reviewer($reviewer_user_id, $course_title, $course_id, $assigned_assessments, $date_format, $courses_assigned_to_the_user, $assigned_reviewers_to_a_course, $assessments);

                break;
            case 'first_reviewer':
                $create_new_assessment_args = array(
                'post_type'   => 'telas_assessment',
                'post_title'  => 'First Reviewer Assessment for ' . $course_title,
                'post_status' => 'publish',
                'post_author' => $reviewer_user_id,
                );
                $new_assessment_id          = wp_insert_post($create_new_assessment_args);
                update_post_meta($new_assessment_id, 'assigned_course', $course_id);
                update_post_meta($course_id, 'assigned_first_reviewer_user_id', $reviewer_user_id);
                update_post_meta($course_id, 'assigned_first_reviewer_status', 'assigned');
                update_post_meta($course_id, 'assigned_first_reviewer_assessment', $new_assessment_id);
                update_post_meta($course_id, 'assigned_admin_reviewer_status', 'completed');
                update_user_meta($reviewer_user_id, 'assigned_courses', $courses_assigned_to_the_user);
                update_post_meta($course_id, 'reviewers_assigned', $assigned_reviewers_to_a_course);
                update_user_meta($reviewer_user_id, 'assigned_reviewer_role', 'first_reviewer');
                update_post_meta($new_assessment_id, 'assessment_status', 'assigned');
                update_post_meta($course_id, 'assessment_level', 'first_reviewer');
                update_post_meta($new_assessment_id, 'assessment_assigned_user_level', 'first_reviewer');
                array_push($assigned_assessments, $new_assessment_id);
                update_user_meta($reviewer_user_id, 'assigned_assessments', $assigned_assessments);
                update_post_meta($course_id, 'assessment_progress', 'in-progress');
                update_post_meta($course_id, 'current_review_status', 'First Reviewer Assigned');
                update_post_meta($course_id, 'last_status_update', date($date_format, current_time('timestamp', 0)));
                update_post_meta($new_assessment_id, 'assigned_reviewer_user_id', $reviewer_user_id);
                $course_submitter_id = get_post_meta( $course_id, 'courseSubmitterId', true );
                update_post_meta( $new_assessment_id, 'course_submitter_id', $course_submitter_id );
                // update_post_meta( $course_id, 'first_review_commencement_date', date( $date_format, current_time( 'timestamp', 0 ) ) );
                update_user_meta($reviewer_user_id, 'user_available', 'no');
                array_push($assessments, $new_assessment_id);
                update_post_meta($course_id, 'linked_assessments', $assessments);
                break;
            case 'second_reviewer':
                $create_new_assessment_args = array(
                'post_type'   => 'telas_assessment',
                'post_title'  => 'Second Reviewer Assessment for ' . $course_title,
                'post_status' => 'publish',
                'post_author' => $reviewer_user_id,
                );
                $new_assessment_id          = wp_insert_post($create_new_assessment_args);
                update_post_meta($new_assessment_id, 'assigned_course', $course_id);
                update_post_meta($course_id, 'assigned_second_reviewer_user_id', $reviewer_user_id);
                update_post_meta($course_id, 'assigned_second_reviewer_status', 'assigned');
                update_post_meta($course_id, 'assigned_second_reviewer_assessment', $new_assessment_id);
                update_post_meta($course_id, 'assigned_admin_reviewer_status', 'completed');
                // update_post_meta($course_id, 'assigned_first_reviewer_status', 'completed');
                update_user_meta($reviewer_user_id, 'assigned_courses', $courses_assigned_to_the_user);
                update_post_meta($course_id, 'reviewers_assigned', $assigned_reviewers_to_a_course);
                update_user_meta($reviewer_user_id, 'assigned_reviewer_role', 'second_reviewer');
                update_post_meta($new_assessment_id, 'assessment_status', 'assigned');
                update_post_meta($course_id, 'assessment_level', 'second_reviewer');
                update_post_meta($new_assessment_id, 'assessment_assigned_user_level', 'second_reviewer');
                update_post_meta($course_id, 'assessment_progress', 'in-progress');
                array_push($assigned_assessments, $new_assessment_id);
                update_user_meta($reviewer_user_id, 'assigned_assessments', $assigned_assessments);
                update_post_meta($course_id, 'current_review_status', 'Second Reviewer Assigned');
                update_post_meta($course_id, 'last_status_update', date($date_format, current_time('timestamp', 0)));
                update_post_meta($new_assessment_id, 'assigned_reviewer_user_id',  $reviewer_user_id);
                $course_submitter_id = get_post_meta( $course_id, 'courseSubmitterId', true );
                update_post_meta( $new_assessment_id, 'course_submitter_id', $course_submitter_id );
                // update_post_meta( $course_id, 'second_review_commencement_date', date( $date_format, current_time( 'timestamp', 0 ) ) );
                update_user_meta($reviewer_user_id, 'user_available', 'no');
                array_push($assessments, $new_assessment_id);
                update_post_meta($course_id, 'linked_assessments', $assessments);
                break;

            default:
                // code...
            break;
        }
        Telas_Assesments_Helper::reviewer_assigned_notification($reviewer_user_id, $course_id, $new_assessment_id, $reviewer_level);
        // $this->course_reviewer_assigned_email_notification( $reviewer_user_id, $course_id, $new_assessment_id, $reviewer_level );
        $course_object  = get_post($course_id);
        $post_controller = new \WP_REST_Posts_Controller($course_object->post_type);
        $response       = $post_controller->prepare_item_for_response($course_object, $request);
        return rest_ensure_response($response);
    }
    public function assign_assessors_permission_callback() {
        return current_user_can('delete_others_telas_assessments');
    }

    public function register_acf_field_for_users() {
        if (function_exists('acf_add_local_field_group') ) :
            acf_add_local_field_group(
                array(
                'key'                   => 'group_5d805f37e4856',
                'title'                 => 'User Fields',
                'fields'                => array(
                array(
                'key'               => 'field_5d805f3e1d321',
                'label'             => 'Position',
                'name'              => 'position',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d805f4e1d322',
                'label'             => 'Faculty/Dept',
                'name'              => 'faculty',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d805f831d323',
                'label'             => 'Institution Name',
                'name'              => 'institution_name',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d805f901d324',
                'label'             => 'Institution Campus',
                'name'              => 'institution_campus',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d805f971d325',
                'label'             => 'Institution State / Region',
                'name'              => 'institution_state',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d805f9f1d326',
                'label'             => 'Institution Country',
                'name'              => 'institution_country',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                ),
                'location'              => array(
                array(
                array(
                'param'    => 'user_role',
                'operator' => '==',
                'value'    => 'all',
                ),
                ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => true,
                'description'           => '',
                )
            );

        endif;
    }
    public function register_acf_field_for_course_details()
    {
        if (function_exists('acf_add_local_field_group') ) :
            acf_add_local_field_group(
                array(
                'key'                   => 'group_5d81ea9bcdcb2',
                'title'                 => 'Course Details',
                'fields'                => array(
                array(
                'key'               => 'field_5d81eb69cd3a9',
                'label'             => 'Course Submission Date',
                'name'              => 'courseSubmissionDateString',
                'type'              => 'date_picker',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'display_format'    => 'd/m/Y',
                'return_format'     => 'd/m/Y',
                'first_day'         => 1,
                ),
                array(
                'key'               => 'field_5d81eaa1cd3a3',
                'label'             => 'Course Package Name',
                'name'              => 'coursePackageName',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d81eae7cd3a4',
                'label'             => 'Course Package Type',
                'name'              => 'coursePackageType',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d81eb03cd3a5',
                'label'             => 'Course Module Name',
                'name'              => 'courseModuleName',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d81eb18cd3a6',
                'label'             => 'Course Module Identifier',
                'name'              => 'courseModuleIdentifier',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d81eb31cd3a7',
                'label'             => 'Institution Name',
                'name'              => 'institutionName',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                array(
                'key'               => 'field_5d81eb4acd3a8',
                'label'             => 'Faculty/Dept',
                'name'              => 'facultyDept',
                'type'              => 'text',
                'instructions'      => '',
                'required'          => 0,
                'conditional_logic' => 0,
                'wrapper'           => array(
                'width' => '',
                'class' => '',
                'id'    => '',
                ),
                'default_value'     => '',
                'placeholder'       => '',
                'prepend'           => '',
                'append'            => '',
                'maxlength'         => '',
                ),
                ),
                'location'              => array(
                array(
                array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'telas_courses',
                ),
                ),
                ),
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => array(
                0 => 'the_content',
                ),
                'active'                => true,
                'description'           => '',
                )
            );

        endif;
    }

    public function modify_jwt_authentication_response( $data, $user ) {
        $user_data        = get_userdata($data['user_id']);
        $user_roles       = $user_data->roles;
        $assigned_courses = '';
        if (in_array('telas_assessor', $user_data->roles) ) {
            $user_role        = ! empty(get_user_meta($data['user_id'], 'telas_assessor_level', true)) ? get_user_meta($data['user_id'], 'telas_assessor_level', true) : 'telas_interim_reviewers';
            $assigned_courses = get_user_meta($data['user_id'], 'assigned_courses', true);
        } elseif (in_array('telas_course_submitters', $user_data->roles) ) {
            $user_role = 'telas_course_submitters';
        } elseif (in_array('telas_telas_administrator', $user_data->roles) ) {
            $user_role = 'telas_telas_administrator';
        } else {
            $user_role = '';
        }
        $data['user_meta']           = get_fields('user_' . $user_data->ID);
        $data['user_role']           = $user_role;
        $data['is_first_time']       = get_user_meta($user_data->ID, 'is_first_time_updating', true);
        $data['activated_by_admin']  = get_user_meta($user_data->ID, 'activated_by_admin', true);
        $data['assigned_courses']    = $assigned_courses;
        $data['assessment_assigned'] = get_user_meta($user_data->ID, 'assigned_assessments', true);
        return $data;
    }

    public function new_user_notification( $user_id, $plaintext_pass = '' ) {
        $user            = new WP_User($user_id);
        $user_login      = stripslashes($user->user_login);
        $user_email      = stripslashes($user->user_email);
        $blogname        = get_option('blogname');
        $subject         = sprintf('[%s] Your credentials.', $blogname);
        $headers         = array( 'Content-Type: text/html; charset=UTF-8' );
        $to              = $user_email;
        $message_title   = 'Verify Your E-mail.';
        $header_image    = '';
        $message_heading = 'Please login to complete your TELAS registration';
        $message_body    = '';
        $site_url        = get_option('siteurl');
        $signature       = '';
        $has_aside       = true;
        $button_link     = 'http://app.telas.edu.au/login';
        $button_text     = 'Complete Registration';
        $message         = Telas_Assesments_Helper::get_email_body($message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text);
        wp_mail($to, $subject, $message, $headers);
    }

    public function new_user_approve_notification( $user )
    {
        $user_login      = stripslashes($user->user_login);
        $user_email      = stripslashes($user->user_email);
        $blogname        = get_option('blogname');
        $subject         = sprintf('[%s] Profile Approved.', $blogname);
        $headers         = array( 'Content-Type: text/html; charset=UTF-8' );
        $to              = $user_email;
        $message_title   = 'Your submitted profile has been approved';
        $header_image    = '';
        $message_heading = 'Please login to continue your work.';
        $message_body    = '';
        $site_url        = get_option('siteurl');
        $signature       = '';
        $has_aside       = true;
        $button_link     = 'https://app.telas.edu.au/login';
        $button_text     = 'Login';
        $message         = Telas_Assesments_Helper::get_email_body($message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text);
        wp_mail($to, $subject, $message, $headers);
    }

    public function send_notification_to_telas_admin( $user_object, $user_role )
    {
        $message_title   = 'Please verify this newly created Account';
        $header_image    = '';
        $message_heading = 'User Details:';
        $user_role       = $user_role === 'telas_assessor' ? substr(get_user_meta($user_object->ID, 'telas_assessor_level', true), 0, -1) : substr($user_role, 0, -1);
        $user_role       = ucfirst(str_replace('_', ' ', $user_role));
        $message_body    = '<table rules="all" style="border-color: #666;" cellpadding="10">';
        $message_body   .= "<tr style='background: #eee;'><td><strong>First Name:</strong> </td><td>" . $user_object->first_name . '</td></tr>';
        $message_body   .= '<tr><td><strong>Last Name:</strong> </td><td>' . $user_object->last_name . '</td></tr>';
        $message_body   .= '<tr><td><strong>Position: </strong> </td><td>' . get_user_meta($user_object->ID, 'position', true) . '</td></tr>';
        $message_body   .= '<tr><td><strong>Faculty/Dept: </strong> </td><td>' . get_user_meta($user_object->ID, 'faculty', true) . '</td></tr>';
        $message_body   .= '<tr><td><strong>Institution Name:</strong> </td><td>' . get_user_meta($user_object->ID, 'institution_name', true) . '</td></tr>';
        $message_body   .= '<tr><td><strong>Institution Campus:</strong> </td><td>' . get_user_meta($user_object->ID, 'institution_campus', true) . '</td></tr>';
        $message_body   .= '<tr><td><strong>Institution State / Region:</strong> </td><td>' . get_user_meta($user_object->ID, 'institution_state', true) . '</td></tr>';
        $message_body   .= '<tr><td><strong>Institution Country:</strong> </td><td>' . get_user_meta($user_object->ID, 'institution_country', true) . '</td></tr>';
        $message_body   .= '<tr><td><strong>Email Address:</strong> </td><td>' . $user_object->user_email . '</td></tr>';
        $message_body   .= '<tr><td><strong>TELAS Role:</strong> </td><td>' . $user_role . '</td></tr>';
        $message_body   .= '</table>';
        $signature       = '';
        $has_aside       = true;
        $button_link     = 'https://app.telas.edu.au/user-profile/' . $user_object->ID;
        $button_text     = 'Approve/Decline';
        $blogname        = get_option('blogname');
        $subject         = sprintf('[%s] Please verify this newly created Account.', $blogname);
        $headers         = array( 'Content-Type: text/html; charset=UTF-8' );

        $message = Telas_Assesments_Helper::get_email_body($message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text);

        $all_telas_admin_emails = Telas_Assesments_Helper::get_telas_admin_emails();
        foreach ( $all_telas_admin_emails as $to_emails ) {
            wp_mail($to_emails, $subject, $message, $headers);
        }
        update_user_meta($user_object->ID, 'mail_sent_for_approval', 'yes');
    }

    public function assessment_completed_admin_notification( $assessment_level, $assigned_course_id, $assessment_id )
    {
        $message_title          = 'Assessment Completed';
        $header_image           = '';
        $course_title           = get_the_title($assigned_course_id);
        $assessment_title       = get_the_title($assessment_id);
        $assessment_level       = ucfirst(str_replace('_', ' ', $assessment_level));
        $message_heading        = "{$assessment_level} has completed review for {$course_title}.";
        $message_body           = '<p>Please click the button to view the assessment.</p>';
        $signature              = '';
        $button_link            = 'https://app.telas.edu.au/assessment/' . $assessment_id;
        $button_text            = 'View Assessment';
        $message                = Telas_Assesments_Helper::get_email_body($message_title, $header_image, $message_heading, $message_body, $signature, $has_aside = true, $button_link, $button_text);
        $blogname               = get_option('blogname');
        $subject                = sprintf('[%s]  Assessment Completed', $blogname);
        $headers                = array( 'Content-Type: text/html; charset=UTF-8' );
        $all_telas_admin_emails = Telas_Assesments_Helper::get_telas_admin_emails();
        $assessment_pdf_instance = new Telas_Generate_Pdf_Helper();
        $assessment_attachment = $assessment_pdf_instance->generate_assessment_report_pdf( $assessment_id );
        $attachments = array($assessment_attachment);
        foreach ( $all_telas_admin_emails as $to_emails ) {
            if ( wp_mail($to_emails, $subject, $message, $headers, $attachments) ) {
                unlink( $assessment_attachment );
            }
        }
    }

    public function onMailError( $wp_error )
    {
        echo '<pre>';
        print_r($wp_error);
        echo '</pre>';
    }

    public function check_login_submit( $user, $username, $password )
    {
        if (is_wp_error($user) ) {
            $user->errors['incorrect_password'][0] = "The password you entered for the username {$username} is incorrect.";
            $user->errors['invalid_username'][0]   = 'Invalid Username.';
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
    public function prefix_remove_has_published_posts_from_wp_api_user_query( $prepared_args, $request )
    {
        unset($prepared_args['has_published_posts']);
        return $prepared_args;
    }

    public function modify_rest_user_query( $prepared_args, $request )
    {
        $all_params = $request->get_params();
        if (empty($all_params['meta']) ) {
            return $prepared_args;
        }
        $prepared_args['meta_query']['relation'] = 'AND';
        foreach ( $all_params['meta'] as $meta_query_value ) {
            $meta_compare                  = ( ! empty($meta_query_value['compare']) ) ? $meta_query_value['compare'] : 'LIKE';
            $prepared_args['meta_query'][] = array(
            'key'     => $meta_query_value['key'],
            'value'   => $meta_query_value['value'],
            'compare' => $meta_compare,
            );
        }
        return $prepared_args;
    }

    public function prepare_get_telas_report_fields( $report_object, $field_name, $request )
    {
        $report_id = $report_object['id'];
        $course_id = get_post_meta( $report_id, 'course_id', true );
        return array(
            'assessment_data'                 => get_post_meta($report_id, 'assessment_data', true),
            'admin_reviewer_assessment_data'  => get_post_meta($report_id, 'admin_reviewer_assessment_data', true),
            'first_reviewer_assessment_data'  => get_post_meta($report_id, 'first_reviewer_assessment_data', true),
            'second_reviewer_assessment_data' => get_post_meta($report_id, 'second_reviewer_assessment_data', true),
            'first_reviewer_id'               => get_post_meta($report_id, 'first_reviewer_id', true),
            'admin_reviewer_id'               => get_post_meta($report_id, 'admin_reviewer_id', true),
            'second_reviewer_id'              => get_post_meta($report_id, 'second_reviewer_id', true),
            'first_reviewer_name'             => get_post_meta($report_id, 'first_reviewer_name', true),
            'admin_reviewer_name'             => get_post_meta($report_id, 'admin_reviewer_name', true),
            'second_reviewer_name'            => get_post_meta($report_id, 'second_reviewer_name', true),
            'assessment_status'               => get_post_meta($report_id, 'assessment_status', true) ? get_post_meta($report_id, 'assessment_status', true) : 'assigned',
            'course_id'                       => get_post_meta($report_id, 'course_id', true),
            'parent_course_title'             => get_post_meta($report_id, 'course_title', true),
            'commencement_date'               => get_post_meta( $report_id, 'combined_review_commencement_date', true ),
            'completion_date'                 => get_post_meta( $report_id, 'combined_review_completion_date', true ),
            'combined_review_data' => get_post_meta( $report_id, 'combined_review_data', true ) ? get_post_meta( $report_id, 'combined_reivew_data', true ) : array(),
            'report_id'                       => $report_id,
            'assigned_date'                   => get_post_meta( get_post_meta( $report_id, 'course_id', true ), 'combined_review_created_date', true ),
            'submit_for_accreditation'        => get_post_meta( get_post_meta($report_id, 'course_id', true), 'submitForAccreditation', true ),
            'combined_review_status'          => get_post_meta( $report_id, 'review_status', true ),
            'accreditation_email_sent'        => get_post_meta( get_post_meta( $report_id, 'course_id', true ), 'accreditation_email_sent', true ),
            'comments' => get_post_meta( $report_id , 'comments', true )  ?  get_post_meta( $report_id , 'comments', true )  : array(
                'standard_0_comment' => '',
                'standard_1_comment' => '',
                'standard_2_comment' => '',
                'standard_3_comment' => '',
                'standard_4_comment' => '',
                'standard_5_comment' => '',
                'standard_6_comment' => '',
                'standard_7_comment' => '',
            ),
            'is_pending' => get_post_meta( $report_id, 'is_pending', true ) ? get_post_meta( $report_id, 'is_pending', true) : 'no',
            'original_assessments_data' => $this->prepare_assessments_data_by_course_id( $course_id, $report_id ),
            'is_interim'=> get_post_meta( $report_id, 'for_test', true ) ? get_post_meta( $report_id, 'for_test', true) : 'no',
        );
    }

    function prepare_assessments_data_by_course_id( $course_id, $report_id ) {
        $completed_assessments = get_post_meta( $course_id, 'completed_assessments', true );
        $assessments_data = get_post_meta( $course_id, 'assessments', true );
        $admin_assessment_comments = get_post_meta( $assessments_data['admin_reviewer']['assessment_id'], 'comment', true );
        $first_assessment_comments = get_post_meta( $assessments_data['first_reviewer']['assessment_id'], 'comment', true );
        $second_assessment_comments = get_post_meta( $assessments_data['second_reviewer']['assessment_id'], 'comment', true );
        $first_reviewer_data = get_post_meta( $report_id, 'first_reviewer_assessment_data', true );
        return array(
            'admin_reviewer_data'   => $assessments_data['admin_reviewer']['review_data'],
            'first_reviewer_data'   => $first_reviewer_data['review_data'],
            'second_reviewer_data'  => !empty( $assessments_data['second_reviewer']['review_data'] ) ? $assessments_data['second_reviewer']['review_data'] : array(),
            'admin_reviewer_comments' => $admin_assessment_comments,
            'first_reviewer_comments' => $first_assessment_comments,
            'second_reviewer_comments' => $second_assessment_comments,
        );
    }

    public function prepare_update_telas_report_fields( $value, $report_object, $field_name )
    {
        update_post_meta($value['report_of_course'], 'report_post_id', $report_object->ID);
        update_post_meta($value['report_of_course'], 'has_report_created', 'yes');
        update_post_meta($value['report_of_course'], 'current_review_status', 'Combined Review Started');
        update_post_meta($value['report_of_course'], 'last_status_update', date($date_format, current_time('timestamp', 0)));
        update_post_meta($value['report_of_course'], 'combined_review_commencement_date', date($date_format, current_time('timestamp', 0)));
        return update_post_meta($report_object->ID, $field_name, $value);
    }

    public function get_assessment_calculation( $request )
    {
        $all_params                 = $request->get_params();
        $report_id                  = $all_params['id'];
        $assigned_course_id         = get_post_meta($report_id, 'assigned_course', true);
        $current_report_status = get_post_meta($report_id, 'assessment_status', true);
        $current_report_status =  get_post_meta( $report_id, 'for_test', true ) === 'yes' ? 'complete' : $current_report_status;
        if ($current_report_status !== 'complete' ) {
            return array(
            'calc'   => false,
            'status' => 200,
            );
        }
        $all_completed_assessments          = get_post_meta( $report_id, 'assessment_data', true );
        $combined_review_assessments_value  = $all_completed_assessments['first_reviewer']['review_data'];
        $pattern                      = '/domain*/';
        $all_domain_entry_keys        = array_filter(
            array_keys($combined_review_assessments_value),
            function ( $entry ) use ( $pattern ) {
                return preg_match($pattern, $entry);
            }
        );
        $all_domain_entry_keys        = array_values($all_domain_entry_keys);
        $all_domain_entries           = array();
        $first_domain_selected_total  = 0;
        $second_domain_selected_total = 0;
        $third_domain_selected_total  = 0;
        $fourth_domain_selected_total = 0;
        foreach ( $all_domain_entry_keys as $domain_entry_key ) {
            $domain_entry_key_segment = explode('_', $domain_entry_key);
            if ($domain_entry_key_segment[1] === '1' ) {
                $all_domain_entries['first']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $first_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } elseif ($domain_entry_key_segment[1] === '2' ) {
                $all_domain_entries['second']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $second_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } elseif ($domain_entry_key_segment[1] === '3' ) {
                $all_domain_entries['third']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $third_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } else {
                $all_domain_entries['fourth']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $fourth_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            }
        }

        $all_domain_entries['first']['selected_total']  = round($first_domain_selected_total, 2);
        $all_domain_entries['second']['selected_total'] = round($second_domain_selected_total, 2);
        $all_domain_entries['third']['selected_total']  = round($third_domain_selected_total, 2);
        $all_domain_entries['fourth']['selected_total'] = round($fourth_domain_selected_total, 2);

        // $first_domain_selected_total = 19.47;
        // $second_domain_selected_total = 20.72;
        // $third_domain_selected_total = 19.13;
        // $fourth_domain_selected_total = 20.20;


        $first_domain_badge_level  = round(( $first_domain_selected_total / 25 ) * 100);
        $first_domain_badge = $this->get_badge_value( $first_domain_badge_level );

        $second_domain_badge_level = round(( $second_domain_selected_total / 25 ) * 100);
        $second_domain_badge = $this->get_badge_value( $second_domain_badge_level );

        $third_domain_badge_level  = round(( $third_domain_selected_total / 25 ) * 100);
        $third_domain_badge = $this->get_badge_value( $third_domain_badge_level );

        $fourth_domain_badge_level = round(( $fourth_domain_selected_total / 25 ) * 100);
        $fourth_domain_badge = $this->get_badge_value( $fourth_domain_badge_level );

        $accreditation_percentage  = round(( ( $first_domain_badge_level + $second_domain_badge_level + $third_domain_badge_level + $fourth_domain_badge_level ) / 4 ));

        // print_r( 'here' );
        // print_r( $first_domain_badge_level);
        // print_r( $first_domain_badge);
        // print_r('---');
        // print_r( $second_domain_badge_level);
        // print_r( $second_domain_badge);
        // print_r('---');
        // print_r( $third_domain_badge_level);
        // print_r( $third_domain_badge);
        // print_r('---');
        // print_r( $fourth_domain_badge_level);
        // print_r( $fourth_domain_badge);


        $overall_badge = $this->get_badge_value( $accreditation_percentage );


        $all_domain_entries['first']['badge_level']     = $first_domain_badge_level;
        $all_domain_entries['first']['badge']     = $first_domain_badge;

        $all_domain_entries['second']['badge_level']    = $second_domain_badge_level;
        $all_domain_entries['second']['badge']    = $second_domain_badge;

        $all_domain_entries['third']['badge_level']     = $third_domain_badge_level;
        $all_domain_entries['third']['badge']     = $third_domain_badge;

        $all_domain_entries['fourth']['badge_level']    = $fourth_domain_badge_level;
        $all_domain_entries['fourth']['badge']    = $fourth_domain_badge;

        $all_domain_entries['accreditation_percentage'] = $accreditation_percentage;
        $all_domain_entries['accreditation_badge']      = $overall_badge;
        // update_post_meta( $assigned_course_id, 'combined_review_completion_date', date($date_format, current_time('timestamp', 0)) );
        return array(
            'calc'   => $all_domain_entries,
            'status' => 200,
        );
    }

    function send_accreditation_badge( $request ) {
        $all_params                 = $request->get_params();
        $course_id                  = $all_params['course_id'];
        $has_report_created = get_post_meta( $course_id, 'has_report_created', true );
        if ( empty( $has_report_created ) || $has_report_created === 'no' ) {
            return false;
        }
        $report_id = get_post_meta( $course_id, 'report_post_id', true );

        $assigned_course_id         = get_post_meta($report_id, 'assigned_course', true);
        $current_report_status = get_post_meta($report_id, 'assessment_status', true);
        if ($current_report_status !== 'complete' ) {
            return false;
        }
        $all_completed_assessments          = get_post_meta( $report_id, 'assessment_data', true );
        $combined_review_assessments_value  = $all_completed_assessments['first_reviewer']['review_data'];
        $pattern                      = '/domain*/';
        $all_domain_entry_keys        = array_filter(
            array_keys($combined_review_assessments_value),
            function ( $entry ) use ( $pattern ) {
                return preg_match($pattern, $entry);
            }
        );
        $all_domain_entry_keys        = array_values($all_domain_entry_keys);
        $all_domain_entries           = array();
        $first_domain_selected_total  = 0;
        $second_domain_selected_total = 0;
        $third_domain_selected_total  = 0;
        $fourth_domain_selected_total = 0;
        foreach ( $all_domain_entry_keys as $domain_entry_key ) {
            $domain_entry_key_segment = explode('_', $domain_entry_key);
            if ($domain_entry_key_segment[1] === '1' ) {
                $all_domain_entries['first']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $first_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } elseif ($domain_entry_key_segment[1] === '2' ) {
                $all_domain_entries['second']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $second_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } elseif ($domain_entry_key_segment[1] === '3' ) {
                $all_domain_entries['third']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $third_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            } else {
                $all_domain_entries['fourth']['values'][ $domain_entry_key ] = (float) $combined_review_assessments_value[ $domain_entry_key ];
                $fourth_domain_selected_total                               += (float) $combined_review_assessments_value[ $domain_entry_key ];
            }
        }

        $all_domain_entries['first']['selected_total']  = round($first_domain_selected_total, 2);
        $all_domain_entries['second']['selected_total'] = round($second_domain_selected_total, 2);
        $all_domain_entries['third']['selected_total']  = round($third_domain_selected_total, 2);
        $all_domain_entries['fourth']['selected_total'] = round($fourth_domain_selected_total, 2);

        $first_domain_badge_level  = round(( $first_domain_selected_total / 25 ) * 100);
        $first_domain_badge = $this->get_badge_value( $first_domain_badge_level );

        $second_domain_badge_level = round(( $second_domain_selected_total / 25 ) * 100);
        $second_domain_badge = $this->get_badge_value( $second_domain_badge_level );

        $third_domain_badge_level  = round(( $third_domain_selected_total / 25 ) * 100);
        $third_domain_badge = $this->get_badge_value( $third_domain_badge_level );

        $fourth_domain_badge_level = round(( $fourth_domain_selected_total / 25 ) * 100);
        $fourth_domain_badge = $this->get_badge_value( $fourth_domain_badge_level );

        $accreditation_percentage  = round(( ( $first_domain_badge_level + $second_domain_badge_level + $third_domain_badge_level + $fourth_domain_badge_level ) / 4 ));

        $overall_badge = $this->get_badge_value( $accreditation_percentage );


        $all_domain_entries['first']['badge_level']     = $first_domain_badge_level;
        $all_domain_entries['first']['badge']     = $first_domain_badge;

        $all_domain_entries['second']['badge_level']    = $second_domain_badge_level;
        $all_domain_entries['second']['badge']    = $second_domain_badge;

        $all_domain_entries['third']['badge_level']     = $third_domain_badge_level;
        $all_domain_entries['third']['badge']     = $third_domain_badge;

        $all_domain_entries['fourth']['badge_level']    = $fourth_domain_badge_level;
        $all_domain_entries['fourth']['badge']    = $fourth_domain_badge;

        $all_domain_entries['accreditation_percentage'] = $accreditation_percentage;
        $all_domain_entries['accreditation_badge']      = $overall_badge;

        if ( $accreditation_percentage <= 49 ) {
            update_post_meta( $course_id, 'accreditation_eligibility_status', 'Not eligible at this time' );
            $mail_status = Telas_Assesments_Helper::accreditation_email( $course_id, $all_domain_entries, false, $report_id );
        } else {
            update_post_meta( $course_id, 'accreditation_eligibility_status', 'Eligible' );
            $mail_status = Telas_Assesments_Helper::accreditation_email( $course_id, $all_domain_entries, true, $report_id );
            if ( $mail_status ) {
                update_post_meta( $report_id, 'review_status', 'accredited' );
                update_post_meta( $report_id, 'accredited_mail_sent_date', date( get_option( 'date_format' ), current_time( 'timestamp', 0 ) ) );
            }
        }

        if ( $mail_status ) {
            update_post_meta( $course_id, 'accreditation_email_sent', 'yes' );
            return array(
                'message'   => 'Course accreditation application email has been sent to the course submitter.',
                'status'    => 200,
            );
        } else {
            return array(
                'message' => 'Course accreditation application email can not be sent to the course submitter. Please try again.',
                'status' => 403,
            );
        }
    }

    function get_badge_value( $domain_score ) {
        $badge = 'No Badge';
        if ($domain_score >= 0 && $domain_score <= 50 ) {
            $badge = 'No Badge';
        } elseif ($domain_score >= 51 && $domain_score <= 60 ) {
            $badge = 'Bronze';
        } elseif ($domain_score >= 61 && $domain_score <= 70 ) {
            $badge = 'Silver';
        } elseif ($domain_score >= 71 && $domain_score <= 80 ) {
            $badge = 'Gold';
        } elseif ($domain_score >= 81 && $domain_score <= 90 ) {
            $badge = 'Platinum';
        } elseif ($domain_score >= 91) {
            $badge = 'Diamond';
        } else {
            $badge = 'No Badge';
        }
        return $badge;
    }

    public function email_template_create_callback( $request )
    {
        $all_params   = $request->get_params();
        $template_id  = $all_params['templateId'];
        $subject_line = $all_params['subject'];
        $email_body   = $all_params['emailBody'];
        $salutation   = $all_params['salutation'];
        update_option(
            $template_id,
            array(
            'subject'    => $subject_line,
            'emailBody'  => nl2br(htmlentities($email_body, ENT_QUOTES, 'UTF-8')),
            'salutation' => nl2br(htmlentities($salutation, ENT_QUOTES, 'UTF-8')),
            )
        );
        return array(
        'subject'    => $subject_line,
        'emailBody'  => $email_body,
        'salutation' => $salutation,
        );
    }

    public function email_template_get_callback( $request )
    {
        $all_params  = $request->get_params();
        $template_id = $all_params['templateId'];
        return get_option($template_id);
    }

    public function create_combined_review( $course_id, $assessment_data )
    {
        $first_reviewer_id  = get_post_meta($course_id, 'assigned_first_reviewer_user_id', true);
        $admin_reviewer_id  = get_post_meta($course_id, 'assigned_admin_reviewer_user_id', true);
        $second_reviewer_id = get_post_meta($course_id, 'assigned_second_reviewer_user_id', true);
        $course_submitter_id = get_post_meta($course_id, 'courseSubmitterId', true );

        $first_reviewer_user_obj = get_userdata($first_reviewer_id);
        $first_reviewer_name     = $first_reviewer_user_obj->first_name . ' ' . $first_reviewer_user_obj->last_name;

        $admin_reviewer_user_obj = get_userdata($admin_reviewer_id);
        $admin_reviewer_name     = $admin_reviewer_user_obj->first_name . ' ' . $admin_reviewer_user_obj->last_name;

        $second_reviewer_user_obj = get_userdata($second_reviewer_id);
        $second_reviewer_name     = $second_reviewer_user_obj->first_name . ' ' . $second_reviewer_user_obj->last_name;

        $course_title             = get_the_title($course_id);
        $new_combined_review_args = array(
            'post_type'   => 'telas_report',
            'post_title'  => 'Combined Review of ' . $course_title,
            'post_status' => 'publish',
            'post_author' => $first_reviewer_id,
        );
        $new_combined_review_id   = wp_insert_post($new_combined_review_args);
        $first_reviewer_data = $assessment_data['first_reviewer'];
        $first_reviewer_data['review_data'] = array();
        update_post_meta($course_id, 'report_post_id', $new_combined_review_id);
        update_post_meta($course_id, 'has_report_created', 'yes');
        update_post_meta($course_id, 'current_review_status', 'Combined Review Started');
        update_post_meta($course_id, 'last_status_update', date(get_option('date_format'), current_time('timestamp', 0)));
        update_post_meta($course_id, 'combined_review_created_date', date(get_option('date_format'), current_time('timestamp', 0)));
        update_post_meta($new_combined_review_id, 'assessment_data', $assessment_data);
        update_post_meta($new_combined_review_id, 'admin_reviewer_assessment_data', $assessment_data['admin_reviewer']);
        update_post_meta($new_combined_review_id, 'first_reviewer_assessment_data', $first_reviewer_data);
        update_post_meta($new_combined_review_id, 'second_reviewer_assessment_data', $assessment_data['second_reviewer']);
        update_post_meta($new_combined_review_id, 'first_reviewer_id', $first_reviewer_id);
        update_post_meta($new_combined_review_id, 'admin_reviewer_id', $admin_reviewer_id);
        update_post_meta($new_combined_review_id, 'second_reviewer_id', $second_reviewer_id);
        update_post_meta($new_combined_review_id, 'first_reviewer_name', $first_reviewer_name);
        update_post_meta($new_combined_review_id, 'admin_reviewer_name', $admin_reviewer_name);
        update_post_meta($new_combined_review_id, 'second_reviewer_name', $second_reviewer_name);
        update_post_meta($new_combined_review_id, 'course_id', $course_id);
        update_post_meta( $new_combined_review_id, 'course_submitter_id', $course_submitter_id );
        update_post_meta($new_combined_review_id, 'assessment_status', 'assigned');
        update_post_meta($course_id, 'combined_review_status', 'assigned');
        update_post_meta($new_combined_review_id, 'course_title', get_the_title($course_id));
        update_post_meta( $new_combined_review_id, 'reviewers_assigned', array( $first_reviewer_id, $admin_reviewer_id, $second_reviewer_id ) );
        update_post_meta($new_combined_review_id, 'review_status', 'assigned');
        Telas_Assesments_Helper::combined_reviewer_assigned_notification($course_id);
    }

    public function update_combined_review_fields( $report_object, $report_post_obj )
    {
        $assessment_data                                  = get_post_meta($report_post_obj->ID, 'assessment_data', true);
        $first_assessment_data                            = get_post_meta($report_post_obj->ID, 'first_reviewer_assessment_data', true);
        $course_id                                        = get_post_meta($report_post_obj->ID, 'course_id', true);
        $first_assessment_data['review_data']             = $report_object['firstReviewerAnswers'];
        $assessment_data['first_reviewer']['review_data'] = $report_object['firstReviewerAnswers'];
        $combined_review_commencement_date                = get_post_meta($course_id, 'combined_review_commencement_date', true);

        if (empty($combined_review_commencement_date) ) {
            update_post_meta($course_id, 'combined_review_commencement_date', date(get_option('date_format'), current_time('timestamp', 0)));
            update_post_meta($report_post_obj->ID, 'combined_review_commencement_date', date(get_option('date_format'), current_time('timestamp', 0)));
        }
        update_post_meta($course_id, 'combined_review_status', 'in-progress');
        update_post_meta($report_post_obj->ID, 'review_status', 'in-progress');
        $first_assessment_data['status'] = 'completed';
        update_post_meta($report_post_obj->ID, 'assessment_data', $assessment_data);
        update_post_meta($report_post_obj->ID, 'first_reviewer_assessment_data', $first_assessment_data);
        update_post_meta($report_post_obj->ID, 'assessment_status', $report_object['assessmentStatus']);
        update_post_meta( $report_post_obj->ID, 'comments', $report_object['comments'] );
        update_post_meta( $report_post_obj->ID, 'is_pending', $report_object['pending']);
        if ('complete' === $report_object['assessmentStatus'] ) {
            update_post_meta($report_post_obj->ID, 'combined_review_completion_date', date(get_option('date_format'), current_time('timestamp', 0)));
            update_post_meta($course_id, 'combined_review_completion_date', date(get_option('date_format'), current_time('timestamp', 0)));
            update_post_meta($report_post_obj->ID, 'review_status', 'completed');
            update_post_meta($course_id, 'combined_review_status', 'completed');
        }
    }

    public function fc_new_modify_user_table( $column )
    {
        $column['TELAS_role'] = 'Role';
        unset($column['role']);
        unset($column['posts']);
        return $column;
    }

    public function fc_new_modify_user_table_row( $val, $column_name, $user_id )
    {
        $user_data = new WP_User($user_id);
        switch ( $column_name ) {
        case 'TELAS_role':
            $roles       = in_array('telas_assessor', $user_data->roles) ? get_user_meta($user_data->ID, 'telas_assessor_level', true) : reset($user_data->roles);
            $roles_array = explode('_', $roles);
            $user_prefix = 'telas' === $roles_array[1] ? 'TELAS' : $roles_array[1];
            $user_suffix = 'administrator' !== $roles_array[2] ? substr($roles_array[2], 0, -1) : $roles_array[2];
            $role_string = count($roles_array) > 1 ? ucfirst($user_prefix) . ' ' . ucfirst($user_suffix) : $roles;
            return ucfirst($role_string);
        default:
        }
        return $val;
    }

    function lost_password_redirect()
    {
        wp_redirect('https://app.telas.edu.au/login');
        exit;
    }

    function assign_interim_reviewer( $reviewer_user_id, $course_title, $course_id, $assigned_assessments, $date_format, $courses_assigned_to_the_user, $assigned_reviewers_to_a_course, $linked_assessments )
    {
        $create_new_assessment_args = array(
        'post_type'   => 'telas_assessment',
        'post_title'  => 'Interim Reviewer Assessment for ' . $course_title,
        'post_status' => 'publish',
        'post_author' => $reviewer_user_id,
        );
        $new_assessment_id          = wp_insert_post($create_new_assessment_args);
        $course_submitter_id = get_post_meta( $course_id, 'courseSubmitterId', true );
        $assigned_interim_reviewers = get_post_meta($course_id, 'assigned_interim_reviewer_user_ids', true) ? get_post_meta($course_id, 'assigned_interim_reviewer_user_ids', true) : array();
        array_push($assigned_interim_reviewers, $reviewer_user_id);
        $assigned_interim_review_ids = get_post_meta($course_id, 'assigned_interim_review_ids', true) ? get_post_meta($course_id, 'assigned_interim_review_ids', true) : array();
        array_push($assigned_interim_review_ids, $new_assessment_id);
        $assigned_interim_reviews_obj = get_post_meta($course_id, 'assigned_interim_reviews_obj', true) ? get_post_meta($course_id, 'assigned_interim_reviews_obj', true) : array();
        $assigned_interim_reviews_obj[$reviewer_user_id] = array(
            'assessment_id' => $new_assessment_id,
            'status' => 'assigned',
            'reviewer_name' => get_user_meta($reviewer_user_id, 'nickname', true),
            'assigned_date' => date($date_format, current_time('timestamp', 0)),
        );
        update_post_meta($course_id, 'assigned_interim_reviews_obj', $assigned_interim_reviews_obj);
        update_post_meta($new_assessment_id, 'assigned_course', $course_id);
        update_post_meta($course_id, 'assigned_interim_reviewer_user_ids', $assigned_interim_reviewers);
        update_post_meta($course_id, 'assigned_admin_reviewer_status', 'completed');
        update_post_meta($course_id, 'assigned_interim_reviewer_status', 'assigned');
        update_post_meta($course_id, 'assigned_interim_review_ids', $assigned_interim_review_ids);
        update_user_meta($reviewer_user_id, 'assigned_courses', $courses_assigned_to_the_user);
        update_post_meta($course_id, 'reviewers_assigned', $assigned_reviewers_to_a_course);
        update_user_meta($reviewer_user_id, 'assigned_reviewer_role', 'interim_reviewer');
        update_post_meta($new_assessment_id, 'assessment_status', 'assigned');
        update_post_meta($course_id, 'assessment_level', 'interim_reviewer');
        update_post_meta($new_assessment_id, 'assessment_assigned_user_level', 'interim_reviewer');
        array_push($assigned_assessments, $new_assessment_id);
        update_user_meta($reviewer_user_id, 'assigned_assessments', $assigned_assessments);
        update_post_meta($course_id, 'assessment_progress', 'in-progress');
        update_post_meta($course_id, 'current_review_status', 'Interim Reviewer Assigned');
        update_post_meta($course_id, 'last_status_update', date($date_format, current_time('timestamp', 0)));
        update_post_meta($new_assessment_id, 'assigned_reviewer_user_id', $reviewer_user_id);
        update_post_meta( $new_assessment_id, 'course_submitter_id', $course_submitter_id );
        update_user_meta($reviewer_user_id, 'user_available', 'no');
        $is_test_course = get_post_meta( $course_id, 'forTest', true ) === 'yes' ? 'yes' : 'no';
        update_post_meta( $new_assessment_id, 'linked_to_test_course', $is_test_course );
        array_push($linked_assessments, $new_assessment_id);
        update_post_meta($course_id, 'linked_assessments', $linked_assessments);
    }

    function create_interim_reviewer_report( $course_id, $assigned_interim_reviews_obj, $interim_reviewer_id )
    {

        $interim_reviewer_id = $interim_reviewer_id;
        $admin_reviewer_id  = get_post_meta($course_id, 'assigned_admin_reviewer_user_id', true);

        $interim_reviewer_user_id = get_userdata($interim_reviewer_id);
        $interim_reviewer_name     = $interim_reviewer_user_id->first_name . ' ' . $interim_reviewer_user_id->last_name;

        $admin_reviewer_user_obj = get_userdata($admin_reviewer_id);
        $admin_reviewer_name     = $admin_reviewer_user_obj->first_name . ' ' . $admin_reviewer_user_obj->last_name;
        $course_submitter_id = get_post_meta( $course_id, 'courseSubmitterId', true );
        $assessments_obj = get_post_meta($course_id, 'assessments', true);
        $admin_assessment_data = $assessments_obj['admin_reviewer']['review_data'];
        $interim_reviewer_assessment_data = $assigned_interim_reviews_obj[$interim_reviewer_id]['review_data'];

        $assessment_data = array(
            'admin_reviewer' => array(
                'status' => 'completed',
                'review_data' => $admin_assessment_data,
            ),
            'first_reviewer' => array(
                'status' => 'completed',
                'review_data' => $interim_reviewer_assessment_data
            ),
        );


        $course_title             = get_the_title($course_id);
        $interim_review_args = array(
            'post_type'   => 'telas_report',
            'post_title'  => 'Test Assessment of course ' . $course_title . ' by ' . $interim_reviewer_name,
            'post_status' => 'publish',
            'post_author' => $interim_reviewer_id,
        );
        $new_interim_review_id   = wp_insert_post($interim_review_args);
        update_post_meta($course_id, 'report_post_id', $new_interim_review_id);
        update_post_meta($course_id, 'has_report_created', 'yes');
        update_post_meta($course_id, 'current_review_status', 'Combined Review Started');
        update_post_meta($course_id, 'last_status_update', date(get_option('date_format'), current_time('timestamp', 0)));
        update_post_meta($course_id, 'combined_review_created_date', date(get_option('date_format'), current_time('timestamp', 0)));
        update_post_meta($new_interim_review_id, 'assessment_data', $assessment_data);
        update_post_meta($new_interim_review_id, 'admin_reviewer_assessment_data', $assessment_data['admin_reviewer']);
        update_post_meta($new_interim_review_id, 'first_reviewer_assessment_data', $assessment_data['first_reviewer']);
        update_post_meta($new_interim_review_id, 'first_reviewer_id', $interim_reviewer_id);
        update_post_meta($new_interim_review_id, 'admin_reviewer_id', $admin_reviewer_id);
        update_post_meta($new_interim_review_id, 'first_reviewer_name', $interim_reviewer_name);
        update_post_meta($new_interim_review_id, 'admin_reviewer_name', $admin_reviewer_name);
        update_post_meta($new_interim_review_id, 'course_id', $course_id);
        update_post_meta($new_interim_review_id, 'assessment_status', 'completed');
        update_post_meta($course_id, 'combined_review_status', 'completed');
        update_post_meta($new_interim_review_id, 'review_status', 'completed');
        update_post_meta($new_interim_review_id, 'combined_review_completion_date', date(get_option('date_format'), current_time('timestamp', 0)));
        update_post_meta( $new_interim_review_id, 'for_test', 'yes' );
        update_post_meta($new_interim_review_id, 'course_title', get_the_title($course_id));
        update_post_meta( $new_interim_review_id, 'reviewers_assigned', array( $interim_reviewer_id, $admin_reviewer_id ) );
        update_post_meta( $new_interim_review_id, 'course_submitter_id', $course_submitter_id );
    }
    function re_assign_reviewer( $course_id, $reviewer_level, $reviewer_user_id )
    {
        $previously_assigned_user_id = get_post_meta($course_id, 'assigned_' . $reviewer_level . '_user_id', true);
        update_user_meta($previously_assigned_user_id, 'user_available', 'yes');
        $previously_assigned_assessment_id = get_post_meta($course_id, 'assigned_' . $reviewer_level . '_assessment', true);
        global $wpdb;
        if (! $assessment_object = get_post($previously_assigned_assessment_id) ) { return;
        }

        if ('draft' == $assessment_object->post_status ) { return;
        }

        $wpdb->update($wpdb->posts, array( 'post_status' => 'draft' ), array( 'ID' => $assessment_object->ID ));

        clean_post_cache($assessment_object->ID);

        $old_status = $assessment_object->post_status;
        $assessment_object->post_status = 'draft';
        wp_transition_post_status('draft', $old_status, $assessment_object);
    }

    function delete_course_action( $course_id ) {
        if ( 'telas_courses' !== get_post_type( $course_id ) ) {
            return;
        }
        $assigned_reviewers = get_post_meta($course_id, 'reviewers_assigned', true);
        $current_assessment_level = get_post_meta($course_id, 'assessment_level', true);
        $current_assessment_status = get_post_meta($course_id, 'assigned_' . $current_assessment_level . '_status', true);
        $all_linked_assessments = get_post_meta( $course_id, 'linked_assessments', true );
        $current_assessment_level_user_id = get_post_meta($course_id, 'assigned_' . $current_assessment_level . '_user_id', true);
        $has_report = ! empty( get_post_meta( $course_id, 'has_report_created', true ) ) && get_post_meta( $course_id, 'has_report_created', true ) === 'yes';
        if ( $has_report ) {
            $report_id = get_post_meta( $course_id, 'report_post_id', true );
            wp_delete_post( $report_id, true );
        }
        foreach( $all_linked_assessments as $linked_assessment ) {
            wp_delete_post( $linked_assessment, true );
        }
        if ('completed' !== $current_assessment_status ) {
            update_user_meta($current_assessment_level_user_id, 'user_available', 'yes');
        }
    }
    function override_sender_email( $original_email_address ) {
        return get_option('admin_email');
    }

    function override_sender_name( $original_email_from ) {
        return get_option('blogname');
    }

    function handle_preflight() {
        $origin = get_http_origin();
        $allowed_origins = [ 'http://telasweb.test', 'http://telasweb.test:8080', 'localhost:8080' ];
        if ( $origin && in_array( $origin, $allowed_origins ) ) {
            header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $origin ) );
            // header("Access-Control-Allow-Origin: " . 'http://telasweb.test*');
            header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
            header("Access-Control-Allow-Credentials: true");
            header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
            if ('OPTIONS' == $_SERVER['REQUEST_METHOD']) {
                status_header(200);
                exit();
            }
        }
    }
    function rest_filter_incoming_connections($errors) {
        $request_server = $_SERVER['REMOTE_ADDR'];
        $origin = get_http_origin();
        if ($origin !== 'http://telasweb.test:8080') return new WP_Error('forbidden_access', $origin, array(
            'status' => 403
        ));
        return $errors;
    }

    public static function remove_old_pdf_files_hook_callback() {
        $pdf_files = glob( plugin_dir_path( dirname( __FILE__ ) ) . 'pdf/generated-pdfs/*.pdf' );
        foreach( $pdf_files as $file ) {
            if ( file_exists( $file ) ) {
                unlink($file);
                clearstatcache();
            }
        }
        // wp_mail( 'vishalbasnet23@gmail.com', 'run', 'CORN' );
    }

    function my_cron_schedules($schedules){
        if(!isset($schedules["5min"])){
            $schedules["5min"] = array(
                'interval' => 5*60,
                'display' => __('Once every 5 minutes'));
        }
        if(!isset($schedules["30min"])){
            $schedules["30min"] = array(
                'interval' => 30*60,
                'display' => __('Once every 30 minutes'));
        }
        return $schedules;
    }


}
