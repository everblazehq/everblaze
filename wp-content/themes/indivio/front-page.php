<?php get_header(); ?>


<!-- HOME / PROFILE -->
<section id="eb-profile">
<?php
    $player_names = get_field('player_names', 'option');
    $player_image_profile = get_theme_mod('image_profile');
?>

    <div class="eb-profile-image">

        <?php if ( $player_image_profile ) { ?>
            <span style="background-image: url('<?php echo $player_image_profile; ?>');">
                <i class="fas fa-angle-double-down"></i>
            </span>
        <?php } else { ?>
            <span style="background-image: url('<?php echo THEME_DIR; ?>/images/page_image_default.jpg');">
                <i class="fas fa-angle-double-down"></i>
            </span>
        <?php } ?>
    </div>


    <div class="eb-content">
        <div class="container">
            <div class="eb-profile-name">
                <?php if ( $player_names['nickname'] ) { ?>
                    <h1><?php echo $player_names['nickname']; ?></h1>
                <?php } else { ?>
                    <h1><?php the_title(); ?></h1>
                <?php } ?>
                <?php if ( $player_names['real_name'] ) { ?>
                    <h2><?php echo $player_names['real_name']; ?></h2>
                <?php } ?>

                <?php
                    $contact_button = get_field('contact_button', 'option');

                    if ( $contact_button ) {
                        if ( $contact_button['contact_button_show'] !== false ) {

                            $contact_url = '';
                            if ( $contact_button['contact_button_type'] == 'link' ) {
                                if ( $contact_button['contact_button_link'] ) {
                                    $contact_url = $contact_button['contact_button_link'];
                                } else {
                                    $contact_url = '#';
                                }
                            } else {
                                if ( $contact_button['contact_button_email'] ) {
                                    $contact_url = 'mailto:' . $contact_button['contact_button_email'];
                                } else {
                                    $contact_url = '#';
                                }
                            }
                            ?>
                        <a class="button button-primary" href="<?php echo $contact_url; ?>">Get in touch</a>
                    <?php } ?>
                <?php } ?>
            </div>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>

        </div>
    </div>

</section>


<?php get_footer(); ?>
