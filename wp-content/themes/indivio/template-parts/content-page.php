<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indivio
 */

?>
<div class="eb-page-title">
	<h1><?php the_title(); ?></h1>
	<span class="eb-page-title--shadow"><?php the_title(); ?></span>
</div>
<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
