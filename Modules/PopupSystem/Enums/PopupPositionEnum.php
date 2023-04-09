<?php

namespace Modules\PopupSystem\Enums;

use Spatie\Enum\Laravel\Enum;


/**
 * @method static self  CENTER()
 * @method static self TOP_START()
 * @method static self TOP_END()
 * @method static self BOTTOM_START()
 * @method static self BOTTOM_END()
 */
final class PopupPositionEnum extends Enum
{
    protected static function values()
    {
        return [
            'CENTER' => 'center',
            'TOP_START' => 'top-start',
            'TOP_END' => 'top-end',
            'BOTTOM_START' => 'bottom-start',
            'BOTTOM_END' => 'bottom-end'
        ];
    }

    protected static function labels()
    {
        return [
            'CENTER' => 'CENTER',
            'TOP_START' => 'Top Start',
            'TOP_END' => 'Top End',
            'BOTTOM_START' => 'Bottom Start',
            'BOTTOM_END' => 'Bottom End'
        ];

    }
}
