<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum Gender: string
{
    use EnumsAsOptionsTrait;

    case Female = 'female';
    case Male = 'male';
    case Other = 'other';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
