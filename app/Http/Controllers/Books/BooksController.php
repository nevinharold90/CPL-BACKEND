<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\Book;
use App\Models\BookClassification;
use App\Models\DeweyDecimal;
use App\Models\BookAuthor;
use App\Models\Author;
use App\Models\BookCopy;

class BooksController extends BaseController
{
    public function bookIndex()
    {
        // Fetch books without deep nesting
        $books = Book::all();

        return response()->json([
            'success' => true,
            'data'    => $books
        ]);
    }



    // Book Registration Function Starts Here
    public function registerBook(Request $request)
    {
        // 1. Validate incoming data
        $validator = Validator::make($request->all(), [
            'title'            => 'required|string|max:255',
            'image_url'        => 'nullable|string',
            'author_ids'       => 'required|array|min:1',
            'author_ids.*'     => 'required|string',
            'book_type'        => 'required|in:fiction,non-fiction',

            // Required ONLY for non-fiction, optional/nullable for fiction
            'dewey_decimal_id' => 'required_if:book_type,non-fiction|nullable|exists:dewey_decimals,id',

            'cutter'           => 'required|string',
            'year_published'   => 'required|digits:4',
            'location'         => 'required|string',
            'category'         => 'required|string',
            'source_of_fund'   => 'nullable|string',
            'condition'        => 'nullable|string',
            'number_of_copies' => 'nullable|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            // 2. Perform database transaction
            $response = DB::transaction(function () use ($request) {
                // A. Save Main Book Record
                $book = Book::create([
                    'users_id'  => $request->user()?->id ?? 1, // Fallback to 1 during local testing
                    'title'     => $request->title,
                    'image_url' => $request->image_url,
                ]);

                // B. Dynamic Author Lookup / Auto-creation
                foreach ($request->author_ids as $authorInput) {
                    if (is_numeric($authorInput)) {
                        $authorId = (int) $authorInput;
                    } else {
                        $author = Author::firstOrCreate([
                            'full_name' => trim($authorInput)
                        ]);
                        $authorId = $author->id;
                    }

                    BookAuthor::create([
                        'book_id'   => $book->id,
                        'author_id' => $authorId,
                    ]);
                }

                // C. Save Book Classification
                // If fiction, we pass null for dewey_decimal_id
                $deweyId = $request->book_type === 'fiction' ? null : $request->dewey_decimal_id;

                $classification = BookClassification::create([
                    'book_id'          => $book->id,
                    'dewey_decimal_id' => $deweyId,
                    'book_type'        => $request->book_type,
                    'cutter'           => $request->cutter,
                    'year_published'   => $request->year_published,
                    'location'         => $request->location,
                    'category'         => $request->category,
                ]);

                // D. Construct Call Number
                if ($request->book_type === 'fiction') {
                    $prefix = 'F/FIC';
                } else {
                    $dewey = DeweyDecimal::find($request->dewey_decimal_id);
                    // Adjust 'class_number' to match your column name (e.g., dd_number, class_number, dewey_code)
                    $prefix = $dewey->class_number ?? $dewey->dd_number ?? '';
                }

                $generatedCallNumber = trim("{$prefix} {$request->cutter} {$request->year_published}");

                // E. Generate Book Copies with Auto-generated Barcodes
                $copiesCount = $request->number_of_copies ?? 1;
                $registeredCopies = [];

                for ($i = 0; $i < $copiesCount; $i++) {
                    $uniqueIdentifier = strtoupper(Str::random(8));
                    $barcodeData     = 'CPL-' . date('Y') . '-' . mt_rand(100000, 999999);
                    $qrCodeData      = 'QR-CPL-' . $book->id . '-' . $uniqueIdentifier;
                    $accessionNumber = 'ACC-' . date('Y') . '-' . sprintf('%06d', mt_rand(1, 999999));

                    $copy = BookCopy::create([
                        'book_id'             => $book->id,
                        'barcode_data'        => $barcodeData,
                        'qrcode_data'         => $qrCodeData,
                        'accession_number_id' => $accessionNumber,
                        'status'              => 'available',
                        'source_of_fund'       => $request->source_of_fund ?? 'Purchased',
                        'condition'           => $request->condition ?? 'Good',
                    ]);

                    $registeredCopies[] = $copy;
                }

                return [
                    'book'           => $book,
                    'classification' => $classification,
                    'call_number'    => $generatedCallNumber,
                    'copies'         => $registeredCopies,
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Book and copies registered successfully.',
                'data'    => $response
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to register book.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
    // Book Registration Function Ends Here
}
