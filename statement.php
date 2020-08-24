<h1>Accessibilty Statement for <?php echo $website_name; ?></h1>

<p><?php echo $organisation; ?> is commited to ensuring digital accessibility for people with disabilities. We are continually improving the user experience for everyone, and applying the relevant accessibility standards.</p>

<p>This statement was created on <?php echo date('dS F Y'); ?> using the Accessibility Statement Generator Plugin. </p>

<?php if ($status != 'none'): ?>
    <h2>Conformance status </h2>

    <p>The Web Content Accessibility Guidelines (WCAG) defines requirements for designers and developers to improve accessibility for people with disabilities. It defines three levels of conformance: Level A, Level AA, and Level AAA. <?php echo $website_name; ?> is <?php echo $details['name']; ?> with <?php echo $standard; ?>. <?php echo $details['description']; ?></p>
<?php endif; ?>



<?php if (isset($measures) && count($measures)) : ?>
    <h2>Measures to support accessibility</h2>
    <p><?php echo $organisation; ?> takes the following measures to ensure accessibility of <?php echo $website_name; ?>: </p>

    <ul>
        <?php foreach ($measures as $measure): ?>
            <li><?php echo $measure; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if(isset($additional_considerations) && $additional_considerations): ?>
    <h2>Additional accessibility considerations</h2>
    <p><?php echo $additional_considerations; ?></p>
<?php endif; ?>