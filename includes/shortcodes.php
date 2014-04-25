<?php
function givesoft_stripe_donations_payment_form() {
    if(isset($_GET['payment']) && $_GET['payment'] == 'paid') {
        echo '<p class="success">' . __('Thank you for your payment.', 'givesoft_stripe_donations') . '</p>';
    } else { ?>
        <h2><?php _e('Submit a payment of $10', 'givesoft_stripe_donations'); ?></h2>
        <form action="" method="POST" id="stripe-payment-form">
            <div class="form-row">
                <label><?php _e('Card Number', 'givesoft_stripe_donations'); ?></label>
                <input type="text" size="20" autocomplete="off" class="card-number"/>
            </div>
            <div class="form-row">
                <label><?php _e('CVC', 'givesoft_stripe_donations'); ?></label>
                <input type="text" size="4" autocomplete="off" class="card-cvc"/>
            </div>
            <div class="form-row">
                <label><?php _e('Expiration (MM/YYYY)', 'givesoft_stripe_donations'); ?></label>
                <input type="text" size="2" class="card-expiry-month"/>
                <span> / </span>
                <input type="text" size="4" class="card-expiry-year"/>
            </div>
            <?php if(isset($stripe_options['recurring'])) { ?>
            <div class="form-row">
                <label><?php _e('Payment Type:', 'pippin_stripe'); ?></label>
                <input type="radio" name="recurring" value="no" checked="checked"/><span><?php _e('One time payment', 'pippin_stripe'); ?></span>
                <input type="radio" name="recurring" value="yes"/><span><?php _e('Recurring monthly payment', 'pippin_stripe'); ?></span>
            </div>
            <?php } ?>
            <input type="hidden" name="action" value="stripe"/>
            <input type="hidden" name="redirect" value="<?php echo get_permalink(); ?>"/>
            <input type="hidden" name="stripe_nonce" value="<?php echo wp_create_nonce('stripe-nonce'); ?>"/>
            <button type="submit" id="stripe-submit"><?php _e('Submit Payment', 'givesoft_stripe_donations'); ?></button>
        </form>
        <div class="payment-errors"></div>
        <?php
    }
}
add_shortcode('payment_form', 'givesoft_stripe_donations_payment_form');