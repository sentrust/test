<!-- File: /app/View/Items/view.ctp -->

<h1><?php echo h($item['Item']['title']); ?> (<?php echo h($item['Item']['year']); ?>)</h1>

<p>Length: <?php echo h($item['Item']['length']); ?></p>
<div><?php echo h($item['Item']['description']); ?></div>