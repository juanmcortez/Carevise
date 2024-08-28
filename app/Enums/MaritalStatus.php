<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum MaritalStatus: string
{
    use EnumsAsOptionsTrait;

    case Divorced = 'divorced';
    case Domestic_partner = 'domestic_partner';
    case Married = 'married';
    case Separated = 'separated';
    case Single = 'single';
    case Widowed = 'widowed';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
