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
                            <form action="{{ url('profile/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="text-center">
                                    @if (Auth::user()->foto)
                                        <img src="<?= asset('storage/image/' . Auth::user()->foto) ?>" alt=""
                                            style="max-width: 50%">
                                    @else
                                        <img src="<?= asset('user/assets/img/Vector.png') ?>" alt="">
                                    @endif
                                </div>
                                {{-- <br> --}}
                                <label for="">Foto</label>
                                <input class="form-control" type="file" name="foto" id="formFile">
                                <label for="">username</label>
                                <input type="text" class="form-control" name="username"
                                    value="{{ Auth::user()->username }}" disabled>
                                {{-- <p>User / Cafe Admin at Nama Cafe</p> --}}

                                <label for="">bio</label>
                                <input type="text" class="form-control" name="bio" value="{{ Auth::user()->bio }}">
                                <label for="">New Password</label>
                                <input type="password" class="form-control" name="password" value="">
                                <hr>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('user.layouts.footer')
@endsection
