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
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="container">  
                  <a href="" class="text-dark" data-toggle="modal" data-target="#modalRegisterForm"><i class="material-icons ">control_point</i>Add Inventory</a>

              </div>
            <div class="col-md-12">
              <div class="card">
                 <div class="card-header card-header-tabs card-header-dark logocolor">
                  <h4 class="card-title text-white"><b>Inventory List</b></h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-dark">
                        <th><b class="bold1">Id</b></th>
                        <th><b class="bold1">Name</b></th>
                        <th><b class="bold1">Quantity</b></th>
                        <th><b class="bold1">Warehouse</b></th>
                        <th><b class="bold1">Cabin</b></th>
                        <th><b class="bold1">Date & Time</b></th>
                        <th><b class="bold1">Update</b></th>
                        <th><b class="bold1">Delete</b></th>
                      </thead>
                      <tbody>

                    
                         @foreach($data as $inventory)
                        
                     <tr>
                          <td>{{$inventory->id}}</td>
                          <td>{{$inventory->product}}</td>
                          <td>{{$inventory->quantity}}</td>
                          <td>{{$inventory->warehouse_name}}</td>
                          <td>{{$inventory->cabin_name}}</td>
                          <td>{{$inventory->created_at}}</td>
                         
                      <td><a href="javascript:void(0);"><i class="material-icons inventory_update_inventory text-warning" data-id="{{$inventory->id}}">create</i></a></td>

                          <td><a href="{{url('/invent_inventory/'.$inventory->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete inventory?')" name="delete"><i class="material-icons text-danger">delete</i></td>
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
<form action="{{url('/inventory_save')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Name</label>
           <select class="form-control" data-toggle="dropdown" name="product_id" style="width: 50%;">
                      @foreach($product as $product)
                <option class="dropdown-item" name="product_id" value="{{$product->id}}">{{$product->product}}</td><td>{{$product->name}}</td></option>
                      @endforeach

           </select>
              </div>        
              <div class="md-form mb-2">
                <label data-error="wrong" data-success="right" for="orangeForm-name" >Quantity</label>
                <input type="number" name="quantity" class="form-control validate" required>
              </div>
              <div class="md-form mb-3">
                <label data-error="wrong" data-success="right" for="orangeForm-name" >Select Warehouse</label>
               <select class="form-control" data-toggle="dropdown" id="warehouse"  name="warehouse_id" style="width: 100%;">
                @foreach($warehouse as $warehouse)
                <option class="dropdown-item" name="warehouse_id" value="{{$warehouse->id}}">{{$warehouse->warehouse_name}}</option>
                @endforeach
              </select>
            </div>
 <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Select Cabin</label>
           <select class="form-control cabinvalue" data-toggle="dropdown" id="cabin" data-dependent="dependent" name="cabin_id" style="width: 100%;">
                <option class="dropdown-item" value=""></option>
          </select>
      </div> 
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-dark logocolor" name="" value="Add Inventory">
      </div>
    </div>
  </div>
</div>
</form>


<!--update query-->

 <form action="{{url('/invent_update_inventory')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

    <div class="modal fade" id="UpdateRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Update Quanity</h4>

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
          <input type="hidden" name="inventory_id" class="form-control inventory_id validate">
          <input type="hidden" name="product_name" class="form-control product_name validate" readonly>
           
        </div> 
        <div class="md-form mb-2">
          <i class="material-icons"></i>
          <input type="hidden" name="warehouse_name" class="form-control warehouse_name validate" readonly>
<!--           <label data-error="wrong" data-success="right" for="orangeForm-name" >Ware ID</label>
 -->        </div>       
        <div class="md-form mb-2">
         <p>You can only update quantity</p>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Quantity</label>
          <input type="number" name="quantity" class="form-control quantity validate" required>
        </div>
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
                <input type="submit" name="update_item" value="Update Inventory"  class="btn btn-dark logocolor">
      </div>
    </div>
  </div>
</div>
</form>



@section('javascript')


<script>
  $(document).ready(function(){
    $(document).on('click', '.inventory_update_inventory', function(e){
      e.preventDefault();
      data =$(this).data('id');
       //alert($(this).data('id'));
     $.ajax({
      method:"get",
      data: 'id='+ data,
      url:'{{ route('invent_get_inventory') }}',
      beforeSend:function(){
        $('#UpdateRegistration').modal({
          backdrop: 'static',
          keyboard: false
        });
        $("#UpdateRegistration").modal('hide');

      },
      success:function(data){
        $("#UpdateRegistration").modal('show');
        $('.inventory_id').val(data.inventory_id);
        $('.product_name').val(data.product_name);
        $('.quantity').val(data.quantity);
        $('.warehouse_name').val(data.warehouse_name);

        console.log(data.id);
   },
   error: function()
   {
    toastr.error('Error!', 'Something Went Wrong. Please try again later. If the issue persists contact support.' ,{"positionClass": "toast-bottom-right"});

  }
});

   });
  });
</script>

<script>
$(document).ready(function(){

 $('#warehouse').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('invent_fetch1') }}",
    method:"POST",
    token:_token,
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
      console.log(result);
     $('#cabin').html('');

     $('#cabin').append(result);
    }

   })
  }
 });


});
</script>

@endsection
