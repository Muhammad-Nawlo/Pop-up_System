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
use Modules\PopupSystem\Http\Requests\PopupRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class PopupController extends Controller
{
    public function index()
    {
        return view('popupsystem::index', ['popups' => Popup::with('compaigns')->get()]);
    }

    public function show(Popup $popup)
    {
        return view('popupsystem::show', ['popup' => $popup->load('compaigns')]);
    }

    public function create()
    {
        return view('popupsystem::create');
    }

    public function store(PopupRequest $request)
    {
        Popup::create([
            'name' => $request->name,
            'type' => $request->type,
            'content' => $request->get('content'),
            'config' => json_encode([
                'theme' => $request->theme,
                'delay' => +$request->delay * 1000,
                'position' => $request->position,
                'status' => $request->status
            ]),
        ]);
        return redirect()->route('popup.index');
    }


    public function edit(Popup $popup)
    {
        return view('popupsystem::edit', ['popup' => $popup]);
    }

    public function update(PopupRequest $request, Popup $popup)
    {
        $popup->update($request->only([
            "name",
            "type",
            "position",
            "status",
            "content",
            "theme",
            "delay",
        ]));

        return redirect()->route('popup.index');
    }

    public function destroy(Popup $popup)
    {
        //remove the relation with compaign
        $popup->compaigns()->sync([]);

        $popup->delete();
        return redirect()->route('popup.index');
    }

}
