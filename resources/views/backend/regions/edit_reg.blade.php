@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
     <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.reg') }}">VIEW ALL REGION.</a>
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
  
                    <h6 class="card-title">EDIT REGION</h6>

                    <form method="post" action="{{ route('update.reg')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Region</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{$data->name}}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" 
                            name="city" value="{{$data->city}}">
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">City Code</label>
                            <input type="text" class="form-control @error('city_code') is-invalid @enderror" 
                            name="city_code" value="{{$data->city_code}}">
                            @error('city_code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                        <button type="submit" class="btn btn-primary w-100 me-2">Save Changes</button>
                    </form>
  
                </div>
              </div>
        </div>
      </div>
      <!-- middle wrapper end -->
      
    </div>

        </div>




@endsection 