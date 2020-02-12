<?php
if( is_admin() ) {
?>
<div style="background:#f3f4f5;text-align: center; text-transform: uppercase; letter-spacing: 1px; padding:30px; border-radius:5px; font-size: 12px;"><?php esc_html_e('List of all matches', 'indivio') ?></div>
<?php } else { ?>
<?php
$args = array(
	'numberposts'	=> -1,
	'post_type'		=> 'matches',
	'meta_key' => 'match_information_date',
    'orderby' => 'meta_value',
    'order' => 'ASC'
);

$matches_query = new WP_Query( $args );
?>
<?php if( $matches_query->have_posts() ) { ?>
	<div class="eb-matches">
	<?php while( $matches_query->have_posts() ) { $matches_query->the_post(); ?>
		<?php
		$player_names = get_field('player_names', 'option');
		$player_image_avatar = get_theme_mod('image_avatar');

		$match_information = get_field('match_information', get_the_ID());
		$match_title = $match_information['title'];
		$match_date = $match_information['date'];
		$match_score = $match_information['score'];

		$home = get_field('home', get_the_ID());
		$home_me = $home['me'];
		$home_opponent = $home['opponent'];

		if ($home_me != false) {
			if ($player_image_avatar) {
				$home_avatar = $player_image_avatar;
			} else {
				$home_avatar = THEME_DIR . '/images/avatar_default.png';
			}
			$home_name = $player_names['nickname'];
		} elseif ($home_opponent) {
			$opponent = $home_opponent;
			setup_postdata( $home_opponent );
			if (get_field('opponent_avatar', $opponent->ID)) {
				$home_avatar = get_field('opponent_avatar', $opponent->ID);
			} else {
				$home_avatar = THEME_DIR . '/images/avatar_default.png';
			}
			$home_name = $opponent->post_title;
			wp_reset_postdata();
		} else {
			$custom_home_opponent = $home['custom_opponent'];
			if ($custom_home_opponent['avatar']) {
				$home_avatar = $custom_home_opponent['avatar'];
			} else {
				$home_avatar = THEME_DIR . '/images/avatar_default.png';
			}
			$home_name = $custom_home_opponent['name'];
		}

		$away = get_field('away', get_the_ID());
		$away_me = $away['me'];
		$away_opponent = $away['opponent'];

		if ($away_me != false) {
			if ($player_image_avatar) {
				$away_avatar = $player_image_avatar;
			} else {
				$away_avatar = THEME_DIR . '/images/avatar_default.png';
			}
			$away_name = $player_names['nickname'];
		} elseif ($away_opponent) {
			$opponent = $away_opponent;
			setup_postdata( $away_opponent );
			if (get_field('opponent_avatar', $opponent->ID)) {
				$away_avatar = get_field('opponent_avatar', $opponent->ID);
			} else {
				$away_avatar = THEME_DIR . '/images/avatar_default.png';
			}
			$away_name = $opponent->post_title;
			wp_reset_postdata();
		} else {
			$custom_away_opponent = $away['custom_opponent'];
			if ($custom_away_opponent['avatar']) {
				$away_avatar = $custom_away_opponent['avatar'];
			} else {
				$away_avatar = THEME_DIR . '/images/avatar_default.png';
			}
			$away_name = $custom_away_opponent['name'];
		}
		?>
		<div class="eb-match">
			<div class="eb-match__info">
				<?php if ($match_title) { ?>
					<h4 class="eb-match__title"><?php echo $match_title; ?></h4>
				<?php } ?>
				<?php if ($match_date) { ?>
					<div class="eb-match__date"><?php echo $match_date; ?></div>
				<?php } ?>
			</div>
			<div class="eb-match__teams">
				<div class="eb-match__team team--home">
					<div class="eb-team__image">
						<img src="<?php echo $home_avatar; ?>" alt="<?php echo $home_name; ?>" />
					</div>
					<div class="eb-team__name">
						<h4><?php echo $home_name; ?></h4>
					</div>
				</div>
				<?php if ($match_score) { ?>
					<span class="eb-match__score"><?php echo $match_score; ?></span>
				<?php } else { ?>
					<span class="eb-match__versus">vs</span>
				<?php } ?>
				<div class="eb-match__team team--away">
					<div class="eb-team__image">
						<img src="<?php echo $away_avatar; ?>" alt="<?php echo $away_name; ?>" />
					</div>
					<div class="eb-team__name">
						<h4><?php echo $away_name; ?></h4>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php } ?>

<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
<?php } ?>
