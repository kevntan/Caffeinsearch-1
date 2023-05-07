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
                                <h3>{{ $cafe->nama }}</h3>
                                @if ($rating_cafe)
                                    <h5>{{ number_format($rating_cafe, 1, '.', '') }}/5</h5>
                                @endif
                                <h5>{{ $cafe->lokasi }}</h5>
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
                                        @if ($cafe->foto)
                                            <div class="carousel-item active">
                                                <img src="<?= asset('storage/image/' . $cafe->foto) ?>" style="width:100%"
                                                    class="d-block w-100"
                                                    alt="<?= asset('storage/image/{{ $cafe->foto }}') ?>">
                                                <div class="carousel-caption">
                                                    <p>{{ $cafe->nama }}</p>
                                                    @if ($rating_cafe)
                                                        <p>{{ number_format($rating_cafe, 1, '.', '') }}/5</p>
                                                    @endif
                                                    <p>{{ $cafe->lokasi }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($cafe->foto2)
                                            <div class="carousel-item">
                                                <img src="<?= asset('storage/image/' . $cafe->foto2) ?>" style="width:100%"
                                                    class="d-block w-100"
                                                    alt="<?= asset('storage/image/{{ $cafe->foto2 }}') ?>">
                                                <div class="carousel-caption">
                                                    <p>{{ $cafe->nama }}</p>
                                                    @if ($rating_cafe)
                                                        <p>{{ number_format($rating_cafe, 1, '.', '') }}/5</p>
                                                    @endif
                                                    <p>{{ $cafe->lokasi }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($cafe->foto3)
                                            <div class="carousel-item">
                                                <img src="<?= asset('storage/image/' . $cafe->foto3) ?>" style="width:100%;"
                                                    class="d-block w-100"
                                                    alt="<?= asset('storage/image/{{ $cafe->foto3 }}') ?>">
                                                <div class="carousel-caption">
                                                    <p>{{ $cafe->nama }}</p>
                                                    @if ($rating_cafe)
                                                        <p>{{ number_format($rating_cafe, 1, '.', '') }}/5</p>
                                                    @endif
                                                    <p>{{ $cafe->lokasi }}</p>
                                                </div>
                                            </div>
                                        @endif
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
                                {{ date('h:i A', strtotime($cafe->operasional_buka)) }} -
                                {{ date('h:i A', strtotime($cafe->operasional_tutup)) }}
                                <br>
                                <strong>Price Range</strong>
                                <br>
                                {{ $cafe->range_harga }}
                                <br>
                                <strong>Phone</strong>
                                <br>
                                {{ $cafe->telepon }}
                                <br>
                                <strong>Description</strong>
                                <br>
                                {{ $cafe->deskripsi }}
                                <br>
                                <a href="{{ $cafe->maps }}" target="blank" class="btn btn-light" style="width: 100%">See
                                    Google Maps
                                    Details</a>
                            </div>
                        </div>
                        <hr>
                        <strong>Facilities</strong>
                        <br>
                        @if ($cafe->wifi == 1)
                            Wifi
                        @endif
                        @if ($cafe->charging_port == 1)
                            Charging Port
                        @endif
                        @if ($cafe->lahan_parkir == 1)
                            Lahan Parkir
                        @endif
                        @if ($cafe->smoking_area == 1)
                            Smoking Area
                        @endif
                        @if ($cafe->mushola == 1)
                            Mushola
                        @endif
                        @if ($cafe->toilet == 1)
                            Toilet
                        @endif
                        <hr>
                        <br>
                        <br>
                        <div class="position-relative">
                            <div class="position-absolute bottom-0 end-0">
                                <div class="mb-3 ">
                                    <a href="{{ url('cafe/edit') }}" class="btn btn-primary">Edit Data</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>
    </main><!-- End #main -->

    @include('cafe.layouts.footer')
@endsection
