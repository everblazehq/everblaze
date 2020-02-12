<?php
$contact_form = get_field('contact_form');
$cf7_id = $contact_form->ID;
?>
<div class="eb-form">
    <?php echo do_shortcode( '[contact-form-7 id="4" title="Contact"]' ); ?>
</div>
