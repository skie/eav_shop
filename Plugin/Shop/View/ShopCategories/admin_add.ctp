<?php
/**
 * Copyright 2010, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php echo $this->Form->create($modelName);?>
	<fieldset>
 		<legend><?php echo __d('categories', 'Add Category');?></legend>
	<?php
		echo $this->Form->input('category_id', array('empty' => true));
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('shop_attribute_set_id');

	?>
	</fieldset>
<?php echo $this->Form->end(__d('categories', 'Submit'));?>