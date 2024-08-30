<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum Countries: string
{
    use EnumsAsOptionsTrait;

    case Argentina = 'ar';
    case United_States_of_America = 'us';
}
