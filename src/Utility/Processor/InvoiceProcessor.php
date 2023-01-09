<?php
declare(strict_types=1);

namespace App\Utility\Processor;

use App\Utility\AbstractUtility;

class InvoiceProcessor extends AbstractUtility{

    public static function toUpperCase($string){
        return strtoupper($string);

    }

    public function process()
    {
        return;
    }
}
