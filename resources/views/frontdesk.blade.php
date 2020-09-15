 <!DOCTYPE html>
 <html lang="en">
 <meta http-equiv="content-type" content="text/html;charset=utf-8" />
 <head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="96x96" href="public/img/apple-icon.png">
  <link rel="icon" type="image/png" href="public/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    PK Rubber Oil Seal
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


 @if(session('Error'))
          <p class="alert alert-dark">
          {{session('Error')}}</p>
          @endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <div class="wrapper ">
    <div class="sidebar" data-image="/public/img/sidebar-1.jpg">
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
              <li class="nav-item">
                <a class="nav-link notification abnav" href="{{url('/cart_index')}}">
                  <span class="badge">{{$totalcount}}</span>
                 <span><i class="material-icons cart12">add_shopping_cart</i></span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu logout1 dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item logout1" href="{{ url('super_index_profile') }}">Edit Profile</a>
                  <a class="dropdown-item logout1 " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
          <h4 class="card-title text-white">Products for sale</h4>
          <p class="card-category text-white">You can sale these products from here</p>
        </div>
        <form action="{{url('/saleout')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

          @if(session('message'))
          <p class="alert alert-success">
          {{session('message')}}</p>
          @endif
          {{csrf_field()}}
          <div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
          </div>

          <div class="container-fluid mt-5">
           <input class="form-control" id="myInput" type="text" placeholder="Search..">
           <br>
           <div class="card-body table-responsive table1">
            <table class="table table-hover">
              <thead class="text-dark text-center">
                <tr >
                  <th><b class="bold1">Id</b></th>
                  <th><b class="bold1">Name</b></th>
                  <th><b class="bold1">Size</b></th>
                  <th><b class="bold1">Color</b></th>
                  <th><b class="bold1">Quantity</b></th>
                  <th><b class="bold1">Barcode</b></th>
                  <th><b class="bold1">Warehouse</b></th>
                  <th><b class="bold1">Cabin</b></th>
                  <th><b class="bold1">Image</b></th>
                  <th><b class="bold1">Cart</b></th>
<!--                   <th><b class="bold1">Cart</b></th>
 -->                </tr>
              </thead>
              <tbody id="myTable">

                @foreach($data as $product)   


                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->product}}</td>
                  <td>{{$product->size}}</td>
                  <td>{{$product->color}}</td>
                  <td>{{$product->quantity}}</td>
                    <td><img src="data:image/png;base64,{{$product->barcode}}"><br><center>{{$product->label}}</center></td>
                  <td>{{$product->warehouse_name}}</td>
                  <td>{{$product->cabin_name}}</td>
                  <td><img src="{{url('/public/images/'.$product->image)}}" alt="{{$product->product}}" class="img-responsive" style="height: 150px; width: 120px;"></td>
                  <td><a href="javascript:void(0);"><i class="btn btn-dark logocolor saleout_product" data-id="{{$product->id}}">Add Cart</i></a></td>
<!--  <td class="top"><a href="{{url('/cart_index/'.$product->id.'/cart')}}" name="cart" class="btn btn-dark">Add To Cart</a></td> --></tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</form>
<!--update query-->

<form action="{{url('saleout_update')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        
<div class="modal fade" id="UpdateRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sale Product</h4>
            <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <div class="modal-body mx-3">
          <input type="hidden" class="form-control bg-success validate id" name="id" value="">
          <input type="hidden" class="form-control bg-success validate image" name="image" value="">
          <input type="hidden" class="form-control bg-success validate size" name="size" value="">
          <input type="hidden" class="form-control bg-success validate barcode" name="barcode" value="">
          <input type="hidden" class="form-control bg-success validate label" name="label" value="">
          <input type="hidden" class="form-control bg-success validate color" name="color" value="">
          <input type="hidden" class="form-control bg-success validate p_price" name="p_price" value="">
          
          <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Name</label>
          <input type="text" class="form-control validate product" name="product" readonly >
        </div>      
            <div class="md-form mb-2">

          <label data-error="wrong" data-success="right" for="orangeForm-name" >Total Quantity</label>
          <input type="number" class="form-control validate total_quantity" name="total_quantity" id="total_quantity" readonly>
            </div>
          <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Remaining Quantity</label>
          <input type="number" class="form-control validate total_quantity" name="total_quantity" id="remaining_qan" readonly style=" background-color : #1e5e59; color: white ">
            </div>
         
          <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Quantity</label>
          <input type="number" class="form-control validate " name="sale_quantity" id="sale_quantity" >
        </div>
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Unit Price</label>
          <input type="number" class="form-control validate " name="unit_price" id="price">
        </div>
         <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Total Price</label>
          <input type="number" class="form-control validate " name="total_price" id="total_price" readonly>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="update_item" value="Add To Cart" id="hidebtn"  class="update_item btn btn-dark logocolor">
      </div>
    </div>
  </div>
