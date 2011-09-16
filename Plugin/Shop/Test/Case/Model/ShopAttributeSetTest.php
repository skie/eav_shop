<?php
/* ShopAttributeSet Test cases generated on: 2011-09-16 11:09:15 : 1316172735*/
App::import('Model', 'Shop.ShopAttributeSet');

App::import('Lib', 'Templates.AppTestCase');
/**
 * @property ShopAttributeSet $ShopAttributeSet
 * @property array $record
 */
class ShopAttributeSetTestCase extends AppTestCase {
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
		$this->ShopAttributeSet = ClassRegistry::init('ShopAttributeSet');
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
		unset($this->ShopAttributeSet);
		ClassRegistry::flush();
	}

/**
 * Test validation rules
 *
 * @return void
 * @access public
 */
	public function testValidation() {
		$this->assertValid($this->ShopAttributeSet, $this->record);

		// Test mandatory fields
		$data = array('ShopAttributeSet' => array('id' => 'new-id'));
		$expectedErrors = array(); // TODO Update me with mandatory fields
		$this->assertValidationErrors($this->ShopAttributeSet, $data, $expectedErrors);

		// TODO Add your specific tests below
		$data = $this->record;
		//$data[ShopAttributeSet]['title'] = str_pad('too long', 1000);
		//$expectedErrors = array('title');
		$this->assertValidationErrors($this->ShopAttributeSet, $data, $expectedErrors);
	}

/**
 * Test adding a Shop Attribute Set 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ShopAttributeSet']['id']);
		$result = $this->ShopAttributeSet->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ShopAttributeSet']['id']);
			//unset($data['ShopAttributeSet']['title']);
			$result = $this->ShopAttributeSet->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Shop Attribute Set 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ShopAttributeSet->edit('shopattributeset-1', null);

		$expected = $this->ShopAttributeSet->read(null, 'shopattributeset-1');
		$this->assertEqual($result['ShopAttributeSet'], $expected['ShopAttributeSet']);

		// put invalidated data here
		$data = $this->record;
		//$data['ShopAttributeSet']['title'] = null;

		$result = $this->ShopAttributeSet->edit('shopattributeset-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ShopAttributeSet->edit('shopattributeset-1', $data);
		$this->assertTrue($result);

		$result = $this->ShopAttributeSet->read(null, 'shopattributeset-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ShopAttributeSet']['title'], $data['ShopAttributeSet']['title']);

		try {
			$this->ShopAttributeSet->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Shop Attribute Set 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ShopAttributeSet->view('shopattributeset-1');
		$this->assertTrue(isset($result['ShopAttributeSet']));
		$this->assertEqual($result['ShopAttributeSet']['id'], 'shopattributeset-1');

		try {
			$result = $this->ShopAttributeSet->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Shop Attribute Set 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ShopAttributeSet->validateAndDelete('invalidShopAttributeSetId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Shop Attribute Set');
		}
		try {
			$postData = array(
				'ShopAttributeSet' => array(
					'confirm' => 0));
			$result = $this->ShopAttributeSet->validateAndDelete('shopattributeset-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Shop Attribute Set');
		}

		$postData = array(
			'ShopAttributeSet' => array(
				'confirm' => 1));
		$result = $this->ShopAttributeSet->validateAndDelete('shopattributeset-1', $postData);
		$this->assertTrue($result);
	}
	
}
