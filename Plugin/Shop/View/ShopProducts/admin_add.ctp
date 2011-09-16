<div class="shopProducts form">
<?php echo $this->Form->create('ShopProduct', array('url' => array('action' => 'add', $shopCategorySlug)));?>
	<fieldset>
 		<legend><?php echo __('Admin Add Shop Product');?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->element('Attributes/form', compact('attributes', 'attributesValues'));
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Shop Products'), array('action' => 'index', $shopCategorySlug));?></li>
		<li><?php echo $this->Html->link(__('List Shop.shop Categories'), array('controller' => 'shop.shop_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Category'), array('controller' => 'shop.shop_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop.shop Product Attributes'), array('controller' => 'shop.shop_product_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Product Attribute'), array('controller' => 'shop.shop_product_attributes', 'action' => 'add')); ?> </li>
	</ul>
</div>