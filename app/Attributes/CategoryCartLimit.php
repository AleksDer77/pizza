<?php

declare(strict_types=1);

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class CategoryCartLimit
{
    public function __construct(
        public ?string $category = null,
        public int $limit = 20,
    ){}

}
