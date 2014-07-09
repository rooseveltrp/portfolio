<?php
App::uses('CodeSamplesController', 'Controller');

/**
 * CodeSamplesController Test Case
 *
 */
class CodeSamplesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
//		'app.code_sample'
	);

/**
 * testModels method
 *
 * @return void
 */
	public function testModels() {
		$this->markTestIncomplete('testModels not implemented.');
	}

/**
 * testGetSource method
 *
 * @return void
 */
	public function testGetSource() {
		$result = $this->testAction("/codesamples/getsource/controller/codesamples1", array(
            "return" => "contents"
        ));
        $this->assertTextContains("The requested file is not valid", $result);

        $resultTwo = $this->testAction("/codesamples/getsource/Controller/CodeSamples", array(
            "return" => "contents"
        ));
        $this->assertTextContains("class CodeSamplesController extends AppController", $resultTwo);
	}

}
