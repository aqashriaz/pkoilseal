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
  <link rel="stylesheet" href="public/css/dash_styles.css">
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
            <a class="navbar-brand h1" href="javascript:;"><b>Front Desk Manager</b></a>
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
                <a class="dropdown-item" href="{{ url('super_index_profile') }}">Edit Profile</a>
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
     <div class="card">
      <div class="card-header card-header logocolor ab12">
        <h4 class="card-title text-white">Sale Product List</h4>
        <p class="card-category text-white">Latest 20 product sale list</p>
      </div>
      <div class="container-fluid mt-5">
       <input class="form-control" id="myInput" type="text" placeholder="Search..">
       <br>
       <div class="card-body table-responsive table1">
        <table class="table table-hover">
          <thead class="text-dark">
            <tr>
              <th><b class="bold1">Id</b></th>
              <th><b class="bold1">Name</b></th>
              <th><b class="bold1">Cashier</b></th>
              <th><b class="bold1">Quantity</b></th>
              <th><b class="bold1">Unit Price</b></th>
              <th><b class="bold1">Total Price</b></th>
              <th><b class="bold1">Selling Time</b></th>
              <th><b class="bold1">Return Product</b></th>
            </tr>
          </thead>
          <tbody id="myTable">
            @if($sale->count() != 0)                       
            @foreach($sale as $sale)

            <tr>
              <td>{{$sale->id}}</td>
              <td>{{$sale->product_name}}</td>
              <td>{{$sale->user_name}}</td>
              <td>{{$sale->quantity}}</td>
              <td>{{$sale->unit_price}}</td>
              <td>{{$sale->price}}</td>
              <td>{{$sale->created_at}}</td>
              <td><a href="javascript:void(0);"><i class="return_product text-white btn btn-dark logocolor" data-id="{{$sale->id}}">Return</i></a></td>
            </tr>
          </tr>
          @endforeach
          @endif

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>



<form action="{{url('returnitem')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

  <div class="modal fade" id="UpdateRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Are you sure you want to return this product</h4>
        <div>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <div class="modal-body mx-3">
        <input type="hidden" class="form-control validate id" name="id" value="">
        <div class="md-form mb-2" style="display: none">
          <input type="text" class="form-control validate product_name" name="product_name" >
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Product Name</label>
        </div>  
        <div class="md-form mb-2" style="display: none">
          <input type="text" class="form-control validate unit_price" name="unit_price" >
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Unit Price</label>
        </div>  
        <div class="md-form mb-2" style="display: none">
          <input type="text" class="form-control validate price" name="price" >
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Total Price</label>
        </div>  
        
        
        <div class="md-form mb-2" style="display: none">
          <input type="number" class="form-control validate quantity" name="quantity" >
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Quantity</label>
        </div>

        <div class="md-form mb-2" style="display: none">
          <input type="number" class="form-control validate return_quantity" name="return_quantity" >
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Return Quantity</label>
        </div>
        <div class="md-form mb-2">
          <label class="radio-inline">
            <input type="radio" name="optradio" onclick="show1()" >Yes
          </label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <label class="radio-inline">
            <input  onclick="show2()" type="radio" name="optradio">No
          </label>    </div>

          <div class="md-form mb-2" id="change2">
            <label data-error="wrong" data-success="right" for="orangeForm-name" >Select Return Reason</label>
            <select class="form-control return_reason" data-toggle="dropdown"  name="return_reason" style="width: 100%;">

              <option class="dropdown-item" value="Buyer doesn't need it">Buyer doesn't need it</option>
              <option class="dropdown-item" value="Wrong Product Selected">Wrong Product Selected</option>
              <option class="dropdown-item" value="Sold from wrong warehouse">Sold from wrong warehouse</option>
              <option class="dropdown-item" value="Broken/Damage product">Broken/Damage product</option>
              <option class="dropdown-item" value="Refund Product">Refund Product</option>
              <option class="dropdown-item" value="Other Reason">Other Reason</option>
            </select>
          </div>

        </div>
        <div class="modal-footer d-flex justify-content-center">
          <input type="submit" name="update_item" value="Update" id="change1"  class="update_item btn btn-primary logocolor">
        </div>
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

<script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
    j = d.createElement(s),
    dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
    'public/www.googletagmanager.com/gtm5445.html?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
</script>
<!-- End Google Tag Manager -->


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
  $(document).ready(function(){
    $(document).on('click', '.return_product', function(e){
      e.preventDefault();
      data =$(this).data('id');
     // alert($(this).data('id'));


     $.ajax({
      method:"get",
      data: 'id='+ data,
      url:'{{ route('get_returnproduct') }}',
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
        $('.product_name').val(data.product_name);
        $('.quantity').val(data.quantity);
        $('.unit_price').val(data.unit_price);
        $('.price').val(data.price);
        $('.return_quantity').val(data.return_quantity);
        $('.return_reason').val(data.return_reason);
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
  function show2(){
    document.getElementById('change1').style.display ='none';
    document.getElementById('change2').style.display ='none';
  }
  function show1(){
    document.getElementById('change1').style.display = 'block';
    document.getElementById('change2').style.display = 'block';
  }
</script>