  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
      <div class="container" data-aos="fade-up">

          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
              <div class="col-xl-6 col-lg-8">
                  <h1>Caffeinsearch<span>.</span></h1>
                  <h2>Your cafe recomendation friends</h2>
              </div>
          </div>

          <div class="row gy-4 mt-3 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
              <form action="{{ url('see-all') }}" method="get">
                  <div class="input-group mb-3">
                      @if (isset($old))
                          <input type="text" class="form-control" name="query" placeholder="Search"
                              aria-label="Search" aria-describedby="button-addon2" value="{{ $old }}">
                      @else
                          <input type="text" class="form-control" name="query" placeholder="Search"
                              aria-label="Search" aria-describedby="button-addon2">
                      @endif
                      <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="submit" id="button-addon2"
                              style="color: white; border-color:white; border-radius: 0px 5px 5px 0px">Search</button>
                      </div>
                  </div>
              </form>
          </div>

      </div>
  </section><!-- End Hero -->
