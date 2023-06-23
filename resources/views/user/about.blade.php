@extends('user.layouts.assets')

@section('content')
<?php $about = 'active'; ?>
    @include('user.layouts.navbar2', ['home' => false, 'about' => 'active', 'feeds' => false])


    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container mt-5">
                <div class="text-center mt-3 mb-3">
                    <h1>About Us</h1>
                </div>
                <div class="shadow card text-white mb-3" style="color: #A4907C;">
                    <img src="<?= asset('user/assets/img/about.png') ?>" class="card-img" alt="">
                    <div class="card-img-overlay text-center">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <h1 class="card-title"><strong>Caffeinsearch<span style="color: #FFC451">.</span></strong></h1>
                            <h2>Your cafe recomendation friends</h2>
                        </div>
                    </div>
                </div>
                <div class="card mt-5 shadow">
                    <div class="card-body text-center ">
                        <div class="text-center mt-2 mb-3">
                            <h4>Apa itu Caffeinsearch?</h4>
                        </div>
                        <div class="text-center">
                            <p>
                                Caffeinsearch adalah sebuah aplikasi berbasis website yang bertujuan untuk membantu
                                masyarakat kota Jakarta khusunya pekerja dengan gaya kerja remote dan juga para penikmat
                                coffee dalam mencari dan dan memberikan rekomendasi cafe maupun coffee shop sesuai dengan
                                daerah dan keperluannya masing-masing. Selain membantu masyarakat aplikasi ini juga dapat
                                membantu pengelola atau owner dari cafe yang ada di Jakarta sebagai media promosi dan saran
                                untuk mendapatkan feedback atau masukan untuk bisnis cafe-nya.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card mt-5 shadow">
                    <div class="card-body text-center ">
                        <div class="text-center mt-2 mb-3">
                            <h4>Siapa saja membernya?</h4>
                        </div>
                        <hr>
                        <div class="text-center">
                            <div class="row mt-4">
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                                    <img src="<?= asset('user/assets/img/vector.png') ?>" alt="">
                                    <br>
                                    <strong>Octavionus Chandra</strong>
                                    <br>
                                    <em class="text-muted">2301857720</em>
                                    <br>
                                    <em class="text-muted">Computer Science</em>
                                    <br>
                                    <p>Bina Nusantara University</p>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                                    <img src="<?= asset('user/assets/img/vector.png') ?>" alt="">
                                    <br>
                                    <strong>Kevin</strong>
                                    <br>
                                    <em class="text-muted">2301875603</em>
                                    <br>
                                    <em class="text-muted">Computer Science</em>
                                    <br>
                                    <p>Bina Nusantara University</p>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                                    <img src="<?= asset('user/assets/img/vector.png') ?>" alt="">
                                    <br>
                                    <strong>Matthew Tjiu</strong>
                                    <br>
                                    <em class="text-muted">2301883782</em>
                                    <br>
                                    <em class="text-muted">Computer Science</em>
                                    <br>
                                    <p>Bina Nusantara University</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    @include('user.layouts.footer')
@endsection
