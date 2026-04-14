<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(Request $request)
{
    $query = Book::query();

    if ($request->filled('search')) {
        $search = trim($request->search);
        $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhere('author', 'LIKE', "%{$search}%");
        });
    }

    if ($request->filled('genre')) {
        $query->where('genre', $request->genre);
    }

    if ($request->has('available') && $request->available !== null && $request->available !== '') {
        $query->where('is_available', $request->available);
    }

    $books = $query->latest()->get();

    $genres = Book::distinct()->pluck('genre');

    return view('book_registration.index', compact('books', 'genres'));
}

    public function create()
    {
        return view('book_registration.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'isbn'           => 'required|unique:books,isbn',
            'author'         => 'required|string|max:255',
            'publisher'      => 'required', 
            'genre'          => 'required',
            'description'    => 'required',
            'published_year' => 'required|integer',
            'pages'          => 'required|integer',
            'price'          => 'required|numeric',
        ]);

        $validated['is_available'] = $request->has('is_available') ? 1 : 0;

        Book::create($validated);

        return redirect('/books')->with('success', 'Book created successfully!');
    }

    public function edit(Book $book)
    {
        return view('book_registration.edit', ['book' => $book]);
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'isbn'           => 'required|unique:books,isbn,' . $book->id,
            'author'         => 'required|string|max:255',
            'publisher'      => 'required', 
            'genre'          => 'required',
            'description'    => 'required',
            'published_year' => 'required|integer',
            'pages'          => 'required|integer',
            'price'          => 'required|numeric',
        ]);

        $validated['is_available'] = $request->has('is_available') ? 1 : 0;

        $book->update($validated);

        return redirect('/books')->with('success', 'Book updated successfully!');;
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books')->with('success', 'Book deleted permanently!');
    }
}