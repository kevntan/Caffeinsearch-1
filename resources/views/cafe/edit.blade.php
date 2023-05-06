@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1>My Cafe</h1>
                    @if (\Session::has('success'))
                        <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                    @elseif(\Session::has('error'))
                        <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                    @endif
                </div>
                <form action="{{ url('cafe/edit/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-10 col-md-6 col-sm-6">
                                    <h3>{{ $cafe->nama }}</h3>
                                    <h5>Rating</h5>
                                    <h5>{{ $cafe->lokasi }}</h5>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-5">
                                    <h3>WFC Friendly</h3>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <hr>
                            <div class="row mb-4">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                        style="border-radius: 16px;">
                                        <div class="carousel-inner">
                                            @if ($cafe->foto)
                                                <div class="carousel-item active">
                                                    <img src="<?= asset('storage/image/' . $cafe->foto) ?>"
                                                        style="width:100%" class="d-block w-100"
                                                        alt="<?= asset('storage/image/{{ $cafe->foto }}') ?>">
                                                    <div class="carousel-caption">
                                                        <p>{{ $cafe->nama }}</p>
                                                        <p>* rating/5</p>
                                                        <p>loc Jakarta</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($cafe->foto2)
                                                <div class="carousel-item">
                                                    <img src="<?= asset('storage/image/' . $cafe->foto2) ?>"
                                                        style="width:100%" class="d-block w-100"
                                                        alt="<?= asset('storage/image/{{ $cafe->foto2 }}') ?>">
                                                    <div class="carousel-caption">
                                                        <p>{{ $cafe->nama }}</p>
                                                        <p>* rating/5</p>
                                                        <p>loc Jakarta</p>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($cafe->foto3)
                                                <div class="carousel-item">
                                                    <img src="<?= asset('storage/image/' . $cafe->foto3) ?>"
                                                        style="width:100%;" class="d-block w-100"
                                                        alt="<?= asset('storage/image/{{ $cafe->foto3 }}') ?>">
                                                    <div class="carousel-caption">
                                                        <p>{{ $cafe->nama }}</p>
                                                        <p>* rating/5</p>
                                                        <p>loc Jakarta</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                    <br>
                                    <select name="pilih" id="">
                                        <option value="foto">foto1</option>
                                        <option value="foto2">foto2</option>
                                        <option value="foto3">foto3</option>
                                    </select>
                                    <input type="file" name="foto" class="form-control-file"
                                        id="exampleFormControlFile1">
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <strong>Operational Hours</strong>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <input class="form-control" type="time" name="operasional_buka"
                                                placeholder="Default input" value="{{ $cafe->operasional_buka }}">
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <input class="form-control" type="time" name="operasional_tutup"
                                                placeholder="Default input" value="{{ $cafe->operasional_tutup }}">
                                        </div>

                                    </div>


                                    <strong>Price Range</strong>
                                    <br>
                                    <select name="range_harga" class="form-control">
                                        <option value="{{ $cafe->range_harga }}">
                                            <?php for ($i = 1; $i <= $cafe->range_harga; $i++) {
                                                echo "$";
                                            }
                                            ?>
                                        </option>
                                        <option value="1">$</option>
                                        <option value="2">$$</option>
                                        <option value="3">$$$</option>
                                        <option value="4">$$$$</option>
                                    </select>
                                    <br>
                                    <strong>Phone</strong>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+62</div>
                                        </div>
                                        <input name="telepon" type="number" class="form-control" id="inlineFormInputGroup"
                                            placeholder="Phone Number" value="{{ $cafe->telepon }}">
                                    </div>
                                    <br>
                                    <strong>Description</strong>
                                    <br>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write a Description"
                                            name="deskripsi">{{ $cafe->deskripsi }}</textarea>
                                    </div>
                                    <br>
                                    <strong>Google Maps</strong>
                                    <br>
                                    <input type="text" class="form-control" name="maps" id="inlineFormInputGroup"
                                        placeholder="Url Google Maps" value="{{ $cafe->maps }}">
                                    <br>
                                </div>
                            </div>
                            <hr>
                            <strong>Facilities</strong>
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-check">
                                        @if ($cafe->wifi == 0)
                                            <input class="form-check-input" type="checkbox" name="wifi"
                                                value="1" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Wifis
                                            </label>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="wifi"
                                                value="1" id="defaultCheck1" checked>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Wifi
                                            </label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-check">
                                        @if ($cafe->charging_port == 0)
                                            <input class="form-check-input" type="checkbox" name="charging_port"
                                                value="1" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Charging Ports
                                            </label>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="charging_port"
                                                value="1" id="defaultCheck1" checked>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Charging Port
                                            </label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-check">
                                        @if ($cafe->lahan_parkir == 0)
                                            <input class="form-check-input" type="checkbox" name="lahan_parkir"
                                                value="1" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Lahan Parkir
                                            </label>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="lahan_parkir"
                                                value="1" id="defaultCheck1" checked>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Lahan Parkir
                                            </label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-check">
                                        @if ($cafe->smoking_area == 0)
                                            <input class="form-check-input" type="checkbox" name="smoking_area"
                                                value="1" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Smoking Area
                                            </label>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="smoking_area"
                                                value="1" id="defaultCheck1" checked>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Smoking Area
                                            </label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    @if ($cafe->mushola == 0)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="mushola"
                                                value="1" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Mushola
                                            </label>
                                        </div>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="mushola" value="1"
                                            id="defaultCheck1" checked>
                                        <label class="form-check-label" for="defaultCheck1">
                                            Mushola
                                        </label>
                                    @endif
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    @if ($cafe->toilet == 0)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toilet"
                                                value="1" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Toilet
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="toilet"
                                                value="1" id="defaultCheck1" checked>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Toilet
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <br>
                            <br>
                            <div class="position-relative">
                                <div class="position-absolute bottom-0 end-0">
                                    <div class="mb-3 ">
                                        <a href="#" class="btn btn-light ">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card mt-5">
                    <div class="card-body mb-5">
                        <strong>Event</strong>
                        <br>
                        <hr>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                            style="width: 200px;">
                                    </div>
                                    <div class="col-lg-7 col-md-12 col-sm-12">
                                        <h4>Judul</h4>
                                        Nama Cafe
                                        <br>
                                        Kategori
                                        <br>
                                        Tanggal
                                        <br>
                                        Jam
                                        <br>
                                        <br>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus libero animi
                                        aspernatur incidunt atque. Porro at sint cupiditate officiis nobis?
                                    </div>
                                    <div class="col-lg-2">
                                        WFC FRIENDLY
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                            style="width: 200px;">
                                    </div>
                                    <div class="col-lg-7 col-md-12 col-sm-12">
                                        <h4>Judul</h4>
                                        Nama Cafe
                                        <br>
                                        Kategori
                                        <br>
                                        Tanggal
                                        <br>
                                        Jam
                                        <br>
                                        <br>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus libero animi
                                        aspernatur incidunt atque. Porro at sint cupiditate officiis nobis?
                                    </div>
                                    <div class="col-lg-2">
                                        WFC FRIENDLY
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary position-absolute bottom-0 end-0 mb-3 mx-3"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambahkan Event
                        </button>

                        <!-- Modal -->
                        <form action="">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Event/Promo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="exampleFormControlFile1">Gambar</label>
                                            <br>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                            <br>
                                            <label for="">Nama Event</label>
                                            <input class="form-control" type="text" placeholder="Default input"
                                                aria-label="default input example">
                                            <label for="">Kategori</label>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Default radio
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Default checked radio
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="">Date</label>
                                            <input class="form-control" type="date" placeholder="Default input"
                                                aria-label="default input example">
                                            <label for="">Time</label>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <input class="form-control" type="time"
                                                        placeholder="Default input">
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <input class="form-control" type="time"
                                                        placeholder="Default input">
                                                </div>

                                            </div>
                                            <div class="form-floating mt-3">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                <label for="floatingTextarea2">Description</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body mb-5">
                        <strong>Reviews</strong>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <strong>Nama User</strong>
                                <br>
                                rating
                                <br>
                                text
                                <br>
                                <div class="row mt-3">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                            style="width:100%">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                            style="width:100%">
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <img src="<?= asset('user/assets/img/assets1.png') ?>" alt=""
                                            style="width:100%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2" style="text-align:right;">
                                12/03/2022
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <strong>Nama User</strong>
                                <br>
                                rating
                                <br>
                                text
                                <br>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2" style="text-align:right;">
                                12/03/2022
                            </div>
                        </div>
                    </div>
                </div>

        </section>
    </main><!-- End #main -->

    @include('cafe.layouts.footer')
@endsection
