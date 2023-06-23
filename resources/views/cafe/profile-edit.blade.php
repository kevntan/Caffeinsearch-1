@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center mb-5">
                    <h1>Edit Profile</h1>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="container">
                            <form action="{{ url('cafe/profile/update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="text-center">
                                    @if (Auth::user()->foto)
                                        <img src="<?= asset('storage/image/' . Auth::user()->foto) ?>"
                                            style="max-width:50%;" alt="">
                                    @else
                                        <img src="<?= asset('user/assets/img/Vector.png') ?>" alt="">
                                    @endif
                                    <br>
                                </div>
                                <label for="">Foto Profile</label>
                                <input class="form-control mb-3" type="file" name="foto" id="formFile">
                                <label for="">Username</label>
                                <input type="text" class="form-control mb-3" name="username"
                                    value="{{ Auth::user()->username }}" disabled>
                                <label for="">Email</label>
                                <input type="text" class="form-control mb-3" name="username"
                                    value="{{ Auth::user()->email }}" disabled>
                                <label for="">Daerah</label>
                                <select class="form-control mb-3" name="daerah">
                                    <option selected>{{ Auth::user()->daerah }}</option>
                                    <option value="Central Jakarta">Central Jakarta</option>
                                    <option value="East Jakarta">East Jakarta</option>
                                    <option value="North Jakarta">North Jakarta</option>
                                    <option value="South Jakarta">South Jakarta</option>
                                    <option value="West Jakarta">West Jakarta</option>
                                </select>
                                <label for="">Bio</label>
                                <input type="text" class="form-control mb-3" name="bio"
                                    value="{{ Auth::user()->bio }}">
                                <label for="">New Password</label>
                                <input type="password" class="form-control" name="password" value="">
                                <hr>
                                <div class="d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-primary ">Submit</button>
                                    <a href="{{ url('profile') }}" class="btn btn-link">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    @include('cafe.layouts.footer')
@endsection
