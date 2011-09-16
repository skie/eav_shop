<h2><?php echo sprintf(__('Delete Shop Attribute "%s"?'), $shopAttribute['ShopAttribute']['title']); ?></h2>
<p>	
	<?php echo __('Be aware that your Shop Attribute and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('ShopAttribute', array(
		'url' => array(
			'action' => 'delete',
			$shopAttribute['ShopAttribute']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm'),
		'type' => 'checkbox',
		'error' => __('You have to confirm.')));
	echo $form->submit(__('Continue'));
	echo $form->end();
?>