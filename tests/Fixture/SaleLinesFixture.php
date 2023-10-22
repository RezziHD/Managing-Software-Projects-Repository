<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SaleLinesFixture
 */
class SaleLinesFixture extends TestFixture
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
                'sale_id' => 1,
                'line_number' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'created' => 1697964401,
                'modified' => 1697964401,
            ],
        ];
        parent::init();
    }
}
