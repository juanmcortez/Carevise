<?php

namespace App\Enums;

use Illuminate\Support\Str;

trait EnumsAsOptionsTrait
{
    /**
     * Use this function to retrieve all the enums options as an array
     * that can be used on the select component or a regular select.
     * The separator attribute allows you to format the string used
     * as a label by the select option.
     *
     * @param string $separator
     * @return array
     */
    public static function options($separator = ' '): array
    {
        $cases   = static::cases();
        $options = [];
        foreach ($cases as $case) {
            $label = $case->name;
            if (Str::contains($label, '__')) {
                $label = Str::replace('__', ' ', $label);
            }
            if (Str::contains($label, '_')) {
                $label = Str::replace('_', $separator, $label);
            }
            $options[$case->value] = $label;
        }
        return $options;
    }
}
