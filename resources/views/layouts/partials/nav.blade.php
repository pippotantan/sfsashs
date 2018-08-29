
    <!-- Grid Top -->
    <div class="jumbotron-fluid">
    <div id="app" style="background: linear-gradient(to bottom, rgba(40, 150, 200, 1), rgba(255,255,255,1));" class="container-fluid text-center text-md-right mt-0">
            
    <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-book"></i> {{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <!--End Top-->
        
    <div class="navbar navbar-expand-xl navbar-light bg-white p-3 border-bottom border-info">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHead" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>    
        <div class="collapse navbar-collapse" id="navbarHead">
            <a class="navbar-brand" href="/" style="color: red;">
            <img src="{{ asset("../layoutpic/") }}/logo96.png" alt="logo" class="img-fluid rounded-circle hoverable lambong">
            </a>
            <h5 class="my-0 mr-md-auto font-weight-normal font-weight-bold">STA. FE STAND-ALONE SHS</h5>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Students</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Parents</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Teachers</a></li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div> <!--main container end-->



<nav class="navbar navbar-expand-xl navbar-light sticky-top lambong" style="background-color: rgb(40, 150, 200);">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFull" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarFull">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="/"><i class="fa fa-home"></i> Home</a>
            </li>

            <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="navStrand" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-graduate"></i> Strands
                </a>
                <div class="dropdown-menu w-100 text-black mt-0 bgko" aria-labelledby="navStrand">
                  <div class="container"><!--sub menu container-->
                  <div class="row"><!--sub menu row-->
                    <div class="col-sm-8 strand_submenu"><!--sub menu cols-->
                    </div><!--sub menu cols-8 end-->
                    <div class="col-sm-4 bg-white">
                        Content Pop here
                    </div>
                  </div><!--sub menu row ends-->
                  </div><!--sub menu container ends-->
                    <div class="dropdown-divider"></div>
                    <div class="bg-dark text-white pl-2 font-weight-bold">BE ONE OF OUR FUTURE PROFESSIONALS</div>
                </div>
            </li>
            
            <li class="nav-item dropdown position-static">
                <a class="nav-link dropdown-toggle" href="#" id="navGlance" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-school"></i> School at a Glance
                </a>
                <div class="dropdown-menu w-100 mt-0 bgko" aria-labelledby="navGlance">
                    <a class="dropdown-item" href="#">History</a>
                    <a class="dropdown-item" href="#">Mission & Vision</a>
                    <a class="dropdown-item" href="/faculty">Faculty & Staff</a>
                    <a class="dropdown-item" href="#">Gallery</a>           
                    <div class="dropdown-divider"></div>
                    <div class="bg-dark text-white pl-2 font-weight-bold">SIMPLY THE BEST</div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link" href="/publications"><i class="fa fa-newspaper"></i> News Pub</a>
            </li>

        </ul>
    </div>
</nav>

