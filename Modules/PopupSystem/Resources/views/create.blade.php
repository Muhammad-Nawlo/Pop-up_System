<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Popup') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <form method="POST" action="{{ route('popup.store') }}">
                    @csrf
                    <!-- name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name')" required autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>


                        <!-- type -->
                        <div class="mt-4">
                            <x-input-label for="type" :value="__('Type')"/>
                            <select name="type" id="type"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                                @foreach(\Modules\PopupSystem\Enums\PopupTypeEnum::toArray() as $key=>$val)
                                    <option value="{{$key}}" {{$key=== old('type')?'selected':''}}>{{$val}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                        </div>

                        <!-- position -->
                        <div class="mt-4">
                            <x-input-label for="position" :value="__('Position')"/>
                            <select name="position" id="position"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                                @foreach(\Modules\PopupSystem\Enums\PopupPositionEnum::toArray() as $key=>$val)
                                    <option value="{{$key}}" {{$key=== old('position')?'selected':''}}>{{$val}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('position')" class="mt-2"/>
                        </div>

                        <!-- status -->
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')"/>
                            <select name="status" id="status"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>

                                @foreach(\Modules\PopupSystem\Enums\PopupStatusEnum::toArray() as $key=>$val)
                                    <option
                                        value="{{$key}}" {{$key=== old('status')?'selected':''}}>{{$val}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('position')" class="mt-2"/>
                        </div>


                        <!-- content -->
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Content')"/>
                            <x-text-input id="content" class="block mt-1 w-full"
                                          type="text"
                                          name="content"
                                          :value="old('content')"
                                          required/>

                            <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                        </div>

                        <!-- theme -->
                        <div class="mt-4">
                            <x-input-label for="theme" :value="__('Theme')"/>
                            <select name="theme" id="theme"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>
                                <option value="white" {{old('theme') === 'white'?'selected':''}}>White</option>
                                <option value="dark" {{old('theme') === 'dark'?'selected':''}}>Dark</option>
                            </select>
                            <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                        </div>

                        <!-- delay -->
                        <div class="mt-4">
                            <x-input-label for="delay" :value="__('Delay (s)')"/>
                            <x-text-input id="delay" class="block mt-1 w-full"
                                          type="number"
                                          min="0"
                                          max="100"
                                          steps="1"
                                          name="delay"
                                          :value="old('delay')"
                                          required/>

                            <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                        </div>

                        <div class="flex items-center  mt-4">
                            <x-primary-button class="">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
