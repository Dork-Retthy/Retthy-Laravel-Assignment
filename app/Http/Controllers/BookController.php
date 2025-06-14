<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public $books = [
        ['id'=> 1, 'title'=> 'book 01', 'author'=> 'author 01', 'year'=> 2001],
        ['id'=> 2, 'title'=> 'book 02', 'author'=> 'author 02', 'year'=> 2005],
        ['id'=> 3, 'title'=> 'book 03', 'author'=> 'author 03', 'year'=> 2010],
    ];

    

    public function edit(Request $request, int $id){
        return response()-> json([
            "id" => $id,
            "data" => [
                "title" => $request->title,
                "author" => $request->author,
                "year" => $request->year
            ]
            ], 200);
    }

    public function createBook(Request $request) {
        return response() -> json([
            "message" => "Successful",
            "data" => [
                'title' => $request->title,
                "author" => $request->author,
                "year" => $request->year
            ]
        ], 201);
    }
    public function index() {
        $book = new BookModel();
        return response()->json([
            'message' => 'request successfully!',
            //data normally get from model that query from db
            'data' => $book::all(),
        ], 200);
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
