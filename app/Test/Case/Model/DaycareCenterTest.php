<?php
App::uses('DaycareCenter', 'Model');

/**
 * DaycareCenter Test Case
 *
 */
class DaycareCenterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.daycare_center',
		'app.child',
		'app.room',
		'app.parent1',
		'app.parent2',
		'app.report',
		'app.teacher'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DaycareCenter = ClassRegistry::init('DaycareCenter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DaycareCenter);

		parent::tearDown();
	}

}
