@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center mb-5">
                    <h1><strong>Edit Profile
                        </strong></h1>
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
                                <label for=""><strong>Foto Profile
                                    </strong></label>
                                <input class="form-control mb-2" type="file" name="foto" id="formFile">
                                <label for=""><strong>Username
                                    </strong></label>
                                <input type="text" class="form-control mb-2" name="username"
                                    value="{{ Auth::user()->username }}" disabled>
                                <label for=""><strong>Email
                                    </strong></label>
                                <input type="text" class="form-control mb-2" name="username"
                                    value="{{ Auth::user()->email }}" disabled>
                                <label for=""><strong>Daerah
                                    </strong></label>
                                <select class="form-select mb-2" name="daerah">
                                    <option selected>{{ Auth::user()->daerah }}</option>
                                    <option value="Central Jakarta">Central Jakarta</option>
                                    <option value="East Jakarta">East Jakarta</option>
                                    <option value="North Jakarta">North Jakarta</option>
                                    <option value="South Jakarta">South Jakarta</option>
                                    <option value="West Jakarta">West Jakarta</option>
                                </select>
                                <label for=""><strong>Bio
                                    </strong></label>
                                <input type="text" class="form-control mb-2" name="bio"
                                    value="{{ Auth::user()->bio }}" placeholder="Input bio">
                                <label for=""><strong>New Password
                                    </strong></label>
                                <input type="password" class="form-control" name="password" value=""
                                    placeholder="Input new password">
                                <div class="text-dark text-opacity-50 fw-medium">* Minimal 9 karakter
                                </div>
                                <hr>
                                <div class="d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-solid-hug ">Save</button>
                                    <a href="{{ url('profile') }}" class="btn btn-solid-cancel me-2">Cancel</a>
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
