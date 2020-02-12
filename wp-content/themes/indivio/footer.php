        <footer>
            <div class="eb-footer">
                <?php
                $contact_button_show = get_theme_mod('contact_button_show');
                if ( $contact_button_show == 'show') {
                    $contact_button_text = get_theme_mod('contact_button_text');
                    $contact_button_type = get_theme_mod('contact_button_type');
                    $contact_button_url = '';
                    if ( $contact_button_type == 'page' ) {
                        $contact_button_page = get_theme_mod('contact_button_page');
                        if ( $contact_button_page ) {
                            $post_id = $contact_button_page;
                            $post = get_post($post_id);
                            $slug = $post->post_name;
                            $contact_button_url = '/' . $slug;
                        }
                    } else {
                        $contact_button_email = get_theme_mod('contact_button_email');
                        if ( $contact_button_email ) {
                            $contact_button_url = 'mailto:' . $contact_button_email;
                        }
                    }
                ?>
                    <a class="button button-primary" href="<?php echo $contact_button_url; ?>"><?php echo $contact_button_text; ?></a>
                <?php } ?>
                <div class="eb-socials">
                    <?php
                    $twitch = get_field ('twitch', 'option');
                    $facebook = get_field ('facebook', 'option');
                    $twitter = get_field ('twitter', 'option');
                    $instagram = get_field ('instagram', 'option');
                    $youtube = get_field ('youtube', 'option');
                    ?>
                    <?php if ($twitch['twitch_username']) { ?>
                        <a class="twitch" href="<?php echo 'https://twitch.tv/' . $twitch['twitch_username'] ?>" target="_blank">
                            <span class="fab fa-twitch"></span>
                        </a>
                    <?php } ?>
                    <?php if ($facebook['username']) { ?>
                        <a class="facebook" href="<?php echo 'https://facebook.com/' . $facebook['username'] ?>" target="_blank">
                            <span class="fab fa-facebook"></span>
                        </a>
                    <?php } ?>
                    <?php if ($twitter['username']) { ?>
                        <a class="twitter" href="<?php echo 'https://twitter.com/' . $twitter['username'] ?>" target="_blank">
                            <span class="fab fa-twitter"></span>
                        </a>
                    <?php } ?>
                    <?php if ($instagram['username']) { ?>
                        <a class="instagram" href="<?php echo 'https://instagram.com/' . $instagram['username'] ?>" target="_blank">
                            <span class="fab fa-instagram"></span>
                        </a>
                    <?php } ?>
                    <?php if ($youtube['username']) { ?>
                        <a class="youtube" href="<?php echo 'https://youtube.com/' . $youtube['username'] ?>" target="_blank">
                            <span class="fab fa-youtube"></span>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </footer>

    </div>

    <script src="//code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <?php wp_footer(); ?>
</body>
</html>
