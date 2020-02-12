<?php

function cpt_sponsors() {
	register_post_type( 'sponsors',
	     array(
	        'labels' => array(
	        'name' => __( 'Sponsors', 'indivio' ),
	        'singular_name' => __( 'Sponsor', 'indivio' ),
	        'all_items'           => __( 'Sponsors', 'indivio' ),
	        'view_item'           => __( 'View sponsor', 'indivio' ),
	        'add_new_item'        => __( 'Add new sponsor', 'indivio' ),
	        'add_new'             => __( 'Add sponsor', 'indivio' ),
	        'edit_item'           => __( 'Edit sponsor', 'indivio' ),
	        'update_item'         => __( 'Update sponsor', 'indivio' ),
	        'search_items'        => __( 'Search sponsor', 'indivio' ),
	        'not_found'           => __( 'Sponsor not found', 'indivio' ),
	    ),
	        'public' => true,
	        'has_archive' => false,
	        'publicly_queryable'  => false,
	        'show_in_menu' => 'everblaze-panel'
	    )
	);
}
add_action( 'init', 'cpt_sponsors' );

add_action('acf/init', 'register_block_sponsors');
function register_block_sponsors() {

    if( function_exists('acf_register_block') ) {

        // BLOCK: SPONSOR
        acf_register_block(array(
            'name'              => 'block-sponsors',
            'title'             => __('Sponsors', 'indivio'),
            'description'       => __('A block to display a sponsor.', 'indivio'),
            'render_template'   => 'template-parts/block/sponsors.php',
            'category'          => 'everblaze-blocks',
            'icon'              => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 85 85" style="enable-background:new 0 0 85 85;" xml:space="preserve" fill="#555D66"><style type="text/css">.st0{fill:#555D66;}</style><path class="st0" d="M68.6,2.1c-5.3,0-9.6,4.3-9.6,9.6s4.3,9.6,9.6,9.6s9.6-4.3,9.6-9.6S73.9,2.1,68.6,2.1z M68.6,4.8c3.8,0,6.9,3.1,6.9,6.9s-3.1,6.9-6.9,6.9s-6.9-3.1-6.9-6.9S64.8,4.8,68.6,4.8z M11,24c-6,0-11,4.9-11,11v20.6c0,3,2.5,5.5,5.5,5.5h1.4v17.8c0,3,2.5,5.5,5.5,5.5h9.6c0.8,0,1.4-0.6,1.4-1.4s-0.6-1.4-1.4-1.4c0,0,0,0,0,0h-9.6c-1.5,0-2.7-1.2-2.7-2.7V58.3H5.5c-1.5,0-2.7-1.2-2.7-2.7V35c0-4.6,3.7-8.2,8.2-8.2h11c1.5,0,2.9,0.4,4.1,1.1c0.6,0.4,1.5,0.2,1.9-0.5c0.4-0.6,0.2-1.5-0.5-1.9c0,0,0,0-0.1,0c-1.6-0.9-3.5-1.5-5.5-1.5H11z M44.5,24.4l-1.9,1.8l-1.7-1.7c-0.3-0.3-0.6-0.4-1-0.4c-3.7,0-6.6,1.4-8.7,3.7s-3.3,5.5-4.3,9.2c0,0,0,0,0,0.1l-3.5,16.3c-0.5,2.2,0.9,4.4,3,5c0,0,0,0,0,0c0.4,0.1,0.8,0.1,1.2,0.1c1.8-0.1,3.4-1.4,3.8-3.2l1.5-5.5v29.3c0,3,2.5,5.5,5.5,5.5h8.2c3,0,5.5-2.5,5.5-5.5V58.3H53h0.5c3,0,5.5-2.5,5.5-5.5V37.6C59,30,52.9,24,45.4,24 M63.1,24C62,24,61,24.2,60,24.5c-0.7,0.2-1.2,0.9-1,1.7c0.2,0.7,0.9,1.2,1.7,1c0,0,0.1,0,0.1,0c0.7-0.2,1.5-0.3,2.4-0.3h11c4.6,0,8.2,3.7,8.2,8.2v20.6c0,1.5-1.2,2.7-2.7,2.7h-4.1v20.6c0,1.5-1.2,2.7-2.7,2.7h-8.2c-1.5,0-2.7-1.2-2.7-2.7V61c0-0.8-0.6-1.4-1.4-1.4c-0.8,0-1.4,0.6-1.4,1.4c0,0,0,0,0,0v17.8c0,3,2.5,5.5,5.5,5.5h8.2c3,0,5.5-2.5,5.5-5.5V61h1.4c3,0,5.5-2.5,5.5-5.5V35c0-6-4.9-11-11-11H63.1z M45.9,26.8c5.9,0.2,10.4,4.8,10.4,10.7v15.2c0,1.5-1.2,2.7-2.7,2.7H53h-2.2c-0.8,0-1.4,0.6-1.4,1.4v21.9c0,1.5-1.2,2.7-2.7,2.7h-8.2c-1.5,0-2.7-1.2-2.7-2.7V39.1c0-0.8-0.6-1.4-1.4-1.4c-0.6,0-1.2,0.4-1.3,1l-4.2,15.7c0,0,0,0,0,0c-0.1,0.6-0.7,1-1.3,1.1c-0.1,0-0.3,0-0.4,0h0c-0.8-0.2-1.2-0.9-1-1.7c0,0,0,0,0,0l3.4-16.2l0,0c0.9-3.5,2.1-6.3,3.7-8.1c1.5-1.7,3.4-2.6,6.1-2.7l2.1,2.2c0.5,0.5,1.4,0.6,1.9,0L45.9,26.8z M42.5,30.8c-0.8,0-1.4,0.6-1.4,1.4v12.3c0,0.8,0.6,1.4,1.4,1.4c0.8,0,1.4-0.6,1.4-1.4c0,0,0,0,0,0V32.2C43.9,31.5,43.3,30.9,42.5,30.8C42.5,30.8,42.5,30.8,42.5,30.8z M8.2,36.3c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S9,36.3,8.2,36.3z M76.8,36.3c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S77.6,36.3,76.8,36.3z M50.7,39.1c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S51.5,39.1,50.7,39.1z M8.2,41.8c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S9,41.8,8.2,41.8z M76.8,41.8c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S77.6,41.8,76.8,41.8z M50.7,44.6c-0.8,0-1.4,0.6-1.4,1.4c0,0.8,0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4C52.1,45.2,51.5,44.6,50.7,44.6z M8.2,47.3c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S9,47.3,8.2,47.3z M76.8,47.3c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S77.6,47.3,76.8,47.3z M50.7,50.1c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S51.5,50.1,50.7,50.1z M8.2,52.8c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S9,52.8,8.2,52.8z M76.8,52.8c-0.8,0-1.4,0.6-1.4,1.4s0.6,1.4,1.4,1.4s1.4-0.6,1.4-1.4S77.6,52.8,76.8,52.8z M23.3,61c-0.8,0-1.4,0.6-1.4,1.4v13.7c0,0.8,0.6,1.4,1.4,1.4h5.5c0.8,0,1.4-0.6,1.4-1.4V62.4c0-0.8-0.6-1.4-1.4-1.4H23.3z M24.7,63.8h2.7v11h-2.7V63.8z M42.5,0.7c-5.3,0-9.6,4.3-9.6,9.6s4.3,9.6,9.6,9.6s9.6-4.3,9.6-9.6S47.8,0.7,42.5,0.7z M42.5,3.4c3.8,0,6.9,3.1,6.9,6.9s-3.1,6.9-6.9,6.9s-6.9-3.1-6.9-6.9S38.7,3.4,42.5,3.4z M15.7,2.1c-5.3,0-9.6,4.3-9.6,9.6s4.3,9.6,9.6,9.6s9.6-4.3,9.6-9.6S20.9,2.1,15.7,2.1z M15.7,4.8c3.8,0,6.9,3.1,6.9,6.9s-3.1,6.9-6.9,6.9s-6.9-3.1-6.9-6.9S11.9,4.8,15.7,4.8z"/></svg>',
            'mode'              => 'edit',
            'keywords'          => array( 'sponsor', 'everblaze', 'eb' ),
			'supports'          => array( 'align' => false, 'mode' => false),
        ));

	}
}
