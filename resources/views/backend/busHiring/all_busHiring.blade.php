@extends('admin.admin_dashboard')
@section('admin')
    
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('add.bus') }}">ADD NEW BUSES.</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ALL BUSES</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Name/Company</th>
            <th>Contact's Name</th>
            <th>Email</th>
            <th>Phone</th>
            {{-- <th>Contact's Add. Phone</th> --}}
            <th>Start Loc.</th>
            <th>End Loc.</th>
            <th>Depart Date</th>
            <th>No. of Busses</th>
            <th>No. Of Seats</th>
            <th>No. Of Days</th>
            <th>Current Status</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($all_busHiring as $key => $item)
            <tr>
                <td>{{ $item->company_name }}</td>
                <td>{{ $item->contacts_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                {{-- <td>{{ $item->additional_phone }}</td> --}}
                <td>{{ $item->start_location }}</td>
                <td>{{ $item->end_location }}</td>
                <td>{{ $item->depart_date }}</td>
                <td>{{ $item->number_of_busses }}</td>
                <td>{{ $item->bus_capacity }}</td>
                <td>{{ $item->number_of_days }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a class="btn btn-inverse-success" href="{{ route('update.busHiringStatus', [$item->id, 'approve']) }}">Approve</a>
                    <a class="btn btn-inverse-danger" href="{{ route('update.busHiringStatus', [$item->id, 'decline']) }}">Decline</a>
                </td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.buses', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" href="{{ route('delete.bus', $item->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
          
          
        </tbody>
      </table>
    </div>
  </div>
</div>
        </div>
    </div>

</div>











@endsection