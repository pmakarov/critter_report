<?php
/**
 * ReportFixture
 *
 */
class ReportFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'child_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'room_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'daycare_center_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'daily_activity' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'needed_iterms' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'attitude' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sleep' => array('type' => 'integer', 'null' => false, 'default' => null),
		'breakfast' => array('type' => 'integer', 'null' => false, 'default' => null),
		'lunch' => array('type' => 'integer', 'null' => false, 'default' => null),
		'snack' => array('type' => 'integer', 'null' => false, 'default' => null),
		'potty' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'notes' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'child_id' => 1,
			'room_id' => 1,
			'daycare_center_id' => 1,
			'date' => '2013-02-27',
			'daily_activity' => 'Lorem ipsum dolor sit amet',
			'needed_iterms' => 'Lorem ipsum dolor sit amet',
			'attitude' => 'Lorem ipsum dolor sit amet',
			'sleep' => 1,
			'breakfast' => 1,
			'lunch' => 1,
			'snack' => 1,
			'potty' => 'Lorem ipsum dolor sit amet',
			'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
