<?php

namespace App\Controller;

use Cake\Controller\Controller;

class FormsController extends Controller
{
    public function index()
    {
        if($this->request->is('post')){
            
            $name = $this->request->getData('name');
            $email = $this->request->getData('email');

            

            \Cake\Log\Log::debug($name, $email);
        }
    }
}
