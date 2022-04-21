@php
    $formAction = isset($company) ? route('company.update', $company->id) : route('company.store');
    $issetCompany = isset($company) ? 1 : 0;
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
              @isset($company)
                  Edit Details
              @else
                  Add New
              @endisset
            </h4>
          </div>
          <div class="card-body">
            <form action="{{ $formAction }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
              @isset($company) @method('PUT') @endisset
              @csrf

<div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input name="name" id="name" class="form-control" value="{{ old('company') ?? ($issetCompany ? $company->name : '')  }}">  
                    @error ('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input name="email" id="email" class="form-control"  value="{{ old('company') ?? ($issetCompany ? $company->email: '')  }}">  
                    @error ('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Website</label>
                    <input name="website" id="website" class="form-control"  value="{{ old('company') ?? ($issetCompany ? $company->website: '')  }}">  
                    @error ('website')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Logo : {{isset($company->logo) ? $company->logo : ''}}</label>
                    <input type="hidden" name="temp_image" value="{{isset($company->logo) ? $company->logo : ''}}">
                    <input type="file" name="logo">
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
    @isset($company)
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">
              Delete this company
            </h4>
          </div>
          <div class="card-body">
            <form action="{{ route('company.destroy', $company->id) }}" method="POST">
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
