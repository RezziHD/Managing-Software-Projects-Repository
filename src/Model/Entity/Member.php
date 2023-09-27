<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Member Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
<<<<<<< Updated upstream
 * @property \Cake\I18n\Date $date_of_birth
=======
 * @property \Cake\I18n\FrozenDate $date_of_birth
>>>>>>> Stashed changes
 * @property string|null $street
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string $email
<<<<<<< Updated upstream
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
=======
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
>>>>>>> Stashed changes
 *
 * @property \App\Model\Entity\Sale[] $sales
 */
class Member extends Entity
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
<<<<<<< Updated upstream
    protected array $_accessible = [
=======
    protected $_accessible = [
>>>>>>> Stashed changes
        'first_name' => true,
        'middle_name' => true,
        'last_name' => true,
        'date_of_birth' => true,
        'street' => true,
        'city' => true,
        'state' => true,
        'zip' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'sales' => true,
    ];
}
