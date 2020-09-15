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
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//public/js/print.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link href="public/css/material-dashboard.min1c51.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="public/css/demo.css" rel="stylesheet" />


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
            <a class="navbar-brand h1" href="javascript:;"><h3><b>Front Desk Manager</b></h3></a>
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
                <i class="material-icons cart12">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item cart15" href="{{ url('super_index_profile') }}">Edit Profile</a>
                <a class="dropdown-item cart15" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
         <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header logocolor ab12">
             <div class="panel-title ">
               <h3><span class="glyphicon glyphicon-shopping-cart text-white"></span> Shopping Cart</h3>   
             </div>
           </div>
           <div class="card-body table-responsive table1">
            <table class="table table-hover">
              @if($sale->count() != 0)                       
             <thead class="text-dark text-center">
              <tr >
                <th><b class="bold1">Id</b></th>
                <th><b class="bold1">Image</b></th>
                <th><b class="bold1">Name</b></th>
                <th><b class="bold1">Size</b></th>
                <th><b class="bold1">Color</b></th>
                <th><b class="bold1">Quantity</b></th>
                <th><b class="bold1">Unit Price</b></th>
                <th><b class="bold1">Total Price</b></th>
                <th><b class="bold1">Action</b></th>
              </tr>
            </thead>
            
            <tbody id="myTable text-center">
              @foreach($sale as $sale)

              <tr>
                <td>{{$sale->id}}</td>
                <td><img src="{{url('/public/images/'.$sale->image)}}" alt="{{$sale->product_name}}" class="img-responsive" style="height: 150px; width: 120px;"></td>
                <td>{{$sale->product_name}}</td>
                <td>{{$sale->size}}</td>
                <td>{{$sale->color}}</td>
                <td>{{$sale->sale_quantity}}</td>
                <td>{{$sale->unit_price}}</td>
                <td>{{$sale->total_price}}</td>
                <td><a href="{{url('/cart_index/'.$sale->id.'/delete/')}}" onclick="return confirm('Are you sure you want to delete product?')" name="delete"><i class="material-icons text-danger">delete</i></td> </tr>
                </tr>
                @endforeach


              </tbody>
              <tbody>
                <tr>
                  <td><p style="display: none;"></p></td>
                  <td><p style="display: none;"></p> </td>
                  <td><p style="display: none;"></p></td>
                  <td><p style="display: none;"></p></td>
                  <td><p style="display: none;"></p></td>
                  <td><p style="display: none;"></p></td>
                  <td><p style="display: none;"></p></td>
                  <td class="logocolor text-white"><p></p></td>
                </tr>

              </tbody>
              <tbody>
                <tr>
                  <td colspan="5">
                        <h2><b>Customer Details</b></h2>
                    <form action="{{url('/checkout')}}" method="post">
                      <div class="md-form mt-3">
                       <div>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                      </div>                                <div >
                        <label>Customer Name</label><input class="form-control" type="text" name="customer_name" required>
                      </div>
                      <div class="md-form">
                        <label>Address</label><input class="form-control" type="text" name="address">
                      </div>
                      <div class="md-form">
                        <label>Phone</label><input class="form-control" type="text" name="phone">
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
       <td colspan=""> <a href="{{url('/frontdesk')}}" class="btn logocolor bottom-right">More Sale</a></td>

                    <td colspan=""><button type="submit" class="btn logocolor">Sale</button></a></td>
                  </form>
                </tr>
              </tbody> 

               @else
<div class="alert alert-success" role="alert">
Cart is empty!</div>                @endif 
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>



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

<script>
 $(document).ready(function () {
  $('table thead th').each(function (i) {
    calculateColumn(i);
  });
});
 function calculateColumn(index) {
  var total = 0;
  $('table tr').each(function () {
    var value = parseInt($('td', this).eq(index).text());
    if (!isNaN(value)) {
      total += value;
    }
  });
  $('table tbody td p').eq(index).text('Total Bill : '+total);
}
</script>

<script>

</script>