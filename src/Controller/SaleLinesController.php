<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SaleLines Controller
 *
 * @property \App\Model\Table\SaleLinesTable $SaleLines
 */
class SaleLinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->SaleLines->find()
            ->contain(['Sales', 'Products']);
        $saleLines = $this->paginate($query);

        $this->set(compact('saleLines'));
    }

    /**
     * View method
     *
     * @param string|null $id Sale Line id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saleLine = $this->SaleLines->get($id, ['contain'=> ['Sales', 'Products']]);
        $this->set(compact('saleLine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saleLine = $this->SaleLines->newEmptyEntity();
        if ($this->request->is('post')) {
            $saleLine = $this->SaleLines->patchEntity($saleLine, $this->request->getData());
            if ($this->SaleLines->save($saleLine)) {
                $this->Flash->success(__('The sale line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale line could not be saved. Please, try again.'));
        }
        $sales = $this->SaleLines->Sales->find('list', limit: 200)->all();
        $products = $this->SaleLines->Products->find('list', limit: 200)->all();
        $this->set(compact('saleLine', 'sales', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale Line id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saleLine = $this->SaleLines->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saleLine = $this->SaleLines->patchEntity($saleLine, $this->request->getData());
            if ($this->SaleLines->save($saleLine)) {
                $this->Flash->success(__('The sale line has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale line could not be saved. Please, try again.'));
        }
        $sales = $this->SaleLines->Sales->find('list', limit: 200)->all();
        $products = $this->SaleLines->Products->find('list', limit: 200)->all();
        $this->set(compact('saleLine', 'sales', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale Line id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saleLine = $this->SaleLines->get($id);
        if ($this->SaleLines->delete($saleLine)) {
            $this->Flash->success(__('The sale line has been deleted.'));
        } else {
            $this->Flash->error(__('The sale line could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
