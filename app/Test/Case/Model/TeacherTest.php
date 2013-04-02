<?php
App::uses('Teacher', 'Model');

/**
 * Teacher Test Case
 *
 */
class TeacherTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.teacher',
		'app.room',
		'app.daycare_center',
		'app.child',
		'app.guardian',
		'app.children_guardian',
		'app.report',
		'app.student',
		'app.reports_teacher',
		'app.employee_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Teacher = ClassRegistry::init('Teacher');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Teacher);

		parent::tearDown();
	}

}
