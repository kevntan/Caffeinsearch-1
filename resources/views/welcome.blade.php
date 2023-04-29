@extends('base')

@section('title', 'Home')

@section('content')

{{-- Ini Searchbar --}}
<div class="search d-flex justify-content-center p-5">
    {{-- <img src="..." class="img-fluid" alt="Ini Thumbnail Coffeeshop"> --}}
    <form class="d-flex my-lg-0 w-50 justify-content-center" role="search">
        <input class="form-control me-2 p-3" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>

{{-- Ini Div Bagian Tengah --}}
<div class="bagianTgh d-flex mx-4 mb-5">
    {{-- Ini FIlter --}}
    <div class="filter me-3">
        {{-- cek
        https://goo.gl/maps/uCWWNrvYwTbeRaR89
        <iframe src="https://goo.gl/maps/uCWWNrvYwTbeRaR89" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
        <h4>Filter</h4>
        <div class="isiFilter shadow-sm px-3 py-4 mt-3 mb-3 bg-white">
          <div class="location">
            <h6>Location</h6>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Pilih lokasi
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Jakarta Pusat</a></li>
                  <li><a class="dropdown-item" href="#">Jakarta Utara</a></li>
                  <li><a class="dropdown-item" href="#">Jakarta Timur</a></li>
                  <li><a class="dropdown-item" href="#">Jakarta Selatan</a></li>
                  <li><a class="dropdown-item" href="#">Jakarta Barat</a></li>
                </ul>
            </div>
        </div>
      <br>
        <div class="priceRange">
            <h6>Price Range</h6>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih range harga
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">$</a></li>
                    <li><a class="dropdown-item" href="#">$$</a></li>
                    <li><a class="dropdown-item" href="#">$$$</a></li>
                    <li><a class="dropdown-item" href="#">$$$$</a></li>
                </ul>
            </div>
        </div>
      <br>
        <div class="rating">
            <h6>Ratings</h6>
             <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih urutan rating
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Lowest to highest</a></li>
                    <li><a class="dropdown-item" href="#">Highest to lowest</a></li>
                </ul>
            </div>
        </div>
      <br>
        <div class="wfcFriendly">
            <h6>WFC Friendly?</h6>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih sesuai dengan kebutuhan
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Yes</a></li>
                    <li><a class="dropdown-item" href="#">No</a></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btnFull" type="button">Apply Filter</button>
            <button class="btn btnOut" type="button">Clear Filter</button>
        </div>
    </div>

     {{-- Ini konten --}}
     <div id="content" class="content flex-fill">
        <h1>Weekly Recomendation</h1>
        <div id="carousel" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://plchldr.co/i/300x300" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="https://plchldr.co/i/300x300" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="https://plchldr.co/i/300x300" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h3>Popular Cafe</h3>

        <div id="m-card-container" class="grid">
            <div class="row mb-3">
            <div class="card col mx-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                </div>
            </div>
            <div class="card col mx-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                </div>
            </div>
            <div class="card col mx-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                </div>
            </div>
            <div class="card col mx-3 ">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="card col m-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                </div>
            </div>
            <div class="card col m-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                </div>
            </div>
            <div class="card col m-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                </div>
            </div>
            <div class="card col m-3">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary w-100">Go somewhere</a>
                </div>
            </div>
            </div>

        </div>
  </div>

</div>
@endsection()
