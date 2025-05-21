@extends('layout')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold">Daftar Movie</h1>
    <a href="{{ route('movies.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded text-lg">
        TAMBAHKAN MOVIE
    </a>
</div>

@if (session('success'))
    <div class="bg-green-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
    @forelse ($movies as $movie)
        <div class="bg-gray-800 rounded-xl overflow-hidden shadow-lg">
            <img src="{{ asset('storage/' . $movie->gambar) }}" alt="{{ $movie->judul }}" class="w-full h-60 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-bold">{{ $movie->judul }}</h2>
                <p class="text-yellow-400 text-sm font-semibold mt-1">⭐ {{ $movie->rating ?? '8.0' }} | {{ $movie->season ?? 'S1' }}-{{ $movie->episode ?? 'E1' }}</p>
                <p class="text-gray-300 text-sm mt-1">{{ $movie->genre }}</p>
                <p class="text-gray-400 text-sm">{{ $movie->release_year }}</p>

                <div class="flex justify-between mt-4">
                    <a href="{{ route('movies.edit', $movie) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</a>
                    <form action="{{ route('movies.destroy', $movie) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="col-span-full text-center text-gray-400">Belum ada data movie.</p>
    @endforelse
</div>

<div class="mt-8">
    {{ $movies->links() }}
</div>
@endsection
