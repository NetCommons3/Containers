<?php
/**
 * ContainersPage Model
 *
 * @property Page $Page
 * @property Container $Container
 *
 * @copyright Copyright 2014, NetCommons Project
 * @author Kohei Teraguchi <kteraguchi@commonsnet.org>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('PagesAppModel', 'Pages.Model');

/**
 * Summary for ContainersPage Model
 */
class ContainersPage extends PagesAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array();

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Page' => array(
			'className' => 'Pages.Page',
			'foreignKey' => 'page_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Container' => array(
			'className' => 'Containers.Container',
			'foreignKey' => 'container_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
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
//	public function beforeValidate($options = array()) {
//		$this->validate = Hash::merge(array(
//			'page_id' => array(
//				'numeric' => array(
//					'rule' => array('numeric'),
//					'message' => __d('net_commons', 'Invalid request.'),
//				),
//			),
//			'container_id' => array(
//				'numeric' => array(
//					'rule' => array('numeric'),
//					'message' => __d('net_commons', 'Invalid request.'),
//				),
//			),
//			'is_published' => array(
//				'boolean' => array(
//					'rule' => array('boolean'),
//					'message' => __d('net_commons', 'Invalid request.'),
//				),
//			),
//			'is_configured' => array(
//				'boolean' => array(
//					'rule' => array('boolean'),
//					'message' => __d('net_commons', 'Invalid request.'),
//				),
//			),
//		), $this->validate);
//
//		return parent::beforeValidate($options);
//	}

/**
 * Save page each association model
 *
 * @param array $data request data
 * @throws InternalErrorException
 * @return mixed On success Model::$data if its not empty or true, false on failure
 */
//	public function saveContainersPage($data) {
//		//トランザクションBegin
//		$this->begin();
//
//		if (! $this->validateMany($data['ContainersPage'])) {
//			return false;
//		}
//		try {
//			if (! $this->saveMany($data['ContainersPage'], ['validate' => false])) {
//				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
//			}
//
//			if (Hash::get($data, 'ChildPage.id')) {
//				$childPageId = explode(',', Hash::get($data, 'ChildPage.id', ''));
//
//				$containerPages = Hash::get($data, 'ContainersPage');
//				$containerTypes = array(
//					Container::TYPE_HEADER, Container::TYPE_MAJOR, Container::TYPE_MINOR, Container::TYPE_FOOTER
//				);
//				foreach ($containerTypes as $containerType) {
//					$updated = array(
//						'ContainersPage.is_published' => Hash::get(
//							$containerPages, $containerType . '.ContainersPage.is_published', true
//						),
//					);
//					$conditions = array(
//						'ContainersPage.is_configured' => false,
//						'ContainersPage.page_id' => $childPageId,
//						'ContainersPage.container_id' => Hash::get(
//							$containerPages, $containerType . '.ContainersPage.container_id'
//						),
//					);
//
//					$result = $this->updateAll($updated, $conditions);
//					if (! $result) {
//						throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
//					}
//				}
//			}
//
//			$this->commit();
//
//		} catch (Exception $ex) {
//			$this->rollback($ex);
//		}
//
//		return true;
//	}
}
