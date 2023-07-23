 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top mb-5" style="background-color: black">
     <div class="container d-flex align-items-center justify-content-lg-between">

         <h1 class="logo me-auto me-lg-0"><a href="{{ url('cafe/') }}">Caffein<span>Search</span></a></h1>
         <nav id="navbar" class="navbar order-last order-lg-0">
             <ul>
                 <li><a class="nav-link scrollto
                    @if (!isset($about)) active @endif"
                         href="{{ url('cafe') }}">My Cafe</a></li>
                 <li><a class="nav-link scrollto @if (isset($about)) active @endif"
                         href="{{ url('cafe/about') }}">About</a></li>
                 @if (Auth::user())
                     <li>
                         <form action="{{ url('cafe/profile') }}" method="GET" enctype="multipart/form-data">
                             <button type="submit" class="btn d-lg-none" name="" style="border: transparent">
                                 <i class="fa-solid fa-user ms-2"></i> Profile
                             </button>
                         </form>
                     </li>
                     <li>
                         <form action="{{ url('logout') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <button type="submit" class="btn d-lg-none" name="" style="border: transparent">
                                 <i class="fa-solid fa-right-from-bracket ms-2"></i> Logout
                             </button>
                         </form>
                     </li>
                 @endif
             </ul>
             <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

         @if (Auth::user())
             <nav id="navbar" class="navbar order-last order-lg-0">
                 <ul>
                     <li class="dropdown"><a href="#"><span>{{ Auth::user()->username }}</span> <i
                                 class="bi bi-chevron-down"></i></a>
                         <ul class="rounded">
                             <li>
                                 <form action="{{ url('cafe/profile') }}" method="GET" enctype="multipart/form-data">

                                     <button type="submit" class="btn btn-profile  ms-2" name="">
                                         <i class="fa-solid fa-user me-2"></i> Profile
                                     </button>
                                 </form>
                             </li>
                             <li>
                                 <form action="{{ url('logout') }}" method="POST" enctype="multipart/form-data">
                                     @csrf

                                     <button type="submit" class="btn btn-logout ms-2" name="">
                                         <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                                     </button>
                                 </form>
                             </li>
                         </ul>
                     </li>
                 </ul>
             </nav>
         @else
             <a href="{{ url('sign-in') }}" class="get-started-btn scrollto">Login</a>
         @endif

     </div>
 </header><!-- End Header -->
