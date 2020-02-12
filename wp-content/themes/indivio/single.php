<?php get_header(); ?>

    <div class="eb-content">
        <div class="eb-single">
            <div class="eb-single__header">
                <div class="container">
                    <div class="eb-single__header-title">
                        <h1><?php the_title(); ?></h1>
                        <a href="<?php echo get_post_type_archive_link( 'post' ); ?>"><i class="fas fa-long-arrow-alt-left"></i>Terug naar overzicht</a>
                    </div>
                </div>
                <?php if ( has_post_thumbnail() ) { ?>
					<span style="background-image: url('<?php the_post_thumbnail_url('indivio-featured-image'); ?>');"></span>
    			<?php } else { ?>
					<span style="background-image: url('<?php echo THEME_DIR . '/images/thumb_default.jpg'; ?>');"></span>
    			<?php } ?>
            </div>
            <div class="container">
                <?php
        		while ( have_posts() ) :
        			the_post();

        			the_content();

        			if ( comments_open() || get_comments_number() ) :
        				comments_template();
        			endif;

        		endwhile;
        		?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
