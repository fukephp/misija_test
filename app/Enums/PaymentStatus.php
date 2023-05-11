<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum PaymentStatus: int
{
    use Values, InvokableCases;

    case PENDING = 0;
    case PAID = 1;
    case NOT_PAID = 2;
    case RETURN = 3;

    /**
     * @return string
     */
    public function toString(): string
    {
        return match($this) {
            self::PENDING => 'pending',
            self::PAID => 'paid',
            self::NOT_PAID => 'not paid',
            self::RETURN => 'return',
            default => 'pending'
        };
    }
}
