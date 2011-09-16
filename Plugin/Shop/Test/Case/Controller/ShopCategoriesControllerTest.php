<?php
/* ShopCategories Test cases generated on: 2011-09-16 09:09:42 : 1316167002*/
App::import('Controller', 'Shop.ShopCategories');

App::import('Lib', 'Templates.AppControllerTestCase');
class ShopCategoriesControllerTestCase extends AppControllerTestCase {
/**
 * Autoload entrypoint for fixtures dependecy solver
 *
 * @var string
 * @access public
 */
	public $plugin = 'app';

/**
 * Test to run for the test case (e.g array('testFind', 'testView'))
 * If this attribute is not empty only the tests from the list will be executed
 *
 * @var array
 * @access protected
 */
	protected $_testsToRun = array();

/**
 * Start Test callback
 *
 * @param string $method
 * @return void
 * @access public
 */
	public function startTest($method) {
		parent::startTest($method);
		$this->ShopCategories = $this->generate(
			'ShopCategories', array(
			  'methods' => array(
				'redirect'),
			  'components' => array(
				'Session')));
		$this->ShopCategories->constructClasses();
		$this->ShopCategories->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new ShopCategoryFixture();
		$this->record = array('ShopCategory' => $fixture->records[0]);
	}

/**
 * End Test callback
 *
 * @param string $method
 * @return void
 * @access public
 */
	public function endTest($method) {
		parent::endTest($method);
		unset($this->ShopCategories);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	// public function assertFlash($message) {
		// $flash = $this->ShopCategories->Session->read('Message.flash');
		// $this->assertEqual($flash['message'], $message);
		// $this->ShopCategories->Session->delete('Message.flash');
	// }

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertInstanceOf('ShopCategoriesController', $this->ShopCategories);
	}



	
}
