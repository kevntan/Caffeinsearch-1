@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar2', ['home' => 'active', 'about' => false, 'feeds' => false])

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-circle-check me-3"></i>{!! \Session::get('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-3"></i>{!! \Session::get('error') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="text-center">
                    <h1>
                        <strong>
                            Detail Cafe
                        </strong>
                    </h1>
                </div>
                <div class="card shadow-sm px-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6">
                                <h3><strong>
                                        {{ $cafe->nama }}
                                    </strong></h3>
                                <h5>
                                    @if ($rating_cafe)
                                        <i class="fa-solid fa-star me-2"></i>{{ number_format($rating_cafe, 1, '.', '') }} /
                                        5.0
                                    @endif
                                </h5>
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

                    <div class="container pb-3">

                        <div class="row mb-4">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                    style="border-radius: 16px;">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            @if ($cafe->foto != null)
                                                @if (substr($cafe->foto, 0, 4) === 'http')
                                                    <img src="{{ $cafe->foto }}" style="width:100%" class="d-block w-100"
                                                        alt="{{ $cafe->foto }}">
                                                @else
                                                    <img src="<?= asset('storage/image/' . $cafe->foto) ?>"
                                                        style="width:100%" class="d-block w-100 rounded"
                                                        alt="<?= asset('storage/image/' . $cafe->foto) ?>">
                                                    {{-- <?php continue; ?> --}}
                                                @endif
                                                {{-- <div class="carousel-caption">
                                                <p>{{ $cafe->nama }}</p>
                                                <p>* rating/5</p>
                                                <p>{{ $cafe->lokasi }}</p>
                                            </div> --}}
                                            @endif
                                        </div>
                                        @if ($cafe->foto2)
                                            <div class="carousel-item">
                                                <img src="<?= asset('storage/image/' . $cafe->foto2) ?>" style="width:100%"
                                                    class="d-block w-100 rounded"
                                                    alt="<?= asset('storage/image/' . $cafe->foto2) ?>">
                                                {{-- <div class="carousel-caption">
                                                    <p>{{ $cafe->nama }}</p>
                                                    <p>* rating/5</p>
                                                    <p>{{ $cafe->lokasi }}</p>
                                                </div> --}}
                                            </div>
                                        @endif
                                        @if ($cafe->foto3)
                                            <div class="carousel-item">
                                                <img src="<?= asset('storage/image/' . $cafe->foto3) ?>" style="width:100%"
                                                    class="d-block w-100 rounded"
                                                    alt="<?= asset('storage/image/' . $cafe->foto3) ?>">
                                                {{-- <div class="carousel-caption">
                                                    <p>{{ $cafe->nama }}</p>
                                                    <p>* rating/5</p>
                                                    <p>{{ $cafe->lokasi }}</p>
                                                </div> --}}
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
                                <a href="{{ $cafe->maps }}" target="blank" class="btn btn-solid py-3 mt-3"
                                    style="width: 100%">
                                    <i class="fa-brands fa-google me-2"></i>
                                    See
                                    Google Maps
                                </a>

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
                            @if (
                                $cafe->wifi == 0 &&
                                    $cafe->charging_port == 0 &&
                                    $cafe->lahan_parkir == 0 &&
                                    $cafe->smoking_area == 0 &&
                                    $cafe->mushola == 0 &&
                                    $cafe->toilet == 0)
                                Tidak ada fasilitas
                            @endif
                        </div>


                    </div>
                </div>

                {{-- section event --}}
                <div class="card mt-5 shadow-sm px-3">
                    <div class="card-body ">
                        <strong>Event</strong>
                        <br>
                        <hr>
                        @if ($event->count() == 0)
                            <div class="text-center">
                                Tidak ada event
                            </div>
                        @else
                            @foreach ($event as $v)
                                <a href="{{ url('details-feeds/' . $v->id) }}"
                                    style=" text-decoration: none; color: inherit;">
                                    <div class="card mb-4 shadow-sm bg-light rounded">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12 col-sm-12  d-flex  align-items-center">
                                                    <img src="<?= asset('storage/image/' . $v->foto) ?>" alt=""
                                                        class="rounded " style="width: 200px;">
                                                </div>
                                                <div class="col-lg-9 col-md-12 col-sm-12">
                                                    <h4>
                                                        <strong>
                                                            {{ $v->nama }}
                                                        </strong>
                                                    </h4>
                                                    {{-- <i class="fa-solid fa-location-dot me-2"></i>
                                                    {{ $cafe->nama }}
                                                    <br> --}}
                                                    <i class="fa-solid fa-tags me-2"></i>
                                                    {{ $v->kategori }}
                                                    <br>
                                                    <i class="fa-solid fa-calendar me-2"></i>{{ $v->waktu_mulai }} -
                                                    {{ $v->waktu_selesai }}
                                                    <br>
                                                    <br>
                                                    <strong>Description</strong>
                                                    <br>
                                                    {{ $v->keterangan }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>

                {{-- section review --}}
                <div class="card mt-5 shadow-sm px-3">
                    <div class="card-body">
                        <strong>Reviews</strong>
                        <br>
                        <hr>
                        @if ($review_cafe->count() == 0)
                            <div class="text-center">
                                Tidak ada komentar
                            </div>
                        @else
                            <div class="row">
                                @foreach ($review_cafe as $v)
                                    <div class="d-flex mb-3 px-3">
                                        <div class="col-lg-10 col-md-10 col-sm-10">
                                            <strong>{{ $v->username }}</strong>
                                            <br>
                                            {{ $v->rating }}
                                            <br>
                                            {{ $v->komentar }}
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <img src="<?= asset('storage/image/' . $v->foto) ?>" alt=""
                                                        style="width:70%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 fs-6 font-monospace text-muted">
                                            {{ $v->created_at }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <hr>
                        <!-- <a href="" class="btn btn-primary position-absolute bottom-0 end-0 mb-3 mx-3">Write a
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                review</a> -->
                        <!-- Button trigger modal -->
                        <div class="d-flex flex-row-reverse">
                            <button type="button" class="btn btn-solid-hug btn-block" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                Write a Review
                            </button>
                        </div>
                        <!-- Modal -->
                        <form action="{{ url('details/store-review/' . $cafe->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                <strong>Reviews
                                                </strong>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="row">
                                                    <div class="col-2">
                                                        Rating
                                                    </div>
                                                    <div class="col-4">
                                                        <select name="rating" id="" class="" required>
                                                            <option value="5">5</option>
                                                            <option value="4">4</option>
                                                            <option value="3">3</option>
                                                            <option value="2">2</option>
                                                            <option value="1">1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mt-3">
                                                <textarea class="form-control" name="komentar" placeholder="Leave a comment here" id="floatingTextarea2"
                                                    style="height: 100px" required></textarea>
                                                <label for="floatingTextarea2">Comments</label>
                                            </div>
                                            <div class="input-group mt-3">
                                                <input type="file" name="foto" class="form-control"
                                                    id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                                    aria-label="Upload">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-solid-hug"
                                                style="background-color: #30475E" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-solid-hug">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </main><!-- End #main -->

    @include('user.layouts.footer')
@endsection
