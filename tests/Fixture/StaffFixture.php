<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaffFixture
 */
class StaffFixture extends TestFixture
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
                'first_name' => 'Lorem ipsum dolor sit amet',
                'middle_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'date_of_birth' => '2023-10-22',
                'street' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'state' => '',
                'zip' => '',
                'password' => '$2y$10$xMHuBVxBY5wOLIW.X8ugOeCMMEGyuS2LWMRqEg.mUS40XXDgTg20i',
                'email' => 'ennisthomashenry@gmail.com',
                'created' => 1697964401,
                'modified' => 1697964401,
            ],
        ];
        parent::init();
    }
}
