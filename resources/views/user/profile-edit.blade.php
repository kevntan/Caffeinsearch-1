@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar2', ['home' => false, 'about' => false, 'feeds' => false])

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center mb-5">
                    <h1><strong>
                            Edit Profile
                        </strong></h1>
                </div>
                <div class="card mb-5 shadow-sm bg-white border-0">
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
                                {{-- <p>User / Cafe Admin at Nama Cafe</p> --}}
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
                                <input type="text" class="form-control mb-2" name="bio" placeholder="Input your bio"
                                    value="{{ Auth::user()->bio }}">
                                <label for=""><strong>New Password
                                    </strong></label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Input your new password" value="">
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

    @include('user.layouts.footer')
@endsection
