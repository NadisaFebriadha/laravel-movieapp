<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(5); // Bisa diubah jumlah per halaman
        return view('movies.index', compact('movies'));
    }

    public function like(Movie $movie)
    {
        $movie->increment('likes');
        return back()->with('success', 'Kamu menyukai film ini!');
    }
    public function dislike($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->increment('dislikes');
        return back();
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'genre' => 'required',
            'release_year' => 'required|integer',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('movies', 'public');
        }

        Movie::create($validated);

        return redirect()->route('movies.index');
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'genre' => 'required',
            'release_year' => 'required|integer',
            'gambar' => 'nullable|image'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('movies', 'public');
        }

        $movie->update($validated);

        return redirect()->route('movies.index');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
