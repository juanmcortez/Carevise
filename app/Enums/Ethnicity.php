<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum Ethnicity: string
{
    use EnumsAsOptionsTrait;

    case Hispanic_latino = 'hispanic_latino';
    case Not_hispanic_latino = 'not_hispanic_latino';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
