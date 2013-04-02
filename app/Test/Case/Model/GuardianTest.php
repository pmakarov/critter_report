<?php
App::uses('Guardian', 'Model');

/**
 * Guardian Test Case
 *
 */
class GuardianTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.guardian'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Guardian = ClassRegistry::init('Guardian');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Guardian);

		parent::tearDown();
	}

}
