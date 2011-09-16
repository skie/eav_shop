<h2><?php echo sprintf(__('Delete Shop Product "%s"?'), $shopProduct['ShopProduct']['title']); ?></h2>
<p>	
	<?php echo __('Be aware that your Shop Product and all associated data will be deleted if you confirm!'); ?>
</p>
<?php
	echo $this->Form->create('ShopProduct', array(
		'url' => array(
			'action' => 'delete',
			$shopProduct['ShopProduct']['id'])));
	echo $form->input('confirm', array(
		'label' => __('Confirm'),
		'type' => 'checkbox',
		'error' => __('You have to confirm.')));
	echo $form->submit(__('Continue'));
	echo $form->end();
?>