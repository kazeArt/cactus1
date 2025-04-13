<!-- resources/views/admin/texts/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-800 via-rose-100 to-white flex items-center justify-center py-16 px-6">
    <div class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl p-10 border border-gray-200">
        <h2 class="text-3xl font-bold text-center mb-8">Ajouter un texte</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded-xl mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.texts.store') }}">
            @csrf
            <div class="mb-6">
    <label for="type" class="block text-gray-700 font-semibold mb-2">Type de texte</label>
    <select name="type" id="type"
        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-600" required>
        <option value="nav_link">Lien de navigation</option>
        <option value="body_title">Titre</option>
        <option value="body_paragraph">Paragraphe</option>
    </select>
</div>

            <div class="mb-6">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Contenu</label>
                <textarea name="content" id="content" rows="5"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-600"
                    required></textarea>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
