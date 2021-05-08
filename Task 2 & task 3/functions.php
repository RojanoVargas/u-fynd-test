<?php

/*----------------------------------------------launches---------------------------------------------*/

/*---Creating custom post type---*/

add_action( 'init', 'register_launch_cpt');
function register_launch_cpt() {
	register_post_type('launch', [
		'label' => 'Launches',
		'public' => true,
		'capability_type' => 'post'
	]);
}

/*---Scraping SpaceX API---*/

if( ! wp_next_scheduled('update_launch_list') ){
	wp_schedule_event(time(), 'weekly', 'get_launches_from_api');
}//weekly updates the launches (if there's anything new)


add_action('wp_ajax_nopriv_get_launches_from_api', 'get_launches_from_api');//let us run the API wether we are not logged in
add_action('wp_ajax_get_launches_from_api', 'get_launches_from_api');//or wether we are
function get_launches_from_api(){

	$file = get_stylesheet_directory() . '/report.txt';
	$current_page = ( ! empty($_POST['current_page']) ) ? $_POST['current_page'] : 1;
	$launches = [];

	$results = wp_remote_retrieve_body( wp_remote_get('https://api.spacexdata.com/v3/launches/?page=' . $current_page. '&per_page=50'));
	file_put_contents($file, "Current Page: " . $current_page. "\n\n", FILE_APPEND);


	$results = json_decode($results); //decode

	if ( ! is_array( $results ) || empty ( $results ) ){
		return false;
	}

	$launches[] = $results;

	foreach( $launches[0] as $launch ){ //we can work individually with each launch

		$launch_slug = sanitize_title($launch->mission_name . '-' . $launch->flight_number);

		/*-- Start making sure the content is updated */
		$existing_launch = get_page_by_path($launch_slug, 'OBJECT', 'launch');

		if( $existing_launch === null ){

			$inserted_launch = wp_insert_post([
				'post_name' => $launch_slug,
				'post_title' => $launch_slug,
				'post_type' => 'launch',
				'post_status' => 'publish'
			]); //Get all data and create a new custom post type


			if ( is_wp_error( $inserted_launch ) ) {
				continue;
			}

			$fillable = [
				'field_6095932a53d5e' => 'flight_number',
				'field_6095b25d0f9d9' => 'mission_name',
				'field_6095b2720f9da' => 'launch_year',
			];

			foreach ( $fillable as $key => $name ) {
				update_field( $key, $launch->$name, $inserted_launch ); //update_field is from ACF plugin
			}
		}else {

			$existing_launch_id = $existing_launch->ID;
			$existing_launch_timestamp = get_field('updated_at', $existing_launch_id);

			if( $launch->updated_at >= $existing_launch_timestamp ){
				$fillable = [
					'field_6095932a53d5e' => 'flight_number',
					'field_6095b25d0f9d9' => 'mission_name',
					'field_6095b2720f9da' => 'launch_year',
				];
	
				foreach ( $fillable as $key => $name ) {
					update_field( $key, $launch->$name, $existing_launch_id );
				}
			}
		}
	}

	$current_page = $current_page + 1;
	wp_remote_post( admin_url('admin-ajax.php?action=get_launches_from_api'), [
		'blocking' => false,
		'sslverify' => false, //to work locally, so we don't have to verify the SSL
		'body' => [
			'current_page' => $current_page
		]
	] );
}