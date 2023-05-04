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
    <header id="header" class="fixed-top mb-5" style="background-color: black">
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

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1>Detail Cafe</h1>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6">
                                <h3>Nama</h3>
                                <h5>Rating</h5>
                                <h5>Location</h5>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-5">
                                <h3>WFC Friendly</h3>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <hr>
                        <div class="row mb-4">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                    style="border-radius: 16px;">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?= asset('user/assets/img/assets1.png') ?>" style="width:100%" class="d-block w-100"
                                                alt="<?= asset('user/assets/img/assets1.png') ?>">
                                            <div class="carousel-caption">
                                                <p>Coffee aku</p>
                                                <p>* rating/5</p>
                                                <p>loc Jakarta</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= asset('user/assets/img/assets1.png') ?>" style="width:100%" class="d-block w-100"
                                                alt="<?= asset('user/assets/img/assets1.png') ?>">
                                            <div class="carousel-caption">
                                                <p>Coffee kamu</p>
                                                <p>* rating/5</p>
                                                <p>loc Jakarta</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= asset('user/assets/img/assets1.png') ?>" style="width:100%" class="d-block w-100"
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
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <strong>Operational Hours</strong>
                                <br>
                                waktu
                                <br>
                                <strong>Price Range</strong>
                                <br>
                                harga
                                <br>
                                <strong>Phone</strong>
                                <br>
                                nomor
                                <br>
                                <strong>Description</strong>
                                <br>
                                text
                                <br>
                                <a href="" class="btn btn-light" style="width: 100%">See Google Maps
                                    Details</a>
                            </div>
                        </div>
                        <hr>
                        <strong>Facilities</strong>
                        <br>
                        icon
                        icon
                        icon
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body mb-5">
                        <strong>Reviews</strong>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <strong>Nama User</strong>
                                <br>
                                rating
                                <br>
                                text
                                <br>
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <img src="<?= asset('user/assets/img/assets1.png') ?>" alt="" style="width:100%">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <img src="<?= asset('user/assets/img/assets1.png') ?>" alt="" style="width:100%">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <img src="<?= asset('user/assets/img/assets1.png') ?>" alt="" style="width:100%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2" style="text-align:right;">
                                12/03/2022
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <strong>Nama User</strong>
                                <br>
                                rating
                                <br>
                                text
                                <br>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2" style="text-align:right;">
                                12/03/2022
                            </div>
                        </div>
                        <hr>
                        <!-- <a href="" class="btn btn-primary position-absolute bottom-0 end-0 mb-3 mx-3">Write a
                            review</a> -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary position-absolute bottom-0 end-0 mb-3 mx-3"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Write a Review
                        </button>

                        <!-- Modal -->
                        <form action="">
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                rating
                                            </div>
                                            <div class="form-floating mt-3">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Comments</label>
                                            </div>
                                            <div class="input-group mt-3">
                                                <input type="file" class="form-control" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
