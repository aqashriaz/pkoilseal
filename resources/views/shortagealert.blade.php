@extends('layouts.header')
@section('content')
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#"><b>SUPER ADMIN</b></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="{{ route('admin_index_profile') }}">Edit Profile</a>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                 
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>

      @yield('content')        
      <div class="content">
        <div class="container-fluid">
         
              @if($alert != 0)
         <div class="card">
              <div class="card-header card-header-tabs card-header-dark logocolor">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <h4 class="nav-tabs-title">Product Shortage alert:</h4>
                   
                  </div>
                </div>
              </div>
              <div class="card-body table9">
                <div class="tab-content">
                  <table class="table table-hover">
                    <thead class="text-dark">
                      <tr class="text-black">
                        <th><b class="bold1">Id</b></th>
                        <th><b class="bold1">Name</b></th>
                        <th><b class="bold1">Warehouse</b></th>
                        <th><b class="bold1">Quantity</b></th>
                      </tr>
                    </thead>
                    <tbody id="myTable">

                      @foreach($data1 as $inventory)
                       @if($inventory->quantity<$alert)
                      <tr class="bg-danger text-white">
                        <td>{{$inventory->id}}</td>
                        <td>{{$inventory->product}}</td>
                        <td>{{$inventory->warehouse_name}}</td>
                        <td>{{$inventory->quantity}}</td>
                      </tr>
                      @endif
                      @if($inventory->quantity<$warning && $inventory->quantity>$alert)
                      <tr class="bg-warning text-black">
                        <td>{{$inventory->id}}</td>
                        <td>{{$inventory->product}}</td>
                        <td>{{$inventory->warehouse_name}}</td>
                        <td>{{$inventory->quantity}}</td>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>
                
                </div>
              </div>
          
          </div>
      
        @endif
      </div>
    </div>

  </div>
</div>
<div class="mt-3 mb-3">
  &nbsp;
</div>