<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sale Entity
 *
 * @property int $id
 * @property int $member_id
 * @property int $staff_id
 * @property \Cake\I18n\Date $sale_date
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Member $member
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\SaleLine[] $sale_lines
 */
class Sale extends Entity
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
        'member_id' => true,
        'staff_id' => true,
        'sale_date' => true,
        'created' => true,
        'modified' => true,
        'member' => true,
        'staff' => true,
        'sale_lines' => true,
    ];

    protected array $_virtual = ['total_price'];

    protected function _getTotalPrice()
    {
        $sum = 0;
        if ($this->sale_lines != null) :
            foreach ($this->sale_lines as $saleLine) :
                $sum += $saleLine->get('line_price');
            endforeach;
        endif;
        return $sum;
    }
}
