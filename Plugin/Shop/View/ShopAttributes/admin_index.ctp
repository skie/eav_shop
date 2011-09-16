<div class="shopAttributes index">
<h2><?php echo __('Shop Attributes');?></h2>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('id');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<th><?php echo $this->Paginator->sort('attribute_type');?></th>
	<th><?php echo $this->Paginator->sort('required');?></th>
	<th><?php echo $this->Paginator->sort('description');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($shopAttributes as $shopAttribute):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $shopAttribute['ShopAttribute']['id']; ?>
		</td>
		<td>
			<?php echo $shopAttribute['ShopAttribute']['name']; ?>
		</td>
		<td>
			<?php echo $shopAttribute['ShopAttribute']['attribute_type']; ?>
		</td>
		<td>
			<?php echo $shopAttribute['ShopAttribute']['required']; ?>
		</td>
		<td>
			<?php echo $shopAttribute['ShopAttribute']['description']; ?>
		</td>
		<td>
			<?php echo $shopAttribute['ShopAttribute']['created']; ?>
		</td>
		<td>
			<?php echo $shopAttribute['ShopAttribute']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $shopAttribute['ShopAttribute']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shopAttribute['ShopAttribute']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $shopAttribute['ShopAttribute']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging', array('plugin' => 'Templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Shop Attribute'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Shop Attribute Options'), array('controller' => 'shop_attribute_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute Option'), array('controller' => 'shop_attribute_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Product Attributes'), array('controller' => 'shop_product_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Product Attribute'), array('controller' => 'shop_product_attributes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Attribute Sets'), array('controller' => 'shop_attribute_sets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute Set'), array('controller' => 'shop_attribute_sets', 'action' => 'add')); ?> </li>
	</ul>
</div>
