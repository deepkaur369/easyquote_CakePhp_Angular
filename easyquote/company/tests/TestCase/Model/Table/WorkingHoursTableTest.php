<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkingHoursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkingHoursTable Test Case
 */
class WorkingHoursTableTest extends TestCase
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WorkingHours') ? [] : ['className' => 'App\Model\Table\WorkingHoursTable'];
        $this->WorkingHours = TableRegistry::get('WorkingHours', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkingHours);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
