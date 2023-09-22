<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffRolesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffRolesTable Test Case
 */
class StaffRolesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffRolesTable
     */
    protected $StaffRoles;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.StaffRoles',
        'app.Staff',
        'app.Roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StaffRoles') ? [] : ['className' => StaffRolesTable::class];
        $this->StaffRoles = $this->getTableLocator()->get('StaffRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->StaffRoles);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StaffRolesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
