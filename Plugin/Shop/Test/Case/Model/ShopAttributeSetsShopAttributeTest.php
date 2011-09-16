<?php
/* ShopAttributeSetsShopAttribute Test cases generated on: 2011-09-16 11:09:19 : 1316172739*/
App::import('Model', 'Shop.ShopAttributeSetsShopAttribute');

App::import('Lib', 'Templates.AppTestCase');
/**
 * @property ShopAttributeSetsShopAttribute $ShopAttributeSetsShopAttribute
 * @property array $record
 */
class ShopAttributeSetsShopAttributeTestCase extends AppTestCase {
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
		$this->ShopAttributeSetsShopAttribute = ClassRegistry::init('ShopAttributeSetsShopAttribute');
		$fixture = new ShopAttributeSetsShopAttributeFixture();
		$this->record = array('ShopAttributeSetsShopAttribute' => $fixture->records[0]);
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
		unset($this->ShopAttributeSetsShopAttribute);
		ClassRegistry::flush();
	}

/**
 * Test validation rules
 *
 * @return void
 * @access public
 */
	public function testValidation() {
		$this->assertValid($this->ShopAttributeSetsShopAttribute, $this->record);

		// Test mandatory fields
		$data = array('ShopAttributeSetsShopAttribute' => array('id' => 'new-id'));
		$expectedErrors = array(); // TODO Update me with mandatory fields
		$this->assertValidationErrors($this->ShopAttributeSetsShopAttribute, $data, $expectedErrors);

		// TODO Add your specific tests below
		$data = $this->record;
		//$data[ShopAttributeSetsShopAttribute]['title'] = str_pad('too long', 1000);
		//$expectedErrors = array('title');
		$this->assertValidationErrors($this->ShopAttributeSetsShopAttribute, $data, $expectedErrors);
	}

/**
 * Test adding a Shop Attribute Sets Shop Attribute 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ShopAttributeSetsShopAttribute']['id']);
		$result = $this->ShopAttributeSetsShopAttribute->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ShopAttributeSetsShopAttribute']['id']);
			//unset($data['ShopAttributeSetsShopAttribute']['title']);
			$result = $this->ShopAttributeSetsShopAttribute->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Shop Attribute Sets Shop Attribute 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ShopAttributeSetsShopAttribute->edit('shopattributesetsshopattribute-1', null);

		$expected = $this->ShopAttributeSetsShopAttribute->read(null, 'shopattributesetsshopattribute-1');
		$this->assertEqual($result['ShopAttributeSetsShopAttribute'], $expected['ShopAttributeSetsShopAttribute']);

		// put invalidated data here
		$data = $this->record;
		//$data['ShopAttributeSetsShopAttribute']['title'] = null;

		$result = $this->ShopAttributeSetsShopAttribute->edit('shopattributesetsshopattribute-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ShopAttributeSetsShopAttribute->edit('shopattributesetsshopattribute-1', $data);
		$this->assertTrue($result);

		$result = $this->ShopAttributeSetsShopAttribute->read(null, 'shopattributesetsshopattribute-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ShopAttributeSetsShopAttribute']['title'], $data['ShopAttributeSetsShopAttribute']['title']);

		try {
			$this->ShopAttributeSetsShopAttribute->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Shop Attribute Sets Shop Attribute 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ShopAttributeSetsShopAttribute->view('shopattributesetsshopattribute-1');
		$this->assertTrue(isset($result['ShopAttributeSetsShopAttribute']));
		$this->assertEqual($result['ShopAttributeSetsShopAttribute']['id'], 'shopattributesetsshopattribute-1');

		try {
			$result = $this->ShopAttributeSetsShopAttribute->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Shop Attribute Sets Shop Attribute 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ShopAttributeSetsShopAttribute->validateAndDelete('invalidShopAttributeSetsShopAttributeId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Shop Attribute Sets Shop Attribute');
		}
		try {
			$postData = array(
				'ShopAttributeSetsShopAttribute' => array(
					'confirm' => 0));
			$result = $this->ShopAttributeSetsShopAttribute->validateAndDelete('shopattributesetsshopattribute-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Shop Attribute Sets Shop Attribute');
		}

		$postData = array(
			'ShopAttributeSetsShopAttribute' => array(
				'confirm' => 1));
		$result = $this->ShopAttributeSetsShopAttribute->validateAndDelete('shopattributesetsshopattribute-1', $postData);
		$this->assertTrue($result);
	}
	
}
