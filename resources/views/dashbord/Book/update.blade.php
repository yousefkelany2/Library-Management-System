@extends("dashbord.layout.main")

@section('content')

<div class="card-body">
    <h4 class="card-title">Update Book</h4>
    <p class="card-description"> Edit book details </p>

    <form class="forms-sample" method="POST" action="{{ route("book.update", $book->id) }}" enctype="multipart/form-data">
      @csrf
      @method("PUT")

      <div class="form-group">
        @error('title') <p style="color: red">{{ $message }}</p> @enderror
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title"
               value="{{ old('title', $book->title) }}" placeholder="Title">
      </div>

      <div class="form-group">
        @error('author') <p style="color: red">{{ $message }}</p> @enderror
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" id="author"
               value="{{ old('author', $book->author) }}" placeholder="Author">
      </div>

      <div class="form-group">
        @error('description') <p style="color: red">{{ $message }}</p> @enderror
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" id="description"
               value="{{ old('description', $book->description) }}" placeholder="Description">
      </div>

      <div class="form-group">
        @error('count') <p style="color: red">{{ $message }}</p> @enderror
        <label for="count">Count</label>
        <input type="number" name="count" class="form-control" id="count"
               value="{{ old('count', $book->count) }}" placeholder="Count">
      </div>

      <div class="form-group">
        @error('image') <p style="color: red">{{ $message }}</p> @enderror
        <label>Current Image</label><br>
        @if($book->image)
            <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" width="120" class="mb-2">
        @else
            <p>No image uploaded</p>
        @endif
        <br><br>
        <label>Upload New Image (optional)</label>
        <input type="file" name="image" class="file-upload-default">
        <div class="input-group col-xs-12">
          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
          <span class="input-group-append">
            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
          </span>
        </div>
      </div>

      <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
      <a href="{{ route('book.index') }}" class="btn btn-light">Cancel</a>
    </form>
  </div>

@endsection
