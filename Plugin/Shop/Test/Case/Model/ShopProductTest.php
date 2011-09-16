<?php
/* ShopProduct Test cases generated on: 2011-09-16 13:09:02 : 1316178242*/
App::import('Model', 'Shop.ShopProduct');

App::import('Lib', 'Templates.AppTestCase');
/**
 * @property ShopProduct $ShopProduct
 * @property array $record
 */
class ShopProductTestCase extends AppTestCase {
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
		$this->ShopProduct = ClassRegistry::init('ShopProduct');
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
		unset($this->ShopProduct);
		ClassRegistry::flush();
	}

/**
 * Test validation rules
 *
 * @return void
 * @access public
 */
	public function testValidation() {
		$this->assertValid($this->ShopProduct, $this->record);

		// Test mandatory fields
		$data = array('ShopProduct' => array('id' => 'new-id'));
		$expectedErrors = array(); // TODO Update me with mandatory fields
		$this->assertValidationErrors($this->ShopProduct, $data, $expectedErrors);

		// TODO Add your specific tests below
		$data = $this->record;
		//$data[ShopProduct]['title'] = str_pad('too long', 1000);
		//$expectedErrors = array('title');
		$this->assertValidationErrors($this->ShopProduct, $data, $expectedErrors);
	}

/**
 * Test adding a Shop Product 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ShopProduct']['id']);
		$result = $this->ShopProduct->add(99, $data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ShopProduct']['id']);
			//unset($data['ShopProduct']['title']);
			$result = $this->ShopProduct->add(99, $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Shop Product 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ShopProduct->edit('shopproduct-1', null);

		$expected = $this->ShopProduct->read(null, 'shopproduct-1');
		$this->assertEqual($result['ShopProduct'], $expected['ShopProduct']);

		// put invalidated data here
		$data = $this->record;
		//$data['ShopProduct']['title'] = null;

		$result = $this->ShopProduct->edit('shopproduct-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ShopProduct->edit('shopproduct-1', $data);
		$this->assertTrue($result);

		$result = $this->ShopProduct->read(null, 'shopproduct-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ShopProduct']['title'], $data['ShopProduct']['title']);

		try {
			$this->ShopProduct->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Shop Product 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ShopProduct->view('first_shop_product');
		$this->assertTrue(isset($result['ShopProduct']));
		$this->assertEqual($result['ShopProduct']['id'], 'shopproduct-1');

		try {
			$result = $this->ShopProduct->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Shop Product 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ShopProduct->validateAndDelete('invalidShopProductId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Shop Product');
		}
		try {
			$postData = array(
				'ShopProduct' => array(
					'confirm' => 0));
			$result = $this->ShopProduct->validateAndDelete('shopproduct-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Shop Product');
		}

		$postData = array(
			'ShopProduct' => array(
				'confirm' => 1));
		$result = $this->ShopProduct->validateAndDelete('shopproduct-1', $postData);
		$this->assertTrue($result);
	}
	
}
