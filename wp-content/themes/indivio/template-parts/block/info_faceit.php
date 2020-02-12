<?php
if( is_admin() ) {
?>
<div style="background:#f3f4f5;text-align: center; text-transform: uppercase; letter-spacing: 1px; padding:30px; border-radius:5px; font-size: 12px;"><?php esc_html_e('FaceIt Statistics', 'indivio') ?></div>
<?php } else {
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
    ?>

        <div class="eb-block-wrapper">
            <div class="row g-10 even">
                <div class="col">
                    <div class="eb-block-info">
                        <span class="eb-block-info__title"><?php echo __('Matches', 'indivio'); ?></span>
                        <p><?php echo $fi_stats_lifetime->Matches; ?></p>
                    </div>
                </div>
                <div class="col">
                    <div class="eb-block-info">
                        <span class="eb-block-info__title"><?php echo __('Win Rate %', 'indivio'); ?></span>
                        <p><?php echo $fi_stats_lifetime->{'Win Rate %'}; ?></p>
                    </div>
                </div>
                <div class="col">
                    <div class="eb-block-info">
                        <span class="eb-block-info__title"><?php echo __('Longest Win Streak', 'indivio'); ?></span>
                        <p><?php echo $fi_stats_lifetime->{'Longest Win Streak'}; ?></p>
                    </div>
                </div>
                <div class="col">
                    <div class="eb-block-info">
                        <span class="eb-block-info__title"><?php echo __('Recent Results', 'indivio'); ?></span>
                        <p>
                            <?php
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
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="eb-block-info">
                        <span class="eb-block-info__title"><?php echo __('Average K/D Ratio', 'indivio'); ?></span>
                        <p><?php echo $fi_stats_lifetime->{'Average K/D Ratio'}; ?></p>
                    </div>
                </div>
                <div class="col">
                    <div class="eb-block-info">
                        <span class="eb-block-info__title"><?php echo __('Average Headshots %', 'indivio'); ?></span>
                        <p><?php echo $fi_stats_lifetime->{'Average Headshots %'}; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
