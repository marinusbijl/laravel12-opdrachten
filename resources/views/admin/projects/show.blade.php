@extends('layouts.layoutadmin')
@section('topmenu')
    <nav class="card">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('projects.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Overzicht Project</a>
                            <a href="{{ route('projects.create') }}" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm font-medium">Project Toevoegen</a>
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
            <h1 class="h6">Project Details</h1>
        </div>
        <!-- end header -->
        <!-- content -->
        <div class="py-4 px-6">
            <h2 class="text-sm font-semibold text-gray-800">Project details</h2>
            <p class="py-2 text-sm text-gray-700">Id: {{ $project->id }}</p>
            <p class="py-2 text-sm text-gray-700">Naam: {{ $project->name }}</p>
            <p class="py-2 text-sm text-gray-700">Datum: {{ $project->created_at }}</p>

            <p class="py-2 text-sm text-gray-700">Beschrijving:<br>
               {{ $project->description }}</p>

        </div>
        <!-- end content -->
    </div>

@endsection
