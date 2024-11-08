@extends('layouts.app')

@section('content')
    <h1>Gallery</h1>
    <a href="{{ route('galleries.create') }}">Upload New Image</a>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <div class="gallery">
        @foreach ($galleries as $gallery)
            <div class="image-item">
                <img src="{{ asset('images/' . $gallery->image) }}" alt="{{ $gallery->image }}" style="width:200px;height:200px;">
                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
