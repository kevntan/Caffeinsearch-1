@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar')
    @include('user.layouts.bg')

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
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <br>
                        <h1>Popular Cafe</h1>
                        <div class="row mt-3">
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
                                        <a href="#" class="btn btn-primary text-center" style="width: 100%;">See
                                            Details</a>
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
                                        <a href="#" class="btn btn-primary text-center" style="width: 100%;">See
                                            Details</a>
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
                                        <a href="#" class="btn btn-primary text-center" style="width: 100%;">See
                                            Details</a>
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
                                        <a href="#" class="btn btn-primary text-center" style="width: 100%;">See
                                            Details</a>
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
                                        <a href="#" class="btn btn-primary text-center" style="width: 100%;">See
                                            Details</a>
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
                                        <a href="#" class="btn btn-primary text-center" style="width: 100%;">See
                                            Details</a>
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
                                        <a href="#" class="btn btn-primary text-center" style="width: 100%;">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <a href="#">
                                    <div class="card mat-card">
                                        <img src="<?= asset('user/assets/img/see-all.png') ?>" class="card-img-top"
                                            alt="..." style="width: 100%; border-radius: 5px;">
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
    @include('user.layouts.footer')
@endsection
