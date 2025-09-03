@extends('dashbord.layout.main')
@section('content')
<a href= "{{ route("student.create") }}" class="btn btn-success  mb-3">Add student</a>
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Student table</h4>
      </p>
       @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif
      <table class="table table-bordered">
    <thead>
      <tr>
        <th> # </th>
        <th> Name </th>
        <th> Email </th>
        <th> Phone </th>
        <th> Books </th>
        <th>Edit/Delete</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($Student as $key => $student)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->phone }}</td>

        {{-- كتب الطالب --}}
        <td>
            @forelse ($student->borrowedBooks as $borrowed)
                {{ $borrowed->book->title }} <br>
            @empty
                <span class="text-muted">No Books</span>
            @endforelse
        </td> 

        <td class=" d-flex gap-2">
            <a href="{{ route('student.show', $student->id) }}" class="btn btn-primary ">
                View
            </a>
            <a href="{{ route("student.edit",$student->id) }}" class="btn btn-info">Update</a>

            <form action="{{ route("student.destroy",$student->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <input type="submit" value="Delete" class="btn btn-danger"
                 onclick="return confirm('Are you sure you want to delete this student?')">
            </form>
        </td>
    </tr>
    @empty
    @endforelse
    </tbody>
</table>

    </div>
  </div>
@endsection
