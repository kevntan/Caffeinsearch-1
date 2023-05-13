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
                                    <img src="<?= asset('user/assets/img/Vector.png') ?>" alt="">
                                    <input class="form-control" type="file" name="foto" id="formFile">
                                    <input type="text" class="form-control mt-5" name="username"
                                        value="{{ Auth::user()->username }}">
                                    <p>User / Cafe Admin at Nama Cafe</p>
                                    <br>
                                    <input type="text" class="form-control mt-5" name="bio"
                                        value="{{ Auth::user()->bio }}">
                                </div>
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
