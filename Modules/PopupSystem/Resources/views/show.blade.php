<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Popup') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Name
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$popup->name}}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Content
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$popup->content}}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Theme
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$popup->theme}}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Position
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$popup->position}}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Type
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$popup->type->label}}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Delay
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$popup->delay}}s
                            </td>
                        </tr>
                        </tbody>
                    </table>


                    <h2 class="font-semibold text-xl mb-4 mt-4 text-gray-800 leading-tight text-center">Compigns</h2>
                    @if($popup->compaigns->count()===0)
                        <h2 class="mt-5 text-red-600  text-center">There is no compaign</h2>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Website
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($popup->compaigns as $compaign)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$compaign->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$compaign->website->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap flex">
                                        <form method="POST"
                                              action="{{ route('popup.compaign.destroy',[$popup,$compaign]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-nav-link onclick="event.preventDefault();
                                                this.closest('form').submit();" href="#"
                                                        class="ms-2 inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                {{ __('Delete') }}
                                            </x-nav-link>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    <div class="flex items-center  mt-4">
                        <x-nav-link href="{{route('popup.compaign.create',$popup)}}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Add') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
