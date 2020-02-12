<?php
/** PHP SCSS Compiler
 * @retrofit - https://github.com/ConnectThink/WP-SCSS
 * @uses - http://leafo.github.io/scssphp
**/
if ( ! class_exists( 'scssc' ) ) {
	include_once( get_template_directory() . '/vendor/scssphp/scss.inc.php' );
} elseif ( class_exists( 'Wp_Scss' ) ) {
	// Add Admin notice to indicate WP-SCSS Plugin should be removed.
	function wp_scss_installed_error_notice() {
		$class = 'notice notice-error';
		$message = sprintf( __( 'SCSSPHP is bundled with the installed theme, please <a href="%s">deactivate the installed WP-SCSS plugin</a> as it will cause a conflict.', 'jointswp' ), admin_url( 'plugins.php' ) );
		printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
	}
	add_action( 'admin_notices', 'wp_scss_installed_error_notice' );
}
use Leafo\ScssPhp\Compiler;
if ( class_exists( 'scssc' ) && ! class_exists( 'Wp_Scss' ) ) {
	$scss_dir = get_template_directory() . 'scss';
	$css_dir = get_template_directory() . 'css';
	$compiler_methods = array(
		'expanded'		=> 'Leafo\ScssPhp\Formatter\Expanded',
		'nested'		=> 'Leafo\ScssPhp\Formatter\Nested',
		'compressed'	=> 'Leafo\ScssPhp\Formatter\Compressed',
		'compact'		=> 'Leafo\ScssPhp\Formatter\Compact',
		'crunched'		=> 'Leafo\ScssPhp\Formatter\Crunched',
		'debug'			=> 'Leafo\ScssPhp\Formatter\Debug',
	);
	function scss_compiler($in, $out, $variables, $min = false ) {
		global $scss_dir, $css_dir, $compiler_methods;
		$scssc = new Compiler();
		write_log($variables);
		$scssc->setVariables($variables);
		$compiler_method = 'nested';
		if ( $min ) {
			$compiler_method = 'compressed';
		}
		$scssc->setFormatter( $compiler_methods[$compiler_method] );
		$scssc->setImportPaths( $scss_dir );
		if ( is_writable( $css_dir ) ) {
			try {
				$css = $scssc->compile( file_get_contents( $in ) );
				file_put_contents( $out, $css );
			} catch ( Exception $e ) {
				write_log( $e->getMessage() );
			}
		} else {
			write_log( 'File Permission Error, permission denied. Please make the css directory writable.' );
		}
	}
	function recompile_scss( $variables ) {
		global $scss_dir, $css_dir;
		$input_files = array();
		// Loop through directory and get .scss file that do not start with '_'
		foreach( new DirectoryIterator( $scss_dir ) as $file ) {
			if ( substr( $file, 0, 1 ) != "_" && pathinfo( $file->getFilename(), PATHINFO_EXTENSION ) == 'scss' ) {
				array_push( $input_files, $file->getFilename() );
			}
		}
		// For each input file, find matching css file and compile
		foreach ( $input_files as $scss_file ) {
			if ( $scss_file == 'style.scss' )
				continue;
			$input = $scss_dir . $scss_file;
			$outputName = preg_replace( "/\.[^$]*/",".css", $scss_file );
			$output = $css_dir . $outputName;
			scss_compiler( $input, $output, $variables );
			$minOutput = str_replace( '.css', '.min.css', $output );
			scss_compiler( $input, $minOutput, $variables, true );
		}
	}
	function save_options_check_recompile() {
		$screen = get_current_screen();
		if ( ( strpos( $screen->id, "acf-options-fonts" ) == true ) || ( strpos( $screen->id, "acf-options-colors" ) == true ) ) {
			$fonts = get_fields('fonts');
			$colors = get_fields('colors');
			$variables = $fonts + $colors;
			$variables = array_filter( $variables, function( $value ) { return strlen( trim( $value ) ) != 0 && $value !== ''  && ! empty( $value ); } );
			recompile_scss( $variables );
		}
	}
	add_action( 'acf/save_post', 'save_options_check_recompile', 20 );
	function theme_activation_recompile() {
		$fonts = get_fields('fonts');
		$colors = get_fields('colors');
		$variables = $fonts + $colors;
		$variables = array_filter($variables, function($value) { return strlen(trim($value)) != 0 && $value !== ''  && ! empty( $value ); });
		recompile_scss( $variables );
	}
	add_action( 'after_switch_theme', 'theme_activation_recompile' );
	function theme_upgrade_recompile( $upgrader, $options ) {
		if ( $options['action'] == 'update' &&  $options['type'] == 'theme' ) {
			$fonts = get_fields('fonts');
			$colors = get_fields('colors');
			$variables = $fonts + $colors;
			$variables = array_filter($variables, function($value) { return strlen(trim($value)) != 0 && $value !== ''  && ! empty( $value ); });
			recompile_scss( $variables );
		}
	}
	add_action( 'upgrader_process_complete', 'theme_upgrade_recompile', 10, 2 );
}
