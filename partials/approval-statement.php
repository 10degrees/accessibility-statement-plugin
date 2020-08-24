<?php if (isset($approved_by) && $approved_by): ?>
    <h2>Formal approval of this accessibility statement</h2>

    <p>This Accessibility Statement is approved by:</p>
    <p><?php echo $approved_by; ?></p>
    <p><?php echo $approval_function; ?></p>
<?php endif; ?>