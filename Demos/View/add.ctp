<!-- File: /app/View/Item/add.ctp -->

<h1>Add Item</h1>
<?php
echo $this->Form->create('Item');
echo $this->Form->input('title');
echo $this->Form->input('year');
echo $this->Form->input('length');
echo $this->Form->input('description', array('rows' => '5'));
echo $this->Form->end('Save Item');
?>