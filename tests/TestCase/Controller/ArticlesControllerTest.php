<?php

namespace App\Test\TestCase\Controller;

use App\Controller\ArticlesController;
use App\Model\Table\ArticlesTable;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;

/**
 * App\Controller\ArticlesController Test Case
 *
 * @uses \App\Controller\ArticlesController
 */
class ArticlesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Articles',
        'app.Users',
        'app.Tags',
        'app.ArticlesTags',
    ];

    private $ArticlesTable;
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArticlesTable') ? [] : ['className' => ArticlesTable::class];
        $this->ArticlesTable = TableRegistry::getTableLocator()->get('ArticlesTable', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArticlesTable);
        TableRegistry::getTableLocator()->clear();
        parent::tearDown();
    }
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {

        $user = [
            'id' => 2,
            'username' => 'karimronaldo',
            'first_name' => 'Karimronaldo',
            'last_name' => 'Doe',
            'email' => 'name@abe.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'created' => '2023-01-02 04:47:29',
            'modified' => '2023-01-02 04:47:29',
        ];

        $this->session([
            'Auth' => [
                'User' => [
                    $user
                ]
            ]
        ]); // sebab kena logged in
        //'
        $url = ['controller' => 'Articles', 'action' => 'index', 'plugin' => false, 'prefix' => false];
        $this->get($url);
        $this->assertResponseOk();
        //$this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $user = [
            'id' => 2,
            'username' => 'karimronaldo',
            'first_name' => 'Karimronaldo',
            'last_name' => 'Doe',
            'email' => 'name@abe.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'created' => '2023-01-02 04:47:29',
            'modified' => '2023-01-02 04:47:29',
        ];

        $this->session([
            'Auth' => [
                'User' => [
                    $user
                ]
            ]
        ]); // sebab kena logged in
        //'
        $url = ['controller' => 'Articles', 'action' => 'view', 'plugin' => false, 'prefix' => false, 1];

        $this->get($url);
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $user = [
            'id' => 2,
            'username' => 'karimronaldo',
            'first_name' => 'Karimronaldo',
            'last_name' => 'Doe',
            'email' => 'name@abe.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'created' => '2023-01-02 04:47:29',
            'modified' => '2023-01-02 04:47:29',
        ];

        $this->session([
            'Auth' => [
                'User' => [
                    $user
                ]
            ]
        ]); //
        $data = [
            'user_id' => 1,
            'title' => 'xxxxxxxxx',
            'slug' => 'Lorem ipsum dolor sit amet',
            'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis',
            'published' => 1,

        ];


        $url = ['controller' => 'Articles', 'action' => 'add', 'plugin' => false, 'prefix' => false];
        $this->post($url, $data);

        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $user = [
            'id' => 2,
            'username' => 'karimronaldo',
            'first_name' => 'Karimronaldo',
            'last_name' => 'Doe',
            'email' => 'name@abe.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'created' => '2023-01-02 04:47:29',
            'modified' => '2023-01-02 04:47:29',
        ];

        $this->session([
            'Auth' => [
                'User' => [
                    $user
                ]
            ]
        ]); //

        $data = [

            'title' => 'Lorem ipsum dolor sit test',
            'slug' => 'XXXXXXXXXXXXXXXXXX',
            'body' => 'Lorem SDFDFSDFDSFSF gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'published' => 1,

        ];

        $urlEdit = 'articles/edit/1';
        $this->post($urlEdit, $data);

        $this->assertResponseCode(302);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $url = ['controller' => 'Articles', 'action' => 'delete', 'plugin' => false, 'prefix' => false, 1];

        $this->delete($url);
        $this->assertResponseCode(302);
    }
}
