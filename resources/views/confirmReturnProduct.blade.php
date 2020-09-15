 <!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="public/img/apple-icon.png">
  <link rel="icon" type="image/png" href="public/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Pk Rubber Oil Seal
  </title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="public/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="public/css/material-dashboard.min1c51.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="public/css/demo.css" rel="stylesheet" />

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="/public/img/sidebar-1.jpg">

      <div class="logo"><a href="#" class="simple-text logo-normal">
        <img src="public/images/pklogo.png" alt="" width="50px" height="50px">
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/frontdesk') }}">
              <i class="material-icons">dashboard</i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{url('/returnproduct') }}">
              <i class="material-icons">content_paste</i>
              <p>Return Product</p>
            </a>
          </li>        
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Front Desk Manager</a>
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
                <a class="dropdown-item" href="{{ url('super_index_profile') }}">Edit Profile</a>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>
    
@yield('content')        
   
<form action="{{url('returnitem')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
          <input type="hidden" class="form-control validate id" name="id" value="{{$sale->id}}">
          <div class="md-form mb-2">
          <input type="text" class="form-control validate product_name" name="product_name" value="{{$sale->product_name}}" >
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Product Name</label>
        </div>      
              
        <div class="md-form mb-2">
          <input type="number" class="form-control validate quantity" name="quantity" value="{{$sale->quantity}}">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Quantity</label>
        </div>

        <div class="md-form mb-2">
          <input type="number" class="form-control validate return_quantity" name="return_quantity" value="">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Return Quantity</label>
        </div>

        <div class="md-form mb-2">
          <input type="text" class="form-control validate return_reason" name="return_reason" value="" >
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Return Reason</label>
        </div>
          <div class="md-form mb-2">
        <input type="hidden" value=" " name="image" id="thumbnail" class="form-control image" >
      </div>
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="update_item" value="Update"  class="update_item btn btn-primary">
      </div>
    </div>
  </div>
</form>
    </div>
  </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- return confirm -->
<script>
function myFunction() {
  confirm("Are You Sure, You want to return this product? !");
}
</script>

