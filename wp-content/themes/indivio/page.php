<?php get_header(); ?>
<div class="eb-content">
	<div class="container">
        <?php
        if ( have_posts() ) {
            get_template_part( 'template-parts/content', 'page' );
        } else {
            get_template_part( 'template-parts/content', 'none' );
        }
        ?>
    </div>
</div>
<?php get_footer(); ?>
