@extends("dashbord.layout.main")

@section('content')

<a href= "{{ route("book.create") }}" class="btn btn-success  mb-3">Add book</a>

<div class="card">
    <div class="card-body">
      <h4 class="card-title">book table</h4>
      </p>
      <div style="overflow-x: auto; white-space: nowrap;">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th> # </th>
            <th> Title </th>
            <th> Author </th>
            <th> Description </th>
            <th> Count </th>
            <th> Image </th>
            <th>Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
        @forelse ($Book as $key => $book)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->description }}</td>
            <td>{{ $book->count }}</td>
            <td>
                <img src="{{ asset('storage/' . $book->image) }}"
                     alt="book image" width="120" class="mb-2">
            </td>
            <td class="d-flex gap-2">
                <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary">View</a>
                <a href="{{ route('book.edit',$book->id) }}" class="btn btn-info">Update</a>
                <form action="{{ route('book.destroy',$book->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="Delete" class="btn btn-danger"
                           onclick="return confirm('Are you sure you want to delete this book?')">
                </form>
            </td>
        </tr>
        @empty
        @endforelse
        </tbody>
    </table>
</div>

    </div>
  </div>

@endsection
