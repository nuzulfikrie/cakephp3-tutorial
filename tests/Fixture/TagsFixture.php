<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TagsFixture
 */
class TagsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'title' => ['type' => 'string', 'length' => 191, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'title' => ['type' => 'unique', 'columns' => ['title'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-01-02 04:47:12',
                'modified' => '2023-01-02 04:47:12',
            ],
            [
                'id' => 2,
                'title' => 'tag two',
                'created' => '2023-01-02 04:47:12',
                'modified' => '2023-01-02 04:47:12',
            ],
            [
                'id' => 3,
                'title' => 'tag three',
                'created' => '2023-01-02 04:47:12',
                'modified' => '2023-01-02 04:47:12',
            ],
            [
                'id' => 4,
                'title' => 'tag four',
                'created' => '2023-01-02 04:47:12',
                'modified' => '2023-01-02 04:47:12',
            ],
            [
                'id' => 5,
                'title' => 'tag five',
                'created' => '2023-01-02 04:47:12',
                'modified' => '2023-01-02 04:47:12',
            ],
        ];
        parent::init();
    }
}
