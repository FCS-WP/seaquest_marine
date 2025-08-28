<?php

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'pre_get_posts', 'ova_career_post_per_page_archive' );
function ova_career_post_per_page_archive( $query ) {
	if ( ( is_post_type_archive( 'ova_career' )  && !is_admin() )  || ( is_tax('cat_career') && !is_admin() ) ) {
		if( $query->is_post_type_archive( 'ova_career' ) || $query->is_tax('cat_career') ) {
			$query->set('post_type', array( 'ova_career' ) );
			$query->set('posts_per_page', get_theme_mod( 'ova_career_total_record', 9 ) );
			$query->set('orderby', 'meta_value_num' );
            $query->set('order', 'ASC' );
            $query->set('meta_type', 'NUMERIC' );
            $query->set('meta_key', 'ova_career_met_order_career' );
		}
	}
}

// Get Hot Career Post
function ova_career_get_id_career( $args ){

	$post_career_id = $args['post_career_id'];

	$hot_career_args = array(
		'post_type' => 'ova_career',
		'post__in'  => [$post_career_id],
	);

	$hot_career = new WP_Query( $hot_career_args );

	return $hot_career;

}


function ova_career_get_career_el( $args ){

	$category = $args['category'];
	
	$post_per_page = $args['total_count'];



	if( $category == 'all' ){
		$args_new = array(
			'post_type' => 'ova_career',
			'post_status' => 'publish',
			'posts_per_page' => $post_per_page,
		);
	} else {
		$args_new= array(
			'post_type' => 'ova_career',
			'post_status' => 'publish',
			'posts_per_page' => $post_per_page,
			'tax_query' => array(
				array(
					'taxonomy' => 'cat_career',
					'field'    => 'slug',
					'terms'    => $category,
				)
			),
		);
	}

	$args_career_order = [];
	if( $args['orderby_post'] === 'ova_career_met_order_career' ) {
		$args_career_order = [
			'meta_key'   => $args['orderby_post'],
			'orderby'    => 'meta_value_num',
			'meta_type' => 'NUMERIC',
			'order'   => "ASC",
		];
	} else { 
		$args_career_order = [
			'orderby'        => $args['orderby_post'],
		];
	}

	$args_career = array_merge( $args_new, $args_career_order );

	$careers  = new \WP_Query($args_career);

	return $careers;

}