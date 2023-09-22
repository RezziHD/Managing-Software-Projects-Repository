<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalesFixture
 */
class SalesFixture extends TestFixture
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
                'id' => 1,
                'member_id' => 1,
                'staff_id' => 1,
                'sale_date' => '2023-09-22',
                'created' => 1695369068,
                'modified' => 1695369068,
            ],
        ];
        parent::init();
    }
}
