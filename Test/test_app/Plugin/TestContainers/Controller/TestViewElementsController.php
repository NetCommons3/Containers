<?php
/**
 * View/Elements/render_containersテスト用Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppController', 'Controller');

/**
 * View/Elements/render_containersテスト用Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Containers\Test\test_app\Plugin\Containers\Controller
 */
class TestViewElementsController extends AppController {

/**
 * use component
 *
 * @var array
 */
	public $components = array(
		'Pages.PageLayout',
	);

/**
 * uses
 *
 * @var array
 */
	public $uses = array(
		'Containers.Container'
	);

/**
 * beforeRender
 *
 * @return void
 */
	public function beforeRender() {
		parent::beforeFilter();
		$this->Auth->allow('render_containers');
	}

/**
 * render_containers
 *
 * @param int $id Containers.id
 * @return void
 */
	public function render_containers($id = null) {
		$this->autoRender = true;

		$result = $this->Container->getContainerWithFrame($id);

		$containers = array($result['Container']['type'] => $result['Container']);
		$boxes = Hash::combine($result['Box'], '{n}.id', '{n}', '{n}.container_id');
		$this->set('containers', $containers);
		$this->set('boxes', $boxes);
	}

}
