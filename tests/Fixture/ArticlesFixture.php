<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticlesFixture
 */
class ArticlesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'title' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'slug' => ['type' => 'string', 'length' => 191, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'body' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null],
        'published' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'user_key' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'slug' => ['type' => 'unique', 'columns' => ['slug'], 'length' => []],
            'articles_ibfk_1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'user_id' => 1,
                'title' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'published' => 1,
                'created' => '2023-01-02 04:46:14',
                'modified' => '2023-01-02 04:46:14',
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'title' => 'title two',
                'slug' => 'title-two',
                'body' => 'This is test article here, please wait.',
                'published' => 1,
                'created' => '2023-01-02 04:46:14',
                'modified' => '2023-01-02 04:46:14',
            ],            [
                'id' => 3,
                'user_id' => 1,
                'title' => 'title three',
                'slug' => 'title-three',
                'body' => 'Lorem ipsum dsdfsf  sdfd sd sdfsdfdfdsfsddfsdolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'published' => 1,
                'created' => '2023-01-02 04:46:14',
                'modified' => '2023-01-02 04:46:14',
            ],            [
                'id' => 4,
                'user_id' => 1,
                'title' => 'title four',
                'slug' => 'title-four',
                'body' => 'A status badge shows whether a workflow is currently failing or passing. A common place to add a status badge is in the README.md file of your repository, but you can add it to any web page you\'d like. By default, badges display the status of your default branch. You can also display the status of a workflow run for a specific branch or event using the branch and event query parameters in the URL.',
                'published' => 1,
                'created' => '2023-01-02 04:46:14',
                'modified' => '2023-01-02 04:46:14',
            ],            [
                'id' => 5,
                'user_id' => 1,
                'title' => 'title five',
                'slug' => 'title-five',
                'body' => 'GitHub sets default variables for each GitHub Actions workflow run. You can also set custom variables for use in a single workflow or multiple workflows. ',
                'published' => 1,
                'created' => '2023-01-02 04:46:14',
                'modified' => '2023-01-02 04:46:14',
            ],
        ];
        parent::init();
    }
}
