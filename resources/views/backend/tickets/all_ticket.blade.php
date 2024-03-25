@extends('admin.admin_dashboard')
@section('admin')
    
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('add.ticket') }}">CREATE TICKET.</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">GENERATED TICKET</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Route Name</th>
            <th>Start Terminal</th>
            <th>Final Destination</th>
            <th>Bus Registration Number</th>
            <th>Bus Driver</th>
            <th>Driver License Number</th>
            <th>Time of Departure</th>
            <th>Estimated Time Of Arrival</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as  $item) 
            <tr>
                <td>{{ $item->route }}</td>
                <td>{{ $item->terminal_name.' '.'('.$item->terminal_location.')' }}</td>
                <td>{{ $item->destination }}</td>
                <td>{{ $item->bus }}</td>
                <td>{{ $item->driver }}</td>
                <td>{{ $item->license }}</td>
                <td>{{ date('d-m-Y H:i A', Strtotime($item->departure)) }}</td>
                <td>{{ date('d-m-Y H:i A', Strtotime($item->eta)) }}</td>
                <td>{{ $item->status}}</td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.ticket', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" id="delete" href="{{ route('delete.ticket', $item->id) }}">Delete</a>
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