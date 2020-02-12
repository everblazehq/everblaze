<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

    <div class="page-container">
        <?php
            $player_names = get_field('player_names', 'option');
            $player_image_profile = get_theme_mod('image_profile');
            $player_image_logo = get_theme_mod('image_logo');
        ?>
        <header>
            <div class="eb-nav">
                <?php if ( $player_image_logo ) { ?>
                    <img class="nav-logo" src="<?php echo $player_image_logo; ?>" alt="<?php echo $player_names['nickname']; ?>" />
                <?php } else { ?>
                    <span class="nav-title"><?php echo $player_names['nickname']; ?></span>
                <?php } ?>
                <?php
                $twitch = get_field ('twitch', 'option');
                if ( $twitch ) {
                    if ( $twitch['twitch_username'] && $twitch['twitch_live_status'] == true ) {
                        $get_data = callTwitchAPI('GET', 'https://api.twitch.tv/helix/streams?user_login=' . $twitch['twitch_username'], false);
                        $response = json_decode($get_data, true);
                        $status = '';
                        $status = $response['data'][0]['type'];
                        if ( $status == 'live') {
                            echo '<a class="twitch-label" href="https://twitch.tv/'. $twitch['twitch_username'] .'" target="_blank">Live</a>';
                        }
                    }
                }
                ?>
                <div class="nav-toggle">
                    <span class="bar-one"></span>
                    <span class="bar-two"></span>
                    <span class="bar-three"></span>
                </div>
                <!-- NAVIGATION -->
                <nav>
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false ) ); ?>
                </nav>

            </div>

            <div class="eb-page-image" style="background-image: url('<?php echo $player_image_profile; ?>');">
                <div class="container">
                    <?php if ( is_home() ) { ?>
                        <h1><?php single_post_title(); ?></h1>
                    <?php } else { ?>
                        <h1><?php the_title(); ?></h1>
                    <?php } ?>
                </div>
            </div>

        </header>
