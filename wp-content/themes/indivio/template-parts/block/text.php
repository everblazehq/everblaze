<div class="eb-block-text">
    <?php if(get_field('block_text_title')) { ?>
        <h3><?php the_field('block_text_title'); ?></h3>
    <?php } ?>
    <?php if(get_field('block_text_text')) { ?>
        <?php the_field('block_text_text'); ?>
    <?php } ?>
</div>
