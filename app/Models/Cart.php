<?php

declare(strict_types=1);

namespace App\Models;

use App\Attributes\CategoryCartLimit;
use App\Dto\CartDto;
use App\Dto\CartItemDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
            ->with('product');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function validateProductCountLimit(
        $currentCountProductOnCategory,
        string $categoryName,
        string $callerClass,
        string $callerMethod,
        int $quantity = 1,
    ): void {
        $method = new \ReflectionMethod($callerClass, $callerMethod);
        $attributes = $method->getAttributes(CategoryCartLimit::class);
        foreach ($attributes as $attribute) {
            /** @var CategoryCartLimit $attributeInstance */
            $attributeInstance = $attribute->newInstance();

            if ($attributeInstance->category === $categoryName) {
                $currentQuantity = $currentCountProductOnCategory;

                $totalQuantity = $currentQuantity + $quantity;

                if ($totalQuantity > $attributeInstance->limit) {
                    throw new \RuntimeException('Превышен лимит для категории: '
                        .$categoryName.'максимальное кол-во '
                        .$attributeInstance->limit);
                }
            }
        }
    }

    public function getCartDto($mod)
    {
        $cartDto = new CartDto($this->id, $this->totalItems(), $this->totalSum(), $this->getCartItemsDto($mod));
//        dd($cart);
//        throw new \RuntimeException();
        return $cartDto;
    }

    public function getCartItemsDto($mod): array
    {
        /** @var CartItem $cartItem */
        $arr = [];
        $cartItems = $mod->items;
        foreach ($cartItems as $cartItem) {
            $arr[] = new CartItemDto($cartItem->id, $cartItem->product_id, $cartItem->quantity,
                $cartItem->product->category_id, $cartItem->product->name,
                $cartItem->product->price, $cartItem->product->image_url);
        }
        return $arr;
    }

    /**
     * @return int
     */
    public function totalItems(): int
    {
        return $this->items()->get()->sum('quantity');
    }

    public function totalSum(): int
    {
//        return $this->items()->get()
//            ->sum(function ($item) {
//                return $item->quantity * $item->price;
//            });
        return 500;
    }

}
