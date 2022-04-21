@php
    $formAction = isset($employee) ? route('employee.update', $employee->id) : route('employee.store');
    $issetEmployee = isset($employee) ? 1 : 0;
@endphp
@extends('layouts.dashboard')

@section('content')
@include('partials.nav')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">
              @isset($employee)
                  Edit Details
              @else
                  Add New
              @endisset
            </h4>
          </div>
          <div class="card-body">
            <form action="{{ $formAction }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              @isset($employee) @method('PUT') @endisset
              @csrf

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">First Name</label>
                    <input name="first_name" id="first_name" class="form-control" value="{{ old('employee') ?? ($issetEmployee ? $employee->first_name : '')  }}">  
                    @error ('first_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Last Name</label>
                    <input name="last_name" id="last_name" class="form-control" value="{{ old('employee') ?? ($issetEmployee ? $employee->last_name : '')  }}">  
                    @error ('last_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Company</label>
                    <select class="form-control" name="company_id" id="company_id">
                      @if($companies)
                      @foreach($companies as $value)
                        <option {{($issetEmployee && $value->id == $employee->company_id) ? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                      @endif
                    </select>
                    @error ('company_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input name="email" id="email" class="form-control"  value="{{ old('employee') ?? ($issetEmployee ? $employee->email: '')  }}">  
                    @error ('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Phone</label>
                    <input name="phone" id="phone" class="form-control"  value="{{ old('employee') ?? ($issetEmployee ? $employee->phone: '')  }}">  
                    @error ('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary pull-right">Submit</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @isset($employee)
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">
              Delete this employee
            </h4>
          </div>
          <div class="card-body">
            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                @csrf
                @method('DELETE')
              <div class="row">
                <div class="col-md-12">
                  Do you really want to do this ? Make sure you are selected the right item. This action is irreversible.
                  All data associated with this item will be erased permanantly.
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Delete</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endisset
  </div>
</div>
@endsection
