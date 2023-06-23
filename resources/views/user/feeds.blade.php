@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar', ['home' => false, 'about' => false, 'feeds' => 'active'])
    @include('user.layouts.bg')
    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <h1>
                            <strong>
                                Filter
                            </strong>
                        </h1>
                        <div class="card">
                            <form action="{{ url('feeds') }}" method="get">
                                <div class="card-body">
                                    Location
                                    <select name="lokasi" class="form-select" aria-label="Default select example">
                                        @if (isset($lokasi))
                                            <option value="{{ $lokasi }}">{{ $lokasi }}</option>
                                        @else
                                            <option value="">Open this select menu</option>
                                        @endif
                                        <option value="Central Jakarta">Central Jakarta</option>
                                        <option value="East Jakarta">East Jakarta</option>
                                        <option value="North Jakarta">North Jakarta</option>
                                        <option value="South Jakarta">South Jakarta</option>
                                        <option value="West Jakarta">West Jakarta</option>
                                    </select>
                                    Categories
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Event" name="kategori"
                                            id="kategori1" <?php $checked = ($kategori === "Event") ? "checked" : ""; echo $checked;?>>
                                        <label class="form-check-label" for="kategori1">
                                            Event
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Promo" name="kategori"
                                            id="kategori2" <?php $checked = ($kategori === "Promo") ? "checked" : ""; echo $checked;?>>
                                        <label class="form-check-label" for="kategori2">
                                            Promo
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-warning" style="width: 100%">Apply Filter</button>
                            <a type="button" href="{{ url('feeds') }}" class="btn btn-light mt-2"
                                style="width: 100%">Clear
                                Filter</a>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <h1 class="text-center">
                            <strong>
                                All Feeds
                            </strong>
                        </h1>
                        @if ($result->count() > 0)
                            @foreach ($result as $v)
                                <div class="card mb-5" style="border-radius: 20px;">
                                    <img src="<?= asset('storage/image/' . $v->foto) ?>" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $v->nama }}</h5>
                                        {{ $v->alamat }}
                                        <br>
                                        {{ $v->kategori }}
                                        <br>
                                        {{ $v->tanggal }}
                                        <br>
                                        {{ $v->waktu_mulai }} - {{ $v->waktu_selesai }}
                                        <br>
                                        <br>
                                        {{ $v->keterangan }}
                                        <br>
                                        <a href="{{ url('details-feeds/' . $v->id) }}"
                                            class="btn btn-primary text-center mt-4" style="width: 100%;">See
                                            Details</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                tidak ada event
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    @include('user.layouts.footer')
@endsection
