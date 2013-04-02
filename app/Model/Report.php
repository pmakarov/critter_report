<?php
App::uses('AppModel', 'Model');
/**
 * Report Model
 *
 * @property Child $Child
 * @property Room $Room
 * @property DaycareCenter $DaycareCenter
 * @property Teacher $Teacher
 */
class Report extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'child_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Child' => array(
			'className' => 'Child',
			'foreignKey' => 'child_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Room' => array(
			'className' => 'Room',
			'foreignKey' => 'room_id',
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

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Teacher' => array(
			'className' => 'Teacher',
			'joinTable' => 'reports_teachers',
			'foreignKey' => 'report_id',
			'associationForeignKey' => 'teacher_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
