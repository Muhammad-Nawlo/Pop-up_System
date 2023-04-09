<?php

namespace Modules\PopupSystem\Popup\Types;


use Modules\PopupSystem\Entities\Popup;
use Modules\PopupSystem\Popup\BasePopup;

class SlideIn extends BasePopup
{

    public function __construct(Popup $popup)
    {
        parent::__construct($popup);
    }


    public function render()
    {
        $config = $this->popup->config;
        //this for  adding to config to style the popup as slid-in
        $config['showClass']['popup'] = 'animate__animated animate__fadeInDown';
        $config['hideClass']['popup'] = 'animate__animated animate__fadeOutUp';

        $this->popup->setAttribute('config', $config);

        return $this->popup;
    }

}
