 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top mb-5" style="background-color: black">
     <div class="container d-flex align-items-center justify-content-lg-between">

         <h1 class="logo me-auto me-lg-0"><a href="index.html">Caffein<span>Search</span></a></h1>
         <nav id="navbar" class="navbar order-last order-lg-0">
             <ul>
                 <li><a class="nav-link scrollto" href="{{ url('/') }}">Home</a></li>
                 <li><a class="nav-link scrollto" href="#">About</a></li>
                 <li><a class="nav-link scrollto" href="{{ url('/feeds') }}">Feeds</a></li>

             </ul>
             <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

         @if (Auth::user())
             <nav id="navbar" class="navbar order-last order-lg-0">
                 <ul>
                     <li class="dropdown"><a href="#"><span>{{ Auth::user()->username }}</span> <i
                                 class="bi bi-chevron-down"></i></a>
                         <ul>
                             <li><a href="{{ url('profile') }}">Profile</a></li>
                             <li>
                                 <form action="{{ url('logout') }}" method="POST" enctype="multipart/form-data">
                                     @csrf
                                     <button type="submit" class="btn btn-link" name="">
                                         Logout
                                     </button>
                                 </form>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </nav>
         @else
             <a href="{{ url('sign-in') }}" class="get-started-btn scrollto">signup</a>
         @endif

     </div>
 </header><!-- End Header -->
