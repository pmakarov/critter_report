<?php
App::uses('AppModel', 'Model');
/**
 * Guardian Model
 *
 */
class Guardian extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'last_name';


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Child' => array(
			'className' => 'Child',
			'joinTable' => 'children_guardians',
			'foreignKey' => 'guardian_id',
			'associationForeignKey' => 'child_id',
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
