<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use App\Models\AuthorModel;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    /**
     * List all books with their authors.
     */
    public function index()
    {
        // Get all books with their author relationship
        $books = BookModel::with('author')->get();

        return response()->json([
            'message' => 'Request successful!',
            'data' => $books
        ], 200);
    }

    /**
     * Create a new book and show its author.
     */
    public function createBook(StoreBookRequest $request)
    {
        // Validate and create a new book with author_id
        $book = BookModel::create($request->all());
        // Load the author relationship
        $book->load('author');

        return response()->json([
            'message' => 'Book created successfully!',
            'data' => $book,
        ], 201);
    }

    /**
     * Show a book by ID, including the author's name.
     */
    public function show($id)
    {
        // Find the book with its author
        $book = BookModel::with('author')->find($id);

        if ($book) {
            return response()->json([
                "message" => "Successfully found book",
                "data" => [
                    "book" => $book,
                    "author_name" => $book->author->name ?? null // Show author name
                ]
            ], 200);
        }

        return response()->json([
            'message' => "Book not found"
        ], 404);
    }

    /**
     * Edit a book (example, you can expand as needed).
     */
    public function edit(Request $request, int $id)
    {
        $book = BookModel::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->update($request->all());
        $book->load('author');
        return response()->json([
            "message" => "Book updated successfully",
            "data" => $book
        ], 200);
    }

    /**
     * Delete a book by ID.
     */
    public function delete(int $id)
    {
        $book = BookModel::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $book->delete();
        return response()->json([
            "message" => "Book with id $id deleted successfully"
        ], 200);
    }
}