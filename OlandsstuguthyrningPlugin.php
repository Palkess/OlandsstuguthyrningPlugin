<?php
/**
 * Plugin Name: Ölandsstuguthyrning Plugin API
 * Description: Utökar API:t med funktioner för att spara kalendrar.
 * Version: 1.0.0
 * Author: Jonas Andersson
 * Author URI: https://jonasandersson.se/
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define constants.
define( 'OLANDSSTUGUTHYRNING_PLUGIN_VERSION', '1.0.0' );
define( 'OLANDSSTUGUTHYRNING_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );

add_action( 'rest_api_init', 'register_calendar_routes');

// Register routes
function register_calendar_routes() {
    register_rest_route( 'olandsstuguthyrning/v1', '/process', array(
        'methods' => 'POST',
        'callback' => 'process_calendar_data'
    ));
}

// Process data info a file
function process_calendar_data($data) {
    $nameOfHouse = $data['houseName'];
    $bookingData = $data['data'];
    $sqlBuild = "";


    foreach($bookingData as $year => $months) {
        foreach($months as $month => $days) {
            if($month < 10) {
                $month = "0{$month}";
            }

            foreach($days as $day) {
                $date = $day['date'];
                $state = $day['state'];

                if($date < 10) {
                    $date = "0{$date}";
                }

                $sqlBuild .= "INSERT INTO fakeTable (house, date, state) VALUES ('{$nameOfHouse}', '{$year}-{$month}-{$date}', '{$state}')\n";
            }
        }
    }

    var_dump($nameOfHouse);

    var_dump($bookingData);

    var_dump($sqlBuild);
}