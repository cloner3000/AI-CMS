<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContentsDataAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContentsDataAttributesTable Test Case
 */
class ContentsDataAttributesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContentsDataAttributesTable
     */
    public $ContentsDataAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ContentsDataAttributes',
        'app.Contents',
        'app.ContentsAttributes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContentsDataAttributes') ? [] : ['className' => ContentsDataAttributesTable::class];
        $this->ContentsDataAttributes = TableRegistry::getTableLocator()->get('ContentsDataAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContentsDataAttributes);

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
