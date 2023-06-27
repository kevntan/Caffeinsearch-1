@extends('user.layouts.assets')
@section('font')
@endsection

@section('content')
    <?php $about = 'active'; ?>
    @include('user.layouts.navbar2', ['home' => false, 'about' => 'active', 'feeds' => false])
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about" style="font-family: 'Poppins', sans-serif;">
            <div class="container mt-5">
                <div class="text-center mt-3 mb-3">
                    <h1> <strong>About Us
                        </strong></h1>
                </div>
                <div class="shadow-sm card text-white mb-3" style="color: #A4907C;">
                    <img src="<?= asset('user/assets/img/about.png') ?>" class="card-img" alt="">
                    <div class="card-img-overlay text-center">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <h1 class="card-title text-light"><strong
                                    style="font-family: Poppins; font-size: 150%">Caffeinsearch<span
                                        style="color: #FFC451">.</span></strong></h1>
                            <h4 class="text-light">Your cafe recomendation friends</h2>
                                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">

                                </div>
                        </div>

                    </div>
                </div>
                <div class="card mt-5 shadow-sm">
                    <div class="card-body text-center ">
                        <div class="text-center mt-2 mb-3">
                            <h5>
                                <strong>Apa itu Caffeinsearch?
                                </strong>
                            </h5>
                        </div>
                        <hr>
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
                <div class="card mt-5 shadow-sm">
                    <div class="card-body text-center ">
                        <div class="text-center mt-2 mb-3">
                            <h5>
                                <strong>Siapa saja membernya?
                                </strong>
                            </h5>
                        </div>
                        <hr>
                        <div class="text-center">
                            <div class="row mt-4">
                                <div class="col-lg-4 col-md-12 col-sm-12 mt-4">
                                    <img src="<?= asset('user/assets/img/vector.png') ?>" alt="">
                                    <br>
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
