<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function getBooks(){
        $books = Book::all(); 
        return view('home', ['books' => $books]);
    }

    public function showAddBookForm(Request $request){
        return view('addBookForm');

    }


    public function addBook(Request $request){
        $fields = $request->validate([
            'title' => ['required'],
            'author' => ['required'],
            'publication_date' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $books = Book::create($fields); 

        if( $books->count() > 0){
            $books = Book::all(); 
            echo "Ajout du livre avec succes";
            return view('home', ['books' => $books]);
        }else{
            return back()->with('error','Erreur lors de l\'ajout');
        };
    }   

    public function showBookDetail($id){
        $book = Book::find($id);
        return view('bookDetail', ['book' => $book]);
    }

    public function deleteBook($id)
    {
        $book = Book::find($id);
    
        if ($book) {
            $book->delete(); 
            echo "Suppression avec succès du livre avec l'ID : $id";
            $books = Book::all(); 
            return view('home', ['books' => $books]);
        } else {
            echo "Aucun livre trouvé pour l'ID : $id";
            $books = Book::all(); 
            return view('home', ['books' => $books]);
          }
    }

    
    public function showEditBookForm(){
        
    }

    public function editBook($id, Request $request){
    
        $book = Book::find($id);

        if ($book) {
            $book->title = $request->input('title', $book->title);
            $book->author = $request->input('author', $book->author);
            $book->published_date = $request->input('published_date', $book->published_date);
    
            $book->save();
            
        } else {
            echo "Erreur lors de la modification ";
                }
    
        $books = Book::all();
        return view('home', ['books' => $books]);
    }

}
