<?php
declare(strict_types=1);

namespace App\Test\TestCase\Utility\Processor;

use App\Utility\Processor\InvoiceProcessor;
use Cake\TestSuite\TestCase;

class InvoiceProcessorTest extends TestCase
{
    public $InvoiceProcessor;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
      
        $this->InvoiceProcessor = new InvoiceProcessor;
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvoiceProcessor);

        parent::tearDown();
    }

    public function testtoUpperCase()
    {
        $test = 'Najmi';

        $expected = 'NAJMI';

        $result = $this->InvoiceProcessor->toUpperCase($test);

        dump($result);
        $this->assertEquals($expected, $result);

    }
}