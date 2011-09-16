<div class="shopProducts view">
<h2><?php  echo __('Shop Product');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['slug']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Shop Category'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($shopProduct['ShopCategory']['name'], array('controller' => 'shop.shop_categories', 'action' => 'view', $shopProduct['ShopCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shop Product'), array('action' => 'edit', $shopProduct['ShopProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Shop Product'), array('action' => 'delete', $shopProduct['ShopProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Products'), array('action' => 'index', $shopCategorySlug)); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Product'), array('action' => 'add', $shopCategorySlug)); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop.shop Categories'), array('controller' => 'shop.shop_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Category'), array('controller' => 'shop.shop_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop.shop Product Attributes'), array('controller' => 'shop.shop_product_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Product Attribute'), array('controller' => 'shop.shop_product_attributes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Shop.shop Product Attributes');?></h3>
	<?php if (!empty($shopProduct['ShopProductAttribute'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Shop Product Id'); ?></th>
		<th><?php echo __('Shop Attribute Id'); ?></th>
		<th><?php echo __('String Val'); ?></th>
		<th><?php echo __('Int Val'); ?></th>
		<th><?php echo __('Float Val'); ?></th>
		<th><?php echo __('Key Val'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($shopProduct['ShopProductAttribute'] as $shopProductAttribute):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $shopProductAttribute['id'];?></td>
			<td><?php echo $shopProductAttribute['shop_product_id'];?></td>
			<td><?php echo $shopProductAttribute['shop_attribute_id'];?></td>
			<td><?php echo $shopProductAttribute['string_val'];?></td>
			<td><?php echo $shopProductAttribute['int_val'];?></td>
			<td><?php echo $shopProductAttribute['float_val'];?></td>
			<td><?php echo $shopProductAttribute['key_val'];?></td>
			<td><?php echo $shopProductAttribute['created'];?></td>
			<td><?php echo $shopProductAttribute['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'shop.shop_product_attributes', 'action' => 'view', $shopProductAttribute['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'shop.shop_product_attributes', 'action' => 'edit', $shopProductAttribute['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'shop.shop_product_attributes', 'action' => 'delete', $shopProductAttribute['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $shopProductAttribute['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shop Product Attribute'), array('controller' => 'shop.shop_product_attributes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
