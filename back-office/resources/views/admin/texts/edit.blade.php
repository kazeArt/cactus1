@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800">✏️ Edit Text</h2>
@endsection

@section('content')
<div class="p-6 bg-white shadow rounded-lg max-w-xl mx-auto">
    {{-- Error Handling --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Form --}}
    <form action="{{ route('admin.texts.update', $text->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Title (Optional)</label>
            <input type="text" name="title" value="{{ $text->title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ $text->content }}</textarea>
        </div>

        <div class="flex gap-4 items-center">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                💾 Update Text
            </button>
            <a href="{{ route('admin.texts.index') }}" class="text-gray-600 hover:underline">← Cancel</a>
        </div>
    </form>
</div>
@endsection
