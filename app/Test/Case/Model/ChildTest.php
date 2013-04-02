<?php
App::uses('Child', 'Model');

/**
 * Child Test Case
 *
 */
class ChildTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.child',
		'app.daycare_center',
		'app.report',
		'app.student',
		'app.room',
		'app.teacher',
		'app.employee_type',
		'app.reports_teacher',
		'app.guardian',
		'app.children_guardian'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Child = ClassRegistry::init('Child');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Child);

		parent::tearDown();
	}

}
