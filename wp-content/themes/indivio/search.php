<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Indivio
 */

get_header();
?>

<div class="eb-content">
	<div class="container">
		<div class="eb-page-title">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Search Results for: %s', 'indivio' ), get_search_query() );
			?>
			<span class="eb-page-title--shadow">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'indivio' ), get_search_query() );
				?>
			</span>
		</div>
		<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

		<div class="eb-posts">
            <?php if ( have_posts() ) { ?>
                <div class="eb-posts__wrapper<?php if ( is_active_sidebar('sidebar-1') ) { ?> sidebar-active<?php } ?>">
                    <div class="row">
                        <?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', 'search' );
						}
						?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="eb-posts__wrapper">
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                </div>
        	<?php } ?>
        	<?php get_sidebar(); ?>
		</div>
    </div>
</div>

<?php
get_footer();
