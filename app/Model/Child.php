<?php
App::uses('AppModel', 'Model');
/**
 * Child Model
 *
 * @property DaycareCenter $DaycareCenter
 * @property Room $Room
 * @property Guardian $Guardian
 */
class Child extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'last_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DaycareCenter' => array(
			'className' => 'DaycareCenter',
			'foreignKey' => 'daycare_center_id',
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
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Guardian' => array(
			'className' => 'Guardian',
			'joinTable' => 'children_guardians',
			'foreignKey' => 'child_id',
			'associationForeignKey' => 'guardian_id',
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
