<?php

namespace Modules\PopupSystem\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\PopupSystem\Entities\Compaign;
use Modules\PopupSystem\Entities\Popup;
use Modules\PopupSystem\Enums\PopupPositionEnum;
use Modules\PopupSystem\Enums\PopupStatusEnum;
use Modules\PopupSystem\Enums\PopupTypeEnum;
use Spatie\Enum\Laravel\Rules\EnumRule;

class CompaignPopupController extends Controller
{

    public function create(Popup $popup)
    {
        return view('popupsystem::compaign-popup.create',['popup'=>$popup,'compaigns'=>Compaign::all()]);
    }

    public function store(Request $request, Popup $popup)
    {

        $request->validate([
            'compaign' => ['required', Rule::exists('compaigns', 'id')]
        ]);
        $popup->compaigns()->syncWithoutDetaching($request->compaign);
        return redirect()->route('popup.show', ['popup' => $popup->load('compaigns')]);
    }

    public function destroy(Popup $popup, Compaign $compaign)
    {
        $popup->compaigns()->detach($compaign);

        return redirect()->route('popup.show', ['popup' => $popup]);
    }
}
