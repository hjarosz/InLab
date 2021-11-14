<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adding new tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                          <form method="POST" action="{{ route('tag.store') }}"> 
                            @csrf
                
                            <!-- Name -->
                            <div>
                                <x-label for="Name" :value="__('Name')" />
                
                                <x-input id="Name" class="block mt-1 w-full" type="text" name="Name" :value="old('Name')" autofocus />
                            </div>
                            
                            <div class="py-2"></div>
                                                  
                          <x-button class="ml-0">
                            {{ __('Add') }}
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
