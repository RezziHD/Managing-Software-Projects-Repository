<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * Staff Entity
 *
 * @property int $StaffID
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property \Cake\I18n\FrozenDate $DateofBirth
 * @property int $AddressID
 * @property int|null $StaffAcID
 * @property string $Password
 * @property string|null $Email
 */
class Staff extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'FirstName' => true,
        'MiddleName' => true,
        'LastName' => true,
        'DateofBirth' => true,
        'AddressID' => true,
        'StaffAcID' => true,
        'Password' => true,
        'Email' => true,
    ];
    /*protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }*/
}
