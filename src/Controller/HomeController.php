<?php

namespace App\Controller;

use Cake\Controller\Controller;

class HomeController extends AppController
{
    public function index()
    {
        return $this->response->withStringBody('Hello World')->withStatusCode(200);
    }
}
