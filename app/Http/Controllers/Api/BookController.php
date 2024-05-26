<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
    	$books = Book::orderBy("id", "desc")->simplePaginate(10);

    	return response()->json([
    		'success' => true,
    		'message' => 'Successful in getting all the books',
            'data' => $books,
    	]);
    }

    public function show(Book $book)
    {
    	return response()->json([
    		'success' => true,
    		'message' => 'Successful in getting book',
    		'data' => new BookResource($book)
    	]);
    }

    public function store(Request $request)
    {
    	$rules = [
    		'title' => 'required|max:255',
    		'issued' => 'required|date',
    		'author' => 'required|max:255',
    		'publisher' => 'required|max:255'
    	];

    	$validator = Validator::make($request->all(), $rules);
    	if ($validator->fails()) {
    		return response()->json([
    			'success' => false,
    			'message' => 'Data failed to save',
    			'errors' => $validator->errors()
    		], 422);
    	}

    	$input = [
    		'title' => $request->title,
    		'issued' => $request->issued,
    		'author' => $request->author,
    		'publisher' => $request->publisher
    	];

    	Book::create($input);
    	return response()->json([
			'success' => true,
			'message' => 'Data saved successfully'
		]);
    }

    public function update(Request $request, Book $book)
    {
    	$rules = [
    		'title' => 'required|max:255',
    		'issued' => 'required|date',
    		'author' => 'required|max:255',
    		'publisher' => 'required|max:255'
    	];

    	$validator = Validator::make($request->all(), $rules);
    	if ($validator->fails()) {
    		return response()->json([
    			'success' => false,
    			'message' => 'Data failed to update',
    			'errors' => $validator->errors()
    		], 422);
    	}

    	$input = [
    		'title' => $request->title,
    		'issued' => $request->issued,
    		'author' => $request->author,
    		'publisher' => $request->publisher
    	];

    	$book->update($input);

    	return response()->json([
			'success' => true,
			'message' => 'Data updated successfully'
		]);
    }

    public function destroy(Book $book)
    {
    	$book->delete();

    	return response()->json([
			'success' => true,
			'message' => 'Data deleted successfully'
		]);
    }
}
