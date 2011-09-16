<?php

App::uses('ShopAppModel', 'Shop.Model');

/**
 * @property ShopAttributeSet $ShopAttributeSet
 * @property ShopAttributeOption $ShopAttributeOption
 * @property ShopProductAttribute $ShopProductAttribute
 */
class ShopAttribute extends ShopAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'ShopAttribute';

/**
 * Attribute types
 *
 * @var array
 */
    public $attributeTypes = array();
	
/**
 * hasMany association
 *
 * @var array $hasMany
 * @access public
 */

	public $hasMany = array(
		'ShopAttributeOption' => array(
			'className' => 'Shop.ShopAttributeOption',
			'foreignKey' => 'shop_attribute_id',
			'dependent' => false,
		),
		'ShopProductAttribute' => array(
			'className' => 'Shop.ShopProductAttribute',
			'foreignKey' => 'shop_attribute_id',
			'dependent' => false,
		)
	);

/**
 * HABTM association
 *
 * @var array $hasAndBelongsToMany
 * @access public
 */

	public $hasAndBelongsToMany = array(
		'ShopAttributeSet' => array(
			'className' => 'Shop.ShopAttributeSet',
			'joinTable' => 'shop_attribute_sets_shop_attributes',
			'foreignKey' => 'shop_attribute_id',
			'associationForeignKey' => 'shop_attribute_set_id',
			'unique' => true,
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
		$this->attributeTypes = array(
            'string' => __('Text value', true),
            'integer' => __('Integer value', true),
            'numeric' => __('Numeric value', true),
            //'option' => __('Option value', true), //@todo
            //'checkbox' => __('Text value', true), //@todo
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
				throw new OutOfBoundsException(__('Could not save the shopAttribute, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Shop Attribute.
 *
 * @param string $id, shop attribute id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$shopAttribute = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($shopAttribute)) {
			throw new OutOfBoundsException(__('Invalid Shop Attribute', true));
		}
		$this->set($shopAttribute);

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
			return $shopAttribute;
		}
	}

/**
 * Returns the record of a Shop Attribute.
 *
 * @param string $id, shop attribute id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$shopAttribute = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($shopAttribute)) {
			throw new OutOfBoundsException(__('Invalid Shop Attribute', true));
		}

		return $shopAttribute;
	}

/**
 * Validates the deletion
 *
 * @param string $id, shop attribute id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$shopAttribute = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($shopAttribute)) {
			throw new OutOfBoundsException(__('Invalid Shop Attribute', true));
		}

		$this->data['shopAttribute'] = $shopAttribute;
		if (!empty($data)) {
			$data['ShopAttribute']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['ShopAttribute']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Shop Attribute', true));
		}
	}


/**
 * Set common view variables
 *
 * @return array
 */
    public function setViewParams() {
        return array(
            'attributeTypes' => $this->attributeTypes);
    }

}
