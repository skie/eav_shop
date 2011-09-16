<div class="shopAttributes form">
<?php echo $this->Form->create('ShopAttribute', array('url' => array('action' => 'add')));?>
	<fieldset>
 		<legend><?php echo __('Admin Add Shop Attribute');?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('attribute_type');
		echo $this->Form->input('required');
		echo $this->Form->input('description');
		echo $this->Form->input('ShopAttributeSet');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Shop Attributes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Shop Attribute Options'), array('controller' => 'shop_attribute_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute Option'), array('controller' => 'shop_attribute_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Product Attributes'), array('controller' => 'shop_product_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Product Attribute'), array('controller' => 'shop_product_attributes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Attribute Sets'), array('controller' => 'shop_attribute_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute Set'), array('controller' => 'shop_attribute_sets', 'action' => 'add')); ?> </li>
	</ul>
</div>