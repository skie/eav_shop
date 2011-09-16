<?php
/* ShopAttributeSetsShopAttribute Fixture generated on: 2011-09-16 11:09:19 : 1316172739 */
class ShopAttributeSetsShopAttributeFixture extends CakeTestFixture {
/**
 * Name
 *
 * @var string
 * @access public
 */
	public $name = 'ShopAttributeSetsShopAttribute';

/**
 * Fields
 *
 * @var array
 * @access public
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_unicode_ci', 'comment' => '', 'charset' => 'utf8'),
		'shop_attribute_set_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'comment' => '', 'charset' => 'utf8'),
		'shop_attribute_id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'collate' => 'utf8_unicode_ci', 'comment' => '', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'BY_SAS_AND_SA' => array('column' => array('shop_attribute_set_id', 'shop_attribute_id'), 'unique' => 1)),
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
			'id' => '4e7333c3-4918-4078-9e1b-34d868185915',
			'shop_attribute_set_id' => 'Lorem ipsum dolor sit amet',
			'shop_attribute_id' => 'Lorem ipsum dolor sit amet'
		),
	);

}
