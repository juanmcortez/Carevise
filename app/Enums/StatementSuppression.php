<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum StatementSuppression: string
{
    use EnumsAsOptionsTrait;

    case Dont_suppress_statements = 'dont_suppress_statements';
    case Suppress_statements = 'suppress_statements';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
