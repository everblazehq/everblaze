<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indivio
 */

?>

<div class="col">
	<div class="eb-post">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> onclick="window.location='<?php the_permalink(); ?>'">
			<div class="eb-post__content">
				<?php if ( has_category() && !has_category('Geen categorie') ) { ?>
					<?php the_custom_category(); ?>
				<?php } ?>
				<header>
					<h3>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
				</header>
				<footer>
					<span class="eb-post__date"><?php the_date(get_option('date_format')); ?></span>
				</footer>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="eb-post__thumb">
					<span style="background-image: url('<?php the_post_thumbnail_url('indivio-featured-image'); ?>');"></span>
				</div>
			<?php } else { ?>
				<div class="eb-post__thumb">
					<span style="background-image: url('<?php echo THEME_DIR . '/images/thumb_default.jpg'; ?>');"></span>
				</div>
			<?php } ?>
		</article>
	</div>
</div>
