<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Staff Controller
 *
 * @property \App\Model\Table\StaffTable $Staff
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StaffController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $staff = $this->paginate($this->Staff);

        $this->set(compact('staff'));
    }

    /**
     * View method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staff = $this->Staff->get($id, ['contain' => ['Roles']]);

        $this->set(compact('staff'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staff = $this->Staff->newEmptyEntity();
        if ($this->request->is('post')) {
            $staff = $this->Staff->patchEntity($staff, $this->request->getData(), ['associated' => ['Roles']]);
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $roles = $this->Staff->Roles->find('list', limit: 200)->all();
        $this->set(compact('staff', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staff = $this->Staff->get($id, [
            'contain' => ['Roles'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staff = $this->Staff->patchEntity(
                $staff,
                $this->request->getData(),
                ['associated' => ['Roles']]
            );
            if ($this->Staff->save($staff)) {
                $this->Flash->success(__('The staff has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff could not be saved. Please, try again.'));
        }
        $roles = $this->Staff->Roles->find('list', limit: 200)->all();
        $this->set(compact('staff', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staff = $this->Staff->get($id);
        if ($this->Staff->delete($staff)) {
            $this->Flash->success(__('The staff has been deleted.'));
        } else {
            $this->Flash->error(__('The staff could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
