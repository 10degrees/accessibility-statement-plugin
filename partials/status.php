<?php if ($status != 'none'): ?>
    <h2>Conformance status </h2>

    <p>The Web Content Accessibility Guidelines (WCAG) defines requirements for designers and developers to improve accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA. <?php echo $website_name; ?> is <?php echo $details['name']; ?> with <?php echo $standard; ?>. <?php echo $details['description']; ?></p>
<?php endif; ?>