<!-- resources/views/admin/links/index.blade.php -->
@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl">Manage Links</h2>
@endsection

@section('content')
    <div class="p-4">
        @if(session('success'))
            <div class="text-green-600">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.links.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="label">Label</label>
                <input type="text" name="label" class="border p-2 w-full" required>
            </div>
            <div>
                <label for="url">URL</label>
                <input type="url" name="url" class="border p-2 w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Link</button>
        </form>

        <h3 class="mt-8 font-semibold text-lg">Existing Links:</h3>
        <ul class="list-disc pl-5">
            @foreach($links as $link)
                <li>{{ $link->label }} - <a href="{{ $link->url }}" class="text-blue-600" target="_blank">{{ $link->url }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
