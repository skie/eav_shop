<?php //$id = 0;?>
<?php foreach ($attributes as $id => $attribute): ?>
	<?php //$id++;
		$type = $attribute['ShopAttribute']['attribute_type'];
		$value = null;
		if (!empty($attributesValues[$id])) {
			$values = $attributesValues[$id]['ProductAttribute'];
			if ($type == 'string') {
				$value = $values['string_val'];
			} elseif ($type == 'integer') {
				$value = $values['int_val'];
			} elseif ($type == 'numeric') {
				$value = $values['float_val'];
			}
		}
	?>
	<?php if ($type == 'string'): ?>		
		<?php echo $this->Form->input("ShopAttribute.$id", array(
			'type' => 'string',
			'value' => $value,
			'label' => $attribute['ShopAttribute']['name']));?>
	<?php elseif ($type == 'integer'): ?>
		<?php echo $this->Form->input("ShopAttribute.$id", array(
			'type' => 'string',
			'value' => $value,
			'label' => $attribute['ShopAttribute']['name']));?>
	<?php elseif ($type == 'numeric'): ?>
		<?php echo $this->Form->input("ShopAttribute.$id", array(
			'type' => 'string',
			'value' => $value,
			'label' => $attribute['ShopAttribute']['name']));?>
	<?php endif;?>
<?php endforeach;?>