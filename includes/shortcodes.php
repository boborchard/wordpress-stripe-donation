<?php
function givesoft_stripe_donations_donate_form() {
    if(isset($_GET['payment']) && $_GET['payment'] == 'paid') {
        echo '<p class="success">' . __('Thank you for your payment.', 'givesoft_stripe_donations') . '</p>';
    } else { ?>
        <h2><?php _e('Submit a payment of $10', 'givesoft_stripe_donations'); ?></h2>
        <form action="" method="POST" id="givesoft-donation-form">
            <span class="payment-errors"></span>

            <div class="form-row">
              <label>
                <span>Card Number</span>
                <input type="text" size="20" data-stripe="number"/>
              </label>
            </div>

            <div class="form-row">
              <label>
                <span>CVC</span>
                <input type="text" size="4" data-stripe="cvc"/>
              </label>
            </div>

            <div class="form-row">
              <label>
                <span>Expiration (MM/YYYY)</span>
                <input type="text" size="2" data-stripe="exp-month"/>
              </label>
              <span> / </span>
              <input type="text" size="2" data-stripe="exp-year"/>
            </div>

            <?php if(isset($stripe_options['recurring'])) { ?>
            <div class="form-row">
                <label><?php _e('Payment Type:', 'pippin_stripe'); ?></label>
                <input type="radio" name="recurring" value="no" checked="checked"/><span><?php _e('One time payment', 'pippin_stripe'); ?></span>
                <input type="radio" name="recurring" value="yes"/><span><?php _e('Recurring monthly payment', 'pippin_stripe'); ?></span>
            </div>
            <?php } ?>

            <button type="submit" id="givesoft-submit">Submit Payment</button>
          </form>
        <?php
    }
}
add_shortcode('donation_form', 'givesoft_stripe_donations_donate_form');