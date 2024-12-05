<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class RechercheController extends Controller
{
    public function searchBooks(Request $request)
    {
        $query = Book::query();

        // Filtre par nom (titre)
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        // Filtre par auteur
        if ($request->filled('author')) {
            $query->where('author', 'like', '%' . $request->input('author') . '%');
        }

        // Filtre par année de publication
        if ($request->filled('publication_year')) {
            $query->whereYear('publication_date', $request->input('publication_year'));
        }

        // Filtre par plage de prix
        if ($request->filled('price_min') && $request->filled('price_max')) {
            $query->whereBetween('price', [$request->input('price_min'), $request->input('price_max')]);
        }

        // Récupérer les livres filtrés
        $books = $query->get();

        // Retourner la vue avec les résultats
        return view('searchBooks', ['books' => $books]);
    }

    
}