<?php

App::uses('CategoriesController', 'Categories.Controller');

/**
 * @property ShopCategory Category
 * @property ShopCategory ShopCategory
 */
class ShopCategoriesController extends CategoriesController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'ShopCategories';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');



/**
 * beforeFilter callback
 *
 * @var array
 * @access public
 */
	public function beforeFilter() {
		parent::beforeFilter();
        $this->Category = ClassRegistry::init('Shop.ShopCategory');

        if (in_array($this->action, array('add', 'edit', 'admin_add', 'admin_edit'))) {
            $shopAttributeSets = $this->ShopCategory->ShopAttributeSet->find('list');
            $this->set(compact('shopAttributeSets'));
        }

    }
    
}
