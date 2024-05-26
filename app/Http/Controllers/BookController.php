<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->page)) {
            $req = Http::get(url("api/books?page=" . $request->page));
        } else {
    	    $req = Http::get(url("api/books"));
        }

    	if ($req->ok()) {
    		// ubah response body json menjadi objek
    		$response = json_decode($req->body());

            foreach ($response as $key => $value) {
                // tambahkan property baru untuk url yang akan digunakan frontend
                $response->data->next_url = str_replace(url("api/books"), url('books'), $response->data->next_page_url);
                $response->data->prev_url = str_replace(url("api/books"), url('books'), $response->data->prev_page_url);
            }

    		return view("books.index", [
    			"books" => $response->data
            ]);

    	} else {
            abort($req->status());
        }
    }

    public function show($id)
    {
    	$request = Http::get(url("api/books/" . $id));
    	if ($request->ok()) {
    		$response = json_decode($request->body());

    		return view("books.detail", [
    			"book" => $response->data
    		]);
    	} else {
            abort($request->status());
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
		$response = json_decode($req->body());

    	if ($req->ok()) {
    		return redirect("books")->with("success", $response->message);
    	} elseif ($req->status() === 422) {
            return redirect('books/create')->withErrors($response->errors)->withInput();
    	} else {
            abort($req->status());
        }
    }

    public function edit($id)
    {
    	$request = Http::get(url("api/books/" . $id));
    	if ($request->ok()) {
    		$response = json_decode($request->body());

    		return view("books.edit", [
    			"book" => $response->data
    		]);
    	} else {
            abort($request->status());
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
        $response = json_decode($req->body());
        
        if ($req->ok()) {
            return redirect("books")->with("success", $response->message);
        }  elseif ($req->status() === 422) {
            return redirect('books/' . $id . '/edit')->withErrors($response->errors)->withInput();
        } else {
            abort($req->status());
        }
    }

    public function destroy($id)
    {
    	$req = Http::delete(url("api/books/" . $id));
        if ($req->ok()) {
            $response = json_decode($req->body());
            return redirect("books")->with("success", $response->message);
        } else {
            abort($req->status());
        }
    }
}
