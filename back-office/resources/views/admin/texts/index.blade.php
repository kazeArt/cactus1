@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Text Messages</h1>
    @foreach ($texts as $text)
        <div class="text-item">
            <p>{{ $text->content }}</p>
            <a href="{{ route('admin.texts.edit', $text->id) }}" class="btn btn-secondary">Edit</a>
        </div>
    @endforeach
</div>
@endsection
