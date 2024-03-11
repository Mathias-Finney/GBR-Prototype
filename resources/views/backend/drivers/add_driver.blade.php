@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.driver') }}">Go Back</a>
        </ol>
    </nav> 
          
    <div class="row profile-body">
      <!-- left wrapper start -->
      
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                    <h6 class="card-title">ADD DRIVER</h6>

                    <form method="post" action="{{ route('store.driver')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Surname</label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" 
                            name="surname" value="{{ old('surname')}}">
                            @error('surname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">First Name</label>
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" 
                            name="firstName" value="{{ old('firstName')}}">
                            @error('firstName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Other Name</label>
                            <input type="text" class="form-control @error('otherName') is-invalid @enderror" 
                            name="otherName" value="{{ old('otherName')}}">
                            @error('otherName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">License Number</label>
                            <input type="text" class="form-control @error('licenseNo') is-invalid @enderror" 
                            name="licenseNo" value="{{ old('licenseNo')}}">
                            @error('licenseNo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 me-2">Save</button>
                    </form>
  
                </div>
              </div>
        </div>
      </div>
      <!-- middle wrapper end -->
      
    </div>

        </div>




@endsection 