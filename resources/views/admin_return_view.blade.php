@extends('layouts.header')
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><b>Super Admin</b></a>
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
    
@yield('content')        
      <div class="content">
           <div class="card">
                <div class="card-header card-header-dark logocolor ab12">
                  <h4 class="card-title">Return Product List</h4>
                  <p class="card-category"></p>
                </div>
        <div class="container-fluid mt-5">
           <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
      <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-dark">
      <tr>
        <th><b class="bold1">ID</b></th>
        <th><b class="bold1">Name</b></th>
        <th><b class="bold1">Reason</b></th>
        <th><b class="bold1">Quantity</b></th>
        <th><b class="bold1">Unit Price</b></th>
        <th><b class="bold1">Total Price</b></th>
        <th><b class="bold1">Time & Date</b></th>
      </tr>
    </thead>
    <tbody id="myTable">
        @if($Return_product->count() != 0)                       
                         @foreach($Return_product as $sale)
                        
                     <tr>
                          <td>{{$sale->id}}</td>
                          <td>{{$sale->product_name}}</td>
                          <td>{{$sale->return_reason}}</td>
                          <td>{{$sale->return_quantity}}</td>
                          <td>{{$sale->unit_price}}</td>
                          <td>{{$sale->price}}</td>
                          <td>{{$sale->created_at}}</td>
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



    </div>

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
}
function show1(){
  document.getElementById('change1').style.display = 'block';
}
</script>