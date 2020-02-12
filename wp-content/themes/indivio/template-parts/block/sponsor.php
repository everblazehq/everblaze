<?php if( have_rows('block_sponsors') ): ?>

	<div class="row">

	<?php while( have_rows('block_sponsors') ): the_row();

        $sponsor = get_field('block_sponsor');

        $sponsor_logo = get_field('sponsor_logo');
        $sponsor_description = get_field('sponsor_description');
        $sponsor_website_url = get_field('sponsor_website_url');

        $sponsor_social_twitch = get_field('sponsor_social_twitch');
        $sponsor_social_facebook = get_field('sponsor_social_facebook');
        $sponsor_social_twitter = get_field('sponsor_social_twitter');
        $sponsor_social_instagram = get_field('sponsor_social_instagram');
        $sponsor_social_youtube = get_field('sponsor_social_youtube');

		?>

        <div class="col">
            <div class="eb-block-sponsor">
                <div class="eb-block-sponsor-content">
                    <?php if ( $sponsor_logo ) { ?>
                        <div class="eb-block-sponsor--image">
                            <img src="<?php echo $sponsor_logo; ?>" alt=""/>
                        </div>
                    <?php } ?>
                    <div class="eb-block-sponsor--info">
                        <h4><?php echo $sponsor->post_title; ?></h4>
                        <?php if ( $sponsor_description ) { ?>
                            <p><?php echo $sponsor_description; ?></p>
                        <?php } ?>
                    </div>
                    <div class="eb-block-sponsor--links">
                        <?php if ( $sponsor_social_twitch || $sponsor_social_facebook || $sponsor_social_twitter || $sponsor_social_instagram || $sponsor_social_youtube ) { ?>
                            <div class="eb-socials">
								<?php if ($sponsor_social_twitch) { ?>
	                                <a class="twitch" href="<?php echo $sponsor_social_twitch; ?>" target="_blank">
	                                    <span class="fab fa-twitch"></span>
	                                </a>
								<?php } ?>
								<?php if ($sponsor_social_facebook) { ?>
	                                <a class="facebook" href="<?php echo $sponsor_social_facebook; ?>" target="_blank">
	                                    <span class="fab fa-facebook"></span>
	                                </a>
								<?php } ?>
								<?php if ($sponsor_social_twitter) { ?>
	                                <a class="twitter" href="<?php echo $sponsor_social_twitter; ?>" target="_blank">
	                                    <span class="fab fa-twitter"></span>
	                                </a>
								<?php } ?>
								<?php if ($sponsor_social_instagram) { ?>
	                                <a class="instagram" href="<?php echo $sponsor_social_instagram; ?>" target="_blank">
	                                    <span class="fab fa-instagram"></span>
	                                </a>
								<?php } ?>
								<?php if ($sponsor_social_youtube) { ?>
	                                <a class="youtube" href="<?php echo $sponsor_social_youtube; ?>" target="_blank">
	                                    <span class="fab fa-youtube"></span>
	                                </a>
								<?php } ?>
                            </div>
                        <?php } ?>
                        <?php if ( $sponsor_website_url ) { ?>
                            <a class="button button-primary" href="<?php echo $sponsor_website_url; ?>" target="_blank">Visit website</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

	<?php endwhile; ?>

    </div>

<?php endif; ?>
