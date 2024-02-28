@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.terminal') }}">VIEW ALL TERMINALS.</a>
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
  
                    <h6 class="card-title">CREATE TERMINAL</h6>

                    <form method="post" action="{{ route('store.terminal')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        
                        {{-- <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Terminal Code</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" 
                            name="code" value="{{ old('code')}}">
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Terminal Code</label>
                            <Select type="text" class="form-control @error('code') is-invalid @enderror" 
                            name="code" >
                            <option value="" selected>Select City Code</option>
                            @foreach ($code as $item)
                                
                            <option value="{{$item->id}}">{{$item->code}}</option>
                            @endforeach
                            </Select>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Terminal Name</label>
                            <input type="text" class="form-control @error('t_name') is-invalid @enderror" 
                            name="t_name" value="{{ old('t_name')}}">
                            @error('t_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Region</label>
                            <Select type="text" class="form-control @error('region') is-invalid @enderror" 
                            name="region" >
                            <option value="" selected>Select Region</option>
                            @foreach ($code as $item)
                                
                            <option value="{{$item->id}}">{{$item->region}}</option>
                            @endforeach
                            </Select>
                            @error('region')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" 
                            name="city" value="{{ old('city')}}">
                            @error('city')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                            name="location" value="{{ old('location')}}">
                            @error('location')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                       
                        <button type="submit" class="btn btn-primary w-100 me-2">Create Terminal</button>
                    </form>
  
                </div>
              </div>
        </div>
      </div>
      <!-- middle wrapper end -->
      
    </div>

        </div>




@endsection 