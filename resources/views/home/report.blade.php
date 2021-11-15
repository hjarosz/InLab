<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


<div class="flex flex-col w-1/2 m-auto">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Item
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Quantity
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Rented by
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($items as $item)                
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="../{{ $item->image }}">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ $item->name }} - {{ $item->model }} <br>
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $item->URL }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $item->quantity - $item->users()->count() }} / {{ $item->quantity }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @foreach ($users as $user)
                  @if ($user->items()->find($item))
                  <div class="text-sm text-gray-900">{{ $user->email }}</div>                   
                  @endif
                @endforeach
              </td>                     
            </tr>
            @endforeach  

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
