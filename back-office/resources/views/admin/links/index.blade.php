@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800">Manage Links</h2>
@endsection

@section('content')
    <div class="p-6 bg-white shadow rounded-lg">
        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Add Link Form --}}
        <form method="POST" action="{{ route('admin.links.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="label" class="block text-sm font-medium text-gray-700">Label</label>
                <input type="text" name="label" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <input type="url" name="url" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                ➕ Add Link
            </button>
        </form>

        {{-- Link List --}}
        <h3 class="mt-10 text-lg font-semibold">🌐 Existing Links</h3>
        <ul class="mt-4 space-y-3">
            @forelse($links as $link)
                <li class="flex items-center justify-between bg-gray-50 p-4 rounded shadow-sm border">
                    <div>
                        <strong>{{ $link->label }}</strong> —
                        <a href="{{ $link->url }}" target="_blank" class="text-blue-500 hover:underline">{{ $link->url }}</a>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.links.edit', $link) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.links.destroy', $link) }}" onsubmit="return confirm('Are you sure you want to delete this link?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-gray-500">No links yet, bestie. Add some!</li>
            @endforelse
        </ul>
    </div>
@endsection
