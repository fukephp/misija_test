<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum ApiPrefix: string
{
    use Values, InvokableCases;

    case BASE_API_PREFIX = '/api';
}
