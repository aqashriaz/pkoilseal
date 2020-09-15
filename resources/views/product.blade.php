@extends('layouts.header')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><b>SUPER ADMIN</b></a>
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
    
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="container">  
                  <a href="" class="text-dark" data-toggle="modal" data-target="#modalRegisterForm" style="color:green"><i class="material-icons" >control_point</i>Add Product</a>

              </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-dark logocolor">
                  <h4 class="card-title"><b>Products</b></h4>
                </div>
                <div class="mt-4 container-fluid">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                <div class="card-body mt-4">
                  <div class="table-responsive">
                    <table class="table text-center">
                      <thead class=" text-dark">
                        <th><b class="bold1">Id</b></th>
                        <th><b class="bold1">Name</b></th>
                        <th><b class="bold1">Price</b></th>
                        <th><b class="bold1">Size</b></th>
                        <th><b class="bold1">Color</b></th>
                        <th><b class="bold1">Brand</b></th>
                        <th><b class="bold1">Type</b></th>
                        <th><b class="bold1">MadeIn</b></th>
                        <th><b class="bold1">Barcode</b></th>
                        <th><b class="bold1">Status</b></th>
                        <th><b class="bold1">Image</b></th>
                        <th><b class="bold1">Action</b></th>
                        <th><b class="bold1"></b></th>
                      </thead>
                      <tbody id="myTable">
                        @if($product->count() != 0)                       
                         @foreach($product as $product)
                     <tr>
                          <td>{{$product->id}}</td>
                          <td>{{$product->product}}</td>
                          <td>{{$product->p_price}}</td>
                          <td>{{$product->size}}</td>
                          <td>{{$product->color}}</td>
                          <td>{{$product->type}}</td>
                          <td>{{$product->brand}}</td>
                          <td>{{$product->madein}}</td>

                          <td><img src="data:image/png;base64,{{$product->barcode}}"><br>{{$product->label}}</td>
                          <td>{{$product->status}}</td>

                          <td><img src="{{url('/public/images/'.$product->image)}}" alt="{{$product->category}}" class="img-responsive" style="height: 150px; width: 120px;"></td>

                          <td><a href="javascript:void(0);"><i class="material-icons update_product text-warning" data-id="{{$product->id}}">create</i></a></td>

                          <td class="top"><a href="{{url('/product/'.$product->id.'/delete/')}}" onclick="return confirm('Are you sure you want to Inactive this product?')" name="delete"><i class=" text-danger material-icons">visibility_off</i></a></td>
                        </tr>
                       @endforeach
                       @endif
                  </tbody>
                    </table>
                  </div>
</div>
                </div>
              </div>
            </div>
            
  <!--   insert data code  -->
<form action="{{url('/product')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add New Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Name</label>
          <input type="text" name="product" class="form-control validate" required>
          </div> 
        <div class="md-form mb-3">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Price</label>
          <input type="number" name="p_price" class="form-control validate" required>
          </div>        
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Size</label>
          <input type="text" name="size" class="form-control validate" required>
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Type</label>
          <input type="text" name="type" class="form-control validate" required>
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Made In</label>
          <input type="text" name="madein" class="form-control validate" required>
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Brand</label>
          <input type="text" name="brand" class="form-control validate" required>
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Select Color</label>
         <select class="form-control" data-toggle="dropdown" name="color" onchange="gfg_Run()" style="width: 100%;">
           <option class="dropdown-item" value="0">Select Color</option>
                @foreach($color as $color)
                <option class="dropdown-item" value="{{$color->color}}">{{$color->color}}</option>
                @endforeach
          </select>
       
       </div>
        <div class="md-form mb-2">
          <i class="material-icons"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Bar Code</label>
          <textarea id="barcode" name="barcodelabel" class="form-control validate" required></textarea>
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Select Status</label>
<select class="form-control" data-toggle="dropdown" name="status" style="width: 100%;">
            <option class="dropdown-item"selected>Select Status..</option>
            <option class="dropdown-item" value="Active">Active</option>
            <option class="dropdown-item" value="InActive">Inactive</option>
        </select>
        </div>
          <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Select Image</label>
        <input type="file" value="{{old('thumbnail')}}  " name="image" id="thumbnail" class="form-control" required>
      </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-dark logocolor" name="" value="Add Product">
      </div>
    </div>
  </div>
