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

                          <form method="POST" enctype="multipart/form-data" action="/item/{{ $item->id }}"> 
                            @csrf

                            @method('PATCH')
                
                            <!-- Name -->
                            <div>
                                <x-label for="Name" :value="__('Name')" />
                
                                <x-input id="Name" class="block mt-1 w-full" type="text" name="Name" :value="old('Name') ?? $item->name" autofocus />
                            </div>
                
                            <div>
                                <x-label for="Model" :value="__('Model')" />
                
                                <x-input id="Model" class="block mt-1 w-full" type="text" name="Model" :value="old('Model') ?? $item->model" autofocus />
                            </div>    

                            <div>
                              <x-label for="Description" :value="__('Description')" />
              
                              <x-input id="Description" class="block mt-1 w-full" type="text" name="Description" :value="old('Description') ?? $item->description" autofocus />
                          </div>                                  
                
                            <div>
                                <x-label for="URL" :value="__('URL')" />
                
                                <x-input id="URL" class="block mt-1 w-full" type="url" name="URL" :value="old('URL') ?? $item->URL" autofocus />
                            </div> 

                            <div>
                              <x-label for="Quantity" :value="__('Quantity')" />
              
                              <x-input id="Quantity" class="block mt-1 w-full" type="number" name="Quantity" :value="old('Quantity') ?? $item->quantity" autofocus />
                          </div>       
                          
                          <div>
                            <x-label for="Image" :value="__('Image')" />
            
                            <x-input id="Image" class="block mt-1 w-full" type="file" name="Image" :value="old('Image') ?? $item->image" autofocus />
                          </div>           
                          
                          <br>
                                                  
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
