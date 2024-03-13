@extends('admin.admin_dashboard')
@section('admin')
    
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('add.route') }}">ADD NEW ROUTE.</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ALL ROUTES</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Route Name</th>
            <th>Start Terminal</th>
            <th>End Terminal</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as  $item) 
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->terminal }}</td>
                <td>{{ $item->end_terminal }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.route', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" id="delete" href="{{ route('delete.route', $item->id) }}">Delete</a>
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