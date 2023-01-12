<?php

namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 *
 * @uses \App\Controller\UsersController
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
        'app.Users',
        'app.Articles',
    ];

    // 'users/login' . -> '/login'
    public function testUsersLoginCaseSuccess()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->enableRetainFlashMessages();

        $URL = '/users/login';

        $data = [
            "email" => "s202020393@studentmail.unimap.edu.my",
            "password" => "najmi",
        ];

        $this->post($URL, $data);
        $this->assertResponseCode(302); //redirect
        $this->assertFlashMessage('Successfully logged in');
    }

    public function testUsersLoginCaseFailed()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->enableRetainFlashMessages();

        $URL = '/users/login';

        $data = [
            "email" => "s202020393@studentmail.unimap.edu.my",
            "password" => "najmixxxx",
        ];

        $this->post($URL, $data);
        $this->assertResponseCode(302); //redirect - OK - 200 and 204.
        //$this->assertResponseOK() === $this->assertResponseCode(200)
        $this->assertFlashMessage('Your username or password is incorrect.');
    }

    public function testRegisterUserCaseHappy()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->enableRetainFlashMessages();

        $URL = '/users/register';

        $data = [

            'username' => 'najmimahari',
            'first_name' => 'najmi',
            'last_name' => 'mahari',
            'email' => 'ahmadnajmi02@gmail.com',
            'password' => 'najmi123',
        ];

        $this->post($URL, $data);
        $this->assertResponseCode(302); //redirect
        $this->assertFlashMessage('The user has been registered.');
    


    }
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
