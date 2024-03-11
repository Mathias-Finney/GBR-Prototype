@extends('admin.admin_dashboard')
@section('admin')
    
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('add.payment') }}">CREATE NEW PAYMENT.</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">PAYMENT LISTS</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Amout</th>
            <th>Mobile Money Provider</th>
            <th>Mobile Money Account</th>
            <th>Status</th>
            <th>Transaction Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as  $item) 
            <tr>
                <td>{{ $item->user }}</td>
                <td>{{ $item->amount}}</td>
                <td>{{ $item->mobile_money_provider }}</td>
                <td>{{ $item->mobile_money_account }}</td>
                <td>{{ $item->status}}</td>
                <td>{{ date('d-m-Y', Strtotime($item->transaction_date)) }}</td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.payment', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" id="delete" href="{{ route('delete.payment', $item->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
            {{-- $key => --}}
          
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>











@endsection