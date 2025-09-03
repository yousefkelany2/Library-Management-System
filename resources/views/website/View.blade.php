@include('website.layout.navbar')

<div class="card shadow-lg border-0 rounded-3 w-75 mx-auto my-5">
    <div class="card-body">
        <h4 class="card-title mb-4 text-center fw-bold text-primary">Student Details</h4>

        <table class="table table-striped table-hover table-bordered align-middle text-center">
            <tbody>
              
                <tr>
                    <th class="bg-light">Name</th>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <th class="bg-light">Email</th>
                    <td>{{ $student->email }}</td>
                </tr>
                <tr>
                    <th class="bg-light">Phone</th>
                    <td>{{ $student->phone }}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('Student.edit', $student->id) }}" class="btn btn-primary  px-4">
                <i class="mdi mdi-account-edit me-1"></i> Update
            </a>
            <a href="{{ route('Home.index') }}" class="btn btn-secondary px-4">
                <i class="mdi mdi-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>
</div>

@include('website.layout.footer')
