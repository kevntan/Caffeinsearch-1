@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center mb-5">
                    <h1>Detail Cafe</h1>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container">
                            <div class="text-center">
                                @if (Auth::user()->foto)
                                    <img src="<?= asset('storage/image/' . Auth::user()->foto) ?>" alt="" style="max-width: 50%">
                                @else
                                    <img src="<?= asset('user/assets/img/Vector.png') ?>" alt="">
                                @endif
                                <h2><strong>{{ Auth::user()->username }}</strong></h2>
                                {{-- <p>User Cafe Admin at Nama Cafe</p> --}}
                                <br>
                                @if (Auth::user()->bio)
                                    <p>{{ Auth::user()->bio }}</p>
                                @else
                                    <p>Bio belum diisi</p>
                                @endif
                            </div>
                            <hr>
                            <a href="{{ url('profile/edit') }}" class="btn btn-primary">Edit profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('user.layouts.footer')
@endsection
