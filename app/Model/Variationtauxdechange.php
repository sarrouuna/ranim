<?php
App::uses('AppModel', 'Model');
/**
 * Variationtauxdechange Model
 *
 * @property Reglement $Reglement
 * @property Fournisseur $Fournisseur
 * @property Importation $Importation
 */
class Variationtauxdechange extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Reglement' => array(
			'className' => 'Reglement',
			'foreignKey' => 'reglement_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Fournisseur' => array(
			'className' => 'Fournisseur',
			'foreignKey' => 'fournisseur_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Importation' => array(
			'className' => 'Importation',
			'foreignKey' => 'importation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
