<div class="shopAttributeSets view">
<h2><?php  echo __('Shop Attribute Set');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopAttributeSet['ShopAttributeSet']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopAttributeSet['ShopAttributeSet']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopAttributeSet['ShopAttributeSet']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopAttributeSet['ShopAttributeSet']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shop Attribute Set'), array('action' => 'edit', $shopAttributeSet['ShopAttributeSet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Shop Attribute Set'), array('action' => 'delete', $shopAttributeSet['ShopAttributeSet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Attribute Sets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute Set'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop.shop Categories'), array('controller' => 'shop.shop_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Category'), array('controller' => 'shop.shop_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop.shop Attribute Sets Shop Attributes'), array('controller' => 'shop.shop_attribute_sets_shop_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute Sets Shop Attribute'), array('controller' => 'shop.shop_attribute_sets_shop_attributes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop.shop Attributes'), array('controller' => 'shop.shop_attributes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Attribute'), array('controller' => 'shop.shop_attributes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Shop.shop Categories');?></h3>
	<?php if (!empty($shopAttributeSet['ShopCategory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Shop Attribute Set Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Foreign Key'); ?></th>
		<th><?php echo __('Model'); ?></th>
		<th><?php echo __('Record Count'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($shopAttributeSet['ShopCategory'] as $shopCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $shopCategory['id'];?></td>
			<td><?php echo $shopCategory['shop_attribute_set_id'];?></td>
			<td><?php echo $shopCategory['category_id'];?></td>
			<td><?php echo $shopCategory['foreign_key'];?></td>
			<td><?php echo $shopCategory['model'];?></td>
			<td><?php echo $shopCategory['record_count'];?></td>
			<td><?php echo $shopCategory['user_id'];?></td>
			<td><?php echo $shopCategory['lft'];?></td>
			<td><?php echo $shopCategory['rght'];?></td>
			<td><?php echo $shopCategory['name'];?></td>
			<td><?php echo $shopCategory['slug'];?></td>
			<td><?php echo $shopCategory['description'];?></td>
			<td><?php echo $shopCategory['created'];?></td>
			<td><?php echo $shopCategory['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'shop.shop_categories', 'action' => 'view', $shopCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'shop.shop_categories', 'action' => 'edit', $shopCategory['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'shop.shop_categories', 'action' => 'delete', $shopCategory['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $shopCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shop Category'), array('controller' => 'shop.shop_categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Shop.shop Attribute Sets Shop Attributes');?></h3>
	<?php if (!empty($shopAttributeSet['ShopAttributeSetsShopAttribute'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Shop Attribute Set Id'); ?></th>
		<th><?php echo __('Shop Attribute Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($shopAttributeSet['ShopAttributeSetsShopAttribute'] as $shopAttributeSetsShopAttribute):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $shopAttributeSetsShopAttribute['id'];?></td>
			<td><?php echo $shopAttributeSetsShopAttribute['shop_attribute_set_id'];?></td>
			<td><?php echo $shopAttributeSetsShopAttribute['shop_attribute_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'shop.shop_attribute_sets_shop_attributes', 'action' => 'view', $shopAttributeSetsShopAttribute['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'shop.shop_attribute_sets_shop_attributes', 'action' => 'edit', $shopAttributeSetsShopAttribute['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'shop.shop_attribute_sets_shop_attributes', 'action' => 'delete', $shopAttributeSetsShopAttribute['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $shopAttributeSetsShopAttribute['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shop Attribute Sets Shop Attribute'), array('controller' => 'shop.shop_attribute_sets_shop_attributes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Shop.shop Attributes');?></h3>
	<?php if (!empty($shopAttributeSet['ShopAttribute'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Attribute Type'); ?></th>
		<th><?php echo __('Required'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($shopAttributeSet['ShopAttribute'] as $shopAttribute):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $shopAttribute['id'];?></td>
			<td><?php echo $shopAttribute['name'];?></td>
			<td><?php echo $shopAttribute['attribute_type'];?></td>
			<td><?php echo $shopAttribute['required'];?></td>
			<td><?php echo $shopAttribute['description'];?></td>
			<td><?php echo $shopAttribute['created'];?></td>
			<td><?php echo $shopAttribute['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'shop.shop_attributes', 'action' => 'view', $shopAttribute['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'shop.shop_attributes', 'action' => 'edit', $shopAttribute['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'shop.shop_attributes', 'action' => 'delete', $shopAttribute['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $shopAttribute['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Shop Attribute'), array('controller' => 'shop.shop_attributes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
