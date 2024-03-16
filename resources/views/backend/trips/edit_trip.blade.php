@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.trip') }}">Go Back</a>
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
  
                    <h6 class="card-title">ADD TRIP</h6>

                    <form method="post" action="{{ route('update.trip')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Route Name</label>
                            <Select type="text" class="form-control @error('route_id') is-invalid @enderror" 
                            name="route_id" >
                                <option disabled>Select Route Name</option>
                                @foreach ($route as $r)

                                    <option {{ !empty($data->route_id == $r->id) ? 'selected' : '' }} value="{{ $r->id }}">
                                        {{$r->name}}
                                    </option>
                                
                                @endforeach
                           
                            </Select>
                            @error('route_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Driver License</label>
                            <Select type="text" class="form-control @error('driver_id') is-invalid @enderror" 
                            name="driver_id" >
                            <option disabled>Select Driver's License</option>
                            @foreach ($driver as $d)

                            <option {{ !empty($data->driver_id == $d->id) ? 'selected' : '' }} value="{{ $d->id }}">
                                {{ $d->licenseNo . ' (' . $d->surname . ' ' . $d->firstName . ' ' . $d->otherName . ')' }}
                            </option>
                                
                            @endforeach
                           
                            </Select>
                            @error('driver_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Bus Number</label>
                            <Select type="text" class="form-control @error('bus_id') is-invalid @enderror" 
                            name="bus_id" value="">
                                <option disabled>Select Bus Number</option>
                                @foreach ($bus as $b)

                                    {{-- <option value="{{ $b->id }}">{{$b->reg_number.' '.'('.$b->model.')'}}</option> --}}
                                    <option {{ !empty($data->bus_id == $b->id) ? 'selected' : '' }} value="{{ $b->id }}">
                                        {{$b->reg_number.' '.'('.$b->model.')'}}
                                    </option>
                                    
                                @endforeach
                           
                            </Select>
                            @error('bus_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Daparture Time</label>
                            <input type="datetime-local" class="form-control @error('departure') is-invalid @enderror" 
                            name="departure" value="{{ $data->departure }}">
                            @error('departure')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Estimated Time Of Arrival</label>
                            <input type="datetime-local" class="form-control @error('eta') is-invalid @enderror" 
                            name="eta" value="{{ $data->eta }}">
                            @error('eta')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> 

                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Trip Status</label>
                            <Select type="text" class="form-control @error('status') is-invalid @enderror" 
                            name="status" >
                            <option disabled>Select Status</option>
                            <option {{ ($data->status == 'pending')? 'selected' : ''}} value="pending">Pending</option>
                            <option {{ ($data->status == 'on')? 'selected' : ''}} value="on">On-Going</option>
                            <option {{ ($data->status == 'completed')? 'selected' : ''}} value="completed">Completed</option>
                            <option {{ ($data->status == 'cancelled')? 'selected' : ''}} value="cancelled">Cancelled</option>
                           
                            </Select>
                            @error('status')
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