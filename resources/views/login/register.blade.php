<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

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
                    <div class="form-block mx-auto" style="max-width: 420px;">
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
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username"
                                    placeholder="Masukkan Username" id="username">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="Daerah">Daerah</label>
                                <select class="custom-select" name="daerah">
                                    <option selected>Daerah</option>
                                    <option value="Central Jakarta">Central Jakarta</option>
                                    <option value="East Jakarta">East Jakarta</option>
                                    <option value="North Jakarta">North Jakarta</option>
                                    <option value="South Jakarta">South Jakarta</option>
                                    <option value="West Jakarta">West Jakarta</option>
                                </select>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Masukkan Email"
                                    id="email">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukkan Password" id="password">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary"
                                style="background: #C8B6A6; border-color: #C8B6A6;">
                                Daftar
                            </button>
                        </form>
                        <div class="text-center mt-2">
                            <a href="{{ url('/sign-in') }}" style="color: #C8B6A6;">Sudah Punya Akun</a>
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
