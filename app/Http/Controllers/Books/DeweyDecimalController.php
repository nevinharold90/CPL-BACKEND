<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\DeweyDecimal;
use Illuminate\Http\Request;

class DeweyDecimalController extends Controller
{
        public function callnumberRegister(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'dd_number' => 'required|string|max:255|unique:dewey_decimals,dd_number',
            'dd_name' => 'nullable|string|max:255',
        ]);

        // Create a new DeweyDecimal record
        $deweyDecimal = DeweyDecimal::create($validatedData);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Dewey decimal registered successfully.',
            'data'    => $deweyDecimal,
        ], 201);
    }
}
