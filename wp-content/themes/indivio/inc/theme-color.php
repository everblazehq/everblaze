<?php
/**
 * Theme color.
 */

function theme_get_customizer_css() {
    ob_start();

    $primary_color = get_theme_mod( 'primary_color', '' );
    $hex = $primary_color;
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    if ( ! empty( $primary_color ) ) {
        ?>
.eb-blog-item--info_category {
  background: <?php echo sanitize_hex_color( $primary_color ); ?>; }

.eb-blog-item--info_date {
  color: <?php echo sanitize_hex_color( $primary_color ); ?>; }

.comments-area .comment-author strong {
  color: <?php echo sanitize_hex_color( $primary_color ); ?>; }

.comments-area .comment-respond .form-submit .submit {
  border: 2px solid <?php echo sanitize_hex_color( $primary_color ); ?>;
  background-color: rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.5);
  box-shadow: 0 0 0 rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.8); }
  .comments-area .comment-respond .form-submit .submit:hover {
    background-color: rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.55);
    box-shadow: 0 0 30px <?php echo sanitize_hex_color( $primary_color ); ?>; }

.button-primary,
.button.alt {
    border: 2px solid <?php echo sanitize_hex_color( $primary_color ); ?>;
    background-color: rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.5);
    box-shadow: 0 0 0 rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.8); }
  .button-primary:hover,
  .button.alt:hover {
      background-color: rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.55);
      box-shadow: 0 0 30px <?php echo sanitize_hex_color( $primary_color ); ?>; }

.eb-form input[type="submit"],
.eb-form .wpcf7-submit {
  border: 2px solid <?php echo sanitize_hex_color( $primary_color ); ?>;
  background-color: rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.5);
  box-shadow: 0 0 0 rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.8); }
  .eb-form input[type="submit"]:hover,
  .eb-form .wpcf7-submit:hover {
    background-color: rgba(<?php echo $r . ',' . $g . ',' . $b . ','; ?>  0.55);
    box-shadow: 0 0 30px <?php echo sanitize_hex_color( $primary_color ); ?>; }



.eb-nav ul li.current_page_item::after {
  background: <?php echo sanitize_hex_color( $primary_color ); ?>; }

.eb-block-info--title {
  color: <?php echo sanitize_hex_color( $primary_color ); ?>; }

.eb-post__content-category a {
  background: <?php echo sanitize_hex_color( $primary_color ); ?>; }

.eb-post__date {
  color: <?php echo sanitize_hex_color( $primary_color ); ?>; }

a {
  color: <?php echo sanitize_hex_color( $primary_color ); ?>; }

.eb-block-info__title {
  color: <?php echo sanitize_hex_color( $primary_color ); ?>; }

        <?php
    }

    $css = ob_get_clean();
    return $css;

}
