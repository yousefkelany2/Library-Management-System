@extends('dashbord.layout.main')
@section('content')
<a href= "{{ route("admin.create") }}" class="btn btn-success  mb-3">Add Admin</a>
<div class="card">
    <div class="card-body">
      <h4 class="card-title">admin table</h4>
      </p>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th> # </th>
            <th> Name </th>
            <th> Email </th>
            <th> Phone </th>
            <th>Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
        @forelse ($Admin as $key => $admin)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>{{ $admin->phone }}</td>
<td class="d-flex gap-2">
        @if(auth('admin')->id() === $admin->id)
    <a href="{{ route('admin.show', $admin->id) }}" class="btn btn-primary">
        View
    </a>


        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-info">Update</a>

       {{--  <form action="{{ route('admin.destroy', $admin->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <input type="submit" value="Delete" class="btn btn-danger"
                   onclick="return confirm('Are you sure you want to delete this admin?')">
        </form> --}}
    @endif
</td>

        </tr>

        @empty

        @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
