<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public $books = [
        ['id'=> 1, 'title'=> 'book 01', 'author'=> 'author 01', 'isbn'=> 'ISBN-0001', 'publicationYear'=> 2001, 'genre'=> 'Science', 'availableCopies'=> 5],
        ['id'=> 2, 'title'=> 'book 02', 'author'=> 'author 02', 'isbn'=> 'ISBN-0002', 'publicationYear'=> 2005, 'genre'=> 'genre 02', 'availableCopies'=> 3],
        ['id'=> 3, 'title'=> 'book 03', 'author'=> 'author 03', 'isbn'=> 'ISBN-0003', 'publicationYear'=> 2010, 'genre'=> 'genre 03', 'availableCopies'=> 0],
    ];
    public function delete(int $id){
        return response()->json([
            "message" => "Book with id $id deleted successfully",
            "data" => [
                "id" => $id
            ]
        ], 200);
    }
    

    public function edit(Request $request, int $id){
        return response()-> json([
            "id" => $id,
            "data" => [
                "title" => $request->title,
                "author" => $request->author,
                "ibsn" => $request->isbn,
                "publicationYear" => $request->publicationYear,
                "genre" => $request->genre,
                "availableCopies" => $request->availableCopies
            ]
            ], 200);
    }

    public function createBook(Request $request) {
        return response() -> json([
            "message" => "Successful",
            "data" => [
                'title' => $request->title,
                "author" => $request->author,
                "isbn" => $request->isbn,
                "publicationYear" => $request->publicationYear,
                "genre" => $request->genre,
                "availableCopies" => $request->availableCopies
            ]
        ], 201);
    }
    public function index() {
        return response()->json([
            'message' => 'request successfully!',
            'data' => $this->books
        ], 200);
        return response()->json([
            'message' => 'No books found',
        ], 204);
    }


    public function show(String $id){
        foreach($this->books as $book){
            if($book['id'] == $id){
                return response()-> json([
                    "message" => "successfully",
                    "data" => $book
                ], 200);
            } 
        }
        return response()->json([
            'message' => ""
        ], 204);
    }
    
}
