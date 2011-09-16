<?php
/* ShopAttributeOption Test cases generated on: 2011-09-16 11:09:14 : 1316172734*/
App::import('Model', 'Shop.ShopAttributeOption');

App::import('Lib', 'Templates.AppTestCase');
/**
 * @property ShopAttributeOption $ShopAttributeOption
 * @property array $record
 */
class ShopAttributeOptionTestCase extends AppTestCase {
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
		$this->ShopAttributeOption = ClassRegistry::init('ShopAttributeOption');
		$fixture = new ShopAttributeOptionFixture();
		$this->record = array('ShopAttributeOption' => $fixture->records[0]);
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
		unset($this->ShopAttributeOption);
		ClassRegistry::flush();
	}

/**
 * Test validation rules
 *
 * @return void
 * @access public
 */
	public function testValidation() {
		$this->assertValid($this->ShopAttributeOption, $this->record);

		// Test mandatory fields
		$data = array('ShopAttributeOption' => array('id' => 'new-id'));
		$expectedErrors = array(); // TODO Update me with mandatory fields
		$this->assertValidationErrors($this->ShopAttributeOption, $data, $expectedErrors);

		// TODO Add your specific tests below
		$data = $this->record;
		//$data[ShopAttributeOption]['title'] = str_pad('too long', 1000);
		//$expectedErrors = array('title');
		$this->assertValidationErrors($this->ShopAttributeOption, $data, $expectedErrors);
	}

/**
 * Test adding a Shop Attribute Option 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ShopAttributeOption']['id']);
		$result = $this->ShopAttributeOption->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ShopAttributeOption']['id']);
			//unset($data['ShopAttributeOption']['title']);
			$result = $this->ShopAttributeOption->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Shop Attribute Option 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ShopAttributeOption->edit('shopattributeoption-1', null);

		$expected = $this->ShopAttributeOption->read(null, 'shopattributeoption-1');
		$this->assertEqual($result['ShopAttributeOption'], $expected['ShopAttributeOption']);

		// put invalidated data here
		$data = $this->record;
		//$data['ShopAttributeOption']['title'] = null;

		$result = $this->ShopAttributeOption->edit('shopattributeoption-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ShopAttributeOption->edit('shopattributeoption-1', $data);
		$this->assertTrue($result);

		$result = $this->ShopAttributeOption->read(null, 'shopattributeoption-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ShopAttributeOption']['title'], $data['ShopAttributeOption']['title']);

		try {
			$this->ShopAttributeOption->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Shop Attribute Option 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ShopAttributeOption->view('shopattributeoption-1');
		$this->assertTrue(isset($result['ShopAttributeOption']));
		$this->assertEqual($result['ShopAttributeOption']['id'], 'shopattributeoption-1');

		try {
			$result = $this->ShopAttributeOption->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Shop Attribute Option 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ShopAttributeOption->validateAndDelete('invalidShopAttributeOptionId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Shop Attribute Option');
		}
		try {
			$postData = array(
				'ShopAttributeOption' => array(
					'confirm' => 0));
			$result = $this->ShopAttributeOption->validateAndDelete('shopattributeoption-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Shop Attribute Option');
		}

		$postData = array(
			'ShopAttributeOption' => array(
				'confirm' => 1));
		$result = $this->ShopAttributeOption->validateAndDelete('shopattributeoption-1', $postData);
		$this->assertTrue($result);
	}
	
}
