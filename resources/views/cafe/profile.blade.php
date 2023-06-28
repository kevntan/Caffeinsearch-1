@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                @if (\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                        <i class="fa-solid fa-circle-check"></i> {!! \Session::get('success') !!}
                        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                    </div>
                @elseif(\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                        <i class="fa-solid fa-triangle-exclamation"></i></i> {!! \Session::get('error') !!}
                    </div>
                @endif
                <div class="text-center mb-5">
                    <h1>
                        <strong>Profile Page
                        </strong>
                    </h1>
                </div>
                <div class="card mb-5  shadow-sm">
                    <div class="card-body">
                        <div class="container">
                            <div class="text-center">
                                @if (Auth::user()->foto)
                                    <img src="<?= asset('storage/image/' . Auth::user()->foto) ?>" class="rounded"
                                        style="max-width:25%;" alt="">
                                @else
                                    <img src="<?= asset('user/assets/img/Vector.png') ?>" class="rounded-circle"
                                        alt="">
                                @endif
                                <h2><strong>{{ Auth::user()->username }}</strong></h2>
                                <p>{{ Auth::user()->daerah }}</p>
                                <p class="text-primary text-opacity-50">Cafe Admin at <strong> {{ $cafe->nama }} </strong>
                                </p>

                                @if (Auth::user()->bio)
                                    <p>{{ Auth::user()->bio }}</p>
                                @else
                                    <p class="text-dark text-opacity-25">Bio belum diisi</p>
                                @endif
                            </div>
                            <hr>
                            <div class="d-flex flex-row-reverse">
                                <a href="{{ url('cafe/profile/edit') }}" class="btn btn-solid-hug"> <i
                                        class="fa-solid fa-user-pen me-2"></i>Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('cafe.layouts.footer')
@endsection
