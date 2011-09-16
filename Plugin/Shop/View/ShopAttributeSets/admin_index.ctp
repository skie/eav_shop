<div class="shopAttributeSets index">
<h2><?php echo __('Shop Attribute Sets');?></h2>
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
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($shopAttributeSets as $shopAttributeSet):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $shopAttributeSet['ShopAttributeSet']['id']; ?>
		</td>
		<td>
			<?php echo $shopAttributeSet['ShopAttributeSet']['name']; ?>
		</td>
		<td>
			<?php echo $shopAttributeSet['ShopAttributeSet']['created']; ?>
		</td>
		<td>
			<?php echo $shopAttributeSet['ShopAttributeSet']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $shopAttributeSet['ShopAttributeSet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shopAttributeSet['ShopAttributeSet']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $shopAttributeSet['ShopAttributeSet']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging', array('plugin' => 'Templates')); ?>
</div>`

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Shop Attribute Set'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Shop Categories'), array('controller' => 'shop_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Category'), array('controller' => 'shop_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Attributes'), array('controller' => 'shop_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute'), array('controller' => 'shop_attributes', 'action' => 'add')); ?> </li>
	</ul>
</div>
