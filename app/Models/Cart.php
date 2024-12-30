<?php

declare(strict_types=1);

namespace App\Models;

use App\Attributes\CategoryCartLimit;
use App\Dto\CartDto;
use App\Dto\ProductDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use ReflectionClass;

/**
 * @property mixed $items
 */
class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class)
            ->with('product', function ($query) {
                $query->where('available', true);
            });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
