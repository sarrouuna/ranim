<?php
App::uses('AppModel', 'Model');
/**
 * Lien Model
 *
 * @property Utilisateurmenu $Utilisateurmenu
 */
class Lien extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Utilisateurmenu' => array(
			'className' => 'Utilisateurmenu',
			'foreignKey' => 'utilisateurmenu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
