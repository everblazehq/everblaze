;(function () {
	/**
	 * Run function when customizer is ready.
	 */

	wp.customize.bind('ready', function () {

		wp.customize.control('contact_button_show', function (control) {

			var buttonType = wp.customize.control('contact_button_type').setting.get();

		    const toggleControl = (value) => {

		        if (value == 'hide') {
					wp.customize.control('contact_button_text').toggle(false);
		            wp.customize.control('contact_button_type').toggle(false);
					wp.customize.control('contact_button_page').toggle(false);
		            wp.customize.control('contact_button_email').toggle(false);
		        } else {
		           	wp.customize.control('contact_button_text').toggle(true);
		            wp.customize.control('contact_button_type').toggle(true);
					if (buttonType == 'page') {
		            	wp.customize.control('contact_button_page').toggle(true);
						wp.customize.control('contact_button_email').toggle(false);
					} else {
						wp.customize.control('contact_button_page').toggle(false);
		            	wp.customize.control('contact_button_email').toggle(true);
					}
		        }
		    };

		    toggleControl(control.setting.get());
		    control.setting.bind(toggleControl);
		});

		wp.customize.control('contact_button_type', function (control) {

		    const toggleControl = (value) => {

		        if (value == 'page') {
					var buttonShow = wp.customize.control('contact_button_show').setting.get();
					if (buttonShow == 'show') {
			            wp.customize.control('contact_button_page').toggle(true);
			            wp.customize.control('contact_button_email').toggle(false);
					} else {
						wp.customize.control('contact_button_page').toggle(false);
			            wp.customize.control('contact_button_email').toggle(false);
					}
		        } else {
					var buttonShow = wp.customize.control('contact_button_show').setting.get();
					if (buttonShow == 'show') {
						wp.customize.control('contact_button_page').toggle(false);
			            wp.customize.control('contact_button_email').toggle(true);
					} else {
						wp.customize.control('contact_button_page').toggle(false);
			            wp.customize.control('contact_button_email').toggle(false);
					}
		        }

		    };

		    toggleControl(control.setting.get());
		    control.setting.bind(toggleControl);

		});







	});
})();
