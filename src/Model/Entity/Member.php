<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Validation\Validator; // Make sure to include this line

/**
 * Member Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property \Cake\I18n\FrozenDate $date_of_birth
 * @property string $email
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Sale[] $sales
 */
class Member extends Entity
{
    // Define the public validationDefault method

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
        'email' => true,
        'created' => true,
        'modified' => true,
        'sales' => true,
    ];
}
