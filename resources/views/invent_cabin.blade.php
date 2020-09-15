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
                  <a href="" class="text-dark" data-toggle="modal" data-target="#modalRegisterForm"><i class="material-icons color-black">control_point</i>Add Cabins</a>

              </div>
            <div class="col-md-12">
              <div class="card">
                    
                <div class="card-header card-header-tabs card-header-dark logocolor">
                   <h4 class="card-title text-white"><b>Cabins List</b></h4>
                  
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
                        <th><b class="bold1">Warehouse</b></th>
                        <th><b class="bold1">Cabin</b></th>
                        <th><b class="bold1">Update</b></th>
                        <th><b class="bold1">Delete</b></th>
                      </thead>
                      <tbody>

                          @foreach($data as $cabin)
                        
                     <tr>
                          <td>{{$cabin->id}}</td>
                          <td>{{$cabin->warehouse_name}}</td>
                          <td>{{$cabin->cabin_name}}</td>
                         
                      <td><a href="javascript:void(0);"><i class="material-icons store_cabin text-warning" data-id="{{$cabin->id}}">create</i></a></td>

                          <td><a href="{{url('/invent_cabin/'.$cabin->id.'/destroy')}}" onclick="return confirm('Are you sure you want to delete cabin?')" name="delete"><i class="material-icons text-danger">delete</i></td>
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
<form action="{{url('/createcabin')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Cabin Record</h4>
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
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Select WareHouse</label>
        <select class="form-control" data-toggle="dropdown" name="warehouse_id" style="width: 100%;">
                      @foreach($warehouse as $warehouse)
                <option class="dropdown-item" value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                      @endforeach
          </select>
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Cabin Name</label>
          <input type="text" name="cabin_name" class="form-control validate" required>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-dark logocolor" name="" value="Add Cabin">
      </div>
    </div>
  </div>
</div>
</form>



<!--update query-->

<form action="{{url('/store_cabin')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        
<div class="modal fade" id="UpdateRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Cabin</h4>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
     
            {{csrf_field()}}
            <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        <div class="modal-body mx-3">
          <input type="hidden" name="cabin_id" class="form-control cabin_id validate" required>
          

        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Select Warehouse</label>
        <select class="form-control warehouse_id" data-toggle="dropdown" name="warehouse_id" style="width: 100%;">
                      @foreach($warehouse2 as $warehouse)
                <option class="dropdown-item " value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                      @endforeach
           </select>
        </div>



         
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Cabin</label>
          <input type="text" name="cabin_name" class="form-control cabin_name validate" required>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
                <input type="submit" name="update_item" value="Update"  class="update_item btn btn-dark logocolor">
      </div>
    </div>
  </div>
</div>
</form>
 @section('javascript')


      <script>
        $(document).ready(function(){
          $(document).on('click', '.store_cabin', function(e){
            e.preventDefault();
            data =$(this).data('id');
// alert($(this).data('id'));


$.ajax({
  method:"get",
  data: 'id='+ data,
  url:'{{ route('edit_cabin') }}',
  beforeSend:function(){
    $('#UpdateRegistration').modal({
      backdrop: 'static',
      keyboard: false
    });
    $("#UpdateRegistration").modal('hide');

  },
  success:function(data){
    $("#UpdateRegistration").modal('show');
    $('.cabin_id').val(data.cabin_id);
    $('.warehouse_id').val(data.warehouse_id);
    $('.cabin_name').val(data.cabin_name);

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

