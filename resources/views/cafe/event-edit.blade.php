@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1>My Cafe</h1>
                </div>
                @if (\Session::has('success'))
                    <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                @elseif(\Session::has('error'))
                    <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ url('cafe/event-edit/update/' . $event->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <img src=" <?= asset('storage/image/' . $event->foto) ?>" alt=""
                                        style="max-width:100%">
                                    <input type="file" value="{{ $event->nama }}" name="foto" class="form-control"
                                        id="foto" aria-describedby="foto">
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Event</label>
                                        <input type="nama" value="{{ $event->nama }}" name="nama"
                                            class="form-control" id="nama" aria-describedby="nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                        <select name="kategori" class="form-control" id="">
                                            <option value="Event">Event</option>
                                            <option value="Promo">Promo</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Waktu</label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="datetime-local" class="form-control" value="{{ $event->waktu_mulai }}"
                                                    name="waktu_mulai" id="">
                                            </div>
                                            <div class="col-6">
                                                <input type="datetime-local" class="form-control"
                                                    value="{{ $event->waktu_selesai }}" name="waktu_selesai" id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" id="">{{ $event->keterangan }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('cafe') }}" class="btn btn-link">Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('cafe.layouts.footer')
@endsection
