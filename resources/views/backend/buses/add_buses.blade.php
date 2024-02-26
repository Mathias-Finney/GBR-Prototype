@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.bus') }}">VIEW ALL BUSES.</a>
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
  
                    <h6 class="card-title">ADD BUSES</h6>

                    <form method="post" action="{{ route('store.buses')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Registration Number</label>
                            <input type="text" class="form-control @error('reg_number') is-invalid @enderror" 
                            name="reg_number" value="{{ old('reg_number')}}">
                            @error('reg_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Capacity</label>
                            <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                            name="capacity" value="{{ old('capacity')}}">
                            @error('capacity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Model</label>
                            <input type="text" class="form-control @error('model') is-invalid @enderror" 
                            name="model" value="{{ old('model')}}">
                            @error('model')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Make</label>
                            <input type="text" class="form-control @error('make') is-invalid @enderror" 
                            name="make" value="{{ old('make')}}">
                            @error('make')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Year</label>
                            <input type="text" class="form-control @error('year') is-invalid @enderror" 
                            name="year" value="{{ old('year')}}">
                            @error('year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Color</label>
                            <input type="text" class="form-control @error('color') is-invalid @enderror" 
                            name="color" value="{{ old('color')}}">
                            @error('color')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Bus Condition</label>
                            <input type="text" class="form-control @error('condition') is-invalid @enderror" 
                            name="condition" >
                            @error('condition')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Bus Condition</label>
                            <Select type="text" class="form-control @error('condition') is-invalid @enderror" 
                            name="condition" >
                            <option value="operational" selected>Operation</option>
                            <option value="maintanance">Maintanance</option>
                            <option value="damaged">Damaged</option>
                            </Select>
                            @error('condition')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label"> Bus Status</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" 
                            name="status" >
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Bus Status</label>
                            <Select type="text" class="form-control @error('condition') is-invalid @enderror" 
                            name="status" >
                            <option value="available" selected>Available</option>
                            <option value="not-available">Not Available</option>
                            </Select>
                            @error('condition')
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