</div>
</form>


<!-- <input type="number" name="rate" id="rate" />
<input type="number" name="box" id="box" />
<input type="number" name="amount" id="amount" readonly />
 -->
</div>
</div>

</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


<script>
  $('#sale_quantity, #price').change(function(){
    var rate = parseFloat($('#sale_quantity').val()) || 0;
    var box = parseFloat($('#price').val()) || 0;

    $('#total_price').val(rate * box);    
});
</script>

<script>
  $('#total_quantity, #sale_quantity').change(function(){
    var total = parseFloat($('#total_quantity').val()) || 0;
    var sale = parseFloat($('#sale_quantity').val()) || 0;
//$('#total_quantity').val(total - sale);
    var a =  total-sale;

    if(a<0){
     alert("Sorry! Invalid Quantiy");
       $("#hidebtn").hide();
    }

    else{

      $('#remaining_qan').val(total - sale);
       $("#hidebtn").show();

    }
});
</script>

<script>
  $(document).ready(function(){
    $(document).on('click', '.saleout_product', function(e){
      e.preventDefault();
      data =$(this).data('id');
   //  alert($(this).data('id'));


$.ajax({
    method:"get",
        data: 'id='+ data,
        url:'{{ route('saleout') }}',
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
          $('.total_quantity').val(data.quantity);
          $('.image').val(data.image);
          $('.warehouse').val(data.warehouse);
          $('.cabin').val(data.cabin);
          $('.barcode').val(data.barcode);
          $('.color').val(data.color);
          $('.size').val(data.size);
          $('.label').val(data.label);
          

           console.log(data.quantity);
      /*
alert(data.id);*/
  },
          
        });

});
    });
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
  $('.switch-sidebar-mini input').change(function() {
    $body = $('body');

    $input = $(this);

    if (md.misc.sidebar_mini_active == true) {
      $('body').removeClass('sidebar-mini');
      md.misc.sidebar_mini_active = false;

      $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

    } else {

      $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

      setTimeout(function() {
        $('body').addClass('sidebar-mini');

        md.misc.sidebar_mini_active = true;
      }, 300);
    }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      </script>

      <script>
        $('.btn-number').click(function(e){
          e.preventDefault();

          fieldName = $(this).attr('data-field');
          type      = $(this).attr('data-type');
          var input = $("input[name='"+fieldName+"']");
          var currentVal = parseInt(input.val());
          if (!isNaN(currentVal)) {
            if(type == 'minus') {

              if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
              } 
              if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
              }

            } else if(type == 'plus') {

              if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
              }
              if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
              }

            }
          } else {
            input.val(0);
          }
        });
        $('.input-number').focusin(function(){
         $(this).data('oldValue', $(this).val());
       });
        $('.input-number').change(function() {

          minValue =  parseInt($(this).attr('min'));
          maxValue =  parseInt($(this).attr('max'));
          valueCurrent = parseInt($(this).val());

          name = $(this).attr('name');
          if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
          } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
          }
          if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
          } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
          }


        });
        $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
               return;
             }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });
    </script>

@section('javascript')


<script>
  $(document).ready(function(){
  $(document).on('click', '.SaleOut', function(e){
    alert("jskdhkjfh");

              
                }
             });


</script>
@endsection
  </body>

  </html>