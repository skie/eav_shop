<?php
class M4e72f92d33ac4aafa742348c940d0eef extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'shop_attributes' => array(
					'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
					'attribute_type' => array('type'=>'string', 'null' => true, 'length' => 30, 'default' => NULL),
					'required' => array('type'=>'boolean', 'null' => true, 'default' => '0'),
					'description' => array('type' => 'text', 'null' => false, 'default' => NULL),
 					'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),				
				),
				'shop_attribute_options' => array(
					'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'shop_attribute_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'position' => array('type' => 'integer', 'null' => false, 'default' => NULL),
					'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
					'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'BY_SHOP_ATTRIBUTE' => array('column' => 'shop_attribute_id', 'unique' => 0),
					),				
				),
				
				'shop_attribute_sets' => array(
					'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
					'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),				
				),
				'shop_attribute_sets_shop_attributes' => array(
					'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'shop_attribute_set_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'shop_attribute_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
						'BY_SAS_AND_SA' => array('column' => array('shop_attribute_set_id', 'shop_attribute_id'), 'unique' => 1),
					),				
				),

				'shop_categories' => array(
					'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'shop_attribute_set_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'category_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),
					'foreign_key' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),
					'model' => array('type'=>'string', 'null' => true, 'default' => NULL),
					'record_count' => array('type'=>'integer', 'null' => true, 'default' => 0),
					'user_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),
					'lft' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10),
					'rght' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 10),
					'name' => array('type'=>'string', 'null' => false, 'default' => NULL),
					'slug' => array('type'=>'string', 'null' => false, 'default' => NULL),
					'description' => array('type'=>'text', 'null' => true, 'default' => NULL),
					'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1), 
					),
				),	
				'shop_products' => array(
					'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'name' => array('type'=>'string', 'null' => true, 'length' => 100, 'default' => NULL),
					'slug' => array('type'=>'string', 'null' => true, 'length' => 100, 'default' => NULL),
					'shop_category_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),					
					'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),				
				),
				// @todo possible split into diferent tables
				'shop_product_attributes' => array(
					'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
					'shop_product_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),					
					'shop_attribute_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
					'string_val' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),					
					'int_val' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 36),					
					'float_val' => array('type'=>'float', 'null' => true, 'default' => NULL, 'length' => 36),					
					'key_val' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 36),					
					'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
					'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
				),
			)			
		),
		'down' => array(
			'drop_table' => array(
				'shop_attributes', 
				'shop_attribute_options', 
				'shop_attribute_sets', 
				'shop_attribute_sets_shop_attributes', 
				'shop_categories',
				'shop_products',
				'shop_product_attributes',
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
