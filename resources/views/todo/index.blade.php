<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Here is your Todo List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px4 py-3 rounded relative">
                            <strong class="font-bold">Sorry!</strong>
                            <span class="block sm:inline">{{$errors->first()}}</span>
                        </div>
                    @endif

                    <a href="/todo-list/create" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Add todo</a>

                    <ul class="mt-4">
                        @forelse ($todos as $todo)
                            <li class="mt-2 flex">
                                <a href="/todo-list/{{$todo->id}}">{{$todo->title}}</a>
                                <span class="ml-4 border border-orange-500 bg-orange-200 px-2 inline-block">
                                    <a href="/todo-list/{{$todo->id}}/edit">Edit</a>
                                </span>
                                <form method="POST" action="/todo-list/{{$todo->id}}" class="inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button class="ml-4 border border-red-500 bg-red-200 px-2" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </li>
                        @empty
                            You don't have anything on your Todo List!                            
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
