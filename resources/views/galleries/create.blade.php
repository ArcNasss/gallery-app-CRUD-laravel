@extends('layouts.app')

@section('content')
    <h1>Upload New Image</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Choose Image:</label>
        <input type="file" id="image" name="image">
        <button type="submit">Upload</button>
    </form>
@endsection
