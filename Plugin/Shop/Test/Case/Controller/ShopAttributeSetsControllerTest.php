<?php
/* ShopAttributeSets Test cases generated on: 2011-09-16 11:09:16 : 1316172736*/
App::import('Controller', 'Shop.ShopAttributeSets');

App::import('Lib', 'Templates.AppControllerTestCase');
/**
 * @property ShopAttributeSets $ShopAttributeSets
 * @property array $record
 */
class ShopAttributeSetsControllerTestCase extends AppControllerTestCase {
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
		$this->ShopAttributeSets = $this->generate(
			'ShopAttributeSets', array(
			  'methods' => array(
				'redirect'),
			  'components' => array(
				'Session')));
		$this->ShopAttributeSets->constructClasses();
		$this->ShopAttributeSets->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new ShopAttributeSetFixture();
		$this->record = array('ShopAttributeSet' => $fixture->records[0]);
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
		unset($this->ShopAttributeSets);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	// public function assertFlash($message) {
		// $flash = $this->ShopAttributeSets->Session->read('Message.flash');
		// $this->assertEqual($flash['message'], $message);
		// $this->ShopAttributeSets->Session->delete('Message.flash');
	// }

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertInstanceOf('ShopAttributeSetsController', $this->ShopAttributeSets);
	}



	
}
