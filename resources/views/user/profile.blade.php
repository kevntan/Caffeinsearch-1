@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar2', ['home' => false, 'about' => false, 'feeds' => false])

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center mb-5">
                    <h1>Profile Page</h1>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container">
                            <div class="text-center">
                                @if (Auth::user()->foto)
                                    <img src="<?= asset('storage/image/' . Auth::user()->foto) ?>" alt=""
                                        class="rounded-circle " style="max-width:50%; max-height:50%;">
                                @else
                                    <img src="<?= asset('user/assets/img/Vector.png') ?>" class="rounded-circle"
                                        alt="">
                                @endif
                                <h2><strong>{{ Auth::user()->username }}</strong></h2>
                                <p>{{ Auth::user()->daerah }}</p>
                                <br>
                                @if (Auth::user()->bio)
                                    <p>{{ Auth::user()->bio }}</p>
                                @else
                                    <p class="text-dark text-opacity-25">Bio belum diisi</p>
                                @endif
                            </div>
                            <hr>
                            <div class="d-flex
                                    flex-row-reverse">
                                <a href="{{ url('profile/edit') }}" class="btn btn-primary">Edit Profile</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('user.layouts.footer')
@endsection
