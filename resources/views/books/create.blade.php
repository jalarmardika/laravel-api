@extends('templates.layout')

@section('content')
	<h3>Add Book</h3>
	<div class="row">
		<div class="col-md-6">
			<div class="card mt-4">
				<div class="card-body">
					<form action="{{ url('books') }}" method="post">
						@csrf
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" autofocus>
							@error('title')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="form-group">
							<label>Issued</label>
							<input type="date" name="issued" class="form-control @error('issued') is-invalid @enderror" value="{{ old('issued') }}">
							@error('issued')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}">
							@error('author')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div class="form-group">
							<label>Publisher</label>
							<input type="text" name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher') }}">
							@error('publisher')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
							@enderror
						</div>
						<div>
							<button type="submit" name="submit" class="btn btn-outline-primary btn-sm float-right">Save Book</button>
							<a href="{{ url('books') }}" class="btn btn-outline-danger btn-sm float-right mr-2">Back</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection