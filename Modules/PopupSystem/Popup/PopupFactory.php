<?php


namespace Modules\PopupSystem\Popup;

use Exception;
use Modules\PopupSystem\Entities\Popup;
use Modules\PopupSystem\Enums\PopupTypeEnum;
use Modules\PopupSystem\Popup\Types\FullScreen;
use Modules\PopupSystem\Popup\Types\SlideIn;

class PopupFactory
{
    public static function createPopup(Popup $popup)
    {

        switch ($popup->type) {
            case PopupTypeEnum::FULL_SCREEN():
                return (new FullScreen($popup))->render();
            case PopupTypeEnum::SLIDE_IN():
                return (new SlideIn($popup))->render();
            default:
                throw new Exception("Invalid pop-up type: $popup->type");
        }
    }
}
