@extends('templates.layout')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h4>Data Books</h4>
			@if(session()->has('success'))
				<div class="alert alert-success mt-3">
					<button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					{{ session('success') }}
				</div>
			@endif

			<a href="{{ url('books/create') }}" class="btn btn-outline-primary btn-sm my-3">Add Book</a>
			<table class="table table-bordered table-striped table-hover mb-5">
				<thead>
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Issued</th>
						<th>Author</th>
						<th>Publisher</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($books as $book)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $book->title }}</td>
						<td>{{ date('d-m-Y', strtotime($book->issued)) }}</td>
						<td>{{ $book->author }}</td>
						<td>{{ $book->publisher }}</td>
						<td>
							<a href="{{ url('books/' . $book->id) }}" class="btn btn-outline-success btn-sm">Detail</a>
							<a href="{{ url('books/' . $book->id . '/edit') }}" class="btn btn-outline-warning btn-sm">Edit</a>
							<form action="{{ url('books/' . $book->id) }}" method="post" class="form-delete d-inline">
								@csrf
								@method('delete')
								<button type="submit" name="submit" class="btn btn-outline-danger btn-sm">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<script type="text/javascript">
		const formDeletes = document.querySelectorAll('.form-delete');
		formDeletes.forEach(function(formDelete) {
			formDelete.onsubmit = () => confirm('Are you sure ?');
		});
	</script>
@endsection