<?php
class Slug_Custom_Route extends WP_REST_Controller {
    /**
   * Register the routes for the objects of the controller.
   */
    public function register_routes() {
        $version = '1';
        $namespace = 'telasweb/v' . $version;
        $base = 'register';
        register_rest_route( $namespace, '/' . $base, array(
            array(
                'methods'             => WP_REST_Server::CREATABLE,
                'callback'            => array( $this, 'register_user_callback' ),
                'args'                => $this->get_endpoint_args_for_user_schema( true ),
            )
        ));
    }
    function register_user_callback() {
		$item = $this->prepare_item_for_database( $request );
		var_dump( $item );
		die;
		if ( function_exists( 'slug_some_function_to_create_item' ) ) {
		$data = slug_some_function_to_create_item( $item );
		if ( is_array( $data ) ) {
			return new WP_REST_Response( $data, 200 );
		}
		}
	
		return new WP_Error( 'cant-create', __( 'message', 'text-domain' ), array( 'status' => 500 ) );
	}
}