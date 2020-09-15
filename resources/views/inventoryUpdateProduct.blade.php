@extends('layouts.header')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">SUPER ADMIN</a>
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
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                <a class="dropdown-item" href="{{ url('invent_profile') }}">Edit Profile</a>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div style="float: right; padding-left: 1000px; size: 24px;">  
                  <a href="" class="text-success" data-toggle="modal" data-target="#modalRegisterForm"><i class="material-icons ">control_point</i>Add Inventory</a>

              </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title"><b>Inventory</b></h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-dark">
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Ware House</th>
                        <th>Date & Time</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </thead>
                      <tbody>

                         @foreach($data as $inventory)
                        
                     <tr>
                          <td>{{$inventory->id}}</td>
                          <td>{{$inventory->product}}</td>
                          <td>{{$inventory->quantity}}</td>
                          <td>{{$inventory->warehouse_name}}</td>
                          <td>{{$inventory->created_at}}</td>
                         
                          <td><a href="{{url('/'.$inventory->id.'/update/')}}"  data-toggle="modal" data-target="#UpdateRegistration"><i class="material-icons text-warning">create</i></a></td>

                          <td><a href="{{url('/inventory/'.$inventory->id.'/delete/')}}" name="delete"><i class="material-icons text-danger">delete</i></td>
                        </tr>
                       @endforeach
                    
                  </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
    @endsection
  <!--   Core JS Files   -->
 
  <!--   insert data code  -->
<form action="{{url('/save')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Inventory</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        @if(session('message'))
            <p class="alert alert-success">
            {{session('message')}}</p>
            @endif
            {{csrf_field()}}
            <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
           <select class="form-control" data-toggle="dropdown" name="product_id" style="width: 100%;">
                      @foreach($product as $product)
                <option class="dropdown-item" name="product_id" value="{{$product->id}}">{{$product->product}}</td><td>{{$product->name}}</td></option>
                      @endforeach
          </select>
      </div>        
        <div class="md-form mb-2">
          <input type="number" name="quantity" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Quantity</label>
        </div>
        <div class="md-form mb-3">
           <select class="form-control" data-toggle="dropdown" name="warehouse_id" style="width: 100%;">
                      @foreach($warehouse as $warehouse)
                <option class="dropdown-item" name="warehouse_id" value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                      @endforeach
          </select>
      </div> 
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-deep-orange" name="" value="Add Items">
      </div>
    </div>
  </div>
</div>
</form>



<!--update query-->

<form action="{{url('/inventory')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        
<div class="modal fade" id="UpdateRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Product</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @if(session('message'))
            <p class="alert alert-success">
            {{session('message')}}</p>
            @endif
            {{csrf_field()}}
            <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
           <select class="form-control" data-toggle="dropdown" name="product_name" style="width: 100%;">
                <option class="dropdown-item"selected>Select product..</option>
                <option class="dropdown-item" value="machinery">machinery</option>
                <option class="dropdown-item" value="hard component">hard components</option>
        </select>
      </div>        
        <div class="md-form mb-2">
          <input type="number" name="quantity" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Quantity</label>
        </div>
        <div class="md-form mb-2">
          <i class="material-icons"></i>
          <input type="text" name="warehouse" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Ware House</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center"><a href="{{url('/inventory')}}" title="">
        <button class="btn btn-deep-orange">Update Items</button></a>
      </div>
    </div>
  </div>
</div>
</form>

</body>

</html>