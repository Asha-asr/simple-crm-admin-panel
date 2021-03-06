<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-m-6">
            <div class="w-full m-2">
                @can('create client')
                <a href="{{ route('clients.create')}}" class="m-2 p-2 bg-green-400 rounded">
                    Create Client
                </a>
                @endcan
                
                
            </div>
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">

        

        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Company</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">VAT</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Address</th>
                    <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Image</th> -->
                    <!-- <th scope="col" class="relative px-6 py-3">Edit</th> -->
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr></tr>

                @foreach (App\Models\Client::all() as $client )

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $client->company_name}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $client->company_vat}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $client->company_address}}</td>
                    <!-- <td class="px-6 py-4 whitespace-nowrap">
                    <img class="w-8 h-8 rounded-full" src="https://picsum.photos/200" />
                    </td> -->
                    <!-- <td class="px-6 py-4 text-right text-sm">
                        @can('edit client')
                        <a href="{{ route('clients.edit', $client->id)}}" class="m-2 p-2 bg-green-400 rounded">Edit</a>
                        @endcan
                        @can('delete client')
                        <a href="#" class="m-2 p-2 bg-green-400 rounded">Delete</a>
                        @endcan
                    </td> -->
                </tr>

                @endforeach

                <!-- <tr>
                    <td class="px-6 py-4 whitespace-nowrap">id</td>
                            <td class="px-6 py-4 whitespace-nowrap">title</td>
                            <td class="px-6 py-4 whitespace-nowrap">Active</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <img class="w-8 h-8 rounded-full" src="https://picsum.photos/200" />
                    </td>
                    <td class="px-6 py-4 text-right text-sm">Edit Delete</td>
                </tr> -->
                <!-- More items... -->
                </tbody>
            </table>
            <div class="m-2 p-2">Pagination
            
            </div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
