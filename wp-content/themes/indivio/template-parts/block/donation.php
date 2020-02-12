<?php
$donation_layout = get_field('donation_layout');
$donation_button_text = get_field('donate_button_text');

if ( $donation_layout == 'button' ) { ?>
    <a class="button button-primary button--donation" href="#"><?php echo $donation_button_text; ?></a>
    <div class="eb-dialog eb-dialog--donation">
        <span class="eb-dialog__close"><i class="fas fa-times"></i></span>
        <div class="eb-dialog__content">
            <div class="eb-donation">
                <div class="eb-form">
                    <?php echo do_shortcode('[doneren_met_mollie]'); ?>
                </div>
            </div>
        </div>
        <div class="eb-dialog__overlay"></div>
    </div>
<?php } else { ?>
    <div class="eb-donation">
        <div class="eb-form">
            <?php echo do_shortcode('[doneren_met_mollie]'); ?>
        </div>
    </div>
<?php } ?>
