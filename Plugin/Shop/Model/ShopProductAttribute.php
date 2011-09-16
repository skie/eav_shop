<?php

App::uses('ShopAppModel', 'Shop.Model');

/**
 * @property ShopProduct $ShopProduct
 * @property ShopAttribute $ShopAttribute
 */
class ShopProductAttribute extends ShopAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'ShopProductAttribute';
/**
 * Validation parameters - initialized in constructor
 *
 * @var array
 * @access public
 */
	public $validate = array();

/**
 * belongsTo association
 *
 * @var array $belongsTo 
 * @access public
 */
	public $belongsTo = array(
		'ShopProduct' => array(
			'className' => 'Shop.ShopProduct',
			'foreignKey' => 'shop_product_id',
		),
		'ShopAttribute' => array(
			'className' => 'Shop.ShopAttribute',
			'foreignKey' => 'shop_attribute_id',
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
			'shop_product_id' => array(
				'uuid' => array('rule' => array('uuid'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Shop Product', true))),
			'shop_attribute_id' => array(
				'uuid' => array('rule' => array('uuid'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Shop Attribute', true))),
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
				throw new OutOfBoundsException(__('Could not save the shopProductAttribute, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Shop Product Attribute.
 *
 * @param string $id, shop product attribute id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$shopProductAttribute = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($shopProductAttribute)) {
			throw new OutOfBoundsException(__('Invalid Shop Product Attribute', true));
		}
		$this->set($shopProductAttribute);

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
			return $shopProductAttribute;
		}
	}

/**
 * Returns the record of a Shop Product Attribute.
 *
 * @param string $id, shop product attribute id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$shopProductAttribute = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($shopProductAttribute)) {
			throw new OutOfBoundsException(__('Invalid Shop Product Attribute', true));
		}

		return $shopProductAttribute;
	}

/**
 * Validates the deletion
 *
 * @param string $id, shop product attribute id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$shopProductAttribute = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($shopProductAttribute)) {
			throw new OutOfBoundsException(__('Invalid Shop Product Attribute', true));
		}

		$this->data['shopProductAttribute'] = $shopProductAttribute;
		if (!empty($data)) {
			$data['ShopProductAttribute']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['ShopProductAttribute']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Shop Product Attribute', true));
		}
	}


}
