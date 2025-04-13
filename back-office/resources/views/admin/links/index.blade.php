@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Links</h1>
    @foreach ($links as $link)
        <div class="link-item">
            <p>{{ $link->url }}</p>
            <a href="{{ route('admin.links.edit', $link->id) }}" class="btn btn-secondary">Edit</a>
        </div>
    @endforeach
</div>
@endsection
