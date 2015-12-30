<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sessions Controller
 *
 * @property \App\Model\Table\SessionsTable $Sessions
 * @property \App\Model\Table\CoursesTable $Courses
 */
class SessionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students']
        ];
        $this->set('sessions', $this->paginate($this->Sessions));
        $this->set('_serialize', ['sessions']);
    }

    /**
     * View method
     *
     * @param string|null $id Session id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => ['Students']
        ]);
        $this->set('session', $session);
        $this->set('_serialize', ['session']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->Sessions->newEntity();
        if ($this->request->is('post')) {
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The session could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Sessions->Courses->find('list', [
            'keyField' => 'date',
            'valueField' => 'date',
            'limit' => 200  ]);
        $students = $this->Sessions->Students->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200]);
        $this->set(compact('session', 'students', 'courses'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Session id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $session = $this->Sessions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $session = $this->Sessions->patchEntity($session, $this->request->data);
            if ($this->Sessions->save($session)) {
                $this->Flash->success(__('The session has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The session could not be saved. Please, try again.'));
            }
        }
        $courses = $this->Sessions->Courses->find('list', [
            'keyField' => 'date',
            'valueField' => 'date',
            'limit' => 200  ]);
        $students = $this->Sessions->Students->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200]);
        $this->set(compact('session', 'students', 'courses'));
        $this->set('_serialize', ['session']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Session id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $session = $this->Sessions->get($id);
        if ($this->Sessions->delete($session)) {
            $this->Flash->success(__('The session has been deleted.'));
        } else {
            $this->Flash->error(__('The session could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function time($id = null)
    {
        $duration = $this->Sessions->find('all', [
            'conditions' => ['Sessions.student_id =' => $id],
            'fields' => ['duration'],
            'limit' => 10
        ]);
        $student = $this->Sessions->Students->get($id);
        $this->set(compact('duration', 'student'));
        $this->set('_serialize', ['duration']);
    }

    public function total()
    {
        $sessions = $this->Sessions->find('all');
        $students = $this->Sessions->Students->find('all');
        $this->set(compact('sessions', 'students'));
        $this->set('_serialize', ['sessions']);
    }
}
