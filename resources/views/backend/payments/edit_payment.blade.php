@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    
<div class="page-content">    
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('all.payment') }}">Go Back</a>
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
  
                    <h6 class="card-title">EDIT PAYMENT</h6>

                    <form method="post" action="{{ route('update.payment')}}" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Amount</label>
                            <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" 
                            name="amount" value="{{ $data->amount }}">
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Mobile Money Provider</label>
                            <Select type="text" class="form-control @error('mobile_money_provider') is-invalid @enderror" 
                            name="mobile_money_provider">
                            <option value="">Select Mobile Money Provider</option>
                            <option value="mtn" 
                                @if ($data->mobile_money_provider == "mtn" && old('mobile_money_provider') == "")
                                    selected="selected"
                                @endif
                                @if (old('mobile_money_provider') == "mtn")
                                    selected="selected"
                                @endif

                                
                            >MTN MOMO</option>
                            <option value="telecel"
                            @if ($data->mobile_money_provider == "telecel" && old('mobile_money_provider') == "")
                                    selected="selected"
                                @endif
                                @if (old('mobile_money_provider') == "telecel")
                                    selected="selected"
                                @endif
                            >TELECEL CASH</option>
                            <option value="at"
                            @if ($data->mobile_money_provider == "at" && old('mobile_money_provider') == "")
                                    selected="selected"
                                @endif
                                @if (old('mobile_money_provider') == "at")
                                    selected="selected"
                                @endif
                            >at MONEY</option>
                           
                            </Select>
                            @error('mobile_money_provider')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Mobile Money Account</label>
                            <input type="text" class="form-control @error('mobile_money_account') is-invalid @enderror" 
                            name="mobile_money_account" value="{{ $data->mobile_money_account }}">
                            @error('mobile_money_account')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Status</label>
                            <Select type="text" class="form-control @error('status') is-invalid @enderror" 
                            name="status">
                            <option value="">Select Status</option>
                            <option value="Completed"
                            @if ($data->status == "Completed" && old('status') == "")
                                    selected="selected"
                                @endif
                                @if (old('status') == "Completed")
                                    selected="selected"
                                @endif
                            >Completed</option>
                            <option value="Pending"
                            @if ($data->status == "Pending" && old('status') == "")
                                    selected="selected"
                                @endif
                                @if (old('status') == "Pending")
                                    selected="selected"
                                @endif
                            >Pending</option>
                            <option value="Failed"
                            @if ($data->status == "Failed" && old('status') == "")
                                    selected="selected"
                                @endif
                                @if (old('status') == "Failed")
                                    selected="selected"
                                @endif
                            >Failed</option>
                           
                            </Select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1"  class="form-label">Transaction Date</label>
                            <input type="date" class="form-control @error('transaction_date') is-invalid @enderror" 
                            name="transaction_date" value="{{ $data->transaction_date }}">
                            @error('transaction_date')
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