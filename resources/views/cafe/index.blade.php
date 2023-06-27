@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1><strong>My Cafe
                        </strong></h1>
                </div>
                @if (\Session::has('success'))
                    <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                @elseif(\Session::has('error'))
                    <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                @endif
                <div class="card pb-3 px-3 shadow-sm px-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6">
                                <h3>
                                    <strong>
                                        {{ $cafe->nama }}
                                    </strong>
                                </h3>
                                @if ($rating_cafe)
                                    <h5><i class="fa-solid fa-star me-2"></i>{{ number_format($rating_cafe, 1, '.', '') }} /
                                        5.0 </h5>
                                @endif
                                <h5><i class="fa-solid fa-location-dot me-2"></i>{{ $cafe->lokasi }}</h5>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-5">
                                {{-- @if ($cafe->wfc_friendly == 1) --}}
                                @if ($cafe->wifi == 1 && $cafe->charging_port == 1 && $cafe->toilet == 1 && ($cafe->ambience = 'Tenang'))
                                    <h4>WFC Friendly</h4>
                                @endif
                                @if ($cafe->user_id != 0)
                                    <h4>Verified
                                    </h4>
                                @endif
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="container">

                        <div class="row mb-4">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                    style="border-radius: 16px;">
                                    <div class="carousel-inner rounded">
                                        @if ($cafe->foto)
                                            <div class="carousel-item active">
                                                <img src="<?= asset('storage/image/' . $cafe->foto) ?>" style="width:100%"
                                                    class="d-block w-100 "
                                                    alt="<?= asset('storage/image/{{ $cafe->foto }}') ?>">
                                            </div>
                                        @endif
                                        @if ($cafe->foto2)
                                            <div class="carousel-item">
                                                <img src="<?= asset('storage/image/' . $cafe->foto2) ?>" style="width:100%"
                                                    class="d-block w-100"
                                                    alt="<?= asset('storage/image/{{ $cafe->foto2 }}') ?>">
                                            </div>
                                        @endif
                                        @if ($cafe->foto3)
                                            <div class="carousel-item">
                                                <img src="<?= asset('storage/image/' . $cafe->foto3) ?>" style="width:100%;"
                                                    class="d-block w-100"
                                                    alt="<?= asset('storage/image/{{ $cafe->foto3 }}') ?>">
                                                <div class="carousel-caption">
                                                    {{-- <p>{{ $cafe->nama }}</p>
                                                    @if ($rating_cafe)
                                                        <p>{{ number_format($rating_cafe, 1, '.', '') }}/5</p>
                                                    @endif
                                                    <p>{{ $cafe->lokasi }}</p> --}}
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
                                @if ($cafe->alamat != null)
                                    <strong>Address</strong>
                                    <br>
                                    {{ $cafe->alamat }}
                                @else
                                    <strong>Address</strong>
                                    <br>
                                    -
                                @endif
                                <br>
                                <strong>Operational Hours</strong>
                                <br>
                                {{ date('h:i A', strtotime($cafe->operasional_buka)) }} -
                                {{ date('h:i A', strtotime($cafe->operasional_tutup)) }}
                                <br>
                                @if ($cafe->range_harga != null)
                                    <strong>Price Range</strong>
                                    <br>
                                    {{ $cafe->range_harga }}
                                @else
                                    <strong>Price Range</strong>
                                    <br>
                                    -
                                @endif
                                <br>
                                @if ($cafe->telepon != null)
                                    <strong>Phone</strong>
                                    <br>
                                    (+62) {{ $cafe->telepon }}
                                @else
                                    <strong>Phone</strong>
                                    <br>
                                    -
                                @endif
                                <br>
                                @if ($cafe->ambience != null)
                                    <strong>Ambience</strong>
                                    <br>
                                    {{ $cafe->ambience }}
                                @else
                                    <strong>Ambience</strong>
                                    <br>
                                    -
                                @endif
                                <br>
                                @if ($cafe->deskripsi != null)
                                    <strong>Description</strong>
                                    <br>
                                    {{ $cafe->deskripsi }}
                                @else
                                    <strong>Description</strong>
                                    <br>
                                    -
                                @endif
                                <a href="{{ $cafe->maps }}" target="blank" class="btn btn-solid py-3 mt-3"><i
                                        class="fa-brands fa-google me-2"></i>See
                                    Google Maps</a>
                            </div>
                        </div>
                        <hr>
                        <strong>Facilities</strong>
                        <br>
                        <div class="d-flex m-3">
                            @if ($cafe->wifi == 1)
                                <div class="me-5">
                                    <div class="d-flex justify-content-center mb-2">
                                        <i class="fa-solid fa-wifi fa-2x" style="color: #30475E"></i>
                                    </div>
                                    <div class="text-center fw-semibold">
                                        Wi-Fi
                                    </div>
                                </div>
                            @endif
                            @if ($cafe->charging_port == 1)
                                <div class="mx-5">
                                    <div class="d-flex justify-content-center mb-2">
                                        <i class="fa-solid fa-plug fa-2x" style="color: #30475E"></i>
                                    </div>
                                    <div class="text-center fw-semibold">
                                        Charging Port
                                    </div>
                                </div>
                            @endif
                            @if ($cafe->lahan_parkir == 1)
                                <div class="mx-5">
                                    <div class="d-flex justify-content-center mb-2">
                                        <i class="fa-solid fa-square-parking fa-2x" style="color: #30475E"></i>
                                    </div>
                                    <div class="text-center fw-semibold">
                                        Lahan Parkir
                                    </div>
                                </div>
                            @endif
                            @if ($cafe->smoking_area == 1)
                                <div class="mx-5">
                                    <div class="d-flex justify-content-center mb-2">
                                        <i class="fa-solid fa-smoking fa-2x" style="color: #30475E"></i>
                                    </div>
                                    <div class="text-center fw-semibold">
                                        Smoking Area
                                    </div>
                                </div>
                            @endif
                            @if ($cafe->mushola == 1)
                                <div class="mx-5">
                                    <div class="d-flex justify-content-center mb-2">
                                        <i class="fa-solid fa-mosque fa-2x" style="color: #30475E"></i>
                                    </div>
                                    <div class="text-center fw-semibold">
                                        Mushola
                                    </div>
                                </div>
                            @endif
                            @if ($cafe->toilet == 1)
                                <div class="ms-5">
                                    <div class="d-flex justify-content-center mb-2">
                                        <i class="fa-solid fa-restroom fa-2x" style="color: #30475E"></i>
                                    </div>
                                    <div class="text-center fw-semibold">
                                        Toilet
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if (
                            $cafe->wifi == 0 &&
                                $cafe->charging_port == 0 &&
                                $cafe->lahan_parkir == 0 &&
                                $cafe->smoking_area == 0 &&
                                $cafe->mushola == 0 &&
                                $cafe->toilet == 0)
                            Tidak ada fasilitas
                        @endif
                        <hr>
                        {{-- <br>
                        <br> --}}
                        {{-- <div class="position-relative"> --}}
                        {{-- <div class="position-absolute bottom-0 end-0"> --}}
                        <div class="d-flex flex-row-reverse">
                            <a href="{{ url('cafe/edit') }}" class="btn btn-solid-hug">Edit Data</a>
                        </div>
                        {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="card mt-5 px-3 shadow-sm px-3">
                    <div class="card-body">
                        <strong>Event</strong>
                        <br>
                        <hr>
                        @if ($event->count() == 0)
                            <div class="text-center">
                                Tidak ada event
                            </div>
                        @else
                            @foreach ($event as $v)
                                <div class="card mb-4 shadow-sm bg-light rounded">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12 d-flex align-items-center">
                                                <img src="<?= asset('storage/image/' . $v->foto) ?>" alt=""
                                                    style="width: 200px;">
                                            </div>

                                            <div class="col-lg-9 col-md-12 col-sm-12">
                                                <h4>
                                                    <strong>
                                                        {{ $v->nama }}
                                                    </strong>
                                                </h4>

                                                <i class="fa-solid fa-tags me-2"></i>{{ $v->kategori }}
                                                <br>
                                                <i class="fa-solid fa-calendar me-2"></i>{{ $v->waktu_mulai }} -
                                                {{ $v->waktu_selesai }}
                                                <br>
                                                <br>
                                                <strong>Description</strong>
                                                <br>
                                                {{ $v->keterangan }}
                                                <br>
                                                <hr>
                                                <div class="d-flex flex-row-reverse">
                                                    <a href="{{ url('cafe/event-edit/' . $v->id) }}"
                                                        class="btn btn-primary px-4 ms-2">Edit</a>
                                                    <a href="{{ url('cafe/event-delete/' . $v->id) }}"
                                                        class="btn btn-danger px-4">Delete</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <hr>
                        <!-- Button trigger modal -->
                        <div class="d-flex flex-row-reverse">
                            <button type="button" class="btn btn-solid-hug " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambahkan Event
                            </button>
                        </div>


                        <!-- Modal -->

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><strong>Tambahkan Event/Promo
                                            </strong></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('cafe/event/store/' . $cafe->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <label for="exampleFormControlFile1"><span
                                                    style="color: #DC3545">*</span>Gambar</label>
                                            <br>
                                            <input type="file" class="form-control" name="foto"
                                                id="exampleFormControlFile1" required>
                                            <label for="" class="mt-2"><span
                                                    style="color: #DC3545">*</span>Nama Event</label>
                                            <input class="form-control" type="text" name="nama"
                                                placeholder="Nama Event" aria-label="default input example" required>
                                            <label for="" class="mt-2"><span
                                                    style="color: #DC3545">*</span>Kategori </label>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="kategori" type="radio"
                                                            value="Event" id="flexRadioDefault1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Event
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="kategori" type="radio"
                                                            value="Promo" id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Promo
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <label for="" class="mt-1"><span
                                                    style="color: #DC3545">*</span>Time</label>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <input class="form-control" name="waktu_mulai" type="datetime-local"
                                                        placeholder="Default input" required>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <input class="form-control" name="waktu_selesai"
                                                        type="datetime-local" placeholder="Default input" required>
                                                </div>
                                            </div>
                                            <div class="form-floating mt-3">
                                                <textarea class="form-control" placeholder="Leave a comment here" name="keterangan" id="floatingTextarea2"
                                                    style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Keterangan</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-solid-cancel"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-solid-hug">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-5 px-3 shadow-sm px-3">
                    <div class="card-body ">
                        <strong>Reviews</strong>
                        <br>
                        <hr>
                        @if ($review_cafe->count() > 0)
                            @foreach ($review_cafe as $v)
                                <div class="row mt-2">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <strong>{{ $v->username }}</strong>
                                        <br>
                                        {{ $v->rating }}
                                        <br>
                                        {{ $v->komentar }}
                                        <br>
                                        <div class="row mt-3">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <img src="<?= asset('storage/image/' . $v->foto) ?>" alt=""
                                                    style="width:100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2" style="text-align:right;">
                                        {{ $v->created_at }}
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <div class="text-center">
                                Tidak ada komentar
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('cafe.layouts.footer')
@endsection
