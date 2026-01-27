@extends('layouts.layoutpublic')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h1 class="text-4xl font-bold text-red-600 mb-4">403</h1>
            <p class="text-gray-700 text-lg mb-6">{{ $exception->getMessage() ?: 'Forbidden' }}</p>
            <a href="{{ url('/') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back Home
            </a>
        </div>
    </div>
@endsection