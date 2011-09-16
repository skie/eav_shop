<div class="shopProducts index">
<h2><?php echo __('Shop Products');?></h2>
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
	<th><?php echo $this->Paginator->sort('slug');?></th>
	<th><?php echo $this->Paginator->sort('shop_category_id');?></th>
	<th><?php echo $this->Paginator->sort('created');?></th>
	<th><?php echo $this->Paginator->sort('modified');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($shopProducts as $shopProduct):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $shopProduct['ShopProduct']['id']; ?>
		</td>
		<td>
			<?php echo $shopProduct['ShopProduct']['name']; ?>
		</td>
		<td>
			<?php echo $shopProduct['ShopProduct']['slug']; ?>
		</td>
		<td>
			<?php echo $this->Html->link($shopProduct['ShopCategory']['name'], array('controller' => 'shop.shop_categories', 'action' => 'view', $shopProduct['ShopCategory']['id'])); ?>
		</td>
		<td>
			<?php echo $shopProduct['ShopProduct']['created']; ?>
		</td>
		<td>
			<?php echo $shopProduct['ShopProduct']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $shopProduct['ShopProduct']['slug'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shopProduct['ShopProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $shopProduct['ShopProduct']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php echo $this->element('paging', array('plugin' => 'Templates')); ?>
</div>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Shop Product'), array('action' => 'add', $shopCategorySlug)); ?></li>
		<li><?php echo $this->Html->link(__('List Shop.shop Categories'), array('controller' => 'shop.shop_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Category'), array('controller' => 'shop.shop_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop.shop Product Attributes'), array('controller' => 'shop.shop_product_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Product Attribute'), array('controller' => 'shop.shop_product_attributes', 'action' => 'add')); ?> </li>
	</ul>
</div>
