<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/front-style/style.css')}}">
    <!-- bootstrap icon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="icon" href="{{ asset('front/images/G-BRaS LOGO@2x.png')}}">
    <title>Online TIcket</title>
</head>
<body>
    <nav class="navbar-brand">
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
            <button class="btn btn-outline-danger btn-lg">LOGIN</button>
            <button class="btn btn-primary btn-lg">Sign UP</button>
        </sign-ins>
    </nav>
    <div class="body">
        <!-- carousel cards -->
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('front/images/nkrumah1.jpg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('front/images/indep.jpg')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('front/images/site1.webp')}}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- destination info cards starts-->
        <div class="body-cards">
            <div class="card text-center mb-3 shadow-lg" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-alarm"></i>
                    <h5 class="card-title">Last minute trips</h5>
                    <p class="card-text">Trips within 3 days</p>
                  
                </div>
            </div>
              
            <div class="card text-center mb-3 shadow-lg" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-geo-alt"></i>
                    <h5 class="card-title">Accra</h5>
                    <p class="card-text">Most popular destinations</p>
                </div>
            </div>
            <div class="card text-center mb-3 shadow-lg" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-geo-alt"></i>
                    <h5 class="card-title">Kumasi</h5>
                    <p class="card-text">Most popular destinations</p>
                </div>
            </div>
            <div class="card text-center mb-3 shadow-lg" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-geo-alt"></i>
                    <h5 class="card-title">Cape Coast</h5>
                    <p class="card-text">Most popular destinations</p>
                </div>
            </div>        
            <div class="card text-center mb-3 shadow-lg" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-geo-alt"></i>
                    <h5 class="card-title">Sekondi Takoradi</h5>
                    <p class="card-text">Most popular destinations</p>
                </div>
            </div>
        </div>
        <!-- destination info cards ends -->
        <div class="statement">
            <div class="msg">
                <h5 class="mb-3">Do you want to go on a journey without hustling for ticket?
                    Relax, your bus-stop is just a click away.</h5>
                <p>GBRAS, an online bus-ticket booking platform, is the solution to all your commuting problems- be it long journeys or short trails.

                    Book a bus ticket and enjoy your ride without cramming for space, in a comfortable bus, at a cost that your pocket can happily bear. </p>
            </div>
            <div class="logo1">
                <img src="{{ asset('front/images/G-BRaS LOGO@2x.png')}}" alt="">
            </div>
        </div> 
        <div class="smart">
            <div class="smart-img">
                <img src="{{ asset('front/images/pngegg.png')}}" alt="">
            </div>
            <div class="smart-info">
                <h2>Smart journey, stay hassle-free. </h2>
                <h3 class="h3-bck">Download the STC Travel app!</h3>
                <p>Ride in convenience with the exclusive features of mobile app,
                    including: </p>
                <ul>
                    <li><i class="bi bi-geo-alt"></i>Cashless payments</li>
                    <li><i class="bi bi-geo-alt"></i>Schedule a trip for future</li>
                    <li><i class="bi bi-geo-alt"></i>Tracking status with boarding point navigation</li>
                    <li><i class="bi bi-geo-alt"></i>Choose your favourite bus terminal location</li>
                    </ul>
                <p>You don't want to complain every time you set out for a trip.
                    Put an end to your daily commuting sufferings. </p>
                    <h2>Experience STC!</h2>
            </div>
        </div>   

    </div>
    <footer class="gbras-footer">
        <div class="footer-logo">
            <img src="{{ asset('front/images/G-BRaS LOGO@2x.png')}}" alt="">
            <div class="social-icon">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-whatsapp"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
            </div>
        </div>
        <div class="footer-support">
            <p class="head">Support</p>
            <a href="#"></a><p>Contact</p></a>
            <a href="#"></a><p>FAQ</p></a>
            <a href="#"></a><p>Download</p></a>
            <a href="#"></a><p>Locate A Terminal</p></a>
            <a href="#"></a><p>Product Registration</p></a>
            <a href="#"></a><p>Spare Part</p></a>
        </div>
        <div class="footer-about">
            <p class="head">GBRAS</p>
            <a href="#"></a><p>About Us</p></a>
            <a href="#"></a><p>GBRAS Design</p></a>
            <a href="#"></a><p>Services</p></a>
            <a href="#"></a><p>News Room</p></a>
            <a href="#"></a><p>Website</p></a>
        </div>
        <div class="footer-email">
            <p>Stay up to date on the latest from GBRAS</p>
            <div class="form">
                <input type="text" placeholder="Enter your E-mail Address">
                <button class="btn btn-danger">Sign Up</button>
            </div>
        </div>
    </footer>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>