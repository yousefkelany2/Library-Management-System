
@extends("dashbord.layout.main")

@section('content')

<div class="card-body">
    <h4 class="card-title">Default form</h4>
    <p class="card-description"> Basic form layout </p>
    <form class="forms-sample" method="POST" action="{{ route("book.store") }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        @error('title') <p style="color: red" >{{ $message }}</p> @enderror
        <label for="exampleInputUsername1">Title</label>
        <input type="text"  name="title" class="form-control" id="exampleInputUsername1" placeholder="Title">
      </div>
      <div class="form-group">
        @error('author') <p style="color: red" >{{ $message }}</p> @enderror
        <label for="exampleInputPrice">Author</label>
        <input type="text" name="author" class="form-control" id="exampleInputPrice" placeholder="Author">
      </div>
      <div class="form-group">
        @error('description') <p style="color: red" >{{ $message }}</p> @enderror
        <label for="exampleInputSale">Description</label>
        <input type="text" name="description" class="form-control" id="exampleInputSale" placeholder="Description">
      </div>
      <div class="form-group">
        @error('count') <p style="color: red" >{{ $message }}</p> @enderror
        <label for="exampleInputCount">Count</label>
        <input type="number" name="count" class="form-control" id="exampleInputCount" placeholder="Count">
      </div>




      <div class="form-group">
        @error('image') <p style="color: red" >{{ $message }}</p> @enderror
        <label>File upload</label>
        <input type="file"  name="image" class="file-upload-default">
        <div class="input-group col-xs-12">
          <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
          <span class="input-group-append">
            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
          </span>
        </div>
      </div>



      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
      <button class="btn btn-light">Cancel</button>
    </form>
  </div>

@endsection
