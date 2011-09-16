<?php
/* ShopProducts Test cases generated on: 2011-09-16 13:09:02 : 1316178542*/
App::import('Controller', 'Shop.ShopProducts');

App::import('Lib', 'Templates.AppControllerTestCase');
/**
 * @property ShopProducts $ShopProducts
 * @property array $record
 */
class ShopProductsControllerTestCase extends AppControllerTestCase {
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
		$this->ShopProducts = $this->generate(
			'ShopProducts', array(
			  'methods' => array(
				'redirect'),
			  'components' => array(
				'Session')));
		$this->ShopProducts->constructClasses();
		$this->ShopProducts->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new ShopProductFixture();
		$this->record = array('ShopProduct' => $fixture->records[0]);
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
		unset($this->ShopProducts);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	// public function assertFlash($message) {
		// $flash = $this->ShopProducts->Session->read('Message.flash');
		// $this->assertEqual($flash['message'], $message);
		// $this->ShopProducts->Session->delete('Message.flash');
	// }

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertInstanceOf('ShopProductsController', $this->ShopProducts);
	}



	
}
