<?php

$have_approaches = isset($approaches) && count($approaches);
$have_additional_approaches = isset($additional_approaches) && count($additional_approaches);

if($have_approaches || $have_additional_approaches): ?>

    <h2><?php _e('Assessment approach', 'a11y-statement'); ?></h2>

    <p><?php echo $organisation; ?> <?php _e('assessed the accessibility of'); ?> <?php echo $website_name; ?> <?php _e('by the following approaches:', 'a11y-statement'); ?></p>

    <ul>
        <?php foreach($approaches as $approach): ?>
            <li><?php echo $approach; ?></li>
        <?php endforeach; ?>
        <?php foreach($additional_approaches as $approach): ?>
            <li><?php echo $approach; ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>