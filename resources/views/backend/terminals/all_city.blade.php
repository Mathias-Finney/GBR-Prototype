@extends('admin.admin_dashboard')
@section('admin')
    
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('add.city') }}">CREATE NEW CITY</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ALL CITIES</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Region</th>
            <th>Code</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
            <tr>
                <td>{{ $item->region }}</td>
                <td>{{ $item->code }}</td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.city', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" id="delete" href="{{ route('delete.city', $item->id) }}">Delete</a>
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