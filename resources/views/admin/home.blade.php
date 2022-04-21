@extends('layouts.dashboard')

@section('content')
@include('partials.nav')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">school</i>
            </div>
            <p class="card-category">Total Buddy</p>
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">record_voice_over</i>
            </div>
            <p class="card-category">Total Gurus</p>
          </div>
          <div class="card-footer">
            <div class="stats">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assessment</i>
            </div>
            <p class="card-category">Total Sessions</p>
          </div>
          <div class="card-footer">
            <div class="stats">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-chart">
          <div class="card-header card-header-success">
            <div class="ct-chart" id="completedTasksChart"></div>
          </div>
          <div class="card-body">
            <h4 class="card-title">Buddy Registration</h4>
          </div>
          <div class="card-footer">
            <div class="stats">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-chart">
          <div class="card-header card-header-warning">
            <div class="ct-chart" id="websiteViewsChart"></div>
          </div>
          <div class="card-body">
            <h4 class="card-title">Guru Registration</h4>
          </div>
          <div class="card-footer">
            <div class="stats">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-warning" style="background: #048b92 !important;">
            <h4 class="card-title">Buddy Details</h4>
            <p class="card-category">New students</p>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection
