@extends('layout')

@section('content')
<h2 class="text-2xl font-bold mb-6">Tambahkan Movie Baru</h2>

<form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-800 p-6 rounded-xl">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block mb-1">Judul</label>
            <input type="text" name="judul" class="w-full p-2 rounded bg-gray-700 text-white" required>
        </div>
        <div>
            <label class="block mb-1">Genre</label>
            <input type="text" name="genre" class="w-full p-2 rounded bg-gray-700 text-white">
        </div>
        <div>
            <label class="block mb-1">Tahun Rilis</label>
            <input type="number" name="release_year" class="w-full p-2 rounded bg-gray-700 text-white">
        </div>
        <div>
            <label class="block mb-1">Rating</label>
            <input type="text" name="rating" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="cth: 8.5">
        </div>
        <div>
            <label class="block mb-1">Season</label>
            <input type="text" name="season" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="cth: S1">
        </div>
        <div>
            <label class="block mb-1">Episode</label>
            <input type="text" name="episode" class="w-full p-2 rounded bg-gray-700 text-white" placeholder="cth: E3">
        </div>
    </div>
    <div class="mt-4">
        <label class="block mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="4" class="w-full p-2 rounded bg-gray-700 text-white"></textarea>
    </div>
    <div class="mt-4">
        <label class="block mb-1">Gambar</label>
        <input type="file" name="gambar" class="text-white">
    </div>
    <div class="mt-6 text-right">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Simpan</button>
    </div>
</form>
@endsection
