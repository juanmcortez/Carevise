<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum ReferralSource: string
{
    use EnumsAsOptionsTrait;

    case Coupon = 'coupon';
    case Direct_mail = 'direct_mail';
    case Employee = 'employee';
    case Newspaper = 'newspaper';
    case Other = 'other';
    case Patient = 'patient';
    case Radio = 'radio';
    case Referral_card = 'referral_card';
    case Tv = 'tv';
    case Walk_in = 'walk_in';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
}
