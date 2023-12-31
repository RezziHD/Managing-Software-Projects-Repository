<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaleLine Entity
 *
 * @property int $sale_id
 * @property int $line_number
 * @property int $product_id
 * @property int $quantity
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Sale $sale
 * @property \App\Model\Entity\Product $product
 */
class SaleLine extends Entity
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
        'product_id' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'sale' => true,
        'product' => true,
        'line_number' => true,
    ];
    protected array $_virtual = ['line_price'];

    protected function _getLinePrice()
    {
        if ($this->product != null)
            return ((float)$this->product->price) * $this->quantity;
    }
}
