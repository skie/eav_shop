<?php

App::uses('ShopAppModel', 'Shop.Model');

/**
 * @property ShopAttribute $ShopAttribute
 * @property ShopCategory $ShopCategory
 * @property ShopAttributeSetsShopAttribute $ShopAttributeSetsShopAttribute
 */
class ShopAttributeSet extends ShopAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'ShopAttributeSet';

/**
 * hasMany association
 *
 * @var array $hasMany
 * @access public
 */

	public $hasMany = array(
		'ShopCategory' => array(
			'className' => 'Shop.ShopCategory',
			'foreignKey' => 'shop_attribute_set_id',
			'dependent' => false),
        'ShopAttributeSetsShopAttribute' => array(
			'className' => 'Shop.ShopAttributeSetsShopAttribute',
			'foreignKey' => 'shop_attribute_set_id',
			'dependent' => false,
		),
	);

/**
 * HABTM association
 *
 * @var array $hasAndBelongsToMany
 * @access public
 */

	public $hasAndBelongsToMany = array(
		'ShopAttribute' => array(
			'className' => 'Shop.ShopAttribute',
			'joinTable' => 'shop_attribute_sets_shop_attributes',
			'foreignKey' => 'shop_attribute_set_id',
			'associationForeignKey' => 'shop_attribute_id',
		)
	);


/**
 * Constructor
 *
 * @param mixed $id Model ID
 * @param string $table Table name
 * @param string $ds Datasource
 * @access public
 */
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
		);
	}

	
/**
 * Adds a new record to the database
 *
 * @param array post data, should be Contoller->data
 * @return array
 * @access public
 */
	public function add($data = null) {
		if (!empty($data)) {
			$this->create();
			$result = $this->save($data);
			if ($result !== false) {
				$this->data = array_merge($data, $result);
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the shopAttributeSet, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Shop Attribute Set.
 *
 * @param string $id, shop attribute set id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$shopAttributeSet = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($shopAttributeSet)) {
			throw new OutOfBoundsException(__('Invalid Shop Attribute Set', true));
		}
		$this->set($shopAttributeSet);

		if (!empty($data)) {
			$this->set($data);
			$result = $this->save(null, true);
			if ($result) {
				$this->data = $result;
				return true;
			} else {
				return $data;
			}
		} else {
			return $shopAttributeSet;
		}
	}

/**
 * Returns the record of a Shop Attribute Set.
 *
 * @param string $id, shop attribute set id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$shopAttributeSet = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($shopAttributeSet)) {
			throw new OutOfBoundsException(__('Invalid Shop Attribute Set', true));
		}

		return $shopAttributeSet;
	}

/**
 * Validates the deletion
 *
 * @param string $id, shop attribute set id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$shopAttributeSet = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($shopAttributeSet)) {
			throw new OutOfBoundsException(__('Invalid Shop Attribute Set', true));
		}

		$this->data['shopAttributeSet'] = $shopAttributeSet;
		if (!empty($data)) {
			$data['ShopAttributeSet']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['ShopAttributeSet']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Shop Attribute Set', true));
		}
	}


}
