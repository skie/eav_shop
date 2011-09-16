<?php

App::uses('ShopAppModel', 'Shop.Model');

/**
 * @property ShopCategory $ShopCategory
 * @property ShopProductAttribute $ShopProductAttribute
 */
class ShopProduct extends ShopAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'ShopProduct';
/**
 * Validation parameters - initialized in constructor
 *
 * @var array
 * @access public
 */
	public $validate = array();

/**
 * Behaviors
 *
 * @var array
 */
    public $actsAs = array(
		'Utils.Sluggable' => array(
			'label' => 'name'));
/**
 * belongsTo association
 *
 * @var array $belongsTo 
 * @access public
 */
	public $belongsTo = array(
		'ShopCategory' => array(
			'className' => 'Shop.ShopCategory',
			'foreignKey' => 'shop_category_id',
		)
	);
/**
 * hasMany association
 *
 * @var array $hasMany
 * @access public
 */

	public $hasMany = array(
		'ShopProductAttribute' => array(
			'className' => 'Shop.ShopProductAttribute',
			'foreignKey' => 'shop_product_id',
			'dependent' => false,
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
			'shop_category_id' => array(
				'uuid' => array('rule' => array('uuid'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Shop Category', true))),
		);
	}

	
/**
 * Adds a new record to the database
 *
 * @param string $shopCategoryId, Shop Category id
 * @param array post data, should be Contoller->data
 * @return array
 * @access public
 */
	public function add($shopCategoryId = null, $data = null) {
		if (!empty($data)) {
			$data['ShopProduct']['shop_category_id'] = $shopCategoryId;
			$this->create();
			$result = $this->save($data);
			if ($result !== false) {
                $this->saveAttributes($this->id, $data);
				$this->data = array_merge($data, $result);
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the shopProduct, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Shop Product.
 *
 * @param string $id, shop product id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$shopProduct = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($shopProduct)) {
			throw new OutOfBoundsException(__('Invalid Shop Product', true));
		}
		$this->set($shopProduct);

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
			return $shopProduct;
		}
	}

/**
 * Returns the record of a Shop Product.
 *
 * @param string $slug, shop product slug.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($slug = null) {
		$shopProduct = $this->find('first', array(
			'conditions' => array(
				'ShopProduct.slug' => $slug)));

		if (empty($shopProduct)) {
			throw new OutOfBoundsException(__('Invalid Shop Product', true));
		}

		return $shopProduct;
	}

/**
 * Validates the deletion
 *
 * @param string $id, shop product id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$shopProduct = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($shopProduct)) {
			throw new OutOfBoundsException(__('Invalid Shop Product', true));
		}

		$this->data['shopProduct'] = $shopProduct;
		if (!empty($data)) {
			$data['ShopProduct']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['ShopProduct']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Shop Product', true));
		}
	}

/**
 * Return product attributes
 *
 * @param $shopCategoryId
 * @param null $productId
 * @return array
 */
    public function productAttributes($shopCategoryId, $productId = null) {
        $attributes = $this->ShopCategory->productAttributes($shopCategoryId);
        $attributesIds = array_keys($attributes);
        if (!empty($productId)) {

            $attributesValues = $this->ShopProductAttribute->find('all', array(
                'contain' => array(),
                'conditions' => array(
                    'ShopProductAttribute.shop_product_id' => $productId,
                    'ShopProductAttribute.shop_attribute_id' => $attributesIds,
            )));
            $attributesValues = Set::combine($attributesValues, '/ShopProductAttribute/shop_attribute_id', '/');
        }
        return compact('attributes', 'attributesValues');
    }

    public function saveAttributes($productId, $attributes) {
        $product = $this->read(null, $productId);
        if (!empty($product)) {
            $attribData = $this->productAttributes($product[$this->alias]['shop_category_id'], $productId);
            $attributesData = $attribData['attributes'];
            if (isset($attribData['attributesValues'])) {
                $actualAttributesValues = $attribData['attributesValues'];
            } else {
                $actualAttributesValues = array();
            }
            foreach ($attributes['ShopAttribute'] as $id => $attribute) {
                if (!empty($attributesData[$id])) {
                    if (!empty($actualAttributesValues[$id])) {
                        // update
                        $attr = $actualAttributesValues[$id];
                        $attr['ShopProductAttribute']['string_val'] = $attribute;
                        $this->ShopProductAttribute->create($attr);
                        $this->ShopProductAttribute->save($attr);
                    } else {
                        //create
                        $attr = array(
                            'ShopProductAttribute' => array(
					            'shop_product_id' => $productId,
					            'shop_attribute_id' => $id));
                        $attr['ShopProductAttribute']['string_val'] = $attribute;
                        $this->ShopProductAttribute->create($attr);
                        $this->ShopProductAttribute->save($attr);
                    }
                }
            }
        }
    }

}
