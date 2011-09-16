<?php

App::uses('ShopAppController', 'Shop.Controller');

/**
 * @property ShopAttribute $ShopAttribute
 */
class ShopAttributesController extends ShopAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'ShopAttributes';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 *
 *
 * @return void
 */
    public function  beforeFilter() {
        parent::beforeFilter();
        if (in_array($this->action, array('add', 'edit', 'admin_add', 'admin_edit'))) {
            $this->set($this->ShopAttribute->setViewParams());
        }
    }

/**
 * Index for shop attribute.
 * 
 * @access public
 */
	public function index() {
		$this->ShopAttribute->recursive = 0;
		$this->set('shopAttributes', $this->Paginator->paginate()); 
	}

/**
 * View for shop attribute.
 *
 * @param string $id, shop attribute id 
 * @access public
 */
	public function view($id = null) {
		try {
			$shopAttribute = $this->ShopAttribute->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('shopAttribute')); 
	}

/**
 * Add for shop attribute.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->ShopAttribute->add($this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('The shop attribute has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$shopAttributeSets = $this->ShopAttribute->ShopAttributeSet->find('list');
		$this->set(compact('shopAttributeSets'));
 
	}

/**
 * Edit for shop attribute.
 *
 * @param string $id, shop attribute id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->ShopAttribute->edit($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop Attribute saved', true));
				$this->redirect(array('action' => 'view', $this->ShopAttribute->data['ShopAttribute']['id']));
				
			} else {
				$this->request->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$shopAttributeSets = $this->ShopAttribute->ShopAttributeSet->find('list');
		$this->set(compact('shopAttributeSets'));
 
	}

/**
 * Delete for shop attribute.
 *
 * @param string $id, shop attribute id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->ShopAttribute->validateAndDelete($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop attribute deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->ShopAttribute->data['shopAttribute'])) {
			$this->set('shopAttribute', $this->ShopAttribute->data['shopAttribute']);
		}
	}

/**
 * Admin index for shop attribute.
 * 
 * @access public
 */
	public function admin_index() {
		$this->ShopAttribute->recursive = 0;
		$this->set('shopAttributes', $this->Paginator->paginate()); 
	}

/**
 * Admin view for shop attribute.
 *
 * @param string $id, shop attribute id 
 * @access public
 */
	public function admin_view($id = null) {
		try {
			$shopAttribute = $this->ShopAttribute->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('shopAttribute')); 
	}

/**
 * Admin add for shop attribute.
 * 
 * @access public
 */
	public function admin_add() {
		try {
			$result = $this->ShopAttribute->add($this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('The shop attribute has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$shopAttributeSets = $this->ShopAttribute->ShopAttributeSet->find('list');
		$this->set(compact('shopAttributeSets'));
 
	}

/**
 * Admin edit for shop attribute.
 *
 * @param string $id, shop attribute id 
 * @access public
 */
	public function admin_edit($id = null) {
		try {
			$result = $this->ShopAttribute->edit($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop Attribute saved', true));
				$this->redirect(array('action' => 'view', $this->ShopAttribute->data['ShopAttribute']['id']));
				
			} else {
				$this->request->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$shopAttributeSets = $this->ShopAttribute->ShopAttributeSet->find('list');
		$this->set(compact('shopAttributeSets'));
 
	}

/**
 * Admin delete for shop attribute.
 *
 * @param string $id, shop attribute id 
 * @access public
 */
	public function admin_delete($id = null) {
		try {
			$result = $this->ShopAttribute->validateAndDelete($id, $this->request->data);
			if ($result === true) {
				$this->Session->setFlash(__('Shop attribute deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->ShopAttribute->data['shopAttribute'])) {
			$this->set('shopAttribute', $this->ShopAttribute->data['shopAttribute']);
		}
	}

}
