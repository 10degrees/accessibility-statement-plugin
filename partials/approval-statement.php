<?php if (isset($approved_by) && $approved_by): ?>
    <h2><?php _e('Formal approval of this accessibility statement', 'a11y-statement');?></h2>

    <p><?php _e('This Accessibility Statement is approved by:', 'a11y-statement');?></p>
    <p><?php echo $approved_by; ?></p>
    <p><?php echo $approval_function; ?></p>
<?php endif; ?>