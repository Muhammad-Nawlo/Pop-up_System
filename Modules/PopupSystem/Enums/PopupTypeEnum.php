<?php

namespace Modules\PopupSystem\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self  FULL_SCREEN()
 * @method static self SLIDE_IN()
 */
final class PopupTypeEnum extends Enum
{
    protected static function values()
    {
        return [
            "FULL_SCREEN" => 0,
            "SLIDE_IN" => 1,
        ];
    }

    protected static function labels()
    {
        return [
            "FULL_SCREEN" => 'Full Screen',
            "SLIDE_IN" => 'Slide In',
        ];

    }
}
