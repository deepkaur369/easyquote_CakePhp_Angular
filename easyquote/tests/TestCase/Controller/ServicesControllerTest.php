<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ServicesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ServicesController Test Case
 */
class ServicesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Services' => 'app.services',
        'Categories' => 'app.categories',
        'HourlyRates' => 'app.hourly_rates',
        'Users' => 'app.users',
        'Projects' => 'app.projects',
        'Hires' => 'app.hires',
        'Customers' => 'app.customers',
        'Selections' => 'app.selections',
        'Questions' => 'app.questions',
        'Options' => 'app.options',
        'QuestionFlows' => 'app.question_flows',
        'WorkingHours' => 'app.working_hours'
    ];

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
