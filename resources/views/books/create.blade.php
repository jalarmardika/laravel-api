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
							<input type="text" name="title" required class="form-control" autofocus>
						</div>
						<div class="form-group">
							<label>Issued</label>
							<input type="date" name="issued" required class="form-control">
						</div>
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="author" required class="form-control">
						</div>
						<div class="form-group">
							<label>Publisher</label>
							<input type="text" name="publisher" required class="form-control">
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