<?php

namespace App\Enums;

use App\Enums\EnumsAsOptionsTrait;

enum SpecialistType: string
{
    use EnumsAsOptionsTrait;

    case Distributor = 'distributor';
    case Imaging_service = 'imaging_service';
    case Immunization_service = 'immunization_service';
    case Lab_service = 'lab_service';
    case Other = 'other';
    case Referring_physician = 'referring_physician';
    case Specialist = 'specialist';
    case Unassigned = 'unassigned';
    case Undisclosed = 'undisclosed';
    case Vendor = 'vendor';
}
