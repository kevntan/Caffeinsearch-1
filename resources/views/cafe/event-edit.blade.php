@extends('cafe.layouts.assets')

@section('content')
    @include('cafe.layouts.navbar2')

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center">
                    <h1><strong>Edit Event
                        </strong></h1>
                </div>
                @if (\Session::has('success'))
                    <div class="p-3 mb-2 bg-success text-white rounded-3">{!! \Session::get('success') !!}</div>
                @elseif(\Session::has('error'))
                    <div class="p-3 mb-2 bg-danger text-white rounded-3">{!! \Session::get('error') !!}</div>
                @endif
                <div class="card shadow-sm px-3">
                    <div class="card-body">
                        <form method="post" action="{{ url('cafe/event-edit/update/' . $event->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <img src=" <?= asset('storage/image/' . $event->foto) ?>" class="rounded" alt=""
                                        style="max-width:100%">
                                    <label for="foto" class="mt-2"> <strong>Ganti Poster</strong></label>
                                    <input type="file" value="{{ $event->nama }}" name="foto" class="form-control "
                                        id="foto" aria-describedby="foto">
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="mb-2">
                                        <label for="nama"><strong>Nama Event<span style="color: #DC3545">*</span>
                                            </strong></label>
                                        <input type="nama" value="{{ $event->nama }}" name="nama"
                                            class="form-control" id="nama" aria-describedby="nama" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="exampleInputEmail1"><strong>Kategori<span
                                                    style="color: #DC3545">*</span>
                                            </strong></label>
                                        <select name="kategori" class="form-control" id="">
                                            <option value="Event">Event</option>
                                            <option value="Promo">Promo</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <label for=""><strong>Waktu<span style="color: #DC3545">*</span>
                                            </strong></label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="datetime-local" class="form-control"
                                                    value="{{ $event->waktu_mulai }}" name="waktu_mulai" id="" required>
                                            </div>
                                            <div class="col-6">
                                                <input type="datetime-local" class="form-control"
                                                    value="{{ $event->waktu_selesai }}" name="waktu_selesai" id="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for=""><strong>Keterangan
                                            </strong></label>
                                        <textarea name="keterangan" class="form-control" id="">{{ $event->keterangan }}</textarea>
                                    </div>
                                    <div class="d-flex flex-row-reverse ">
                                        <button type="submit" class="btn btn-solid-hug">Save</button>
                                        <a href="{{ url('cafe') }}" class="btn btn-solid-cancel me-2">Cancel</a>
                                    </div>

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
