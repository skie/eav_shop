<?php
/* ShopProductAttribute Test cases generated on: 2011-09-16 11:09:23 : 1316172743*/
App::import('Model', 'Shop.ShopProductAttribute');

App::import('Lib', 'Templates.AppTestCase');
/**
 * @property ShopProductAttribute $ShopProductAttribute
 * @property array $record
 */
class ShopProductAttributeTestCase extends AppTestCase {
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
		$this->ShopProductAttribute = ClassRegistry::init('ShopProductAttribute');
		$fixture = new ShopProductAttributeFixture();
		$this->record = array('ShopProductAttribute' => $fixture->records[0]);
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
		unset($this->ShopProductAttribute);
		ClassRegistry::flush();
	}

/**
 * Test validation rules
 *
 * @return void
 * @access public
 */
	public function testValidation() {
		$this->assertValid($this->ShopProductAttribute, $this->record);

		// Test mandatory fields
		$data = array('ShopProductAttribute' => array('id' => 'new-id'));
		$expectedErrors = array(); // TODO Update me with mandatory fields
		$this->assertValidationErrors($this->ShopProductAttribute, $data, $expectedErrors);

		// TODO Add your specific tests below
		$data = $this->record;
		//$data[ShopProductAttribute]['title'] = str_pad('too long', 1000);
		//$expectedErrors = array('title');
		$this->assertValidationErrors($this->ShopProductAttribute, $data, $expectedErrors);
	}

/**
 * Test adding a Shop Product Attribute 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ShopProductAttribute']['id']);
		$result = $this->ShopProductAttribute->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ShopProductAttribute']['id']);
			//unset($data['ShopProductAttribute']['title']);
			$result = $this->ShopProductAttribute->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Shop Product Attribute 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ShopProductAttribute->edit('shopproductattribute-1', null);

		$expected = $this->ShopProductAttribute->read(null, 'shopproductattribute-1');
		$this->assertEqual($result['ShopProductAttribute'], $expected['ShopProductAttribute']);

		// put invalidated data here
		$data = $this->record;
		//$data['ShopProductAttribute']['title'] = null;

		$result = $this->ShopProductAttribute->edit('shopproductattribute-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ShopProductAttribute->edit('shopproductattribute-1', $data);
		$this->assertTrue($result);

		$result = $this->ShopProductAttribute->read(null, 'shopproductattribute-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ShopProductAttribute']['title'], $data['ShopProductAttribute']['title']);

		try {
			$this->ShopProductAttribute->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Shop Product Attribute 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ShopProductAttribute->view('shopproductattribute-1');
		$this->assertTrue(isset($result['ShopProductAttribute']));
		$this->assertEqual($result['ShopProductAttribute']['id'], 'shopproductattribute-1');

		try {
			$result = $this->ShopProductAttribute->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Shop Product Attribute 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ShopProductAttribute->validateAndDelete('invalidShopProductAttributeId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Shop Product Attribute');
		}
		try {
			$postData = array(
				'ShopProductAttribute' => array(
					'confirm' => 0));
			$result = $this->ShopProductAttribute->validateAndDelete('shopproductattribute-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Shop Product Attribute');
		}

		$postData = array(
			'ShopProductAttribute' => array(
				'confirm' => 1));
		$result = $this->ShopProductAttribute->validateAndDelete('shopproductattribute-1', $postData);
		$this->assertTrue($result);
	}
	
}
