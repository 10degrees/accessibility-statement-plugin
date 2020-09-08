<?php

$have_measures = isset($measures) && count($measures);
$have_additional_measures = isset($additional_measures) && count($additional_measures);

if ($have_measures || $have_additional_measures) : ?>
    <h2><?php _e('Measures to support accessibility', 'a11y-statement');?></h2>
    <p><?php echo $organisation; ?> <?php _e('takes the following measures to ensure accessibility of', 'a11y-statement'); ?> <?php echo $website_name; ?>: </p>

    <ul>
        <?php foreach ($measures as $measure): ?>
            <li><?php echo $measure; ?></li>
        <?php endforeach; ?>
        <?php foreach ($additional_measures as $measure): ?>
            <li><?php echo $measure; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>