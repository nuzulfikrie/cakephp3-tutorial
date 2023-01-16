<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboards Controller
 *
 *
 * @method \App\Model\Entity\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->setLayout(false);
        $this->render(null, null);

        return $this->response->withStringBody('Hello World')->withStatus(200);
    }
}
