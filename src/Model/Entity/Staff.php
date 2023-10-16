<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

use Cake\ORM\Entity;

/**
 * Staff Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property \Cake\I18n\Date $date_of_birth
 * @property string|null $street
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|resource $password
 * @property string $email
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Sale[] $sales
 * @property \App\Model\Entity\Role[] $roles
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
    protected array $_accessible = [
        'first_name' => true,
        'middle_name' => true,
        'last_name' => true,
        'date_of_birth' => true,
        'street' => true,
        'city' => true,
        'state' => true,
        'zip' => true,
        'password' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'sales' => true,
        'roles' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
