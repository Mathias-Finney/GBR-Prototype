@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.busHiring') }}">VIEW ALL BUS HIRINGS</a>
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

                    <form method="post" action="{{ route('store.busHiring')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name/Company</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{old('name')}}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contact_name" class="form-label">Contact Name</label>
                            <input type="text" name="contactName" class="form-control {{ $errors->has('contactName') ? 'is-invalid' : '' }}" id="contact_name" placeholder="" value="{{old('contactName')}}">
                            @error('contactName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Contact Number</label>
                            <input type="tel" maxlength="9" class="form-control @error('phone1') is-invalid @enderror" 
                            name="phone1" value="{{ old('phone1')}}">
                            @error('phone1')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Add. Contact Number</label>
                            <input type="tel" maxlength="9" class="form-control @error('phone2') is-invalid @enderror" 
                            name="phone2" value="{{ old('phone2')}}">
                            @error('phone2')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contact_email" class="form-label">Contact Email</label>
                            <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="contact_email" placeholder="" value="{{old('email')}}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="from_location" class="form-label">Start Location</label>
                            <input type="text" name="startLocation" class="form-control {{ $errors->has('startLocation') ? 'is-invalid' : '' }}" id="from_location" placeholder="" value="{{old('startLocation')}}">
                            @error('startLocation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="to_location" class="form-label">End Location</label>
                            <input type="text" name="endLocation" class="form-control {{ $errors->has('endLocation') ? 'is-invalid' : '' }}" id="to_location" placeholder="" value="{{old('endLocation')}}">
                            @error('endLocation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="departure_date" class="form-label">Departure Date</label>
                            <input type="datetime-Local" name="departureDate" class="form-control {{ $errors->has('departureDate') ? 'is-invalid' : '' }}" id="departure_date" placeholder="" value="{{old('departureDate')}}">
                            @error('departureDate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="number_of_busses" class="form-label">No.of Busses</label>
                            <input type="number" min="1" name="numberOfBusses" class="form-control {{ $errors->has('numberOfBusses') ? 'is-invalid' : '' }}" id="number_of_busses" placeholder="" value="{{old('numberOfBusses')}}">
                            @error('numberOfBusses')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bus_capacity" class="form-label">No.of Seats</label>
                            <select name="busCapacity" class="form-control {{ $errors->has('busCapacity') ? 'is-invalid' : '' }}" id="bus_capacity">
                                <option>-- Select --</option>
                                @foreach ($all_bus as $item)
                                    <option value="{{ $item->capacity }}" @if( old('busCapacity') == $item->capacity) selected="selected" @endif>{{ $item->capacity }}</option>
                                @endforeach
                            </select>
                            @error('busCapacity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="number_of_days" class="form-label">No.of Days</label>
                            <input type="number" min="1" name="numberOfDays" class="form-control {{ $errors->has('numberOfDays') ? 'is-invalid' : '' }}" id="number_of_days" placeholder="" value="{{old('numberOfDays')}}">
                            @error('numberOfDays')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="purpose" class="form-label">Purpose</label>
                            <textarea name="purpose" class="form-control {{ $errors->has('purpose') ? 'is-invalid' : '' }}" id="purpose" value="">{{old('purpose')}}
                            </textarea>
                            @error('purpose')
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