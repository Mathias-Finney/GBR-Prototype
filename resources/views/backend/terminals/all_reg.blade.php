@extends('admin.admin_dashboard')
@section('admin')
    
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-inverse-info" href="{{ route('add.reg') }}">ADD NEW REGION.</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">ALL REGIONS</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>Region.</th>
            <th>City</th>
            <th>City Code</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->city }}</td>
                <td>{{ $item->city_code }}</td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.reg', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" id="delete" href="{{ route('delete.reg', $item->id) }}">Delete</a>
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