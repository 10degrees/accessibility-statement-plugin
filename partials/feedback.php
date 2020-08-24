<?php
if (array_filter($contact_details)) : ?>
    
    <h2>Feedback</h2>

    <p>We welcome your feedback on the accessibility of <?php echo $website_name; ?>. Please let us know if you encounter accessibility barriers on <?php echo $website_name; ?>:</p>

    <ul>
        <?php if ($contact_details['phone']) : ?>
            <li>Phone: <?php echo $contact_details['phone']; ?></li>
        <?php endif; ?>
        <?php if ($contact_details['email']) : ?>
            <li>Email: <?php echo $contact_details['email']; ?></li>
        <?php endif; ?>
        <?php if ($contact_details['visitor_address']) : ?>
            <li>Visitor address: <?php echo $contact_details['visitor_address']; ?></li>
        <?php endif; ?>
        <?php if ($contact_details['postal_address']) : ?>
            <li>Postal address: <?php echo $contact_details['postal_address']; ?></li>
        <?php endif; ?>
        <?php if ($contact_details['other']) : ?>
            <li><?php echo $contact_details['other']; ?></li>
        <?php endif; ?>
    </ul>

    <?php if ($feedback_time) : ?>
        <p>We try to respond to feedback within <?php echo $feedback_time; ?>.</p>
    <?php endif; ?>
<?php endif;?>