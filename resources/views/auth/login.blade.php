

<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <style>
        .buslogo2-container{
            display: none;
        }

        .buslogo1-container{
            align-content: center;
            text-align: center;
            padding-top: 5rem;
        }

        .register_form form{
                padding: 2rem;
                padding-top: 3rem;
                text-align: center;
                align-content: center;
                margin-left: 20%; 
                width: 23rem;
            }

        .buslogo1{
            padding-top: 1rem;
            width: 52rem;
            transition: 1s ease-in-out;
        }

        .buslogo2{
            transition: 1s ease-in-out;
            display: inline;
        }

        
        .signbutt{
            background-color: #FF7A00;
            border: none;
            color: blue;
            
        }
        .signbutt:hover{
            background-color: #fc7400;
            
        }

        @media (max-width: 1240px){
            .buslogo1{
                width: 40rem;
            }
        }

      

        @media (max-width: 1112px){
            .buslogo1{
                width: 38rem;
            }
        }

        @media (max-width: 1030px){
            .buslogo1-container{
                display: none;
            }

            .register_form{
                width: 70%;
                margin-left: 15%;
            }

            .buslogo2-container{
                display: inline;
                text-align: center;
                width: 70%;
                margin-left: 15%;
            }

            .buslogo2{
                width: 15rem;
                margin-bottom: -2rem;
            }
        }

        @media (max-width: 870px){
           

            .register_form{
                width: 80%;
                margin-left: 10%;
            }

            .register_form form{
               
                /* margin-left: 20%;  */
                
            }

            .buslogo2-container{
                display: inline;
                text-align: center;
                width: 80%;
                margin-left: 10%;
            }
            
        }

        @media (max-width: 700px){
            
            .register_form form{
              
                width: 80%;
                margin-left: 10%;
                margin-right: 10%;
                
            }

            .register_form{
                width: 80%;
                margin-left: 10%;
            }
            
        }

        @media (max-width: 470px){
            
            .register_form form{
                padding-left: 5px;
                padding-right: 5px;
                width: 90%;
                margin-left: 5%;
                margin-right: 5%;
                
            }

            .register_form{
                width: 100%;
                margin-left: 1%;
            }

            .buslogo2-container{
                display: inline;
                text-align: center;
                width: 90%;
                margin-left: 5%;
            }

            .buslogo2{
                width: 10rem;
                margin-bottom: -5rem;
                transition: 1s ease-in-out;
            }
            
        }
    </style>

    <div class="row p-4">
        
        <div class="buslogo1-container col-6" style="">
            <a href="/">
                <img src="buslogo.png" class="buslogo1" style="" />
            </a>
        </div>

        <div class="buslogo2-container col-6" style="">
            <a href="/">
                <img src="buslogo.png" class="buslogo2" style="" />
            </a>
        </div>
        
        <div class="register_form col-6 mb-5" style="margin-top: 40px;">
            <form class="row g-3 ps-3 pe-3 shadow" action="{{ route('login') }}" method="POST" style="">
                @csrf
                <h1 class="text-primary mb-4 text-center">Login</h1>
                <div class="col-md-12" style="text-align: left;">
                    <label for="login" class="form-label">Email or Phone Number</label>
                    <input type="text" name="login" class="form-control {{ $errors->has('login') ? 'is-invalid' : 'border-primary' }}" id="login"  value="{{old('login')}}" required autofocus autocomplete="username" />
                    @error('login')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mt-4" style="text-align: left;">
                    <label for="input_Password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : 'border-primary' }}  id="input_Password" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-12 mt-4" style="text-align: left;">
                    Don't have an account? <a href="{{ route('register') }}" style="color: #0155C2;text-decoration: none;">Sign up</a>
                </div>
                
                <div class="col-12 mt-5">
                <button type="submit" class="btn btn-primary w-100 signbutt">Sign in</button>
                </div>
            </form>
        
        
    
    
        </div>
       
    </div>
</x-guest-layout>

