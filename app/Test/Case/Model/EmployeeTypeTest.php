<?php
App::uses('EmployeeType', 'Model');

/**
 * EmployeeType Test Case
 *
 */
class EmployeeTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.employee_type',
		'app.teacher',
		'app.room',
		'app.daycare_center',
		'app.child',
		'app.guardian',
		'app.children_guardian',
		'app.report',
		'app.reports_teacher'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EmployeeType = ClassRegistry::init('EmployeeType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EmployeeType);

		parent::tearDown();
	}

}
