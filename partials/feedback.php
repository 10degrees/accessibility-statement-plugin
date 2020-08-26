<?php
if (array_filter($contact_details)) : ?>
    
    <h2><?php _e('Feedback', 'a11y-statement');?></h2>

    <p><?php _e('We welcome your feedback on the accessibility of', 'a11y-statement');?> <?php echo $website_name; ?>. <?php _e('Please let us know if you encounter accessibility barriers on', 'a11y-statement');?> <?php echo $website_name; ?>:</p>

    <ul>
        <?php if ($contact_details['phone']) : ?>
            <li><?php _e('Phone', 'a11y-statement'); ?>: <?php echo $contact_details['phone']; ?></li>
        <?php endif; ?>
        <?php if ($contact_details['email']) : ?>
            <li><?php _e('Email', 'a11y-statement'); ?>: <?php echo $contact_details['email']; ?></li>
        <?php endif; ?>
        <?php if ($contact_details['visitor_address']) : ?>
            <li><?php _e('Visitor address', 'a11y-statement'); ?>: <?php echo $contact_details['visitor_address']; ?></li>
        <?php endif; ?>
        <?php if ($contact_details['postal_address']) : ?>
            <li><?php _e('Postal address', 'a11y-statement'); ?>: <?php echo $contact_details['postal_address']; ?></li>
        <?php endif; ?>
        <?php if ($contact_details['other']) : ?>
            <li><?php echo $contact_details['other']; ?></li>
        <?php endif; ?>
    </ul>

    <?php if ($feedback_time) : ?>
        <p><?php _e('We try to respond to feedback within', 'a11y-statement');?> <?php echo $feedback_time; ?>.</p>
    <?php endif; ?>
<?php endif;?>