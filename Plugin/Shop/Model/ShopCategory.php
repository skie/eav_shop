<?php

App::uses('ShopAppModel', 'Shop.Model');
App::uses('Category', 'Categories.Model');

/**
 * @property ShopAttributeSet ShopAttributeSet
 */
class ShopCategory extends Category {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'ShopCategory';
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
		'Tree' => array('parent' => 'category_id'),
		'Utils.Sluggable' => array(
			'label' => 'name'));

/**
 * belongsTo associations
 *
 * @var array $belongsTo
 */

	public $belongsTo = array(
		'ShopAttributeSet' => array(
			'className' => 'Shop.ShopAttributeSet',
			'foreignKey' => 'shop_attribute_set_id'),
		'ParentCategory' => array('className' => 'Shop.ShopCategory',
			'foreignKey' => 'category_id'));

/**
 * hasMany associations
 *
 * @var array $hasMany
 */
	public $hasMany = array(
		'ChildCategory' => array(
			'className' => 'Shop.ShopCategory',
			'foreignKey' => 'category_id',
			'dependent' => false));

/**
 * Return list of attributes in all category sets
 *
 * @param $shopCategoryId
 * @return array
 */
    public function productAttributes($shopCategoryId) {
        $parentCategories = $this->getPath($shopCategoryId);
        $sets = array();
        foreach ($parentCategories as $category) {
            $sets[] = $category[$this->alias]['shop_attribute_set_id'];
        }

        $attributes = $this->ShopAttributeSet->ShopAttributeSetsShopAttribute->find('all', array(
            'contain' => array('ShopAttribute'),
            'conditions' => array(
                'ShopAttributeSetsShopAttribute.shop_attribute_set_id' => $sets),
        ));
        $attributes = Set::combine($attributes, '/ShopAttribute/id', '/');
        return $attributes;
    }



}
