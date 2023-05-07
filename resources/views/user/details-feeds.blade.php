@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1>Detail Event</h1>
                </div>
                <div class="card">
                    <div class="container">
                        <div class="row mb-4 mt-4">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                    style="border-radius: 16px;">
                                    <div class="carousel-inner">
                                        @if ($event->foto)
                                            <div class="carousel-item active">
                                                <img src="<?= asset('storage/image/' . $event->foto) ?>" style="width:100%"
                                                    class="d-block w-100"
                                                    alt="<?= asset('storage/image/' . $event->foto) ?>">
                                                <div class="carousel-caption">
                                                    <p>{{ $cafe->nama }}</p>
                                                    @if ($review_cafe)
                                                        <p>{{ number_format($review_cafe, 1, '.', '') }}/5</p>
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
                                <h3>{{ $event->nama }}</h3>
                                <strong>Lokasi</strong>
                                <br>
                                <strong>{{ $event->kategori }}</strong>
                                <br>
                                <strong>{{ $event->tanggal }}</strong>
                                <br>
                                <strong>{{ $event->waktu_mulai }} - {{ $event->waktu_selesai }}</strong>
                                <br>
                                <br>
                                {{ $event->keterangan }}
                                <br>
                                <a href="{{ $cafe->maps }}" class="btn btn-light mt-5" style="width: 100%">See Google
                                    Maps
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body mb-2">
                        <strong>Comments</strong>
                        @if (\Session::has('success'))
                            <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                        @elseif(\Session::has('error'))
                            <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                        @endif
                        <br>
                        <hr>
                        @if ($review_event->count() > 0)
                            @foreach ($review_event as $v)
                                <div class="row mt-2">
                                    <div class="col-lg-10 col-md-10 col-sm-10">
                                        <strong>{{ $v->username }}</strong>
                                        {{ $v->komentar }}
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2" style="text-align:right;">
                                        {{ $v->created_at }}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                tidak ada komentar
                            </div>
                        @endif
                        <div class="row gy-4 mt-3 justify-content-center">
                            <form action="{{ url('details-feeds/store/' . $event->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="komentar" placeholder="Write a Comment"
                                        aria-label="Search" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"
                                            style="color: rgb(0, 0, 0); border-color:rgb(0, 0, 0); border-radius: 0px 5px 5px 0px">Submit</button>
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
