<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicesTable Test Case
 */
class ServicesTableTest extends TestCase
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Services') ? [] : ['className' => 'App\Model\Table\ServicesTable'];
        $this->Services = TableRegistry::get('Services', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Services);

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
