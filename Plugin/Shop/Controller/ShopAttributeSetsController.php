<?php

App::uses('ShopAppController', 'Shop.Controller');

/**
 * @property ShopAttributeSet $ShopAttributeSet
 */
class ShopAttributeSetsController extends ShopAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'ShopAttributeSets';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for shop attribute set.
 * 
 * @access public
 */
	public function index() {
		$this->ShopAttributeSet->recursive = 0;
		$this->set('shopAttributeSets', $this->Paginator->paginate()); 
	}

/**
 * View for shop attribute set.
 *
 * @param string $id, shop attribute set id 
 * @access public
 */
	public function view($id = null) {
		try {
			$shopAttributeSet = $this->ShopAttributeSet->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('shopAttributeSet')); 
	}

/**
 * Add for shop attribute set.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->ShopAttributeSet->add($this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('The shop attribute set has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$shopAttributes = $this->ShopAttributeSet->ShopAttribute->find('list');
		$this->set(compact('shopAttributes'));
 
	}

/**
 * Edit for shop attribute set.
 *
 * @param string $id, shop attribute set id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->ShopAttributeSet->edit($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop Attribute Set saved', true));
				$this->redirect(array('action' => 'view', $this->ShopAttributeSet->data['ShopAttributeSet']['id']));
				
			} else {
				$this->request->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$shopAttributes = $this->ShopAttributeSet->ShopAttribute->find('list');
		$this->set(compact('shopAttributes'));
 
	}

/**
 * Delete for shop attribute set.
 *
 * @param string $id, shop attribute set id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->ShopAttributeSet->validateAndDelete($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop attribute set deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->ShopAttributeSet->data['shopAttributeSet'])) {
			$this->set('shopAttributeSet', $this->ShopAttributeSet->data['shopAttributeSet']);
		}
	}

/**
 * Admin index for shop attribute set.
 * 
 * @access public
 */
	public function admin_index() {
		$this->ShopAttributeSet->recursive = 0;
		$this->set('shopAttributeSets', $this->Paginator->paginate()); 
	}

/**
 * Admin view for shop attribute set.
 *
 * @param string $id, shop attribute set id 
 * @access public
 */
	public function admin_view($id = null) {
		try {
			$shopAttributeSet = $this->ShopAttributeSet->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('shopAttributeSet')); 
	}

/**
 * Admin add for shop attribute set.
 * 
 * @access public
 */
	public function admin_add() {
		try {
			$result = $this->ShopAttributeSet->add($this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('The shop attribute set has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$shopAttributes = $this->ShopAttributeSet->ShopAttribute->find('list');
		$this->set(compact('shopAttributes'));
 
	}

/**
 * Admin edit for shop attribute set.
 *
 * @param string $id, shop attribute set id 
 * @access public
 */
	public function admin_edit($id = null) {
		try {
			$result = $this->ShopAttributeSet->edit($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop Attribute Set saved', true));
				$this->redirect(array('action' => 'view', $this->ShopAttributeSet->data['ShopAttributeSet']['id']));
				
			} else {
				$this->request->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$shopAttributes = $this->ShopAttributeSet->ShopAttribute->find('list');
		$this->set(compact('shopAttributes'));
 
	}

/**
 * Admin delete for shop attribute set.
 *
 * @param string $id, shop attribute set id 
 * @access public
 */
	public function admin_delete($id = null) {
		try {
			$result = $this->ShopAttributeSet->validateAndDelete($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop attribute set deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->ShopAttributeSet->data['shopAttributeSet'])) {
			$this->set('shopAttributeSet', $this->ShopAttributeSet->data['shopAttributeSet']);
		}
	}

}
