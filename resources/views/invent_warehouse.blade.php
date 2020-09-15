@extends('layouts.inventory_header') 
@section('content')
<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;"><b>INVENTORY ADMIN</b></a>
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

  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="container">  
          <a href="" class="text-dark" data-toggle="modal" data-target="#modalRegisterForm"><i class="material-icons">control_point</i> Add Warehouse</a>

        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-dark logocolor">
              <h4 class="card-title text-white"><b>Warehouse</b></h4>

            </div>

            <div class="card-body">
                @if(session('message'))
                <p class="alert alert-dark">
                {{session('message')}}</p>
                @endif
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-dark">
                    <th><b class="bold1">Id</b></th>
                    <th><b class="bold1">Name</b></th>
                    <th><b class="bold1">Location</b></th>
                    <th><b class="bold1">Update</b></th>
                    <th><b class="bold1">Delete</b></th>
                  </thead>
                  <tbody>

                    @if($warehouse->count() != 0)                       
                    @foreach($warehouse as $warehouse)

                    <tr>
                      <td>{{$warehouse->id}}</td>
                      <td>{{$warehouse->warehouse_name}}</td>
                      <td>{{$warehouse->warehouse_location}}</td>


                      <td><a href="javascript:void(0);"><i class="material-icons update_warehouse text-warning" data-id="{{$warehouse->id}}">create</i></a></td>

                      <td><a href="{{url('/index_warehouse/'.$warehouse->id.'/delete/')}}" onclick="return confirm('Are you sure you want to delete Warehouse?')" name="delete"><i class="material-icons text-danger">delete</i></td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          @endsection
          <!--   Core JS Files   -->

          <!--   insert data code  -->
          <form action="{{url('/invent_insert')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Add Warehouse Record</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                {{csrf_field()}}
                <div>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
                <div class="modal-body mx-3">

                  <div class="md-form mb-2">
                    <label data-error="wrong" data-success="right" for="orangeForm-name" >Name</label>
                    <input type="text" name="warehouse_name" class="form-control validate" required>
                  </div>
                  <div class="md-form mb-2">
                    <i class="material-icons"></i>
                    <label data-error="wrong" data-success="right" for="orangeForm-name" >Location</label>
                    <input type="text" name="warehouse_location" class="form-control validate" required>
                  </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                  <input type="submit" class="btn btn-dark logocolor" name="submit" value="Add New Warehouse">
                </div>
              </div>
            </div>
          </div>
        </form>



        <!--update query-->

        <form action="{{url('/invent_update')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

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
              {{csrf_field()}}
              <div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </div>
              <div class="modal-body mx-3">

                <input type="hidden" name="warehouse_id" class="form-control validate warehouse_id" required>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="orangeForm-name" >Name</label>
                  <input type="text" name="warehouse_name" class="form-control validate warehouse_name" required>
                </div>
                <div class="md-form mb-2">
                  <i class="material-icons"></i>
                  <label data-error="wrong" data-success="right" for="orangeForm-name" >Location</label>
                  <input type="text" name="warehouse_location" class="form-control validate warehouse_location" required>
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <input type="submit" name="update_item" value="Update Warehouse Detail "  class="update_item btn btn-dark logocolor">
              </div>
            </div>
          </div>
        </div>
      </form>

      @section('javascript')


      <script>
        $(document).ready(function(){
          $(document).on('click', '.update_warehouse', function(e){
            e.preventDefault();
            data =$(this).data('id');
// alert($(this).data('id'));


$.ajax({
  method:"get",
  data: 'id='+ data,
  url:'{{ route('invent_ware') }}',
  beforeSend:function(){
    $('#UpdateRegistration').modal({
      backdrop: 'static',
      keyboard: false
    });
    $("#UpdateRegistration").modal('hide');

  },
  success:function(data){
    $("#UpdateRegistration").modal('show');
    $('.warehouse_id').val(data.warehouse_id);
    $('.warehouse_name').val(data.warehouse_name);
    $('.warehouse_location').val(data.warehouse_location);

    console.log(data.id);


//          console.log('jkj');
// alert(data.product);

},
error: function()
{
  toastr.error('Error!', 'Something Went Wrong. Please try again later. If the issue persists contact support.' ,{"positionClass": "toast-bottom-right"});

}
});

});
        });
      </script>

      @endsection

