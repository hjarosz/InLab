<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage users') }}
        </h2>
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
                @foreach ($users as $user)   
                <div class="p-6 bg-white border-b border-gray-200 flex mb-4">
                        <div class="w-1/2">
                            Username: {{ $user->username }} ({{ $user->roles()->first()->display_name }})  <br>
                            Email: {{ $user->email }} <br>              
                            Name: {{ $user->forename }} {{ $user->surname }} <br>                          
                        </div>
                        <div class="w-1/4">
                        </div>

                        <div class="w-16">
                            <a href="{{ route('user.edit', ['user' => $user]) }}">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 border border-yellow-700 rounded">
                                    Edit
                                </button>   
                            </a>     
                        </div>
                        <div class="w-16">
                            <a href="{{ route('user.delete', ['user' => $user]) }}">
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
