@extends('admin.admin_dashboard')
@section('admin')
    
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('add.driver') }}">ADD NEW DRIVER.</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ALL DRIVER</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Surname</th>
            <th>First Name</th>
            <th>Other Name</th>
            <th>License Number</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as  $item) 
            <tr>
                <td>{{ $item->surname }}</td>
                <td>{{ $item->firstName }}</td>
                <td>{{ $item->otherName }}</td>
                <td>{{ $item->licenseNo }}</td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.driver', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" id="delete" href="{{ route('delete.driver', $item->id) }}">Delete</a>
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