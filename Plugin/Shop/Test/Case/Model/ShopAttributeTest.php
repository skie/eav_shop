<?php
/* ShopAttribute Test cases generated on: 2011-09-16 10:09:41 : 1316170001*/
App::import('Model', 'Shop.ShopAttribute');

App::import('Lib', 'Templates.AppControllerTestCase');
/**
 * @property ShopAttribute ShopAttribute
 * @property array record
 */
class ShopAttributeTestCase extends AppControllerTestCase {
/**
 * Autoload entrypoint for fixtures dependecy solver
 *
 * @var string
 * @access public
 */
	public $plugin = 'Shop';

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
		$this->ShopAttribute = ClassRegistry::init('ShopAttribute');
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
		unset($this->ShopAttribute);
		ClassRegistry::flush();
	}

/**
 * Test validation rules
 *
 * @return void
 * @access public
 */
	public function testValidation() {
		$this->assertValid($this->ShopAttribute, $this->record);

		// Test mandatory fields
		$data = array('ShopAttribute' => array('id' => 'new-id'));
		$expectedErrors = array(); // TODO Update me with mandatory fields
		$this->assertValidationErrors($this->ShopAttribute, $data, $expectedErrors);

		// TODO Add your specific tests below
		$data = $this->record;
		//$data[ShopAttribute]['title'] = str_pad('too long', 1000);
		//$expectedErrors = array('title');
		$this->assertValidationErrors($this->ShopAttribute, $data, $expectedErrors);
	}

/**
 * Test adding a Shop Attribute 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ShopAttribute']['id']);
		$result = $this->ShopAttribute->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ShopAttribute']['id']);
			//unset($data['ShopAttribute']['title']);
			$result = $this->ShopAttribute->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Shop Attribute 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ShopAttribute->edit('shopattribute-1', null);

		$expected = $this->ShopAttribute->read(null, 'shopattribute-1');
		$this->assertEqual($result['ShopAttribute'], $expected['ShopAttribute']);

		// put invalidated data here
		$data = $this->record;
		//$data['ShopAttribute']['title'] = null;

		$result = $this->ShopAttribute->edit('shopattribute-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ShopAttribute->edit('shopattribute-1', $data);
		$this->assertTrue($result);

		$result = $this->ShopAttribute->read(null, 'shopattribute-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ShopAttribute']['title'], $data['ShopAttribute']['title']);

		try {
			$this->ShopAttribute->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Shop Attribute 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ShopAttribute->view('shopattribute-1');
		$this->assertTrue(isset($result['ShopAttribute']));
		$this->assertEqual($result['ShopAttribute']['id'], 'shopattribute-1');

		try {
			$result = $this->ShopAttribute->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Shop Attribute 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ShopAttribute->validateAndDelete('invalidShopAttributeId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Shop Attribute');
		}
		try {
			$postData = array(
				'ShopAttribute' => array(
					'confirm' => 0));
			$result = $this->ShopAttribute->validateAndDelete('shopattribute-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Shop Attribute');
		}

		$postData = array(
			'ShopAttribute' => array(
				'confirm' => 1));
		$result = $this->ShopAttribute->validateAndDelete('shopattribute-1', $postData);
		$this->assertTrue($result);
	}
	
}
