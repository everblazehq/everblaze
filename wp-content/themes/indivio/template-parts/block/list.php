<?php
    $block_count = count( get_field('block_list') );
?>

<?php if( have_rows('block_list') ): ?>

    <div class="eb-list">

    <?php

        $list_columns = get_field('list_columns');

        if ( $list_columns == true ) { ?>

            <div class="row<?php if ($block_count % 2 == 0) { ?> even<?php } else { ?> odd<?php } ?>">

        <?php } ?>

    	<?php while( have_rows('block_list') ): the_row();

    		$list_icon = get_sub_field('block_list_icon');
    		$list_title = get_sub_field('block_list_title');
    		$list_info_one = get_sub_field('block_list_info_one');
    		$list_info_two = get_sub_field('block_list_info_two');

            if ( $list_columns == true ) {
                echo '<div class="col">';
            }

    	?>

        	<div class="eb-list-item">

                <?php if ($list_icon) { ?>
                    <div class="eb-list-item--icon">
                        <span class="<?php echo $list_icon; ?>"></span>
                    </div>
                <?php } ?>

                <?php if ( $list_title || $list_info_one || $list_info_one ) { ?>
                    <div class="eb-list-item--info">
                        <?php if ($list_info_one) { ?>
                            <span class="eb-list-item--info_one"><?php echo $list_info_one; ?></span>
                        <?php } ?>
                        <?php if ($list_info_two) { ?>
                            <span class="eb-list-item--info_two"><?php echo $list_info_two; ?></span>
                        <?php } ?>
                        <?php if ($list_title) { ?>
                            <p class="eb-list-item--info_title"><?php echo $list_title; ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>

    		</div>

            <?php
                if ( $list_columns == true ) {
                    echo '</div>';
                }
            ?>

    	<?php endwhile; ?>

    <?php
        if ( $list_columns == true ) {
            echo '</div>';
        }
    ?>

    </div>

<?php endif; ?>
