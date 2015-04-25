<?php
App::uses('AppController', 'Controller');
/**
 * Comics Controller
 *
 * @property Comic $Comic
 */
class ComicsController extends AppController {


	public function beforefilter() {
		parent::beforefilter();
		$this->Auth->allow(array('view', 'index'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comic->recursive = 0;
		$this->paginate['conditions']['active'] = 1;
		$this->paginate['limit'] = 80;
		$this->paginate['order']['post_date'] = 'asc';
		$this->set('comics', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null,$lang='en') {
		if (!$this->Comic->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid comic'));
		}
		
		$comic = $this->Comic->find('first', array(
			'conditions' => array('Comic.' . $this->Comic->primaryKey => $id)
		));
		
		$prev = $this->Comic->find('first', array(
			'fields' => array('id','title'),
			'conditions' => array(
				'post_date <' => $comic['Comic']['post_date'],
				'active' => 1,
			),
			'order' => array(
				'post_date' => 'desc'
			),
		));
		$next = $this->Comic->find('first', array(
			'fields' => array('id','title'),
			'conditions' => array(
				'post_date >' => $comic['Comic']['post_date'],
				'active' => 1,
			),
			'order' => array(
				'post_date' => 'asc'
			),
		));
		$first = $this->Comic->find('first', array(
			'fields' => array('id','title'),
			'conditions' => array(
				'active' => 1,
			),
			'order' => array(
				'post_date' => 'asc'
			),
		));
		$last = $this->Comic->find('first', array(
			'fields' => array('id','title'),
			'conditions' => array(
				'active' => 1,
			),
			'order' => array(
				'post_date' => 'desc'
			),
		));
		
		$this->set(compact('comic','prev','next','first','last','lang'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Comic->recursive = 0;
		$this->set('comics', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Comic->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid comic'));
		}
		$options = array('conditions' => array('Comic.' . $this->Comic->primaryKey => $id));
		$this->set('comic', $this->Comic->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Comic->create();
			if ($this->Comic->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The comic has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The comic could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Comic->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid comic'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comic->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The comic has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The comic could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Comic.' . $this->Comic->primaryKey => $id));
			$this->request->data = $this->Comic->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Comic->id = $id;
		if (!$this->Comic->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid comic'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comic->delete()) {
			$this->Session->setFlash(__d('croogo', 'Comic deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Comic was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
