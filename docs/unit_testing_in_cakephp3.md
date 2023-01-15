## Unit testing in Cakephp 3

1. CakePHP 3 uses PHPUnit for unit testing. Make sure you have PHPUnit installed and configured before running tests.
1. You can run tests using the command line by navigating to the app directory and running ```./vendor/bin/phpunit```
2. You can also run tests using the CakePHP console by running ```bin/cake test [name of test file or directory]``` (e.g. ```bin/cake test tests/TestCase/Controller/UsersControllerTest.php``` or ```bin/cake test tests/TestCase/Controller/```)
3. Tests are located in the tests directory within the app directory.
4. Tests are grouped into test cases, which are classes that extend the CakeTestCase class.
5. Each test case should have a corresponding test file in the tests directory. For example, if you have a UsersController class, you should have a ```UsersControllerTest.php``` file in the ```tests/TestCase/Controller``` directory.
6. You can use the ```$this->markTestIncomplete()``` method in your test case to mark a test that is not yet complete.
7. You can use the ```$this->markTestSkipped()``` method in your test case to skip a test.
8. You can use the ```$this->markTestAsPassed()``` method in your test case when the test has passed
9. You can use the **assert** methods in your test case to assert that certain conditions are true (e.g. ```$this->assertEquals(2, 2)```)

### Here is an example of a basic test case for a controller

```php
<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/users');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/users/view/1');
        $this->assertResponseOk();
    }
}

```

### Here is an example of a basic test case for a model

```php
<?php
namespace App\Test\TestCase\Model;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method - unset the Users table clear the registry
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Users);
        TableRegistry::getTableLocator()->clear();
        parent::tearDown
    }

```

### Further example of a test case for a model

 Let us assume that we have a model called ```Users``` and we want to test the ```findActive()``` method. We can do this by creating a test case for the ```Users``` model and adding a test method for the ```findActive()``` method.

 Note that, we have to use Cakephp fixtures to test the ```findActive()``` method. We can do this by adding the ```Users``` fixture to the ```$fixtures``` property of the test case.

 Fixtures are used to create test data that can be used in the test case. Fixtures are located in the ```tests/Fixture``` directory.

This is the ```Users``` fixture example - it should reflect the ```Users``` table in the database in terms of the fields and the data types.

```php
<?php

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'username' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => 'ini username', 'precision' => null, 'fixed' => null],
        'first_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => 'ini first name', 'precision' => null, 'fixed' => null],
        'last_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => 'ini last name ', 'precision' => null, 'fixed' => null],

        'email' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
                'username' => 'mariano',
                'first_name' => 'Mario',
                'last_name' => 'Pereira',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'created' => '2023-01-02 04:47:29',
                'modified' => '2023-01-02 04:47:29',
            ],
            [
                'id' => 2,
                'username' => 'karimronaldo',
                'first_name' => 'Karimronaldo',
                'last_name' => 'Doe',
                'email' => 'name@abe.com',
                'password' => 'Lorem ipsum dolor sit amet',
                'active' => 1,
                'created' => '2023-01-02 04:47:29',
                'modified' => '2023-01-02 04:47:29',
            ],


            array(
                "id" => 3,
                "username" => "jemi",
                'first_name' => 'Subki',
                'last_name' => 'Latif',
                "email" => "s202020393@studentmail.unimap.edu.my",
                "password" => "najmi",
                'active' => false,
                "created" => "2023-01-10 03:19:38",
                "modified" => "2023-01-10 03:19:38",
            ),


        ];
        parent::init();
    }
}
```

```UsersFixture``` files should follow the cakephp naming convention. The file name should be ```UsersFixture.php```. {ModelName} followed by 'Fixture' and the file extension should be ```.php```.

This is the ```Users``` model test case example. It should be located in the ```tests/TestCase/Model``` directory.

Let say in ```UsersTable.php``` we have a method called ```findActive()``` that returns all active users. We can test this method by creating a test case for the ```Users``` model and adding a test method for the ```findActive()``` method.

- in ```src/Model/Table/UsersTable.php``` we have the ```findActive()``` method

```php

    public function findActive(Query $query, array $options)
    {
        return $query->where(['Users.active' => 1]);
    }
```

- in ```tests/TestCase/Model/UsersTableTest.php``` we have the test case for the ```findActive()``` method

```php
<?php
namespace App\Test\TestCase\Model;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{
  /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users',
        'app.Articles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);
        TableRegistry::getTableLocator()->clear();
        parent::tearDown();
    }

    /**
     * Test findActive method
     *
     * @return void
     */
    public function testFindActive()
    {
        $query = $this->Users->find('active');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $this->assertNotEmpty($query);
        $this->assertEquals(2, $query->count());
    }


}
```
