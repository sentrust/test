<h1>List of <?php echo $count ?> Catalog Items</h1>
<?php echo $this->Html->link('Add Item', array('controller' => 'items', 'action' => 'add')); ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
		<th>Year</th>
        <th>Length</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($items as $item): ?>
		<tr>
			<td><?php echo h($item['Item']['id']); ?></td>
			<td>
				<?php echo $this->Html->link($item['Item']['title'],
					array('controller' => 'items', 'action' => 'view', $item['Item']['id'])); ?>
			</td>
			<td><?php echo h($item['Item']['year']); ?></td>
			<td><?php echo h($item['Item']['length']); ?></td>
			<td>
				<?php echo $this->Html->link('Edit', 
					array('action' => 'edit', $item['Item']['id'])); ?> | 
				<?php echo $this->Form->postLink('Delete',
					array('action' => 'delete', $item['Item']['id']),
					array('confirm' => 'Are you sure you want to delete item, '. $item['Item']['title'].'?'));
				?>       
			</td>
		</tr>
    <?php endforeach; ?>
    <?php unset($item); ?>
</table>