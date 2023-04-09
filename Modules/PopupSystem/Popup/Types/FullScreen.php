<?php


namespace Modules\PopupSystem\Popup\Types;

use Modules\PopupSystem\Entities\Popup;
use Modules\PopupSystem\Popup\BasePopup;

class FullScreen extends BasePopup
{
    public function __construct(Popup $popup)
    {
        parent::__construct($popup);
    }

    public function render()
    {
        $config = $this->popup->config;
        //this for adding to config to style the popup as full screen
        $config['width'] = "100%";

        $this->popup->setAttribute('config', $config);

        return $this->popup;

    }
}
