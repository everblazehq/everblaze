<?php

/**
 * This is the template that renders the testimonial block.
 *
 * @param   array $block The block settings and attributes.
 * @param   bool $is_preview True during AJAX preview.
 */

// get image field (array)
$avatar = get_field('avatar');

// create id attribute for specific styling
$id = 'testimonial-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<blockquote id="<?php echo $id; ?>" class="testimonial <?php echo $align_class; ?>">
    <p><?php the_field('testimonial'); ?></p>
    <cite>
        <img src="<?php echo $avatar['url']; ?>" alt="<?php echo $avatar['alt']; ?>" />
        <span><?php the_field('author'); ?></span>
    </cite>
</blockquote>
