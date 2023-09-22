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
                'created' => 1695369097,
                'modified' => 1695369097,
            ],
        ];
        parent::init();
    }
}
