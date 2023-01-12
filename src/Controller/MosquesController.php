<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class MosquesController extends AppController
    {
        public function index(int $number) //index action  'peoples/index' 'peoples'.
        {
            $result = $this->Mosques->darabDua($number);
    
            $this->set('result',$result);
    
        }
    
    
        public function create()//create 'peoples/create
        {
    
        }
    }