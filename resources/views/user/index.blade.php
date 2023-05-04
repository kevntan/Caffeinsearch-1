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

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="index.html">Caffein<span>Search</span></a></h1>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#">About</a></li>
                    <li><a class="nav-link scrollto" href="#">Feeds</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="#" class="get-started-btn scrollto">Sign Up</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>Caffeinsearch<span>.</span></h1>
                    <h2>Your cafe recomendation friends</h2>
                </div>
            </div>

            <div class="row gy-4 mt-3 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                style="color: white; border-color:white; border-radius: 0px 5px 5px 0px">Search</button>
                        </div>
                    </div>
                </form>
            </div>



        </div>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <h1>
                            <strong>
                                Filter
                            </strong>
                        </h1>
                        <div class="card">
                            <div class="card-body">
                                Location
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                Price Range
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                Rating
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                WFC Friendly
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-warning" style="width: 100%">Apply Filter</button>
                            <button type="button" class="btn btn-light mt-2" style="width: 100%">Clear
                                Filter</button>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <h1>
                            <strong>
                                Weekly Recomendation
                            </strong>
                        </h1>
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                            style="border-radius: 16px;">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="d-block w-100"
                                        alt="<?= asset('user/assets/img/assets1.png') ?>">
                                    <div class="carousel-caption">
                                        <p>Coffee aku</p>
                                        <p>* rating/5</p>
                                        <p>loc Jakarta</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="d-block w-100"
                                        alt="<?= asset('user/assets/img/assets1.png') ?>">
                                    <div class="carousel-caption">
                                        <p>Coffee kamu</p>
                                        <p>* rating/5</p>
                                        <p>loc Jakarta</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="d-block w-100"
                                        alt="<?= asset('user/assets/img/assets1.png') ?>">
                                    <div class="carousel-caption">
                                        <p>Coffee Dia</p>
                                        <p>* rating/5</p>
                                        <p>loc Jakarta</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <br>
                        <h1>Popular Cafe</h1>
                        <div class="row mt-3">
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <div class="card mat-card">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Judul</h5>
                                        Rating
                                        <br>
                                        Location
                                        <br>
                                        <a href="#" class="btn btn-primary text-center"
                                            style="width: 100%;">See Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <div class="card mat-card">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Judul</h5>
                                        Rating
                                        <br>
                                        Location
                                        <br>
                                        <a href="#" class="btn btn-primary text-center"
                                            style="width: 100%;">See Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <div class="card mat-card">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Judul</h5>
                                        Rating
                                        <br>
                                        Location
                                        <br>
                                        <a href="#" class="btn btn-primary text-center"
                                            style="width: 100%;">See Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <div class="card mat-card">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Judul</h5>
                                        Rating
                                        <br>
                                        Location
                                        <br>
                                        <a href="#" class="btn btn-primary text-center"
                                            style="width: 100%;">See Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <div class="card mat-card">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Judul</h5>
                                        Rating
                                        <br>
                                        Location
                                        <br>
                                        <a href="#" class="btn btn-primary text-center"
                                            style="width: 100%;">See Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <div class="card mat-card">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Judul</h5>
                                        Rating
                                        <br>
                                        Location
                                        <br>
                                        <a href="#" class="btn btn-primary text-center"
                                            style="width: 100%;">See Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <div class="card mat-card">
                                    <img src="<?= asset('user/assets/img/assets1.png') ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Judul</h5>
                                        Rating
                                        <br>
                                        Location
                                        <br>
                                        <a href="#" class="btn btn-primary text-center"
                                            style="width: 100%;">See Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <a href="#">
                                    <div class="card mat-card">
                                        <img src="<?= asset('user/assets/img/see-all.png') ?>" class="card-img-top" alt="..."
                                            style="width: 100%; border-radius: 5px;">
                                        <p class="carousel-caption">
                                            ...
                                            <br>
                                            See All Cafe
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">


        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>coffeinsearch</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by coffeinsearch
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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
