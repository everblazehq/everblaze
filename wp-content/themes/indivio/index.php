<?php
get_header();
?>

<div class="eb-content">
	<div class="container">
        <?php if ( is_home() && ! is_front_page() ) { ?>
            <div class="eb-page-title">
                <?php single_post_title(); ?>
                <span class="eb-page-title--shadow"><?php single_post_title(); ?></span>
            </div>
		<?php } else { ?>
			<div class="eb-page-title">
				<?php the_title(); ?>
				<span class="eb-page-title--shadow"><?php the_title(); ?></span>
			</div>
		<?php } ?>
		<div class="eb-posts">
            <?php if ( have_posts() ) { ?>
                <div class="eb-posts__wrapper<?php if ( is_active_sidebar('sidebar-1') ) { ?> sidebar-active<?php } ?>">
                    <div class="row">
                        <?php
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', get_post_type() );
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
		<?php the_posts_navigation(); ?>
    </div>
</div>

<?php
get_footer();
