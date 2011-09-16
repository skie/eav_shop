<?php
/* ShopProductAttribute Fixture generated on: 2011-09-16 11:09:23 : 1316172743 */
class ShopProductAttributeFixture extends CakeTestFixture {
/**
 * Name
 *
 * @var string
 * @access public
 */
	public $name = 'ShopProductAttribute';

/**
 * Fields
 *
 * @var array
 * @access public
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_unicode_ci', 'comment' => '', 'charset' => 'utf8'),
		'shop_product_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'charset' => 'utf8'),
		'shop_attribute_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'charset' => 'utf8'),
		'string_val' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'charset' => 'utf8'),
		'int_val' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => NULL, 'comment' => ''),
		'float_val' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'key_val' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 * @access public
 */
	public $records = array(
		array(
			'id' => '4e7333c7-47d8-49a3-aaa3-34c468185915',
			'shop_product_id' => 'Lorem ipsum dolor sit amet',
			'shop_attribute_id' => 'Lorem ipsum dolor sit amet',
			'string_val' => 'Lorem ipsum dolor sit amet',
			'int_val' => 1,
			'float_val' => 1,
			'key_val' => 'Lorem ipsum dolor sit amet',
			'created' => '2011-09-16 11:32:23',
			'modified' => '2011-09-16 11:32:23'
		),
	);

}
