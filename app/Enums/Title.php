<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum Title: string
{
    use EnumsAsOptionsTrait;

    case Dr = 'dr';
    case Mr = 'mr';
    case Mrs = 'mrs';
    case Ms = 'ms';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
