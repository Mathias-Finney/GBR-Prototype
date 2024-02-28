@extends('admin.admin_dashboard')
@section('admin')
    
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('add.terminal') }}">CREATE NEW TERMINAL</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ALL TERMINALS</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Terminal Code</th>
            <th>Terminal Name</th>
            <th>Region</th>
            <th>City</th>
            <th>Location</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($terminals as $key => $item)
            <tr>
                <td>{{ $item->code }}</td>
                <td>{{ $item->t_name }}</td>
                <td>{{ $item->CityCode->region }}</td>
                <td>{{ $item->city }}</td>
                <td>{{ $item->location }}</td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.terminal', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" id="delete" href="{{ route('delete.terminal', $item->id) }}">Delete</a>
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