<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum ContactType: string
{
    use EnumsAsOptionsTrait;

    case Emergency = 'emergency';
    case Father = 'father';
    case Guardian = 'guardian';
    case Mother = 'mother';
    case Other = 'other';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
