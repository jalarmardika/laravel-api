@extends('templates.layout')

@section('content')
	<h4>Detail Book</h4>
	<div class="row">
		<div class="col-md-6">
			<div class="card mt-3">
			  <div class="card-body">
			    <h4 class="card-title">{{ $book->title }}</h4>
			    <p class="card-subtitle mb-2 text-muted">Issued : {{ date('d-m-Y', strtotime($book->issued)) }}</p>
			    <h6 class="card-text">Author : {{ $book->author }}</h6>
			    <h6 class="card-text">Publisher : {{ $book->publisher }}</h6>
			  </div>
			</div>
			<a href="{{ url('books') }}" class="btn btn-outline-danger btn-sm mt-3">Back</a>
		</div>
	</div>
@endsection