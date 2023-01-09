<?php
namespace App\Controller;

use App\Controller\AppController;
use DebugKit\Database\Log\DebugLog;

/**
 * Peoples Controller
*/
class PeoplesController extends AppController
{
    public function index(int $number) //index action  'peoples/index' 'peoples'.
    {
        $result = $this->Peoples->darabDua($number);

        $this->set('result',$result);

    }


    public function create()//create 'peoples/create hantar form data 
    {


          $this->request->allowMethod(['post']);

          if($this->request->is('post')){
            $data = $this->request->getData();
    

            \Cake\Log\Log::debug($data);

          }
    }
}