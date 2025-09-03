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
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-center bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">Login</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('Login.store') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" required placeholder="Enter your email">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control form-control-lg" name="password" required placeholder="Enter your password">
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary w-100 btn-lg">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center bg-light rounded-bottom-4">
                    <small class="text-muted">
                        Don’t have an account?
                        <a href="{{ route('Register.index') }}" class="text-primary fw-bold text-decoration-none">Register</a>
                    </small>
                </div>
                <div class="card-footer text-center bg-light rounded-bottom-4">
                    <small class="text-muted">
                        You Want View Your Data
                        <a href="{{ route('Student.index') }}" class="text-primary fw-bold text-decoration-none">View</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@include('website.layout.footer')
