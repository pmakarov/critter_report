<?php
App::uses('AppModel', 'Model');
/**
 * Teacher Model
 *
 * @property Room $Room
 * @property EmployeeType $EmployeeType
 * @property DaycareCenter $DaycareCenter
 */
class Teacher extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Room' => array(
			'className' => 'Room',
			'foreignKey' => 'room_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EmployeeType' => array(
			'className' => 'EmployeeType',
			'foreignKey' => 'employee_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DaycareCenter' => array(
			'className' => 'DaycareCenter',
			'foreignKey' => 'daycare_center_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
