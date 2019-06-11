<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContentsAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContentsAttributesTable Test Case
 */
class ContentsAttributesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContentsAttributesTable
     */
    public $ContentsAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ContentsAttributes',
        'app.ContentsCategories',
        'app.ContentsDataAttributes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContentsAttributes') ? [] : ['className' => ContentsAttributesTable::class];
        $this->ContentsAttributes = TableRegistry::getTableLocator()->get('ContentsAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContentsAttributes);

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
