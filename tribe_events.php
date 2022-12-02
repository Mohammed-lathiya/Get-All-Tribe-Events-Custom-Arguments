<?php

$args = array(
    'post_type' => 'tribe_events',//Display only event post types
    'eventDisplay' => 'custom',//Needed to override tribe's modifications to the WP_Query
    'posts_per_page' => 6,
    'post_status' => array( 'publish' ),
		'orderby' => '_EventStartDate',
	  'meta_key' => '_EventStartDate',	
	  'paged'   => $paged,	
);

if( $type == 'past' ){
	$args['order'] = 'DESC';
	$args['meta_query'][] = array(
    	'key' => '_EventStartDate',//Compare using the event's start date
    	'value' => date('Y-m-d H:i:s'),//Compare against today's date
    	'compare' => '<=',//Get events that are set to the value's date or in the future
    	'type' => 'DATETIME'//This is a date query
	);
	$args['meta_query'][] = array(
    	'key' => '_EventEndDate',//Compare using the event's start date
    	'value' => date('Y-m-d H:i:s'),//Compare against today's date
    	'compare' => '<=',//Get events that are set to the value's date or in the future
    	'type' => 'DATETIME'//This is a date query
	);
}else{
	$args['order'] = 'ASC';
	$args['meta_query'][] = array(
    	'key' => '_EventEndDate',//Compare using the event's start date
    	'value' => date('Y-m-d H:i:s'),//Compare against today's date
    	'compare' => '>=',//Get events that are set to the value's date or in the future
    	'type' => 'DATETIME'//This is a date query
	);
}

?>
