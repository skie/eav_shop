<?php foreach ($attributes as $id => $attribute): ?>
	<?php 
		$type = $attribute['ShopAttribute']['attribute_type'];
		$value = null;
		if (!empty($attributesValues[$id])) {
			$values = $attributesValues[$id]['ShopProductAttribute'];
			if ($type == 'string') {
				$value = $values['string_val'];
			} elseif ($type == 'integer') {
				$value = $values['int_val'];
			} elseif ($type == 'numeric') {
				$value = $values['float_val'];
			}
		}
	?>
	<dt>
		<?php echo $attribute['ShopAttribute']['name'];?>
	</dt>	
	<dd>
		<?php echo $value;?>
	</dd>
<?php endforeach;?>