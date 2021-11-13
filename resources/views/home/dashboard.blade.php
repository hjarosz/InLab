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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
    
                    <div class="grid grid-flow-row grid-cols-3 grid-rows-3 gap-4">           
                        @foreach ($items as $item)
                            <a href="item/{{ $item->id }}/edit">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src={{ $item->image }}>
                                <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $item->name}} - {{$item->model }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $item->description }}
                                </p>
                                <p>{{ $item->URL }}</p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                                </div>
                            </div>
                        </a>                
                                
                        @endforeach


 {{-- @foreach ($items as $item)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex-row ...">
                            <div>
                                <img class="w-100 h-100" src="{{ $item->image }}">
                            </div>
                            <div>                               
                                Name: {{ $item->name }} <br>
                                Model: {{ $item->model }} <br>
                                Description: {{ $item->description }} <br>
                                URL: {{ $item->URL }} <br>
                                Quantity: {{ $item->quantity }} <br>
                            </div>
                        </div>


                    </div>
                </div>
            </div>              
        @endforeach --}}                        

                </div>
            </div>
        </div>         

      
        </div>        

      

    </div>
</x-app-layout>
