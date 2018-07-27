<?php
namespace App\Test\TestCase\Controller;

use App\Controller\WorkingHoursController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\WorkingHoursController Test Case
 */
class WorkingHoursControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'WorkingHours' => 'app.working_hours',
        'Users' => 'app.users',
        'Hires' => 'app.hires',
        'Customers' => 'app.customers',
        'Selections' => 'app.selections',
        'Projects' => 'app.projects',
        'Services' => 'app.services',
        'Categories' => 'app.categories',
        'HourlyRates' => 'app.hourly_rates',
        'Questions' => 'app.questions',
        'Options' => 'app.options',
        'QuestionFlows' => 'app.question_flows'
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
