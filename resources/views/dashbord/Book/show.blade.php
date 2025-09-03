@extends('dashbord.layout.main')
@section('content')

<div class="card w-50 mx-auto">
    <div class="card-body">
        <h4 class="card-title mb-3">Book Details</h4>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $book->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{ $book->author }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $book->description }}</td>
            </tr>
            <tr>
                <th>Count</th>
                <td>{{ $book->count }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                   <tr>
    <th>Image</th>
    <td class="text-center">
        @if($book->image)
            <img src="{{ asset('storage/' . $book->image) }}"
                 alt="Book Image"
                 class="img-thumbnail rounded"
                 style="width: 150px; height: auto;">
        @else
            <span class="text-muted">No image uploaded</span>
        @endif
    </td>
</tr>

                </td>
            </tr>
        </table>

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-info">Update</a>
              <a href="{{ route('BorrowedBook.show', $book->id) }}" class="btn btn-info">Take</a>

            <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <input type="submit"
                       value="Delete"
                       class="btn btn-danger"
                       onclick="return confirm('Are you sure you want to delete this book?')">
            </form>

            <a href="{{ route('book.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

@endsection
