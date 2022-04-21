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
                          <a class="nav-link active" href="{{route('company.create')}}" >
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Logo</th>
                  <th>Website</th>
                  <th class="text-right">Action</th>
                </thead>
                <tbody>
                  @isset($companies)
                  @foreach($companies as $company)
                  <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td><img width="50" height="50" src="{{url('/' . 'storage/'.$company->logo)}}"></td>
                    <td>{{$company->website}}</td>
                    <td class="td-actions text-right">
                      <a href="{{ route('company.edit', $company->id) }}">
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
                {!! $companies->links() !!}
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
  $( ".delete-company" ).on( "click", function(e) {
    e.preventDefault();
    $('#deleteBanner').attr('action',$(this).data("route"));
    $('#deleteBanner').attr('method','POST');
    $('#delete-company').modal('show');
    });
});
</script>
@endsection
