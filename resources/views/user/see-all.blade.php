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
                        <h1 class="text-center">
                            <strong>
                                All Cafe
                            </strong>
                        </h1>
                        <div class="card">
                            @foreach ($cafe as $v)
                                <a href="{{ url('details/' . $v->id) }}"
                                    style="text-decoration: none;
                                    color: inherit;">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                                        <img src="<?= asset('storage/image/' . $v->foto) ?>" alt=""
                                                            style="width: 200px;">
                                                    </div>
                                                    <div class="col-lg-7 col-md-12 col-sm-12">
                                                        {{ $v->nama }}
                                                        <br>
                                                        @if ($review_cafe)
                                                            {{ number_format($review_cafe, 1, '.', '') }}
                                                        @endif
                                                        <br>
                                                        {{ $v->lokasi }}
                                                    </div>
                                                    <div class="col-lg-2">
                                                        WFC FRIENDLY
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                                    style="width: 200px;">
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                Nama
                                                <br>
                                                Rating
                                                <br>
                                                Lokasi
                                            </div>
                                            <div class="col-lg-2">
                                                WFC FRIENDLY
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                                    style="width: 200px;">
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                Nama
                                                <br>
                                                Rating
                                                <br>
                                                Lokasi
                                            </div>
                                            <div class="col-lg-2">
                                                WFC FRIENDLY
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                                    style="width: 200px;">
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                Nama
                                                <br>
                                                Rating
                                                <br>
                                                Lokasi
                                            </div>
                                            <div class="col-lg-2">
                                                WFC FRIENDLY
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                                    style="width: 200px;">
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                Nama
                                                <br>
                                                Rating
                                                <br>
                                                Lokasi
                                            </div>
                                            <div class="col-lg-2">
                                                WFC FRIENDLY
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 col-sm-12">
                                                <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                                    style="width: 200px;">
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                Nama
                                                <br>
                                                Rating
                                                <br>
                                                Lokasi
                                            </div>
                                            <div class="col-lg-2">
                                                WFC FRIENDLY
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative mt-5">
                                <div class="position-absolute bottom-0 start-50 translate-middle-x">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    @include('user.layouts.footer')
@endsection
