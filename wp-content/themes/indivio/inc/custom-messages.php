<?php
/* Filter post updated messages for custom post types. */
add_filter( 'post_updated_messages', 'eb_matches_updated_messages' );
function eb_matches_updated_messages( $messages ) {
    global $post, $post_ID;
    $messages['matches'] = array(
         0 => '', // Unused. Messages start at index 1.
         1 => sprintf( __( 'Match updated.', 'indivio' ), esc_url( get_permalink( $post_ID ) ) ),
         2 => '',
         3 => '',
         4 => __( 'Match updated.', 'indivio' ),
         5 => isset( $_GET['revision'] ) ? sprintf( __( 'Match restored to revision from %s', 'indivio' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
         6 => sprintf( __( 'Match published.', 'indivio' ), esc_url( get_permalink( $post_ID ) ) ),
         7 => __( 'Match saved.', 'indivio' ),
         8 => sprintf( __( 'Match submitted.', 'indivio' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
         9 => sprintf( __( 'Match scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview match</a>', 'indivio' ), date_i18n( __( 'M j, Y @ G:i', 'indivio' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( __( 'Match draft updated.', 'indivio' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    $messages['opponents'] = array(
         0 => '', // Unused. Messages start at index 1.
         1 => sprintf( __( 'Opponent updated.', 'indivio' ), esc_url( get_permalink( $post_ID ) ) ),
         2 => '',
         3 => '',
         4 => __( 'Opponent updated.', 'indivio' ),
         5 => isset( $_GET['revision'] ) ? sprintf( __( 'Opponent restored to revision from %s', 'indivio' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
         6 => sprintf( __( 'Opponent published.', 'indivio' ), esc_url( get_permalink( $post_ID ) ) ),
         7 => __( 'Opponent saved.', 'indivio' ),
         8 => sprintf( __( 'Opponent submitted.', 'indivio' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
         9 => sprintf( __( 'Opponent scheduled for: <strong>%1$s</strong>.', 'indivio' ), date_i18n( __( 'M j, Y @ G:i', 'indivio' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( __( 'Opponent draft updated.', 'indivio' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    $messages['sponsors'] = array(
         0 => '', // Unused. Messages start at index 1.
         1 => sprintf( __( 'Sponsor updated.', 'indivio' ), esc_url( get_permalink( $post_ID ) ) ),
         2 => '',
         3 => '',
         4 => __( 'Sponsor updated.', 'indivio' ),
         5 => isset( $_GET['revision'] ) ? sprintf( __( 'Sponsor restored to revision from %s', 'indivio' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
         6 => sprintf( __( 'Sponsor published.', 'indivio' ), esc_url( get_permalink( $post_ID ) ) ),
         7 => __( 'Sponsor saved.', 'indivio' ),
         8 => sprintf( __( 'Sponsor submitted.', 'indivio' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
         9 => sprintf( __( 'Sponsor scheduled for: <strong>%1$s</strong>.', 'indivio' ), date_i18n( __( 'M j, Y @ G:i', 'indivio' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( __( 'Sponsor draft updated.', 'indivio' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}
