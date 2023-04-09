<?php

namespace Modules\PopupSystem\Popup;

use Modules\PopupSystem\Entities\Popup;

abstract class BasePopup implements PopupInterface
{
    public function __construct(public Popup $popup)
    {
        $config = $popup->config;
        if ($this->popup->theme === 'dark') {
            $config['color'] = "white";
            $config['background'] = "#333";
        } else {
            $config['color'] = "black";
            $config['background'] = "white";
        }

        $popup->setAttribute('config', $config);
    }

}
