<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index()
    {
    	$request = Http::get(url("api/books"));
    	if ($request->ok()) {
    		// ubah response body json menjadi objek
    		$response = json_decode($request->body());

    		return view("books.index", [
    			"books" => $response->data
            ]);    
    	}
    }

    public function show($id)
    {
    	$request = Http::get(url("api/books/" . $id));
    	if ($request->ok()) {
    		// ubah response body json menjadi objek
    		$response = json_decode($request->body());

    		return view("books.detail", [
    			"book" => $response->data
    		]);
    	}
    }

    public function create()
    {
    	return view("books.create");
    }

    public function store(Request $request)
    {
    	$input = [
    		"title" => $request->title,
    		"issued" => $request->issued,
    		"author" => $request->author,
    		"publisher" => $request->publisher
    	];

    	$req = Http::post(url("api/books"), $input);
    	if ($req->ok()) {
    		// ubah response body json menjadi objek
    		$response = json_decode($req->body());

    		return redirect("books")->with("success", $response->message);
    	} else {

    	}
    }

    public function edit($id)
    {
    	$request = Http::get(url("api/books/" . $id));
    	if ($request->ok()) {
    		// ubah response body json menjadi objek
    		$response = json_decode($request->body());

    		return view("books.edit", [
    			"book" => $response->data
    		]);
    	}
    }

    public function update(Request $request, $id)
    {
    	$input = [
            "title" => $request->title,
            "issued" => $request->issued,
            "author" => $request->author,
            "publisher" => $request->publisher
        ];

        $req = Http::put(url("api/books/" . $id), $input);
        if ($req->ok()) {
            // ubah response body json menjadi objek
            $response = json_decode($req->body());

            return redirect("books")->with("success", $response->message);
        } else {

        }
    }

    public function destroy($id)
    {
    	$req = Http::delete(url("api/books/" . $id));
        if ($req->ok()) {
            // ubah response body json menjadi objek
            $response = json_decode($req->body());
            return redirect("books")->with("success", $response->message);
        }
    }
}
