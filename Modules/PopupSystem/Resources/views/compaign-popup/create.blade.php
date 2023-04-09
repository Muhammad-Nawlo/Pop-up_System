<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Link Compaigns') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <form method="POST" action="{{ route('popup.compaign.store',$popup) }}">
                    @csrf
                    <!-- compaign -->
                        <div class="mt-4">
                            <x-input-label for="compaign" :value="__('Compaign')"/>
                            <select name="compaign" id="compaign"
                                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    required>

                                @foreach($compaigns as $compaign)
                                    <option value="{{$compaign->id}}">{{$compaign->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('compaign')" class="mt-2"/>
                        </div>


                        <div class="flex items-center  mt-4">
                            <x-primary-button >
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
