<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContentsFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContentsFilesTable Test Case
 */
class ContentsFilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContentsFilesTable
     */
    public $ContentsFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ContentsFiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ContentsFiles') ? [] : ['className' => ContentsFilesTable::class];
        $this->ContentsFiles = TableRegistry::getTableLocator()->get('ContentsFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContentsFiles);

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
