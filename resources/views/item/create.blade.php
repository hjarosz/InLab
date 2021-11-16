<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adding new item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                          <form method="POST" enctype="multipart/form-data" action="{{ route('item.store') }}"> 
                            @csrf
                
                            <div>
                                <x-label for="Name" :value="__('Name')" />
                
                                <x-input id="Name" class="block mt-1 w-full" type="text" name="Name" :value="old('Name')" autofocus />
                            </div>
                
                            <div>
                                <x-label for="Model" :value="__('Model')" />
                
                                <x-input id="Model" class="block mt-1 w-full" type="text" name="Model" :value="old('Model')" autofocus />
                            </div>    

                            <div>
                              <x-label for="Description" :value="__('Description')" />
              
                              <x-input id="Description" class="block mt-1 w-full" type="text" name="Description" :value="old('Description')" autofocus />
                          </div>                                  
                
                            <div>
                                <x-label for="URL" :value="__('URL')" />
                
                                <x-input id="URL" class="block mt-1 w-full" type="url" name="URL" :value="old('URL')" autofocus />
                            </div> 

                            <div>
                              <x-label for="Quantity" :value="__('Quantity')" />
              
                              <x-input id="Quantity" class="block mt-1 w-full" type="number" min="1" name="Quantity" :value="old('Quantity')" autofocus />
                          </div>  
                          
                          <div class="block px-1">
                            <span class="text-gray-700">Tags</span>
                            <div class="mt-2">
                              @foreach ($tags as $tag)
                                <div>
                                  <label class="inline-flex items-center">
                                    <input type="checkbox" class="form-checkbox" name="tags[]" value="{{ $tag->id }}">
                                    <span class="ml-2">#{{ $tag->name }}</span>
                                  </label>
                                </div>                                    
                              @endforeach                         
                            </div>
                          </div>                                                    
                          
                          <div>
                            <x-label for="Image" :value="__('Image')" />
            
                            <x-input id="Image" class="block mt-1 w-full" type="file" name="Image" :value="old('Image')" autofocus />
                          </div>           
                          
                          <br>
                                                  
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
