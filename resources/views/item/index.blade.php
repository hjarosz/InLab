<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

            <div class="float-right">
                @if (Auth::user()->hasRole('admin'))
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('item.create')" :active="request()->routeIs('item.create')">
                        {{ __('Add new item') }}
                    </x-nav-link>
                </div>           
            @endif
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($items as $item)
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $item->name }} - {{ $item->model }} <br>
                        {{ $item->description }} <br>
                        {{ $item->URL }}
                    </div>                             
                 @endforeach                       

            </div>
        </div>

    </div>
</x-app-layout>
