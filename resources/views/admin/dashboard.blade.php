@extends('admin.layouts.master')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="{{route('admin.users.index')}}">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Users</h4>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="{{route('admin.orders.index')}}">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-shopping-cart"></i>                
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Orders</h4>
          </div>
        </div>
      </div>
      </a>
    </div>                 
  </div>
</section>

@endsection