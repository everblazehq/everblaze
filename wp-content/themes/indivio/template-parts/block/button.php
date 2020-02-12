<?php
$button_text = get_field('button_text');
$button_url = get_field('button_url');
?>
<a class="button button-primary button--inline" href="<?php echo $button_url; ?>"><?php echo $button_text; ?></a>
