<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum Race: string
{
    use EnumsAsOptionsTrait;

    case American_indian_alaska_native = 'american_indian_alaska_native';
    case Asian = 'asian';
    case Black_african_american = 'black_african_american';
    case Native_hawaian_other_pacific_islander = 'native_hawaian_other_pacific_islander';
    case White = 'white';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
