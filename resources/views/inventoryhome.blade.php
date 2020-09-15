@extends('layouts.inventory_header') 
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">INVENTORY ADMIN</a>
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
                <a class="dropdown-item" href="{{ url('invent_profile') }}">Edit Profile</a>
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

     <div class="content">
        <div class="row">
      <div class="col-lg-6 col-md-12">
           <div class="card">
         <div class="card-header card-header-tabs card-header-dark logocolor">
               <h4 class="card-title text-white"><b>Products Stock</b></h4>
              <p class="card-category text-white">Over All products Details in over stock</p>
            </div>
            <div class="container-fluid mt-4">
             <input class="form-control" id="myInput" type="text" placeholder="Search..">
             <br>
             <div class="card-body table-responsive table9">
              <table class="table table-hover ">
                <thead class="text-dark">
                  <tr>
                    <th><b class="bold1">Id</b></th>
                    <th><b class="bold1">Name</b></th>
                    <th><b class="bold1">Size</b></th>
                    <th><b class="bold1">Color</b></th>
                    <th><b class="bold1">Quantity</b</th>
                    <th><b class="bold1">Warehouse</b></th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  @foreach($data as $product)   
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product}}</td>
                    <td>{{$product->size}}</td>
                    <td>{{$product->color}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->warehouse_name}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
                    @if($alert != 0)

      <div class="col-lg-6 col-md-12">
            <div class="card">
                    <div class="card-header card-header-tabs card-header-dark logocolor">

                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <h4 class="nav-tabs-title text-white"><b>Product Shortage Alert</b></h4>
                   
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
</div>
        @endif

</div>

</div>
</div>
@endsection
<!-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 -->
@section('javascript')


<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
@endsection