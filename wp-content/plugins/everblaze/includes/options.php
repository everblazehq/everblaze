<?php

/**
 * ACF: Options Page
 */
add_action('acf/init', 'custom_options_page');

function custom_options_page() {

	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Everblaze',
			'menu_title'	=> 'Everblaze',
			'menu_slug' 	=> 'everblaze-panel',
			'icon_url' 		=> 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 83.44 115.14"><defs><style>.cls-1,.cls-2{fill:none;}.cls-2{clip-path:url(#clip-path);clip-rule:evenodd;}.cls-3{clip-path:url(#clip-path-2);}.cls-4{fill:#000000;}</style><clipPath id="clip-path"><rect class="cls-1" x="0.82" y="0.82" width="81.8" height="113.5"/></clipPath><clipPath id="clip-path-2"><path class="cls-2" d="M28.6.82Q62.06,29.73,63.88,54.38q2.2-.26,7.19-13.83Q98,84,62.13,114.32c.43-8.89-.09-15.26-16.69-32.81q-8.23-11.94-1-29.55-18.08,24.12-7.6,47.29,0,1.81-10.49-6.63-2.13,12.45,2.23,21.7Q-6.83,100.76,2.93,65c2.47,2.85,4.27,4.27,5.38,4.27C12.55,38.38,37.73,23.19,28.6.82Z"/></clipPath></defs><title>Asset 8</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g class="cls-3"><rect class="cls-4" width="83.44" height="115.14"/></g></g></g></svg>'),
			'capability'	=> 'edit_posts',
			'redirect' 		=> false,
			'position'		=> 100
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> __('Theme Settings', 'indivio'),
			'menu_title'	=> __('Theme Settings', 'indivio'),
			'parent_slug'	=> 'everblaze-panel',
			'menu_slug' 	=> 'acf-options-theme-settings',
			'update_button'	=> __('Save settings', 'indivio'),
			'updated_message' => __("Settings saved", 'indivio'),
		));

	}
}
