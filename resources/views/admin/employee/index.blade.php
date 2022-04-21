@extends('layouts.dashboard')

@section('content')
@include('partials.nav')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <!-- <h4 class="card-title ">Users</h4>
            <p class="card-category"> Here is a subtitle for this table</p> -->
            <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="{{route('employee.create')}}" >
                            <i class="material-icons">supervisor_account</i> Add
                            <div class="ripple-container"></div>
                          <div class="ripple-container"></div></a>
                        </li>
                      </ul>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Company</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th class="text-right">Action</th>
                </thead>
                <tbody>
                  @isset($employees)
                  @foreach($employees as $employee)
                  <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->company->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td class="td-actions text-right">
                      <a href="{{ route('employee.edit', $employee->id) }}">
                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                          <i class="material-icons">edit</i>
                        </button>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @endisset
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {!! $employees->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('custom-scripts')
<script type="text/javascript">
$( document ).ready(function() {
  $( ".delete-employee" ).on( "click", function(e) {
    e.preventDefault();
    $('#deleteBanner').attr('action',$(this).data("route"));
    $('#deleteBanner').attr('method','POST');
    $('#delete-employee').modal('show');
    });
});
</script>
@endsection
