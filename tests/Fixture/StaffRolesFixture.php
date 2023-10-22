<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaffRolesFixture
 */
class StaffRolesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'staff_id' => 1,
                'role_id' => 1,
                'created' => 1697964401,
                'modified' => 1697964401,
            ],
        ];
        parent::init();
    }
}
