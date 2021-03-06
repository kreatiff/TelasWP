<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       www.telas.edu.au
 * @since      1.0.0
 *
 * @package    Telas_Assesments
 * @subpackage Telas_Assesments/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Telas_Assesments
 * @subpackage Telas_Assesments/includes
 * @author     TELAS <telas@contactus.com>
 */
class Telas_Assesments {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Telas_Assesments_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'TELAS_ASSESMENTS_VERSION' ) ) {
			$this->version = TELAS_ASSESMENTS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'telas-assesments';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Telas_Assesments_Loader. Orchestrates the hooks of the plugin.
	 * - Telas_Assesments_i18n. Defines internationalization functionality.
	 * - Telas_Assesments_Admin. Defines all hooks for the admin area.
	 * - Telas_Assesments_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-telas-assesments-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-telas-assesments-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-telas-assesments-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-telas-assesments-public.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-telas-assesments-helper.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'vendor/autoload.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'pdf/class-generate-pdf.php';

		$this->loader = new Telas_Assesments_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Telas_Assesments_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Telas_Assesments_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Telas_Assesments_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_post_types' );
		$this->loader->add_action( 'acf/init', $plugin_admin, 'register_post_type_relationship_fields' );
		$this->loader->add_action( 'acf/init', $plugin_admin, 'register_assessment_field' );
		$this->loader->add_action( 'acf/init', $plugin_admin, 'register_acf_field_for_users' );
		$this->loader->add_action( 'acf/init', $plugin_admin, 'register_acf_field_for_course_details' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_telas_administrator_role' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_course_submitters_role' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_assessor_role' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_custom_post_type_capabilites_for_super_admin', 999 );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_custom_cap_for_course_submitters_role', 999 );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_custom_cap_for_telas_assessor_role', 999 );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'add_custom_post_type_capabilites_for_telas_telas_administrator', 999 );
		$this->loader->add_action( 'rest_api_init', $plugin_admin, 'register_routes' );
		$this->loader->add_filter( 'jwt_auth_token_before_dispatch', $plugin_admin, 'modify_jwt_authentication_response', 10, 2 );
		$this->loader->add_filter( 'wp_new_user_notification_email', $plugin_admin, 'new_user_notification', 10, 3 );
		$this->loader->add_filter( 'authenticate', $plugin_admin, 'check_login_submit', 40, 3 );
		$this->loader->add_filter( 'rest_user_query', $plugin_admin, 'prefix_remove_has_published_posts_from_wp_api_user_query', 10, 2 );
		$this->loader->add_filter( 'rest_user_query', $plugin_admin, 'modify_rest_user_query', 20, 2 );
		$this->loader->add_filter( 'manage_users_columns', $plugin_admin, 'fc_new_modify_user_table' );
		$this->loader->add_filter( 'manage_users_custom_column', $plugin_admin, 'fc_new_modify_user_table_row', 10, 3 );
		$this->loader->add_action( 'after_password_reset', $plugin_admin, 'lost_password_redirect' );
		$this->loader->add_action( 'before_delete_post', $plugin_admin, 'delete_course_action' );
		$this->loader->add_filter( 'wp_mail_from', $plugin_admin, 'override_sender_email' );
		$this->loader->add_filter( 'wp_mail_from_name', $plugin_admin, 'override_sender_name' );
		// $this->loader->add_action( 'rest_api_init', $plugin_admin, 'rest_filter_incoming_connections', 15 );
		// $this->loader->add_action( 'init', $plugin_admin, 'handle_preflight' );
		// $this->loader->add_filter( 'rest_authentication_errors', $plugin_admin, 'rest_filter_incoming_connections' );
		// $this->loader->add_filer( 'rest_pre_serve_request', $plugin_admin, 'rest_send_cors_header', );

		$this->loader->add_filter('cron_schedules', $plugin_admin, 'my_cron_schedules' );
		$this->loader->add_action( 'remove_old_pdf_files_hook', $plugin_admin, 'remove_old_pdf_files_hook_callback' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Telas_Assesments_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Telas_Assesments_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
