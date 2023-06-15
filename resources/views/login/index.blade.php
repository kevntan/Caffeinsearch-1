<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= asset('login/fonts/icomoon/style.css') ?>">

    <link rel="stylesheet" href="<?= asset('login/css/owl.carousel.min.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= asset('login/css/bootstrap.min.css') ?>">

    <!-- Style -->
    <link rel="stylesheet" href="<?= asset('login/css/style.css') ?>">
    <title>Caffeinsearch - Login</title>
</head>

<body>


    <div class="d-md-flex half">
        <div class="bg" style="background-image: url(<?= asset('login/images/bg_1.png') ?>);">
            <div class="container">

                <div class="row">
                    <div class="col-12 text-center">
                        <div class="centering">
                            <h1>Caffeinsearch<span>.</span></h1>
                            <h2>Your cafe recomendation friends</h2>

                            {{-- <h1 style="color: #FFFFFF;  background-position: center;">Caffeinsearch</h1>
                            <h2 style="color: #FFFFFF;">Your cafe recomendation friends</h2> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contents">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3><strong>Selamat Datang!</strong></h3>
                                <h5>Silahkan Login</h5>
                                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                            </div>
                            @if (\Session::has('success'))
                                <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                            @elseif(\Session::has('error'))
                                <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                            @endif
                            <form action="{{ url('sign-in/post') }}" method="POST" class="login100-form validate-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group first">
                                    <label for="Username">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        placeholder="Masukkan Username" id="username">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Masukkan Password" id="password">
                                </div>

                                <button type="submit" class="btn btn-block btn-primary"
                                    style="background: #C8B6A6; border-color: #C8B6A6;
                ">
                                    Login
                                </button>
                                {{-- <button type="submit" class="btn btn-block btn-primary"
                                    style="background: #C8B6A6; border-color: #C8B6A6;
                ">
                                    Login As Cafe Management
                                </button> --}}
                                <div class="text-center mt-2">
                                    <a href="{{ url('/sign-up') }}" style="color: #C8B6A6;">Tidak Punya Akun?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="<?= asset('login/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= asset('login/js/popper.min.js') ?>"></script>
    <script src="<?= asset('login/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('login/js/main.js') ?>"></script>
</body>

</html>
