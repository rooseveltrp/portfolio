<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

    public $components = array('Paginator', 'Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow("not_logged_in", "admin_login", "admin_logout");
    }

    public function admin_not_logged_in() {
        $this->set("title", "Welcome!");
        $this->render("not_logged_in");
    }

    public function not_logged_in() {
        $this->set("title", "Welcome!");
    }

    public function admin_login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->_isJson()) {
                    $this->_jsonResp(true, "You have been successfully logged in", $this->Auth->user());
                } else {
                    return $this->redirect($this->Auth->redirect());
                }
            } else {
                $msg = __('Your username or password was incorrect.');
                if ($this->_isJson()) {
                    $this->_jsonResp(false, $msg);
                } else {
                    $this->Session->setFlash($msg);
                }
            }
        }
        $this->set("title", "User Login");
    }

    public function admin_logout() {
        $this->Auth->logout();
        if ($this->_isJson()) {
            $this->_jsonResp(true, "You have been successfully logged out!");
        } else {
            return $this->redirect($this->Auth->redirect());
        }
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
        $records = $this->Paginator->paginate();
		$this->set('users', $records);
        $this->set("title", "Manage Users");
        if ($this->_isJson()) {
            $this->_jsonResp(true, "", Set::classicExtract($records, "{n}.User"));
        }
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
        $this->set("title", "New User");
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
        $this->set("title", "Edit User");
        // todo Create a generic method called setTitle() in the AppController
        // todo replace all instances of $this->set('title... with setTitle();
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
