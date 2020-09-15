@extends('layouts.header')
@section('content')
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#"><b>SUPER ADMIN</b></a>
          </div>
          <button class="navbar-toggler" onclick="openNav()" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar bar1"></span>
            <span class="navbar-toggler-icon icon-bar bar2"></span>
            <span class="navbar-toggler-icon icon-bar bar3"></span>
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
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-dark card-header-icon">
                  <div class="card-icon logocolor">
                    <i class="material-icons">person</i>
                  </div>
                  <p class="card-category">Inventory Managers</p>
                  <h3 class="card-title">{{$inventoryCount}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-dark">person</i>Inventory Admin
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-dark card-header-icon">
                <div class="card-icon logocolor">
                  <i class="material-icons">person</i>
                </div>
                <p class="card-category">Front Managers</p>
                <h3 class="card-title">{{$frontCount}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-dark">person</i> Front Desk Admins
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-dark card-header-icon">
                <div class="card-icon logocolor">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Products</p>
                <h3 class="card-title">{{$productCount}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-dark">local_offer</i>Total Purchase Products in our stock
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-dark card-header-icon">
                <div class="card-icon logocolor">
                  <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">Warehouses</p>
                <h3 class="card-title">{{$warehouseCount}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-dark">local_offer</i>Total Ware Houses
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-dark card-header-icon">
                <div class="card-icon logocolor">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Today Sale Report</p>
                <h3 class="card-title">{{$salesum}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-dark">update</i>Today Sale
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-dark card-header-icon">
                <div class="card-icon logocolor">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Last 7 Day Sales</p>
                <h3 class="card-title">{{$salesum7}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-dark">update</i>Weekly Sale
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-dark card-header-icon">
                <div class="card-icon logocolor">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Last 30 Day Sales</p>
                <h3 class="card-title">{{$salesum30}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-dark">update</i>Monthly Sale
                </div>
              </div>
            </div>
          </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-dark card-header-icon">
                <div class="card-icon logocolor">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Sale Quantity</p>
                <h3 class="card-title">{{$saleCount}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-dark">local_offer</i>Today product Sale
                </div>
              </div>
            </div>
          </div>
          
         
        </div>
              @if($alert != 0)
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <div class="card">
              <div class="card-header card-header-tabs card-header-dark logocolor">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <h4 class="nav-tabs-title">Product Shortage Alert:</h4>
                   
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

                      @foreach($data as $inventory)
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
      
        </div>
        <div class="col-sm-2"></div>
        @endif
      </div>
    </div>

  </div>
</div>
<div class="mt-3 mb-3">
  &nbsp;
</div>