</div>
</form>



<!--update query-->

<form action="{{url('update_product')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        
<div class="modal fade" id="UpdateRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update Product</h4>
            <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <div class="modal-body mx-3">
          <input type="hidden" class="form-control validate id" name="id" value="">
          <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Name</label>
          <input type="text" class="form-control validate product" name="product" >
        </div>      
              
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Price</label>
          <input type="number" class="form-control validate p_price" name="p_price" >
        </div>

        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Size</label>
          <input type="text" class="form-control validate size" name="size" >
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Type</label>
          <input type="text" class="form-control validate type" name="type" >
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Brand</label>
          <input type="text" class="form-control validate brand" name="brand" >
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >MadeIn</label>
          <input type="text" class="form-control validate madein" name="madein" >
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Color</label>
        <select class="form-control color" data-toggle="dropdown" name="color" onchange="gfg_Run()" style="width: 100%;">
                @foreach($color1 as $color)
                <option class="dropdown-item" value="{{$color->color}}">{{$color->color}}</option>
                @endforeach
          </select>
        </div>
       
        <div class="md-form mb-2">
          <i class="material-icons"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Barcode</label>
          <input type="text" class="form-control validate label" name="label"  readonly>
          <input type="hidden" class="form-control validate barcode" name="barcode"  readonly>
        </div>
         <div class="md-form mb-2">
          <i class="material-icons"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Status</label>
         <select class="form-control status" data-toggle="dropdown" name="status" style="width: 100%;">
            <option class="dropdown-item" value="Active">Active</option>
            <option class="dropdown-item" value="InActive">Inactive</option>
        </select>
      </div>
          <div class="md-form mb-2">
        <input type="hidden" value=" " name="image" id="thumbnail" class="form-control image" >
      </div>
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="update_item" value="Update Product"  class="update_item btn btn-dark logocolor">
      </div>
    </div>
  </div>
</div>
</form>

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

<script> 
    var el_down = document.getElementById("barcode"); 
    /* Function to generate combination of password */ 
    function generateP() { 
    var pass = ''; 
    var str = 'ABCDEF&GHIJKL*MNOPQR(STUVWX)YZ' +  
    'abcdefghijklmn%opqrstuvwxyz0123456789@#$'; 

    for (i = 1; i <= 10; i++) { 
    var char = Math.floor(Math.random() 
    * str.length + 1); 

    pass += str.charAt(char) 
    } 

    return pass; 
    } 

    function gfg_Run() { 
    el_down.innerHTML = generateP(); 
    } 
</script>

<script>
  $(document).ready(function(){
    $(document).on('click', '.update_product', function(e){
      e.preventDefault();
      data =$(this).data('id');
     // alert($(this).data('id'));


$.ajax({
    method:"get",
        data: 'id='+ data,
        url:'{{ route('get_product') }}',
    beforeSend:function(){
        $('#UpdateRegistration').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#UpdateRegistration").modal('hide');

    },
    success:function(data){
        $("#UpdateRegistration").modal('show');
         $('.id').val(data.id);
         $('.product').val(data.product);
          $('.p_price').val(data.p_price);
          $('.size').val(data.size);
          $('.type').val(data.type);
          $('.brand').val(data.brand);
          $('.madein').val(data.madein);
          $('.color').val(data.color);
          $('.label').val(data.label);
          $('.barcode').val(data.barcode);
          $('.status').val(data.status);
          $('.image').val(data.image);
          console.log(data.id);
      

         // console.log('');
     // alert(data.product);

            },
            error: function()
            {
                toastr.error('Error!', 'Something Went Wrong. Please try again later. If the issue persists contact support.' ,{"positionClass": "toast-bottom-right"});

            }
        });

});
    });
/*
      $.ajax({
        method:'get',
        data: 'id='+ data,
        url:'{{ route('get_product') }}',
        success:function(data){
          $("#UpdateRegistration").modal('show');
          $('.product_name').val(data.product_name);
          $('.price').val(data.price);
          $('.size').val(data.size);
          $('.color').val(data.color);
          $('.barcode').val(data.barcode);
          $('.status').val(data.status);
          $('.image').val(data.image);
          console.log(data);

//          alert(data.);
        },

    });
      alert(get_product);

  });
});*/
</script>
@endsection

    @endsection