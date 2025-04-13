@extends('layouts.app')

@section('content')
<style>
    .admin-images-wrapper {
        min-height: 100vh;
        background: linear-gradient(to bottom right, #991b1b, #fce7f3, #ffffff);
        padding: 3rem 1rem;
        display: flex;
        justify-content: center;
        align-items: start;
    }

    .admin-images-box {
        background-color: white;
        width: 100%;
        max-width: 80rem;
        border-radius: 1.5rem;
        padding: 2rem;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .admin-images-box h2 {
        font-size: 2rem;
        font-weight: 800;
        color: #1f2937;
        text-align: center;
        margin-bottom: 2rem;
    }

    .admin-images-box h2 span {
        display: block;
        font-size: 1rem;
        font-weight: 500;
        color: #6b7280;
        margin-top: 0.5rem;
    }

    .images-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
    }

    .image-item {
        background-color: white;
        border: 1px solid #e5e7eb;
        border-radius: 1rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        text-align: center;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .image-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .image-item img {
        max-width: 100%;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }

    .image-item p {
        font-size: 1rem;
        color: #374151;
        margin-bottom: 1rem;
        word-wrap: break-word;
    }

    .edit-link {
        display: inline-block;
        background-color: #1e293b;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.2s ease;
    }

    .edit-link:hover {
        background-color: #0f172a;
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

<div class="admin-images-wrapper">
    <div class="admin-images-box">
        <h2>🖼️ Gestion des images <span>Ajoutez, modifiez ou gérez vos images</span></h2>

        <!-- Images List -->
        <div class="images-container">
            @foreach ($images as $image)
                <div class="image-item">
                    <img src="{{ asset('storage/images/' . $image->filename) }}" alt="{{ $image->original_name }}" />
                    <p>{{ $image->original_name }}</p>
                    <a href="{{ route('admin.images.edit', $image->id) }}" class="edit-link">✏️ Modifier</a>
                </div>
                
            @endforeach
        </div>
    </div>
</div>
@endsection