@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

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
                            <form action="{{ url('cafe/profile/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="text-center">
                                    <img src="<?= asset('user/assets/img/Vector.png') ?>" alt="">
                                    <br>
                                </div>
                                    foto
                                    <input class="form-control mb-3" type="file" name="foto" id="formFile">
                                    nama cafe
                                    <input type="text" class="form-control mb-3" name="nama"
                                    value="{{ $cafe->nama }}">
                                    username
                                    <input type="text" class="form-control mb-3" name="username"
                                        value="{{ Auth::user()->username }}">
                                    <br>
                                    bio
                                    <input type="text" class="form-control mb-3" name="bio"
                                        value="{{ Auth::user()->bio }}">
                                <hr>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('cafe.layouts.footer')
@endsection
