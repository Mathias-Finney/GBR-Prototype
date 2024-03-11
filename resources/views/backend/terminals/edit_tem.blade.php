@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.tem') }}">Go Back</a>
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
  
                    <h6 class="card-title">EDIT TERMINAL</h6>

                    <form method="post" action="{{ route('update.tem')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$terminal->id}}">
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Terminal Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{$terminal->name}}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Region</label>
                            <Select type="text" class="form-control @error('reg_id') is-invalid @enderror" 
                            name="reg_id" >
                            @foreach ($region as $item)
                            <option value="{{$item->id}}">{{$item->name.' ( '. $item->city . ' )'}}</option>
                                
                            @endforeach
                            </Select>
                            @error('reg_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Location</label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror" 
                            name="location" value="{{ $terminal->location }}">
                            @error('location')
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