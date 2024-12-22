<?php

declare(strict_types=1);

namespace App\Models;

use App\Exceptions\ResourceNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @method mergeWhen(bool $is_admin, array $array)
 */
class Product extends Model
{
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

    public function getActive(): Collection
    {
        return $this->where('available', true)->get();
    }

    public function getAvailableProducts()
    {

    }
}
