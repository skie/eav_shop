<div class="shopAttributeSets form">
<?php echo $this->Form->create('ShopAttributeSet', array('url' => array('action' => 'edit')));?>
	<fieldset>
 		<legend><?php echo __('Edit Shop Attribute Set');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('ShopAttribute');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('ShopAttributeSet.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Shop Attribute Sets'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Shop Categories'), array('controller' => 'shop_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Category'), array('controller' => 'shop_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Attributes'), array('controller' => 'shop_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute'), array('controller' => 'shop_attributes', 'action' => 'add')); ?> </li>
	</ul>
</div>