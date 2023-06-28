@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar', ['home' => 'active', 'about' => false, 'feeds' => false])
    @include('user.layouts.bg')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    @include('user.layouts.filter')
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <h1 class="text-center">
                            <strong>
                                All Cafe
                            </strong>
                        </h1>
                        <div class="card shadow-sm border-0">
                            @if (count($results) > 0)
                                @foreach ($results as $i => $v)
                                    <a href="{{ url('details/' . $v->id) }}"
                                        style="text-decoration: none;
                                    color: inherit;">
                                        <div class="card-body pb-0 ">
                                            <div class="card shadow-sm bg-light">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 col-sm-12">
                                                            @if (substr($v->foto, 0, 5) === 'https')
                                                                <img src="<?= asset($v->foto) ?>"
                                                                    class="d-block w-100 rounded"
                                                                    alt="<?= asset('storage/image/' . $v->foto) ?>">
                                                            @else
                                                                <img src="<?= asset('storage/image/' . $v->foto) ?>"
                                                                    class="d-block w-100 rounded"
                                                                    alt="<?= asset('storage/image/' . $v->foto) ?>">
                                                                {{-- <?php continue; ?> --}}
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-7 col-md-12 col-sm-12">
                                                            @if ($v->user_id != 0)
                                                                <h5>
                                                                    <strong>{{ $v->nama }} <i
                                                                            class="bi bi-patch-check-fill"
                                                                            style="color: #3a9bdc"></i>
                                                                    </strong>
                                                                </h5>
                                                            @else
                                                                <strong>{{ $v->nama }}
                                                                </strong>
                                                                <br>
                                                            @endif
                                                            <i class="fa-solid fa-star me-2"></i>
                                                            {{ number_format($v->rating, 1) }} / 5.0
                                                            <br>
                                                            <i class="fa-solid fa-location-dot me-2"></i>
                                                            {{ $v->lokasi }}
                                                            <br>
                                                            <i class="fa-solid fa-map-location-dot me-2"></i>
                                                            {{ $v->alamat }}
                                                            <br>
                                                            {{-- @if ($v->ambience != null)
                                                                <strong>Ambience: </strong>
                                                                {{ $v->ambience }}
                                                                <br>
                                                            @endif --}}
                                                        </div>
                                                        <div class="col-lg-2">
                                                            {{-- @if ($v->wfc_friendly == 1) --}}
                                                            @if ($v->wifi == 1 && $v->charging_port == 1 && $v->toilet == 1 && ($v->ambience = 'Tenang'))
                                                                <div class="status-wfc disabled text-center rounded p-2">
                                                                    <i class="fa-solid fa-briefcase me-2"></i> WFC
                                                                </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                <div class="text-center">
                                    Tidak ada cafe
                                </div>
                            @endif

                            <div class="container ps-5 pe-3 mt-3">
                                {{ $results->appends(request()->input())->links() }}
                            </div>
                            {{-- <div class="position-relative mt-5">
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
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    @include('user.layouts.footer')
@endsection
