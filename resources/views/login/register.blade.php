<!doctype html>
<html lang="en">
@extends('user.layouts.assets')

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= asset('login/fonts/icomoon/style.css') ?>">

    <link rel="stylesheet" href="<?= asset('login/css/owl.carousel.min.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= asset('login/css/bootstrap.min.css') ?>">

    <!-- Style -->
    <link rel="stylesheet" href="<?= asset('login/css/style.css') ?>">

    <title>Caffeinsearch - Register</title>
</head>

<body>


    <div class="d-md-flex half">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="form-block mx-auto rounded" style="max-width: 420px;">
                        <div class="text-center mb-5">
                            <h3><strong>Sign Up</strong></h3>
                            <h5>Silahkan Isi Data Diri Dengan Lengkap</h5>
                        </div>
                        @if (\Session::has('success'))
                            <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                        @elseif(\Session::has('error'))
                            <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                        @endif
                        <form action="{{ url('sign-up/store') }}" method="POST" class="login100-form validate-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group first">
                                <label for="username">Username<span style="color: #DC3545">*</span></label>
                                <input type="text" class="form-control" name="username"
                                    placeholder="Masukkan Username" id="username" value="{{ old('username') }}"
                                    required>
                                @error('username')
                                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="Daerah">Daerah<span style="color: #DC3545">*</span></label>
                                <select class="form-select" name="daerah" value="{{ old('daerah') }}" required>
                                    <option selected>Daerah</option>
                                    <option value="Central Jakarta">Central Jakarta</option>
                                    <option value="East Jakarta">East Jakarta</option>
                                    <option value="North Jakarta">North Jakarta</option>
                                    <option value="South Jakarta">South Jakarta</option>
                                    <option value="West Jakarta">West Jakarta</option>
                                </select>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="email">Email<span style="color: #DC3545">*</span></label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="Masukkan Email" id="email" required>
                                @error('email')
                                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password<span style="color: #DC3545">*</span></label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukkan Password" id="password" required>
                                <div class="text-dark text-opacity-50 fw-medium">* Minimal 9 karakter
                                </div>
                                @error('password')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-block btn-primary"
                                style="background: #ffc26f; border-color: #ffc26f;">
                                Daftar
                            </button>
                        </form>
                        <div class="text-center mt-2">
                            <a href="{{ url('/sign-in') }}" style="color: #ffc26f;">Sudah Punya Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->


    </div>



    <script src="<?= asset('login/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= asset('login/js/popper.min.js') ?>"></script>
    <script src="<?= asset('login/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('login/js/main.js') ?>"></script>
</body>

</html>
