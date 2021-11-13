<x-app-layout>
    <x-slot name="header">

        <div class="inline-block">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="float-left">
                    {{ __('Dashboard') }}
                </div>
            </h2>
        </div>

        @if (Auth::user()->hasRole('admin'))
        <div class="float-right">
            <a href="{{ route('item.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded leading-tight">
              Add new item
            </a>     
      </div>   
        @endif

    <br>
    </x-slot>
    
    <div class="py-12">

        @foreach ($items as $item)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Name: {{ $item->name }} <br>
                        Model: {{ $item->model }} <br>
                        Description: {{ $item->description }} <br>
                        URL: {{ $item->URL }} <br>
                        Quantity: {{ $item->quantity }} <br>
                    </div>
                </div>
            </div>              
        @endforeach

    </div>
</x-app-layout>
