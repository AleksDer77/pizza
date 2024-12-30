<?php

declare(strict_types=1);

namespace App\Models;

use App\Exceptions\ResourceNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $image_url
 * @property boolean $available
 * @property boolean $featured
 * @property mixed $product
 * @property mixed $quantity
 * @method mergeWhen(bool $is_admin, array $array)
 */
class Product extends Model
{
    public const CURRENCY_RU = 'RUB';
    protected $fillable =
        [
            'id',
            'category_id',
            'name',
            'description',
            'price',
            'image_url',
            'available',
            'featured',
        ];

    protected $casts = [
        'available' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
    public function getActive(): Collection
    {
        return $this->where('available', true)->get();
    }

    public function getAvailableProducts()
    {

    }
}
