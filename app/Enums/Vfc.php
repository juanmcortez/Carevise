<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum Vfc: string
{
    use EnumsAsOptionsTrait;

    case Eligible = 'eligible';
    case Ineligible = 'ineligible';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
