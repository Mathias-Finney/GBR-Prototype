{{-- <nav class="navbar-brand shadow">
    <a href="#"><img src="{{ asset('front/images/G-BRaS LOGO@2x.png')}}" alt="logo"></a>
    <div class="links">
        <ul class="nav-link">
            <li><a href="#">Home</a></li>
            <li><a href="#">Routes</a></li>
            <li><a href="#">Track Parcel</a></li>
            <li><a href="#">Bus Hiring</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </div>
    <sign-ins>
        <a href="{{ route('login') }}"><button class="btn btn-outline-danger btn-lg">LOGIN</button></a>
        <a href="{{ route('register')}}"><button class="btn btn-outline-primary btn-lg">Sign UP</button></a>
    </sign-ins>
</nav> --}}

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow" >
        <div class="container-fluid">
        
          <a class="navbar-brand" href="#"><img src="buslogo.png" style="height: 35px;width: 100px;"/><span style="font-weight: 600;font-size: 2rem;"> GH-BRAS</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow: 0.5;">
            
            <ul class="navbar-nav" >
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span>Routes</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span>Bus Hiring</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span>About us</span></a>
                </li>
                

            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
            </ul>
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('login')}}"><button class="btn btn-outline-info ps-3 pe-3 border-rounded">Sign In</button></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('register') }}"><button class="btn btn-outline-primary ps-3 pe-3 border-rounded">Sign Up</button></a>
                </li>
                @endguest
                @auth
                {{-- <li class="nav-item icon">
                    <a class="nav-link active ps-1 pe-3 border-rounded-circle" aria-current="page" href="#"><img src="buslogo.png" /></a>
                </li> --}}
                <li class="nav-item dropdown me-5">
                    <a class="nav-link dropdown-toggle ps-1 pe-3 border-rounded-circle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="buslogo.png" />
                    </a>
                    <ul class="dropdown-menu" style="">
                        <li class="profile-image">
                            <a class="dropdown-item ps-1 pe-3 border-rounded-circle" href="">
                                <img src="buslogo.png" />    
                                <br />
                                {{ Auth::user()->username }}
                            </a>
                        </li>
                        <hr class="me-2 ms-2"/>
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-person"></i> Profile</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><button type="submit" class="dropdown-item" href="/logout"><i class="bi bi-box-arrow-in-right"></i> Logout</button></li>

                        </form>
                    </ul>
                </li>
                @endauth
            </ul>
            
            
          </div>
          
        </div>
    </nav>
    