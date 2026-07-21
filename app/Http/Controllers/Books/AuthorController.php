<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
        public function authorRegister(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'full_name'     => 'required|string|max:255',
            'background'    => 'nullable|string',
        ]);

        // Create a new author record
        $author = Author::create($validatedData);

        return response()->json([
            'success' => true,
            'data'    => $author,
            'message' => 'Author registered successfully.'
        ], 201);
    }
}
