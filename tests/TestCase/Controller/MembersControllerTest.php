<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\MembersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\MembersController Test Case
 *
 * @uses \App\Controller\MembersController
 */
class MembersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Staff',
        'app.Members',
    ];
    protected function login($userId = 1)
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => $userId,
                    'email' => 'ennisthomashenry@gmail.com',
                    'password' => '$2y$10$xMHuBVxBY5wOLIW.X8ugOeCMMEGyuS2LWMRqEg.mUS40XXDgTg20i',
                ]
            ]
        ]);
    }

    public function testAddUnauthenticatedFails(): void
    {
        // No session data set.
        $this->get('/members/add');

        $this->assertStringStartsWith(
            '/staff/login',
            $this->_response->getHeaderLine('Location')
        );
    }


    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\MembersController::index()
     */
    public function testIndex(): void
    {
        $this->login();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // Make a GET request to the index action
        $this->post('/members');

        // Assert that the response was successful
        $this->assertResponseOk();

        // Assert that the response contains the expected view variable
        $this->assertResponseContains('members');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\MembersController::view()
     */
    public function testView(): void
    {
        $this->login();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // Make a GET request to the view action with an ID
        $this->get('/members/view/1');

        // Assert that the response was successful
        $this->assertResponseOk();

        // Assert that the response contains the expected view variable
        $this->assertResponseContains('member');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\MembersController::add()
     */
    public function testAdd(): void
    {
        $this->login();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // Make a POST request to the add action with form data
        $this->post('/members/add', [
            'first_name' => 'Henry',
            'middle_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'date_of_birth' => '1987-10-22',
            'street' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'state' => 'VIC',
            'zip' => '3130',
            'email' => 'ennisthomashenry@gmail.com',
            'created' => 1697964399,
            'modified' => 1697964399,
        ]);

        // Assert that the response was a redirect
        $this->assertResponseSuccess();
        $member = $this->getTableLocator()->get('Members');
        $query = $member->find()->where(['email' => 'ennisthomashenry@gmail.com']);
        $this->assertEquals(1, $query->count());
        // Assert that the member was added to the database

    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\MembersController::edit()
     */
    public function testEdit(): void
    {
        $this->login();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // Make a PUT request to the edit action with an ID and form data
        $this->put('/members/edit/1', [
            'first_name' => 'Henry',
            'middle_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'date_of_birth' => '1987-10-22',
            'street' => 'Lorem ipsum dolor sit amet',
            'city' => 'Lorem ipsum dolor sit amet',
            'state' => 'VIC',
            'zip' => '3130',
            'email' => 'ennisthomashenry1@gmail.com',
            'created' => 1697964399,
            'modified' => 1697964399,
        ]);

        // Assert that the response was a redirect
        $this->assertResponseSuccess();

        // Assert that the member was updated in the database
        $member = $this->getTableLocator()->get('Members');
        $query = $member->find()->where(['email' => 'ennisthomashenry1@gmail.com']);
        $this->assertEquals(1, $query->count());
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\MembersController::delete()
     */
    public function testDelete(): void
    {
        $this->login();
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // Make a DELETE request to the delete action with an ID
        $this->delete('/members/delete/1');

        // Assert that the response was a redirect
        $this->assertResponseSuccess();

        // Assert that the member was deleted from the database
        $member = $this->getTableLocator()->get('Members');
        $query = $member->find()->where(['email' => 'ennisthomashenry1@gmail.com']);
        $this->assertEquals(0, $query->count());
    }
}
