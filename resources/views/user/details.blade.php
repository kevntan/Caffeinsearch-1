@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar2', ['home' => 'active', 'about' => false, 'feeds' => false])

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1>
                        <strong>
                            Detail Cafe
                        </strong>
                    </h1>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10 col-md-6 col-sm-6">
                                <h3><strong>
                                        {{ $cafe->nama }}
                                    </strong></h3>
                                <h5>
                                    @if ($rating_cafe)
                                        {{ number_format($rating_cafe, 1, '.', '') }} / 5.0
                                    @endif
                                </h5>
                                <h5>{{ $cafe->lokasi }}</h5>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-5">
                                {{-- @if ($cafe->wfc_friendly == 1) --}}
                                @if ($cafe->wifi == 1 && $cafe->charging_port == 1 && $cafe->toilet == 1 && ($cafe->ambience = 'Tenang'))
                                    <h3>WFC Friendly</h3>
                                @endif
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
                                            @if ($cafe->foto != null)
                                                @if (substr($cafe->foto, 0, 4) === 'http')
                                                    <img src="{{ $cafe->foto }}" style="width:100%" class="d-block w-100"
                                                        alt="{{ $cafe->foto }}">
                                                @else
                                                    <img src="<?= asset('storage/image/' . $cafe->foto) ?>"
                                                        style="width:100%" class="d-block w-100"
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
                                                    class="d-block w-100"
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
                                                    class="d-block w-100"
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
                                <a href="{{ $cafe->maps }}" target="blank" class="btn btn-light" style="width: 100%">See
                                    Google Maps
                                    Details</a>

                            </div>
                        </div>
                        <hr>
                        <strong>Facilities</strong>
                        <br>
                        @if ($cafe->wifi == 1)
                            Wi-Fi
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
                <div class="card mt-5">
                    <div class="card-body mb-5">
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
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-12 col-sm-12">
                                                    <img src="<?= asset('storage/image/' . $v->foto) ?>" alt=""
                                                        style="width: 200px;">
                                                </div>
                                                <div class="col-lg-7 col-md-12 col-sm-12">
                                                    <h4>
                                                        <strong>
                                                            {{ $v->nama }}
                                                        </strong>
                                                    </h4>
                                                    {{ $cafe->nama }}
                                                    <br>
                                                    {{ $v->kategori }}
                                                    <br>
                                                    {{ date('h:i A', strtotime($v->waktu_mulai)) }} -
                                                    {{ date('h:i A', strtotime($v->waktu_selesai)) }}
                                                    <br>
                                                    <br>
                                                    {{ $v->keterangan }}
                                                </div>
                                                <div class="col-lg-2">
                                                    @if ($cafe->wifi == 1 && $cafe->charging_port == 1 && $cafe->toilet == 1 && ($cafe->ambience = 'Tenang'))
                                                        WFC FRIENDLY
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        @if (\Session::has('success'))
                            <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                        @elseif(\Session::has('error'))
                            <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                        @endif
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
                                        <div class="col-lg-2 col-md-2 col-sm-2">
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
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
                                            <h5 class="modal-title" id="exampleModalLabel">Reviews</h5>
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
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
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
