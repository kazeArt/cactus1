<!-- resources/views/admin/images/edit.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    .edit-image-wrapper {
        background-color: white;
        max-width: 42rem;
        margin: 3rem auto;
        padding: 2rem 2.5rem;
        border-radius: 1.5rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.07);
    }

    .edit-image-wrapper h1 {
        font-size: 1.75rem;
        font-weight: bold;
        color: #991b1b;
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1.75rem;
    }

    .form-group label {
        display: block;
        font-size: 1rem;
        font-weight: 600;
        color: #444;
        margin-bottom: 0.5rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.65rem 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.75rem;
        font-size: 1rem;
        font-family: inherit;
        background-color: #fefefe;
    }

    .form-group img {
        display: block;
        margin: 1rem auto;
        border-radius: 0.5rem;
        max-width: 150px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-actions button {
        background-color: #991b1b;
        color: white;
        padding: 0.65rem 1.75rem;
        font-weight: 600;
        border: none;
        border-radius: 0.75rem;
        cursor: pointer;
        font-size: 1rem;
        transition: background-color 0.2s ease;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-actions button:hover {
        background-color: #7f1d1d;
    }

    .form-actions a {
        background-color: #991b1b;
        color: white;
        padding: 0.65rem 1.75rem;
        font-weight: 600;
        border-radius: 0.75rem;
        text-decoration: none;
        font-size: 1rem;
        transition: background-color 0.2s ease;
    }

    .form-actions a:hover {
        background-color: #7f1d1d;
    }
</style>

<div class="edit-image-wrapper">
    <h1>Modifier l'image</h1>
    <form action="{{ route('admin.images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="original_name">Nom de l'image</label>
            <input type="text" name="original_name" id="original_name" value="{{ $image->original_name }}" required>
        </div>

        <div class="form-group">
            <label for="image">Nouvelle image (obligatoire)</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>

        <div class="form-group">
            <img src="{{ asset('storage/images/' . $image->filename) }}" alt="{{ $image->original_name }}" class="img-thumbnail">
        </div>

        <div class="form-actions">
            <button type="submit">💾 Enregistrer</button>
            <a href="{{ route('admin.images.index') }}">← Annuler</a>
        </div>
    </form>
</div>
@endsection