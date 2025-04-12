@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800">Manage Texts</h2>
@endsection

@section('content')
    <div class="p-6 bg-white shadow rounded-lg">
        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Add Text Form --}}
        <form method="POST" action="{{ route('admin.texts.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title (Optional)</label>
                <input type="text" name="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                ➕ Add Text
            </button>
        </form>

        {{-- Text List --}}
        <h3 class="mt-10 text-lg font-semibold">📝 Existing Texts</h3>
        <ul class="mt-4 space-y-3">
            @forelse($texts as $text)
                <li class="flex items-center justify-between bg-gray-50 p-4 rounded shadow-sm border">
                    <div>
                        <strong>{{ $text->title ?? 'No Title' }}</strong> —
                        <p>{!! Str::limit($text->content, 50) !!}</p> {{-- Limit content preview --}}
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.texts.edit', $text) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.texts.destroy', $text) }}" onsubmit="return confirm('Are you sure you want to delete this text?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-gray-500">No texts yet, bestie. Add some!</li>
            @endforelse
        </ul>
    </div>
@endsection
