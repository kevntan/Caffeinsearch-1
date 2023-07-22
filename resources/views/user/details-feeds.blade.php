@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar2', ['home' => false, 'about' => false, 'feeds' => 'active'])

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
                    <h1> <strong>
                            Detail Event
                        </strong>
                    </h1>
                </div>
                {{-- section profile --}}
                <div class="card shadow-sm px-3">
                    <div class="container">
                        <div class="row mb-4 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                    style="border-radius: 16px;">
                                    <div class="carousel-inner rounded">
                                        @if ($event->foto)
                                            <div class="carousel-item active">
                                                <img src="<?= asset('storage/image/' . $event->foto) ?>" style="width:100%"
                                                    class="d-block w-100"
                                                    alt="<?= asset('storage/image/' . $event->foto) ?>">
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 ">
                                <h3>
                                    <strong>
                                        {{ $event->nama }}
                                    </strong>
                                </h3>

                                <i class="fa-solid fa-location-dot me-2"></i>
                                {{ $event->nama_cafe }}
                                <br>
                                <i class="fa-solid fa-map-location-dot me-2"></i>
                                {{ $event->alamat }}
                                <br>
                                <i class="fa-solid fa-tags me-2"></i>{{ $event->kategori }}
                                <br>
                                <i class="fa-solid fa-calendar me-2"></i>{{ $event->waktu_mulai }} -
                                {{ $event->waktu_selesai }}
                                <br>
                                <br>
                                @if ($event->keterangan != null)
                                    <strong>Description</strong>
                                    <br>
                                    {{ $event->keterangan }}
                                @else
                                    <strong>Description</strong>
                                    <br>
                                    -
                                @endif
                                <br>
                                <a href="{{ $cafe->maps }}" target="blank" class="btn btn-solid py-3 mt-3"
                                    style="width: 100%">
                                    <i class="fa-brands fa-google me-2"></i>
                                    See
                                    Google Maps</a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- section comment --}}
                <div class="card mt-5 shadow-sm px-3">
                    <div class="card-body mb-2">
                        <strong>Comments</strong>
                        <br>
                        <hr>
                        @if ($review_event->count() > 0)
                            @foreach ($review_event as $v)
                                <div class="row mt-2">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <strong>{{ $v->username }}</strong>
                                        {{ $v->komentar }}
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 fs-6 font-monospace text-muted"
                                        style="text-align:right;">
                                        {{ $v->created_at }}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                Tidak ada komentar
                            </div>
                        @endif
                        <div class="row gy-4 mt-3 justify-content-center">
                            <form action="{{ url('details-feeds/store/' . $event->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="input-group">
                                    <input type="text" class="form-control " name="komentar"
                                        placeholder="Write a Comment" aria-label="Search" aria-describedby="button-addon2"
                                        required>
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                        <i class="fa-regular fa-paper-plane me-2"></i>Submit</button>
                                </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('user.layouts.footer')
@endsection
