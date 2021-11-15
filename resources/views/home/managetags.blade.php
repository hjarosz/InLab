<x-app-layout>
    <x-slot name="header">
        <div class="inline-block">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="float-left">
                    {{ __('Manage tags') }}
                </div>
            </h2>
        </div>

        @if (Auth::user()->hasRole('admin'))
        <div class="float-right">
            <a href="{{ route('tag.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded leading-tight">
              Add new tag
            </a>     
      </div>   
        @endif
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Here you can manage users! <br>
                    Your username is: {{Auth::user()->username}} <br>
                </div>
            </div>
        </div> --}}
                
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">          
                @foreach ($tags as $tag)   
                <div class="p-6 bg-white flex mb-4">
                        <div class="w-1/2">
                            Name: {{ $tag->name }} <br>                     
                        </div>
                        <div class="w-1/4">
                        </div>

                        <div class="w-16">
                            <a href="{{ route('tag.edit', ['tag' => $tag]) }}">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 border border-yellow-700 rounded">
                                    Edit
                                </button>   
                            </a>     
                        </div>
                        <div class="w-16">
                            <a href="{{ route('tag.delete', ['tag' => $tag]) }}">
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">
                                    Delete
                                </button>   
                            </a>                        
                        </div>                        
                </div>                
                @endforeach     
            </div>
        </div>              
        
    </div>
      




</x-app-layout>
