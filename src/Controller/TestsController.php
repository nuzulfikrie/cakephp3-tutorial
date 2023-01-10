<?php
namespace App\Controller;

use App\Controller\AppController;

class TestsController extends AppController
{
    public function testPost() {//tests/test-post
        $this->request->allowMethod(['post']);
        if($this->request->is('post')){

          # data here
          $data = $this->request->getData();
          \Cake\Log\Log::debug($data);

        }

    }
    public function testAnother() {//tests/test-another
      $this->request->allowMethod(['post']);
      if($this->request->is('post')){

        # data here
        $data = $this->request->getData();
        \Cake\Log\Log::debug($data);

      }

  }
}