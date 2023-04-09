<?php

namespace Modules\PopupSystem\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\PopupSystem\Enums\PopupPositionEnum;
use Modules\PopupSystem\Enums\PopupStatusEnum;
use Modules\PopupSystem\Enums\PopupTypeEnum;
use Spatie\Enum\Laravel\Rules\EnumRule;

class PopupRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|string',
            'type' => ['required', new EnumRule(PopupTypeEnum::class)],
            'position' => ['required', new EnumRule(PopupPositionEnum::class)],
            'status' => ['required', new EnumRule(PopupStatusEnum::class)],
            'content' => 'required|max:255|string',
            'theme' => ['required', Rule::in(['dark', 'white'])],
            'delay' => ['required', 'numeric', 'min:0', 'max:100'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
