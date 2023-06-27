@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1><strong>My Cafe
                        </strong></h1>
                    @if (\Session::has('success'))
                        <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                    @elseif(\Session::has('error'))
                        <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                    @endif
                </div>
                <form action="{{ url('cafe/edit/update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card shadow-sm px-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-10 col-md-6 col-sm-6">
                                    <h3><strong>{{ $cafe->nama }}
                                        </strong></h3>
                                    @if ($cafe->rating)
                                        <h5><i
                                                class="fa-solid fa-star me-2"></i>{{ number_format($cafe->rating, 1, '.', '') }}
                                            /
                                            5.0 </h5>
                                    @endif

                                    <select name="lokasi" class="form-select" id="" style="width: auto">
                                        <option selected>{{ $cafe->lokasi }}</option>
                                        <option value="Central Jakarta">Central Jakarta</option>
                                        <option value="East Jakarta">East Jakarta</option>
                                        <option value="North Jakarta">North Jakarta</option>
                                        <option value="South Jakarta">South Jakarta</option>
                                        <option value="West Jakarta">West Jakarta</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-5">
                                    {{-- @if ($cafe->wfc_friendly == 1) --}}
                                    @if ($cafe->wifi == 1 && $cafe->charging_port == 1 && $cafe->toilet == 1 && ($cafe->ambience = 'Tenang'))
                                        <h4>WFC Friendly</h4>
                                    @endif
                                    {{-- @endif --}}
                                    @if ($cafe->user_id != 0)
                                        <h4>Verified
                                        </h4>
                                    @endif
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="container">

                            <div class="row mb-4">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"
                                        style="border-radius: 16px;">
                                        <div class="carousel-inner rounded">
                                            @if ($cafe->foto)
                                                <div class="carousel-item active">
                                                    <img src="<?= asset('storage/image/' . $cafe->foto) ?>"
                                                        style="width:100%" class="d-block w-100"
                                                        alt="<?= asset('storage/image/{{ $cafe->foto }}') ?>">
                                                    {{-- <div class="carousel-caption">
                                                        <p>{{ $cafe->nama }}</p>
                                                        <p>* rating/5</p>
                                                        <p>loc Jakarta</p>
                                                    </div> --}}
                                                </div>
                                            @endif
                                            @if ($cafe->foto2)
                                                <div class="carousel-item">
                                                    <img src="<?= asset('storage/image/' . $cafe->foto2) ?>"
                                                        style="width:100%" class="d-block w-100"
                                                        alt="<?= asset('storage/image/{{ $cafe->foto2 }}') ?>">
                                                    {{-- <div class="carousel-caption">
                                                        <p>{{ $cafe->nama }}</p>
                                                        <p>* rating/5</p>
                                                        <p>loc Jakarta</p>
                                                    </div> --}}
                                                </div>
                                            @endif
                                            @if ($cafe->foto3)
                                                <div class="carousel-item">
                                                    <img src="<?= asset('storage/image/' . $cafe->foto3) ?>"
                                                        style="width:100%;" class="d-block w-100"
                                                        alt="<?= asset('storage/image/{{ $cafe->foto3 }}') ?>">
                                                    {{-- <div class="carousel-caption">
                                                        <p>{{ $cafe->nama }}</p>
                                                        <p>* rating/5</p>
                                                        <p>loc Jakarta</p>
                                                    </div> --}}
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
                                    <strong>Foto</strong>
                                    <select name="pilih" class="form-select" id="">
                                        <option value="foto">Foto1</option>
                                        <option value="foto2">Foto2</option>
                                        <option value="foto3">Foto3</option>
                                    </select>
                                    <input type="file" name="foto" class="form-control mt-2"
                                        id="exampleFormControlFile1">

                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <strong>Nama Cafe</strong>
                                    <br>
                                    <input type="text" class="form-control" name="nama" id="inlineFormInputGroup"
                                        placeholder="Input nama cafe" value="{{ $cafe->nama }}" required>

                                    <strong>Alamat</strong>
                                    <br>
                                    <input type="text" class="form-control" name="alamat" id="inlineFormInputGroup"
                                        placeholder="Input alamat" value="{{ $cafe->alamat }}">

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
                                            {{ $cafe->range_harga }}
                                        </option>
                                        <option value="$ (< 25.000 untuk 1 orang)">$ (< 25.000 untuk 1 orang)</option>
                                        <option value="$$ (25.000 - 50.000 IDR untuk 1 orang)">$$ (25.000 - 50.000 IDR
                                            untuk 1 orang)</option>
                                        <option value="$$$ (51.000 - 75.000 IDR untuk 1 orang)">$$$ (51.000 - 75.000 IDR
                                            untuk 1 orang)</option>
                                        <option value="$$$$ (> 75.000 IDR untuk 1 orang)">$$$$ (> 75.000 IDR untuk 1 orang)
                                        </option>
                                    </select>
                                    <strong>Suasana Cafe</strong>
                                    <br>
                                    <select name="ambience" class="form-control">
                                        <option value="{{ $cafe->ambience }}">
                                            {{ $cafe->ambience }}
                                        </option>
                                        <option value="Ramai">Ramai</option>
                                        <option value="Tenang">Tenang</option>
                                    </select>
                                    <strong>Phone</strong>
                                    <br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text me-2">+62</div>
                                        </div>
                                        <input name="telepon" type="text" class="form-control rounded"
                                            id="inlineFormInputGroup" placeholder="Phone Number"
                                            value="{{ $cafe->telepon }}">
                                    </div>

                                    <strong>Description</strong>
                                    <br>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write a Description"
                                            name="deskripsi">{{ $cafe->deskripsi }}</textarea>
                                    </div>

                                    <strong>Google Maps</strong>
                                    <br>
                                    <input type="text" class="form-control" name="maps" id="inlineFormInputGroup"
                                        placeholder="Url Google Maps" value="{{ $cafe->maps }}">

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
                                                Wi-Fi
                                            </label>
                                        @else
                                            <input class="form-check-input" type="checkbox" name="wifi"
                                                value="1" id="defaultCheck1" checked>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Wi-Fi
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
                                                Charging Port
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
                                        <a href="{{ url('/') }}" class="btn btn-solid-cancel ">Cancel</a>
                                        <button type="submit" class="btn btn-solid-hug">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main><!-- End #main -->

    @include('cafe.layouts.footer')
@endsection
