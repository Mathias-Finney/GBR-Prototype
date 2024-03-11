@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.route') }}">Go Back</a>
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
  
                    <h6 class="card-title">ADD ROUTE</h6>

                    <form method="post" action="{{ route('store.route')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Route Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name')}}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Start Terminal</label>
                            <Select type="text" class="form-control @error('st_tem_id') is-invalid @enderror" 
                            name="st_tem_id" >
                            <option value="">Select Terminal</option>
                            @foreach ($data as $item)
                            <option value="{{$item->id}}">{{$item->name.' ( '. $item->location . ' )'}}</option>
                                
                            @endforeach
                            </Select>
                            @error('st_tem_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">End Terminal</label>
                            <Select type="text" class="form-control @error('end_terminal') is-invalid @enderror" 
                            name="end_terminal" >
                            <option value="">Select Terminal</option>
                            @foreach ($data as $item)
                            <option value="{{$item->name.' ( '. $item->location . ' )'}}">{{$item->name.' ( '. $item->location . ' )'}}</option>
                                
                            @endforeach
                            </Select>
                            @error('end_terminal')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control @error('location') is-invalid @enderror" 
                            name="price" value="{{ old('price')}}">
                            @error('price')
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