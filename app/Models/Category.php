<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $description
 * @property string $image_url
 * @method whenLoaded(string $string)
 */
class Category extends Model
{
    protected $fillable = [
//        'name',
        'description',
        'image_url',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
