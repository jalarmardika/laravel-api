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
							<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $book->title) }}" autofocus>
							@error('title')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="form-group">
							<label>Issued</label>
							<input type="date" name="issued" class="form-control @error('issued') is-invalid @enderror" value="{{ old('issued', $book->issued) }}">
							@error('issued')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $book->author) }}">
							@error('author')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="form-group">
							<label>Publisher</label>
							<input type="text" name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher', $book->publisher) }}">
							@error('publisher')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
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