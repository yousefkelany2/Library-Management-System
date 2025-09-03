@extends('dashbord.layout.main')
@section('content')

<div class="card w-75 mx-auto">
    <div class="card-body">
        <h4 class="card-title mb-3">Student Details</h4>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $student->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $student->email }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $student->phone }}</td>
            </tr>
        </table>

        {{-- عرض بيانات الكتب --}}
        <h5 class="mt-4">Borrowed Books</h5>
        @if($student->borrowedBooks->count() > 0)
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Image</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student->borrowedBooks as $borrow)
                        <tr>
                            <td>{{ $borrow->book->id }}</td>
                            <td>{{ $borrow->book->title }}</td>
                            <td>{{ $borrow->book->author }}</td>
                            <td>
                                @if($borrow->book->image)
                                    <img src="{{ asset('storage/'.$borrow->book->image) }}"
                                         alt="Book Image"
                                         width="80"
                                         class="img-thumbnail">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $borrow->borrow_date }}</td>
                            <td>{{ $borrow->return_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-danger">No books borrowed by this student.</p>
        @endif

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-info">Update</a>

            <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <input type="submit"
                       value="Delete"
                       class="btn btn-danger"
                       onclick="return confirm('Are you sure you want to delete this student?')">
            </form>

            <a href="{{ route('student.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

@endsection
