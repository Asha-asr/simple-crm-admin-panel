<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Tasks
        </h2>
    </x-slot>

    <div class="py-m-6">
    @if (session('message'))
            <h5>{{ session('message') }}</h5>
            @endif 
        <div class="w-full m-2">
                @can('create task')
                <a href="{{ route('tasks.create') }}" class="m-2 p-2 bg-green-400 rounded">
                    Create Task
                </a>
                @endcan
                
                
            </div>
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">

        

        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

        @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="d-flex justify-content-end">
                <form action="{{ route('tasks.index') }}" method="GET">
                    <div class="form-group row">
                        <label for="status" class="col-form-label">Status:</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="status" id="status" onchange="this.form.submit()">
                                <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>All</option>
                                @foreach(App\Models\Task::STATUS as $status)
                                    <option
                                        value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Assigned to</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Client</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Deadline</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Status</th>
                    <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Client</th> -->
                   
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr></tr>

                @foreach ($tasks as $task )

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $task->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $task->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $task->client->company_name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $task->deadline }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $task->status }}</td>
                    <!-- <td class="px-6 py-4 whitespace-nowrap">
                    <img class="w-8 h-8 rounded-full" src="https://picsum.photos/200" />
                    </td> -->
                    <td class="px-6 py-4 text-right text-sm">
                        @can('edit task')    
                        <a href="{{ route('tasks.edit', $task) }}" class="m-2 p-2 bg-green-400 rounded">Edit</a>
                        @endcan
                        @can('delete task')
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are your sure?');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                </form>
                        @endcan
                    </td>
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
            <div class="m-2 p-2">Pagination</div>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>
