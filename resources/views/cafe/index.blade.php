@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1>My Cafe</h1>
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
                                            <img src="<?= asset('user/assets/img/assets1.png') ?>" style="width:100%"
                                                class="d-block w-100" alt="<?= asset('user/assets/img/assets1.png') ?>">
                                            <div class="carousel-caption">
                                                <p>Coffee aku</p>
                                                <p>* rating/5</p>
                                                <p>loc Jakarta</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= asset('user/assets/img/assets1.png') ?>" style="width:100%"
                                                class="d-block w-100" alt="<?= asset('user/assets/img/assets1.png') ?>">
                                            <div class="carousel-caption">
                                                <p>Coffee kamu</p>
                                                <p>* rating/5</p>
                                                <p>loc Jakarta</p>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= asset('user/assets/img/assets1.png') ?>" style="width:100%"
                                                class="d-block w-100" alt="<?= asset('user/assets/img/assets1.png') ?>">
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
                        <hr>
                        <br>
                        <br>
                        <div class="position-relative">
                            <div class="position-absolute bottom-0 end-0">
                                <div class="mb-3 ">
                                    <button class="btn btn-primary">Edit Data</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>
    </main><!-- End #main -->

    @include('cafe.layouts.footer')
@endsection
