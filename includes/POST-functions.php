<?php

#add_action( 'rest_api_init', 'register_calendar_fields' );

// Register post fields
#function register_calendar_fields() {
#    register_rest_field( 'olandsstuguthyrning/v1', '/process', array(
#        'methods' => 'POST',
#        'callback' => 'process_calendar_data'
#    ));
#}

// Get post calendars
#function process_calendar_data($data) {
#    return "Det funkar jao!";
#}