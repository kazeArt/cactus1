@extends('layouts.app')

@section('content')
<style>
    .admin-texts-wrapper {
        min-height: 100vh;
        background: linear-gradient(to bottom right, #991b1b, #fce7f3, #ffffff);
        padding: 3rem 1rem;
        display: flex;
        justify-content: center;
        align-items: start;
    }

    .admin-texts-box {
        background-color: white;
        width: 100%;
        max-width: 80rem;
        border-radius: 1.5rem;
        padding: 2rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .admin-texts-box h2 {
        font-size: 2rem;
        font-weight: 800;
        color: #1f2937;
        text-align: center;
        margin-bottom: 2rem;
    }

    .admin-texts-box h2 span {
        display: block;
        font-size: 1rem;
        font-weight: 500;
        color: #6b7280;
        margin-top: 0.5rem;
    }

    .filter-section {
        margin-bottom: 2rem;
    }

    .filter-section label {
        font-size: 1.125rem;
        font-weight: 600;
        display: block;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .filter-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    @media (min-width: 640px) {
        .filter-form {
            flex-direction: row;
        }
    }

    .filter-form select {
        padding: 0.5rem 1rem;
        border-radius: 0.75rem;
        border: 1px solid #d1d5db;
        background-color: white;
        flex: 1;
    }

    .filter-form button {
        background-color: #1e293b;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 0.75rem;
        border: none;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.2s ease;
    }

    .filter-form button:hover {
        background-color: #0f172a;
    }

    .success-message {
        background-color: #dcfce7;
        color: #166534;
        padding: 1rem;
        border-radius: 0.75rem;
        margin-bottom: 2rem;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        overflow: hidden;
    }

    thead {
        background-color: #f3e8ff;
        color: #6b21a8;
        font-size: 0.875rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    th, td {
        padding: 1rem;
        text-align: left;
    }

    tbody tr {
        border-top: 1px solid #e5e7eb;
        transition: background-color 0.2s ease;
    }

    tbody tr:hover {
        background-color: #fef2f2;
    }

    .edit-link {
        color: #991b1b;
        font-weight: 600;
        text-decoration: none;
    }

    .edit-link:hover {
        color: #7f1d1d;
    }

    .add-button {
        display: inline-block;
        background-color: #be123c;
        color: white;
        font-weight: 600;
        padding: 0.75rem 2rem;
        border-radius: 9999px;
        text-decoration: none;
        margin-top: 2rem;
        transition: background-color 0.2s ease;
    }

    .add-button:hover {
        background-color: #881337;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="admin-texts-wrapper">
    <div class="admin-texts-box">
        <h2>📝 Gestion des textes <span>Ajoutez, modifiez ou filtrez vos contenus textuels</span></h2>

        <!-- Filter Form -->
        <div class="filter-section">
            <form method="GET" action="{{ route('admin.texts.index') }}" class="filter-form">
                <select name="type" id="type">
                    <option value="">Tous les types</option>
                    <option value="nav" {{ request('type') == 'nav' ? 'selected' : '' }}>Lien de navigation</option>
                    <option value="title" {{ request('type') == 'title' ? 'selected' : '' }}>Titre</option>
                    <option value="p" {{ request('type') == 'p' ? 'selected' : '' }}>Paragraphe</option>
                    <option value="paragraph" {{ request('type') == 'paragraph' ? 'selected' : '' }}>Paragraphe complet</option>
                </select>
                <button type="submit">Filtrer</button>
            </form>
        </div>

        <!-- Success message -->
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table View -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Contenu</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($texts as $text)
                        <tr>
                            <td>{{ $text->type }}</td>
                            <td style="white-space: pre-line;">{{ $text->content }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.texts.edit', $text) }}" class="edit-link">✏️ Éditer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add button -->
        <div class="text-center">
            <a href="{{ route('admin.texts.create') }}" class="add-button">➕ Ajouter un texte</a>
        </div>
    </div>
</div>
@endsection
