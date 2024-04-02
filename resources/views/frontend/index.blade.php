<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/front-style/style.css') }}">
    <!-- bootstrap icon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="icon" href="{{ asset('front/images/G-BRaS LOGO@2x.png') }}">
    <title>Online TIcket</title>
</head>
<body class="homepage">
    @include('layouts.navbar')
    @include('layouts.toast')
    <div class="front-image">
        <img src="{{ asset('front/images/indep.jpg')}}" alt="...">
    </div>
    <div class="body mt-2">

        <!-- destination info cards starts-->
        <div class="body-cards">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-alarm"></i>
                    <h5 class="card-title">Last minute trips</h5>
                    <p class="card-text">Trips within 3 days</p>
                  
                </div>
            </div>
              
            <div class="card text-center mb-3 " style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-geo-alt"></i>
                    <h5 class="card-title">Accra</h5>
                    <p class="card-text">Most popular destinations</p>
                </div>
            </div>
            <div class="card text-center mb-3 " style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-geo-alt"></i>
                    <h5 class="card-title">Kumasi</h5>
                    <p class="card-text">Most popular destinations</p>
                </div>
            </div>
            <div class="card text-center mb-3 " style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-geo-alt"></i>
                    <h5 class="card-title">Cape Coast</h5>
                    <p class="card-text">Most popular destinations</p>
                </div>
            </div>        
            <div class="card text-center mb-3 " style="width: 18rem;">
                <div class="card-body">
                    <i class="bi bi-geo-alt"></i>
                    <h5 class="card-title">Sekondi Takoradi</h5>
                    <p class="card-text">Most popular destinations</p>
                </div>
            </div>
        </div>
        <!-- destination info cards ends -->
        <div class="statement row mt-5">
            <div class="msg col-5">
                <h5 class="mb-3">Do you want to go on a journey without hustling for ticket?
                    Relax, your bus-stop is just a click away.</h5>
                <p>GBRAS, an online bus-ticket booking platform, is the solution to all your commuting problems- be it long journeys or short trails.

                    Book a bus ticket and enjoy your ride without cramming for space, in a comfortable bus, at a cost that your pocket can happily bear. </p>
            </div>
            <div class="logo1 col-7">
                <img src="{{ asset('front/images/G-BRaS LOGO@2x.png')}}" alt="">
            </div>
        </div> 
        <div class="smart">
            <div class="smart-img">
                <img src="{{ asset('front/images/pngegg.png')}}" alt="">
            </div>
            <div class="smart-info">
                <h2>Smart journey, stay hassle&nbsp;-&nbsp;free. </h2>
                <h3 class="h3-bck">Download the G&nbsp;-&nbsp;BRaS Travel app!</h3>
                <p>
                    Ride in convenience with the exclusive features of mobile app,
                    including:
                </p>
                <ul>
            
                    <li><i class="bi bi-geo-alt"></i>Cashless payments</li>
                    <li><i class="bi bi-geo-alt"></i>Schedule a trip for future</li>
                    <li><i class="bi bi-geo-alt"></i>Tracking status with boarding point navigation</li>
                    <li><i class="bi bi-geo-alt"></i>Choose your favourite bus terminal location</li>
                    </ul>
                <p>
                    You don't want to complain every time you set out for a trip.
                    Put an end to your daily commuting sufferings. 
                </p>
                <h2>Experience G&nbsp;-&nbsp;BRaS!</h2>
            </div>
        </div>   

    </div>
    @include('frontend.footer')






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>