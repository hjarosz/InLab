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

    <div class="py-2 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="px-6 pt-4 pb-2">
            @foreach ($allTags as $tag)
            <a href="{{ route('dashboard.tag', ['tag' => $tag]) }}">
                @if (!is_null($currentTags) and in_array($tag->id, $currentTags))
                    <span class="inline-block bg-blue-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</span>                                   
                @else
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</span>                   
                @endif
            </a>         
            @endforeach
        </div>
        </div>           
    </div>
    
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
    
                    <div class="grid grid-flow-row grid-cols-3 gap-4">           
                        @foreach ($items as $item)
 
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <img class="w-full" src={{ $item->image }}>
                                <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $item->name}} - {{$item->model }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $item->description }}
                                </p>
                                <p>{{ $item->URL }}</p>
                                <p>Available: {{ $item->quantity - $item->users->count()}} / {{ $item->quantity }}</p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    @if($item->tags->count() > 0)
                                    @foreach ($item->tags as $tag)
                                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->name }}</span>
                                    @endforeach
                                    @else
                                     <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">No tags assigned</span>
                                     @endif                                    
                                </div>

                                @if (Auth::user()->items()->find($item))
                                    <a href="{{ route('item.return', ['item' => $item]) }}">
                                        <div class="bg-red-400 text-center text-white">Click to give back</div>   
                                    </a>                                                                
                                @else
                                    @if($item->quantity - $item->users->count() > 0)
                                        <a href="{{ route('item.rent', ['item' => $item]) }}">
                                            <div class="bg-green-400 text-center text-white">Click to rent</div> 
                                        </a>  
                                    @else
                                        <div class="bg-gray-400 text-center text-white">Out of stock</div>   
                                   @endif                                                                        
                                @endif


                                @if (Auth::user()->hasRole('admin'))    
                                    <a href="item/{{ $item->id }}/edit">
                                        <div class="bg-yellow-400 text-center text-white">Click to edit</div>
                                    </a>
                                @endif
                            </div>
                                
                                 
              
                                
                        @endforeach

                </div>
            </div>
        </div>         

      
        </div>        

      

    </div>
</x-app-layout>
