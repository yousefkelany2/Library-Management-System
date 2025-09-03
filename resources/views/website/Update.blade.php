@include('website.layout.navbar')
<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
}

.btn-primary {
    background-color: #0167f3;
    border: none;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #014bb3;
}
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center bg-info text-white">
                    <h4>Update Student</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('Student.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label"> Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $student->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $student->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" value="{{ $student->phone }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (leave blank if not changing)</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter new password if you want">
                        </div>

                        <button type="submit" class="btn btn-info w-100">Update</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('Home.index') }}" class="btn btn-secondary w-100">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('website.layout.footer')
