@extends('layouts.layoutpublic')

@section('content')

    <!-- title -->
    <h1 class="text-center text-xl md:text-4xl px-6 py-12 bg-white">Kies een project</h1>
    <!-- /title -->

    <!-- grid -->
    <div class="w-full px-6 py-12 bg-gray-100 border-t">
        <div class="container max-w-4xl mx-auto pb-10 flex flex-wrap">

            @foreach ($projects as $project)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-3 mb-4">
                    <a href="#">
                        <img src="{{asset("img/auto1.jfif")}}" class="w-full h-auto rounded-lg" />
                    </a>

                    <h2 class="text-xl py-4">
                        <a href="#" class="text-black no-underline">{{ $project->name }}</a>
                    </h2>

                    <p class="text-xs leading-normal">{{ Str::limit($project->description, 350) }}</p>
                </div>
            @endforeach


        </div>
        <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-center px-3">
            <div class="text-xs">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
    <!-- /grid -->
@endsection