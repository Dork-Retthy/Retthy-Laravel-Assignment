<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\AuthorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public $authors = [
        ['id'=> 1, 'name'=> 'author 01', 'bio'=> 'Bio of author 01', 'nationality'=> 'American'],
        ['id'=> 2, 'name'=> 'author 02', 'bio'=> 'Bio of author 02', 'nationality'=> 'British'],
        ['id'=> 3, 'name'=> 'author 03', 'bio'=> 'Bio of author 03', 'nationality'=> 'Canadian'],
    ];

    public function index() {
        return response()->json([
            'message' => 'Authors retrieved successfully!',
            'data' => $this->authors
        ], 200);
    }
    public function show(int $id) {
        $author = collect($this->authors)->firstWhere('id', $id);
        if ($author) {
            return response()->json([
                'message' => 'Author found!',
                'data' => $author
            ], 200);
        } else {
            return response()->json([
                'message' => 'Author not found',
            ], 404);
        }
    }
    public function createAuthor(Request $request) {
        return response() -> json([
            "message" => "Successful",
            "data" => [
                "name" => $request->name,
                "bio" => $request->bio,
                "nationality" => $request->nationality
            ]
        ], 201);
    }

    // public function createAuthor(StoreAuthorRequest $request){
    //     $author = AuthorModel::create($request->all());
    //     return response()->json([
    //         "message" => "Author created successfully!",
    //         "data" => $author,
    //     ], 201);
    // }

    public function edit(Request $request, int $id){
        return response()-> json([
            "id" => $id,
            "data" => [
                "name" => $request->name,
                "bio" => $request->bio,
                "nationality" => $request->nationality
            ]
            ], 200);
    }
    public function delete(int $id){
        return response()->json([
            "message" => "Author with id $id deleted successfully",
            "data" => [
                "id" => $id
            ]
        ], 200);
    }
    public function countAuthors() {
        return response()->json([
            'message' => 'Total authors count retrieved successfully!',
            'data' => ['count' => count($this->authors)]
        ], 200);
    }
}
