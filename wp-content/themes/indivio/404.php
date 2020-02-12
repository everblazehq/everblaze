<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Indivio
 */

get_header();
?>

<div class="eb-content">
	<div class="container">
		<div class="eb-page-title">
			<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'indivio' ); ?>
			<span class="eb-page-title--shadow"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'indivio' ); ?></span>
		</div>
	</div>
</div>

<?php
get_footer();
