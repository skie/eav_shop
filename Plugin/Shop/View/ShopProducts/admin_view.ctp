<div class="shopProducts view">
<h2><?php  echo __('Shop Product');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Slug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['slug']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $shopProduct['ShopProduct']['created']; ?>
			&nbsp;
		</dd>

        <?php
            echo $this->element('Attributes/item', compact('attributes', 'attributesValues'));
        ?>
    </dl>
</div>


<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shop Product'), array('action' => 'edit', $shopProduct['ShopProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Shop Product'), array('action' => 'delete', $shopProduct['ShopProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shop Products'), array('action' => 'index', $shopCategorySlug)); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop Product'), array('action' => 'add', $shopCategorySlug)); ?> </li>
	</ul>
</div>

