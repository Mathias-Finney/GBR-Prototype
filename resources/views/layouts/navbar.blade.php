
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow" >
        <div class="container-fluid">
        
          <a class="navbar-brand" href="/"><img src="buslogo.png" style=""/><span style=""> GH-BRAS</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow: 0.5;">
            
            <ul class="navbar-nav" >
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/"><span>Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href=" {{ route('routepage') }} "><span>Routes</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href=" {{ route('busHiring') }} "><span>Bus Hiring</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span>Find Bus</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href=" {{ route('aboutUs') }} "><span>About us</span></a>
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
    
