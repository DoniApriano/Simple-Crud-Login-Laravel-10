<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="row mt-5 justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-center">Register</h3>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>Email sudah digunakan</strong>
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="" required
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="" required
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="" required
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('login') }}"><p class="text-center text-primary">Sudah Punya Akun?</p></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
