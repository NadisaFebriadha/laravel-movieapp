@extends('layout')

@section('content')
<h2 class="text-2xl font-bold mb-6">Edit Movie: {{ $movie->judul }}</h2>

<form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-xl">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block mb-1">Judul</label>
            <input type="text" name="judul" value="{{ $movie->judul }}" class="w-full p-2 rounded bg-gray-700 text-white" required>
        </div>
        <div>
            <label class="block mb-1">Genre</label>
            <input type="text" name="genre" value="{{ $movie->genre }}" class="w-full p-2 rounded bg-gray-700 text-white">
        </div>
        <div>
            <label class="block mb-1">Tahun Rilis</label>
            <input type="number" name="release_year" value="{{ $movie->release_year }}" class="w-full p-2 rounded bg-gray-700 text-white">
        </div>
        <div>
            <label class="block mb-1">Rating</label>
            <input type="text" name="rating" value="{{ $movie->rating }}" class="w-full p-2 rounded bg-gray-700 text-white">
        </div>
        <div>
            <label class="block mb-1">Season</label>
            <input type="text" name="season" value="{{ $movie->season }}" class="w-full p-2 rounded bg-gray-700 text-white">
        </div>
        <div>
            <label class="block mb-1">Episode</label>
            <input type="text" name="episode" value="{{ $movie->episode }}" class="w-full p-2 rounded bg-gray-700 text-white">
        </div>
    </div>
    <div class="mt-4">
        <label class="block mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="4" class="w-full p-2 rounded bg-gray-700 text-white">{{ $movie->deskripsi }}</textarea>
    </div>
    <div class="mt-4">
        <label class="block mb-1">Gambar Saat Ini</label>
        @if ($movie->gambar)
            <img src="{{ asset('storage/' . $movie->gambar) }}" class="w-32 h-32 object-cover rounded mb-2">
        @endif
        <input type="file" name="gambar" class="text-white">
    </div>
    <div class="mt-6 text-right">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Update</button>
    </div>
</form>
@endsection
