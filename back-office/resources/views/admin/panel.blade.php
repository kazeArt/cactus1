@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
    }

    .gradient-bg {
        min-height: 100vh;
        background: linear-gradient(to bottom right, #7f1d1d, #fce7f3, #ffffff);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 4rem 1.5rem;
    }

    .card {
        background-color: white;
        width: 100%;
        max-width: 40rem;
        border-radius: 1.5rem;
        box-shadow: 0 15px 25px rgba(0,0,0,0.1);
        padding: 2.5rem;
        border: 1px solid #e5e7eb;
    }

    .card h1 {
        font-size: 2.25rem;
        font-weight: 800;
        text-align: center;
        color: #111827;
        margin-bottom: 2.5rem;
        line-height: 1.25;
    }

    .card h1 span {
        display: block;
        font-size: 1rem;
        font-weight: 500;
        color: #6b7280;
        margin-top: 0.5rem;
    }

    .link-list {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .link-button {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        border-radius: 1rem;
        color: white;
        text-decoration: none;
        font-size: 1.125rem;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .link-button span:last-child {
        font-size: 1.25rem;
    }

    .link-texts { background-color: #7f1d1d; }
    .link-texts:hover { background-color: #661010; transform: scale(1.02); }

    .link-links { background-color: #1e293b; }
    .link-links:hover { background-color: #0f172a; transform: scale(1.02); }

    .link-images { background-color: #dc2626; }
    .link-images:hover { background-color: #b91c1c; transform: scale(1.02); }

</style>

<div class="gradient-bg">
    <div class="card">
        <h1>
            Tableau de bord de l'administrateur
            <span>Gérez votre contenu efficacement</span>
        </h1>

        <div class="link-list">
            <a href="{{ route('admin.texts.index') }}" class="link-button link-texts">
                <span>Modifier les textes</span>
                <span>&rarr;</span>
            </a>

            <a href="{{ route('admin.links.index') }}" class="link-button link-links">
                <span>Modifier les liens</span>
                <span>&rarr;</span>
            </a>

            <a href="{{ route('admin.images.index') }}" class="link-button link-images">
                <span>Modifier les images</span>
                <span>&rarr;</span>
            </a>
        </div>
    </div>
</div>
@endsection
