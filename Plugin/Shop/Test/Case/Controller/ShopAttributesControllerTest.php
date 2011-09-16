<?php
/* ShopAttributes Test cases generated on: 2011-09-16 10:09:42 : 1316170002*/
App::import('Controller', 'Shop.ShopAttributes');

App::import('Lib', 'Templates.AppControllerTestCase');
/**
 * @property ShopAttributesController ShopAttributes
 * @property array record
 */
class ShopAttributesControllerTestCase extends AppControllerTestCase {
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
		$this->ShopAttributes = $this->generate(
			'ShopAttributes', array(
			  'methods' => array(
				'redirect'),
			  'components' => array(
				'Session')));
		$this->ShopAttributes->constructClasses();
		$this->ShopAttributes->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new ShopAttributeFixture();
		$this->record = array('ShopAttribute' => $fixture->records[0]);
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
		unset($this->ShopAttributes);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	// public function assertFlash($message) {
		// $flash = $this->ShopAttributes->Session->read('Message.flash');
		// $this->assertEqual($flash['message'], $message);
		// $this->ShopAttributes->Session->delete('Message.flash');
	// }

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertInstanceOf('ShopAttributesController', $this->ShopAttributes);
	}



	
}
