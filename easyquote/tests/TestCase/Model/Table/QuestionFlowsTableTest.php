<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuestionFlowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuestionFlowsTable Test Case
 */
class QuestionFlowsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'QuestionFlows' => 'app.question_flows',
        'Questions' => 'app.questions',
        'Options' => 'app.options',
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
        $config = TableRegistry::exists('QuestionFlows') ? [] : ['className' => 'App\Model\Table\QuestionFlowsTable'];
        $this->QuestionFlows = TableRegistry::get('QuestionFlows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->QuestionFlows);

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
