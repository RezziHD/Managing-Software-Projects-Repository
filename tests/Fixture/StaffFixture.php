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
     * Table name
     *
     * @var string
     */
    public $table = 'staff';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'StaffID' => 1,
                'FirstName' => 'Lorem ipsum dolor sit amet',
                'MiddleName' => 'Lorem ipsum dolor sit amet',
                'LastName' => 'Lorem ipsum dolor sit amet',
                'DateofBirth' => '2023-09-20',
                'AddressID' => 1,
                'StaffAcID' => 1,
                'Password' => 'Lorem ipsum dolor sit amet',
                'Email' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
