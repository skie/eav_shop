<?php

App::uses('ShopAppController', 'Shop.Controller');

/**
 * @property ShopProduct $ShopProduct
 */
class ShopProductsController extends ShopAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'ShopProducts';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for shop product.
 *
 * @param string $shopCategorySlug, Shop Category id 
 * @access public
 */
	public function index($shopCategorySlug) {
		$this->ShopProduct->recursive = 0;
		$shopCategory = $this->ShopProduct->ShopCategory->find('first', array('conditions' => array('ShopCategory.slug' => $shopCategorySlug), 'recursive' => -1));
		if (empty($shopCategory)) {
			$this->Session->setFlash(__('Wrong id',true));
			$this->redirect('/');
		}
        $this->Paginator->paginate = array(
            'conditions' => array('shop_category_id' => $shopCategory['ShopCategory']['id']));
		$this->set('shopProducts', $this->Paginator->paginate());
		$this->set(compact('shopCategorySlug')); 
	}

/**
 * View for shop product.
 *
 * @param string $slug, shop product slug 
 * @access public
 */
	public function view($slug = null) {
		try {
			$shopProduct = $this->ShopProduct->view($slug);
			$shopCategoryId = $shopProduct['ShopProduct']['shop_category_id'];
			$shopCategory = $this->ShopProduct->ShopCategory->find('first', array('conditions' => array('ShopCategory.id' => $shopCategoryId), 'recursive' => -1));
			$shopCategorySlug = $shopCategory['ShopCategory']['slug'];
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		
			$this->redirect('/');
		}
		$this->set(compact('shopProduct'));
		$this->set(compact('shopCategorySlug')); 
	}

/**
 * Admin index for shop product.
 *
 * @param string $shopCategorySlug, Shop Category id 
 * @access public
 */
	public function admin_index($shopCategorySlug) {
		$this->ShopProduct->recursive = 0;
		$shopCategory = $this->ShopProduct->ShopCategory->find('first', array('conditions' => array('ShopCategory.slug' => $shopCategorySlug), 'recursive' => -1));
		if (empty($shopCategory)) {
			$this->Session->setFlash(__('Wrong id',true));
			$this->redirect('/');
		}
		$this->Paginator->paginate = array(
            'conditions' => array('shop_category_id' => $shopCategory['ShopCategory']['id']));
		$this->set('shopProducts', $this->Paginator->paginate());
		$this->set(compact('shopCategorySlug')); 
	}

/**
 * Admin view for shop product.
 *
 * @param string $slug, shop product slug 
 * @access public
 */
	public function admin_view($slug = null) {
		try {
			$shopProduct = $this->ShopProduct->view($slug);
			$shopCategoryId = $shopProduct['ShopProduct']['shop_category_id'];
			$shopCategory = $this->ShopProduct->ShopCategory->find('first', array('conditions' => array('ShopCategory.id' => $shopCategoryId), 'recursive' => -1));
			$shopCategorySlug = $shopCategory['ShopCategory']['slug'];
            $this->set($this->ShopProduct->productAttributes($shopCategoryId, $shopProduct['ShopProduct']['id']));
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		
			$this->redirect('/');
		}
		$this->set(compact('shopProduct'));
		$this->set(compact('shopCategorySlug')); 
	}

/**
 * Admin add for shop product.
 *
 * @param string $shopCategorySlug, Shop Category id 
 * @access public
 */
	public function admin_add($shopCategorySlug) {
		try {
			$shopCategory = $this->ShopProduct->ShopCategory->find('first', array('conditions' => array('ShopCategory.slug' => $shopCategorySlug), 'recursive' => -1));
			if (empty($shopCategory)) {
				$this->Session->setFlash(__('Wrong id',true));
				$this->redirect('/');
			}
			$shopCategoryId = $shopCategory['ShopCategory']['id'];
			$result = $this->ShopProduct->add($shopCategoryId, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('The shop product has been saved', true));
				$this->redirect(array('action' => 'index', $shopCategorySlug));
			} else {
                $this->set($this->ShopProduct->productAttributes($shopCategoryId));
            }
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index', $shopCategorySlug));
		}
		$shopCategories = $this->ShopProduct->ShopCategory->find('list');
		$this->set(compact('shopCategories'));
		$this->set(compact('shopCategorySlug')); 
	}

/**
 * Admin edit for shop product.
 *
 * @param string $id, shop product id 
 * @access public
 */
	public function admin_edit($id = null) {
		try {
			$result = $this->ShopProduct->edit($id, $this->request->data);
			if ($result === true) {
		
				$shopCategoryId = $this->ShopProduct->data['ShopProduct']['shop_category_id'];
				$this->Session->setFlash(__('Shop Product saved', true));
				$this->redirect(array('action' => 'view', $this->ShopProduct->data['ShopProduct']['slug']));
				
			} else {
				$this->request->data = $result;
		
				$shopCategoryId = $this->request->data['ShopProduct']['shop_category_id'];
			}
			$shopCategory = $this->ShopProduct->ShopCategory->find('first', array('conditions' => array('ShopCategory.id' => $shopCategoryId), 'recursive' => -1));
            $this->set($this->ShopProduct->productAttributes($shopCategoryId, $id));

			$shopCategorySlug = $shopCategory['ShopCategory']['slug'];
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$shopCategories = $this->ShopProduct->ShopCategory->find('list');
		$this->set(compact('shopCategories'));
		$this->set(compact('shopCategorySlug')); 
	}

/**
 * Admin delete for shop product.
 *
 * @param string $id, shop product id 
 * @access public
 */
	public function admin_delete($id = null) {
		try {
			$shopProduct = $this->ShopProduct->read(null, $id);
			$shopCategoryId = $shopProduct['ShopProduct']['shop_category_id'];			
			$shopCategory = $this->ShopProduct->ShopCategory->find('first', array('conditions' => array('ShopCategory.id' => $shopCategoryId), 'recursive' => -1));
			$shopCategorySlug = $shopCategory['ShopCategory']['slug'];
			$this->set(compact('shopCategorySlug')); 
			$result = $this->ShopProduct->validateAndDelete($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop product deleted', true));
				$this->redirect(array('action' => 'index', $shopCategorySlug));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		if (!empty($this->ShopProduct->data['shopProduct'])) {
			$this->set('shopProduct', $this->ShopProduct->data['shopProduct']);
		}
	}

}
