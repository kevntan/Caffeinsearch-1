@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar2', ['home' => false, 'about' => false, 'feeds' => false])

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class=" mb-5">
                    @if (\Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                            <i class="fa-solid fa-circle-check"></i> {!! \Session::get('success') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @elseif(\Session::has('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                            <i class="fa-solid fa-triangle-exclamation"></i> {!! \Session::get('error') !!}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <h1 class="text-center">
                        <strong>Profile Page
                        </strong>
                    </h1>

                </div>

                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container">
                            <div class="text-center">
                                @if (Auth::user()->foto)
                                    <img src="<?= asset('storage/image/' . Auth::user()->foto) ?>" alt=""
                                        class="rounded" style="max-width:25%;">
                                @else
                                    <img src="<?= asset('user/assets/img/Vector.png') ?>" class="rounded-circle"
                                        alt="">
                                @endif
                                <h2><strong>{{ Auth::user()->username }}</strong></h2>
                                <p>{{ Auth::user()->daerah }}</p>

                                @if (Auth::user()->bio)
                                    <p>{{ Auth::user()->bio }}</p>
                                @else
                                    <p class="text-dark text-opacity-25">Bio belum diisi</p>
                                @endif
                            </div>
                            <hr>
                            <div class="d-flex
                                    flex-row-reverse">
                                <a href="{{ url('profile/edit') }}" class="btn btn-solid-hug"><i
                                        class="fa-solid fa-user-pen me-2"></i>Edit Profile</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('user.layouts.footer')
@endsection
