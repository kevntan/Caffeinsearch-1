@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar')
    @include('user.layouts.bg')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    @include('user.layouts.filter')
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <h1>
                            <strong>
                                Weekly Recomendation
                            </strong>
                        </h1>
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                            style="border-radius: 16px;">
                            <div class="carousel-inner">
                            @if ($results->count() > 0)
                                @for ($n = 0; $n < 3; $n++)
                                    <?php $x = rand(0, $results->count() - 1); ?>
                                        @if ($n == 0)
                                            <div class="carousel-item active">
                                                @if ($results[$x]->foto != null)
                                                    <img src="<?= asset('storage/image/' . $results[$x]->foto) ?>"
                                                        class="d-block w-100"
                                                        alt="<?= asset('storage/image/' . $results[$x]->foto) ?>">
                                                    {{-- <?php continue; ?> --}}
                                                @else
                                                    <img src="<?= asset('user/assets/img/assets1.png') ?>"
                                                        class="d-block w-100"
                                                        alt="<?= asset('user/assets/img/assets1.png') ?>">
                                                @endif
                                                <div class="carousel-caption">
                                                    <p>{{ $results[$x]->nama }}</p>
                                                    <p>{{ $results[$x]->lokasi }}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                @if ($results[$x]->foto != null)
                                                    <img src="<?= asset('storage/image/' . $results[$x]->foto) ?>"
                                                        class="d-block w-100"
                                                        alt="<?= asset('storage/image/' . $results[$x]->foto) ?>">
                                                    {{-- <?php continue; ?> --}}
                                                @else
                                                    <img src="<?= asset('user/assets/img/assets1.png') ?>"
                                                        class="d-block w-100"
                                                        alt="<?= asset('user/assets/img/assets1.png') ?>">
                                                @endif
                                                <div class="carousel-caption">
                                                    <p>{{ $results[$x]->nama }}</p>
                                                    <p>{{ $results[$x]->lokasi }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    
                                @endfor
                            @endif
                        </div>
                        {{-- <div class="carousel-item">
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
                        </div> --}}

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
                        @if (count($results) > 0)
                            @foreach ($results as $v)
                                <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                    <div class="card mat-card">
                                        <img src="<?= asset('storage/image/' . $v->foto) ?>" class="card-img-top"
                                            alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $v->nama }}</h5>
                                            Rating
                                            <br>
                                            {{ $v->lokasi }}
                                            <br>
                                            <a href="{{ url('details/' . $v->id) }}" class="btn btn-primary text-center"
                                                style="width: 100%;">See
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-3 col-md-12 col-sm-12 mt-3">
                                <a href="{{ url('see-all') }}">
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
                        @else
                            <div class="text-center">
                                tidak ada cafe
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main><!-- End #main -->
    @include('user.layouts.footer')
@endsection
