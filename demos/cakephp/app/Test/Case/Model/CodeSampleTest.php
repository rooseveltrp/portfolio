<?php
App::uses('CodeSample', 'Model');

/**
 * CodeSample Test Case
 *
 */
class CodeSampleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
//		'app.code_sample'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CodeSample = ClassRegistry::init('CodeSample');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CodeSample);

		parent::tearDown();
	}

/**
 * testFileAllowed method
 *
 * @return void
 */
	public function testFileAllowed() {
        $this->assertEqual($this->CodeSample->fileAllowed("Controller", "CodeSamples"), true);
        $this->assertEqual($this->CodeSample->fileAllowed("Controller", "CodeSamples1"), false);
	}

/**
 * testGetSource method
 *
 * @return void
 */
	public function testGetSource() {
        $this->assertEqual($this->CodeSample->getSource("Controller", "CodeSamples1"), false);
        $this->assertTextContains("class CodeSamplesController extends AppController", $this->CodeSample->getSource("Controller", "CodeSamples"));
	}

}
