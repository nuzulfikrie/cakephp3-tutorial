<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PeoplesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

       
    }

    public function darabDua(int $number): int 
    {   //$this=>Peoples?
        $this->getTable()->find('all')->first()
        //dd($number);
        return $number*2;
    }
}
