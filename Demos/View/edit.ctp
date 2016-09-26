<!-- File: /app/View/Items/edit.ctp -->

<h1>Edit Item</h1>
<?php
echo $this->Form->create('Item');
echo $this->Form->input('title');
echo $this->Form->input('year');
echo $this->Form->input('length');
echo $this->Form->input('description', array('rows' => '5'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Update Item');
?>