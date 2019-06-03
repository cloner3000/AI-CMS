<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoversTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoversTable Test Case
 */
class CoversTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoversTable
     */
    public $Covers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Covers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Covers') ? [] : ['className' => CoversTable::class];
        $this->Covers = TableRegistry::getTableLocator()->get('Covers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Covers);

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
}
