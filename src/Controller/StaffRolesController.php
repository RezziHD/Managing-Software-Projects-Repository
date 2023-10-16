<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StaffRoles Controller
 *
 * @property \App\Model\Table\StaffRolesTable $StaffRoles
 */
class StaffRolesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->StaffRoles->find()
            ->contain(['Staff', 'Roles']);
        $staffRoles = $this->paginate($query);

        $this->set(compact('staffRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id Staff Role id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $staffRole = $this->StaffRoles->get($id, contain: ['Staff', 'Roles']);
        $this->set(compact('staffRole'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $staffRole = $this->StaffRoles->newEmptyEntity();
        if ($this->request->is('post')) {
            $staffRole = $this->StaffRoles->patchEntity($staffRole, $this->request->getData());
            if ($this->StaffRoles->save($staffRole)) {
                $this->Flash->success(__('The staff role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff role could not be saved. Please, try again.'));
        }
        $staff = $this->StaffRoles->Staff->find('list', limit: 200)->all();
        $roles = $this->StaffRoles->Roles->find('list', limit: 200)->all();
        $this->set(compact('staffRole', 'staff', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Staff Role id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $staffRole = $this->StaffRoles->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $staffRole = $this->StaffRoles->patchEntity($staffRole, $this->request->getData());
            if ($this->StaffRoles->save($staffRole)) {
                $this->Flash->success(__('The staff role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The staff role could not be saved. Please, try again.'));
        }
        $staff = $this->StaffRoles->Staff->find('list', limit: 200)->all();
        $roles = $this->StaffRoles->Roles->find('list', limit: 200)->all();
        $this->set(compact('staffRole', 'staff', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Staff Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $staffRole = $this->StaffRoles->get($id);
        if ($this->StaffRoles->delete($staffRole)) {
            $this->Flash->success(__('The staff role has been deleted.'));
        } else {
            $this->Flash->error(__('The staff role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
