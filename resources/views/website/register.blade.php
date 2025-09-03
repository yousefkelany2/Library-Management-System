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
                <div class="card-header text-center bg-primary text-white">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('Student.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label"> Name</label>
                            <input type="text" class="form-control" name="name" required placeholder="Enter your full name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" required placeholder="Enter your Phone">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="Enter your password">
                        </div>



                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Already have an account? <a href="{{ route('Login.index') }}">Login</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

@include('website.layout.footer')
