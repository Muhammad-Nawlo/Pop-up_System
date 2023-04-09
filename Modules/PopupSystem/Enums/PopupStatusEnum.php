<?php

namespace Modules\PopupSystem\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self  SUCCESS()
 * @method static self  ERROR()
 * @method static self  WARNING()
 * @method static self  INFO()
 * @method static self  QUESTION()
 */
final class PopupStatusEnum extends Enum
{
    protected static function values()
    {
        return [
            "SUCCESS" => "success",
            "ERROR" => "error",
            "WARNING" => "warning",
            "INFO" => "info",
            "QUESTION" => "question",
        ];
    }

    protected static function labels()
    {
        return [
            "SUCCESS" => "Success",
            "ERROR" => "Error",
            "WARNING" => "Warning",
            "INFO" => "Info",
            "QUESTION" => "Question",

        ];

    }
}
