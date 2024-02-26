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
            <th>Registration NO.</th>
            <th>Capacity</th>
            <th>Model</th>
            <th>Make</th>
            <th>Year</th>
            <th>Color</th>
            <th>Condition</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($all_buses as $key => $item)
            <tr>
                <td>{{ $item->reg_number }}</td>
                <td>{{ $item->capacity }}</td>
                <td>{{ $item->model }}</td>
                <td>{{ $item->make }}</td>
                <td>{{ $item->year }}</td>
                <td>{{ $item->color }}</td>
                <td>{{ $item->condition }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a class="btn btn-inverse-warning" href="{{ route('edit.buses', $item->id) }}">Edit</a>
                    <a class="btn btn-inverse-danger" href="{{ route('update.buses', $item->id) }}">Delete</a>
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