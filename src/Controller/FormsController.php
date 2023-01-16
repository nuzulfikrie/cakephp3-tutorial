<?php

namespace App\Controller;

use Cake\Controller\Controller;

class FormsController extends Controller
{
    public function index()
    {
        return $this->response->withStringBody('Hello World');
    }
}
