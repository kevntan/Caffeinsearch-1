@extends('user.layouts.assets')

@section('content')
    @include('user.layouts.navbar', ['home' => false, 'about' => false, 'feeds' => 'active'])
    @include('user.layouts.bg-feeds')
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
                        <div class="card shadow-sm bg-white border-0">
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
                                            id="kategori1" <?php $checked = $kategori === 'Event' ? 'checked' : '';
                                            echo $checked; ?>>
                                        <label class="form-check-label" for="kategori1">
                                            Event
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Promo" name="kategori"
                                            id="kategori2" <?php $checked = $kategori === 'Promo' ? 'checked' : '';
                                            echo $checked; ?>>
                                        <label class="form-check-label" for="kategori2">
                                            Promo
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-solid btn-block">Apply Filter</button>
                            <a type="button" href="{{ url('feeds') }}" class="btn btn-outline mt-2">Clear
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
                                <div class="card mb-5 shadow-sm bg-white border-0" style="border-radius: 20px;">
                                    <img src="<?= asset('storage/image/' . $v->foto) ?>" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <strong>
                                                {{ $v->nama }}
                                            </strong>
                                        </h5>
                                        <i class="fa-solid fa-location-dot me-2"></i> {{ $v->nama_cafe }}
                                        {{-- {{ $v->alamat }} za ini mo ganti jadi nama cafe bukan alamat event --}}
                                        <br>
                                        <i class="fa-solid fa-tags me-2"></i>
                                        {{ $v->kategori }}
                                        <br>
                                        <i class="fa-solid fa-calendar me-2"></i>
                                        {{ $v->waktu_mulai }} - {{ $v->waktu_selesai }}
                                        <br>
                                        <br>
                                        <strong>Description</strong>
                                        <br>
                                        {{ $v->keterangan }}
                                        <br>
                                        <a href="{{ url('details-feeds/' . $v->id) }}"
                                            class="btn btn-solid btn-block text-center mt-4 py-3">See
                                            Details</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                Tidak ada event
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    @include('user.layouts.footer')
@endsection
