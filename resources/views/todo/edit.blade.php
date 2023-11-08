<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit your Todo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <form method="POST" action="/todo-list/{{$todo->id}}">
                    @method('PUT')
                    @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$todo->title}}" required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="description" value="Description" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$todo->description}}" required autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                Update
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
