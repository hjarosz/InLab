<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editting existing item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                          <form method="POST" action="/user/{{ $user->id }}"> 
                            @csrf

                            @method('PATCH')
                
                            <!-- Name -->
                            <div>
                                <x-label for="Username" :value="__('Userame')" />
                
                                <x-input id="Username" class="block mt-1 w-full" type="text" name="Username" :value="old('Username') ?? $user->username" autofocus />
                            </div>
                
                            <div>
                                <x-label for="Email" :value="__('Email')" />
                
                                <x-input id="Email" class="block mt-1 w-full" type="text" name="Email" :value="old('Email') ?? $user->email" autofocus />
                            </div>    

                            <div>
                              <x-label for="Forename" :value="__('Forename')" />
              
                              <x-input id="Forename" class="block mt-1 w-full" type="text" name="Forename" :value="old('Forename') ?? $user->forename" autofocus />
                            </div>   
                            
                            <div>
                                <x-label for="Surname" :value="__('Surname')" />
                
                                <x-input id="Surname" class="block mt-1 w-full" type="text" name="Surname" :value="old('Surname') ?? $user->surname" autofocus />
                            </div>
                            
                            <div class="py-2"></div>
                                                  
                          <x-button class="ml-0">
                            {{ __('Save') }}
                          </x-button>

                        </form>                          
                    </div>                             
            </div>
        </div>
    </div>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
      </div>
</x-app-layout>
