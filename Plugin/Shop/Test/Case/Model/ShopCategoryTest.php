<?php
/* ShopCategory Test cases generated on: 2011-09-16 09:09:41 : 1316167001*/
App::import('Model', 'Shop.ShopCategory');

App::import('Lib', 'Templates.AppControllerTestCase');
class ShopCategoryTestCase extends AppControllerTestCase {
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
		$this->ShopCategory = ClassRegistry::init('ShopCategory');
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
		unset($this->ShopCategory);
		ClassRegistry::flush();
	}

/**
 * Test validation rules
 *
 * @return void
 * @access public
 */
	public function testValidation() {
		$this->assertValid($this->ShopCategory, $this->record);

		// Test mandatory fields
		$data = array('ShopCategory' => array('id' => 'new-id'));
		$expectedErrors = array(); // TODO Update me with mandatory fields
		$this->assertValidationErrors($this->ShopCategory, $data, $expectedErrors);

		// TODO Add your specific tests below
		$data = $this->record;
		//$data[ShopCategory]['title'] = str_pad('too long', 1000);
		//$expectedErrors = array('title');
		$this->assertValidationErrors($this->ShopCategory, $data, $expectedErrors);
	}

/**
 * Test adding a Shop Category 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ShopCategory']['id']);
		$result = $this->ShopCategory->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ShopCategory']['id']);
			//unset($data['ShopCategory']['title']);
			$result = $this->ShopCategory->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Shop Category 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ShopCategory->edit('shopcategory-1', null);

		$expected = $this->ShopCategory->read(null, 'shopcategory-1');
		$this->assertEqual($result['ShopCategory'], $expected['ShopCategory']);

		// put invalidated data here
		$data = $this->record;
		//$data['ShopCategory']['title'] = null;

		$result = $this->ShopCategory->edit('shopcategory-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ShopCategory->edit('shopcategory-1', $data);
		$this->assertTrue($result);

		$result = $this->ShopCategory->read(null, 'shopcategory-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ShopCategory']['title'], $data['ShopCategory']['title']);

		try {
			$this->ShopCategory->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Shop Category 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ShopCategory->view('shopcategory-1');
		$this->assertTrue(isset($result['ShopCategory']));
		$this->assertEqual($result['ShopCategory']['id'], 'shopcategory-1');

		try {
			$result = $this->ShopCategory->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Shop Category 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ShopCategory->validateAndDelete('invalidShopCategoryId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Shop Category');
		}
		try {
			$postData = array(
				'ShopCategory' => array(
					'confirm' => 0));
			$result = $this->ShopCategory->validateAndDelete('shopcategory-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Shop Category');
		}

		$postData = array(
			'ShopCategory' => array(
				'confirm' => 1));
		$result = $this->ShopCategory->validateAndDelete('shopcategory-1', $postData);
		$this->assertTrue($result);
	}
	
}
