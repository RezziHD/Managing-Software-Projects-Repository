<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MembersFixture
 */
class MembersFixture extends TestFixture
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
                'date_of_birth' => '2023-09-22',
                'street' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'state' => '',
                'zip' => '',
                'email' => 'Lorem ipsum dolor sit amet',
<<<<<<< Updated upstream
                'created' => 1695369162,
                'modified' => 1695369162,
=======
                'created' => 1695355642,
                'modified' => 1695355642,
>>>>>>> Stashed changes
            ],
        ];
        parent::init();
    }
}
