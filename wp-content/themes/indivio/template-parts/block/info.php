<?php
    $faceit_api = false;
    if( have_rows('info_blocks') ):
        while ( have_rows('info_blocks') ) : the_row();
            $info_type = get_sub_field('block_info_type');
            if ($info_type == 'faceit') {
                $faceit_api = true;
            }
        endwhile;
    endif;

    if ($faceit_api == true) {
        $faceit = get_field ('faceit', 'option');
        $fi_nickname = $faceit['username'];
        $fi_game = $faceit['game'];
        if ($fi_nickname && $fi_game) {
            $get_fi_player_details = callFaceItAPI('GET', 'https://open.faceit.com/data/v4/players?nickname=' . $fi_nickname, false);
            $fi_player_details_response = json_decode($get_fi_player_details, false);
            $fi_player_id = $fi_player_details_response->player_id;

            $get_fi_stats = callFaceItAPI('GET', 'https://open.faceit.com/data/v4/players/' . $fi_player_id . '/stats/' . $fi_game, false);
            $fi_stats = json_decode($get_fi_stats, false);

            $fi_stats_lifetime = $fi_stats->lifetime;
        }
    }

    $block_count = count( get_field('info_blocks') );
?>

<div class="eb-block-wrapper">

    <div class="row g-10<?php if ($block_count % 2 == 0) { ?> even<?php } else { ?> odd<?php } ?>">
        <?php
            $faceit_api = false;
            if( have_rows('info_blocks') ):
                while ( have_rows('info_blocks') ) : the_row();
                    $info_type = get_sub_field('block_info_type');
                    $info_content = get_sub_field('block_info_content');
                    $info_title = $info_content['title'];
                    $info_text = $info_content['text'];
                    $info_country = $info_content['country'];
                    $info_faceit = $info_content['faceit'];
        ?>

                    <div class="col">
                        <div class="eb-block-info<?php if ($info_type == 'country') { ?> country<?php } ?>">
                            <span class="eb-block-info__title"><?php echo $info_title; ?></span>
                            <?php if ($info_type == 'country') { ?>
                                <span class="famfamfam-flags <?php echo strtolower($info_country['value']); ?>"></span>
                                <p><?php echo $info_country['label'] ?></p>
                            <?php } elseif ($info_type == 'faceit') { ?>
                                <div class="eb-block-info__image">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 481.71 70.65"><defs><style>.cls-1{fill:#fff;}</style></defs><title>FaceIt</title><g id="Layer_2" data-name="Layer 2"><g id="Livello_1" data-name="Livello 1"><path class="cls-1" d="M5,21.92q-5,1.81-5,4.82V70.6H23.49V49.92H56.38V41.15H23.49v-10c0-1.25,1.25-1.88,3.76-1.88H56.38V20.48H14.09A27.41,27.41,0,0,0,5,21.92Zm118.17.44A22.73,22.73,0,0,0,114,20.48,20.86,20.86,0,0,0,105,22.42a12,12,0,0,0-5.73,5L76.64,70.6H89.79l3.28-6.27h30.12l3.26,6.27h25.37L129.07,27.18C128,25.22,126.06,23.61,123.18,22.36ZM97.74,55.56,108.15,35.7l10.4,19.86Zm83.34-27.72q-11,7.36-11,17.69t11,17.7q11,7.38,26.5,7.37h28.19V61.83H207.58c-4.89,0-8.18-2.07-9.9-6.2-.92-2.26-1.37-5.62-1.37-10.1s.45-7.82,1.37-10.08c1.72-4.13,5-6.2,9.9-6.2h28.19V20.48H207.58Q192.1,20.48,181.08,27.84Zm89.55-5.92q-5,1.81-5,4.82V64.33q0,3,5,4.83a27.45,27.45,0,0,0,9.08,1.44H322V61.83H292.87c-2.52,0-3.77-.63-3.77-1.89v-10H322V41.15H289.1v-10c0-1.25,1.25-1.88,3.77-1.88H322V20.48H279.71A27.45,27.45,0,0,0,270.63,21.92ZM362,70.31l0-.1h25.27V53.08L362,42.87Zm47.06-49.78V29.3h20.76c2.46,0,3.7.62,3.7,1.88V70.65h23.71V31.18c0-1.26,1.23-1.88,3.69-1.88h20.76V20.53Z"/><path class="cls-1" d="M387.76.41a.36.36,0,0,0-.67-.23c-6.44,9.89-10.06,15.54-13.33,20.66-12.17,0-29.68,0-38.4,0-.47,0-.67.62-.25.78,15.93,6,38.95,15.06,51.79,20.14.33.13.86-.18.86-.41Z"/></g></g></svg>
                                </div>
                                <p>
                                    <?php
                                        if ($info_faceit == 'matches') {
                                            echo $fi_stats_lifetime->Matches;
                                        } elseif ($info_faceit == 'win_rate') {
                                            echo $fi_stats_lifetime->{'Win Rate %'};
                                        } elseif ($info_faceit == 'win_streak') {
                                            echo $fi_stats_lifetime->{'Longest Win Streak'};
                                        } elseif ($info_faceit == 'recent_results') {
                                            if (!$fi_stats_lifetime->{'Recent Results'}) {
                                                echo '-';
                                            } else {
                                                foreach ($fi_stats_lifetime->{'Recent Results'} as $result) {
                                                    if ($result == '0') {
                                                        echo '<span class="eb-block-info__result eb-block-info__result--loss">' . __('L', 'indivio') . '</span>';
                                                    } else {
                                                        echo '<span class="eb-block-info__result eb-block-info__result--win">' . __('W', 'indivio') . '</span>';
                                                    }
                                                }
                                            }
                                        } elseif ($info_faceit == 'avg_kd_ratio') {
                                            echo $fi_stats_lifetime->{'Average K/D Ratio'};
                                        } elseif ($info_faceit == 'avg_hs') {
                                            echo $fi_stats_lifetime->{'Average Headshots %'};
                                        } else {
                                            echo '';
                                        }
                                    ?>
                                </p>
                            <?php } else { ?>
                                <p><?php echo $info_text; ?>
                            <?php } ?>
                        </div>
                    </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
