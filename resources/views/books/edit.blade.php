@extends('templates.layout')

@section('content')
	<h3>Edit Book</h3>
	<div class="row">
		<div class="col-md-6">
			<div class="card mt-4">
				<div class="card-body">
					<form action="{{ url('books/' . $book->id) }}" method="post">
						@csrf
						@method('put')
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" required class="form-control" value="{{ $book->title }}" autofocus>
						</div>
						<div class="form-group">
							<label>Issued</label>
							<input type="date" name="issued" required class="form-control" value="{{ $book->issued }}">
						</div>
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="author" required class="form-control" value="{{ $book->author }}">
						</div>
						<div class="form-group">
							<label>Publisher</label>
							<input type="text" name="publisher" required class="form-control" value="{{ $book->publisher }}">
						</div>
						<div>
							<button type="submit" name="submit" class="btn btn-outline-primary btn-sm float-right">Update Book</button>
							<a href="{{ url('books') }}" class="btn btn-outline-danger btn-sm float-right mr-2">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection