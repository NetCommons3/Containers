<?php
/**
 * Container Model
 *
 * @property Box $Box
 * @property Page $Page
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('ContainersAppModel', 'Containers.Model');

/**
 * Summary for Container Model
 */
class Container extends ContainersAppModel {

/**
 * constant value
 */
	const TYPE_HEADER = '1';
	const TYPE_MAJOR = '2';
	const TYPE_MAIN = '3';
	const TYPE_MINOR = '4';
	const TYPE_FOOTER = '5';

/**
 * Default behaviors
 *
 * @var array
 */
	public $actsAs = array('Containable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array();

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Box' => array(
			'className' => 'Boxes.Box',
			'foreignKey' => 'container_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Page' => array(
			'className' => 'Page',
			'joinTable' => 'containers_pages',
			'foreignKey' => 'container_id',
			'associationForeignKey' => 'page_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

/**
 * Called during validation operations, before validation. Please note that custom
 * validation rules can be defined in $validate.
 *
 * @param array $options Options passed from Model::save().
 * @return bool True if validate operation should continue, false to abort
 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#beforevalidate
 * @see Model::save()
 */
	public function beforeValidate($options = array()) {
		$this->validate = Hash::merge(array(
			'type' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
				),
			),
		), $this->validate);

		return parent::beforeValidate($options);
	}

/**
 * Get container with frame
 *
 * @param string $id Container ID
 * @return array
 */
	public function getContainerWithFrame($id) {
		$query = array(
			'conditions' => array(
				'Container.id' => $id
			),
			'contain' => array(
				'Box' => $this->Box->getContainableQueryAssociatedPage(),
				'Page' => array(
					//'conditions' => array(
					//	// It must check settingmode and page_id
					//	'ContainersPage.is_published' => true
					//)
				)
			)
		);

		return $this->find('first', $query);
	}

}
