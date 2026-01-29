@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('tasks.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Taken</a>
                            <a href="{{ route('tasks.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Taak Toevoegen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <div class="card mt-6">
        <!-- header -->
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Taak Verwijderen</h1>
        </div>
        <!-- end header -->

        <!-- body -->
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="deleteForm" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                      action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <label class="block text-sm">
                        <span class="text-gray-700">Task</span>
                        <input class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="task" value="{{ $task->task }}" type="text" disabled/>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Begindate</span>
                        <input class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="begindate" value="{{ $task->begindate }}" type="date" disabled/>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Enddate</span>
                        <input class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="enddate" value="{{ $task->enddate }}" type="date" disabled/>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">User</span>
                        <select class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input" name="user_id" disabled>
                            <option value="{{ $task->user_id }}">{{ $task->user->name ?? 'N/A' }}</option>
                        </select>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Project</span>
                        <select class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input" name="project_id" disabled>
                            <option value="{{ $task->project_id }}">{{ $task->project->name ?? 'N/A' }}</option>
                        </select>
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-700">Activity</span>
                        <select class="bg-gray-200 block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input" name="activity_id" disabled>
                            <option value="{{ $task->activity_id }}">{{ $task->activity->name ?? 'N/A' }}</option>
                        </select>
                    </label>

                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700
                    focus:outline-none focus:shadow-outline-red">Verwijderen</button>
                </form>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection