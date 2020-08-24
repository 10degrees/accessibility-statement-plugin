<?php if (isset($measures) && count($measures)) : ?>
    <h2>Measures to support accessibility</h2>
    <p><?php echo $organisation; ?> takes the following measures to ensure accessibility of <?php echo $website_name; ?>: </p>

    <ul>
        <?php foreach ($measures as $measure): ?>
            <li><?php echo $measure; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>