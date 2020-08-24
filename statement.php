
<?php if ($status != 'none'): ?>
    <h2>Conformance status </h2>

    <p>The Web Content Accessibility Guidelines (WCAG) defines requirements for designers and developers to improve accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA. <?php echo $website_name; ?> is <?php echo $details['name']; ?> with <?php echo $standard; ?>. <?php echo $details['description']; ?></p>
<?php endif; ?>

<?php error_log($details['name']); echo td_view("partials/feedback", [
    'website_name' => $website_name,
    'contact_details' => [
        'phone' => get_option('contact_phone'),
        'email' => get_option('contact_email'),
        'visitor_address' => get_option('contact_visitor_address'),
        'postal_address' => get_option('contact_postal_address'),
        'other' => get_option('other_contact_options')
    ],
    'feedback_time' => get_option('duration_for_response'),
]); ?>

<?php if (isset($measures) && count($measures)) : ?>
    <h2>Measures to support accessibility</h2>
    <p><?php echo $organisation; ?> takes the following measures to ensure accessibility of <?php echo $website_name; ?>: </p>

    <ul>
        <?php foreach ($measures as $measure): ?>
            <li><?php echo $measure; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if (isset($additional_considerations) && $additional_considerations): ?>
    <h2>Additional accessibility considerations</h2>
    <p><?php echo $additional_considerations; ?></p>
<?php endif; ?>

<?php if (isset($approved_by) && $approved_by): ?>
    <h2>Formal approval of this accessibility statement</h2>

    <p>This Accessibility Statement is approved by:</p>
    <p><?php echo $approved_by; ?></p>
    <p><?php echo $approval_function; ?></p>
<?php endif; ?>

<?php if (isset($complaints_procedure) && $complaints_procedure): ?>
    <h2>Formal complaints</h2>
    <p><?php echo $complaints_procedure; ?></p>
<?php endif; ?>