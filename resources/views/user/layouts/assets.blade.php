<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Coffeinsearch</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="stylesheet" href="<?= asset('user/assets/vendor/aos/aos.css') ?>">
    <link rel="stylesheet" href="<?= asset('user/assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= asset('user/assets/vendor/boxicons/css/boxicons.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('user/assets/vendor/glightbox/css/glightbox.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('user/assets/vendor/remixicon/remixicon.css') ?>">
    <link rel="stylesheet" href="<?= asset('user/assets/vendor/swiper/swiper-bundle.min.css') ?>">

    <link rel="stylesheet" href="<?= asset('user/assets/css/style.css') ?>">
</head>

<body>

    {{-- @include('layouts.navbar') --}}

    @yield('content')

    {{-- @include('layouts.user.footer') --}}

    <script src="<?= asset('user/assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
    <script src="<?= asset('user/assets/vendor/aos/aos.js') ?>"></script>
    <script src="<?= asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset('user/assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
    <script src="<?= asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= asset('user/assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>
    <script src="<?= asset('user/assets/vendor/php-email-form/validate.js') ?>"></script>

    <script src="<?= asset('user/assets/js/main.js') ?>"></script>
</body>

</html>
