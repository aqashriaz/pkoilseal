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
          <div class="card">
             <div class="card-header card-header-dark logocolor">
                  <h4 class="card-title text-white"><b>Today Sales Reports</b></h4>
                </div>
         
            <div class="card-body">
                 <div class="row mt-3">
            <div class="col-sm-2 "></div>
            <div class="col-sm-2 "><a  href="{{url('/todayReport')}}"><button class="btn btn-dark logocolor" type="button">Today Report</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/weeklyreport')}}"><button class="btn-dark btn logocolor" type="button">Weekly Report</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/monthlyreport')}}"><button class="btn-dark btn logocolor" type="button">Monthly Report</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/yearlyreport')}}"><button class="btn-dark btn logocolor" type="button">Yearly Report</button></a></div>
            <div class="col-sm-2 "></div>
              </div>
    <div class="mt-4 container-fluid">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                <div class="tab-content mt-5">
                  <table class="table table-hover">
                    <thead class="text-dark">
                      <tr>
                        <th><b class="bold1">ID</b></th>
                        <th><b class="bold1">Time</b></th>
                        <th><b class="bold1">Invoice#</b></th>
                        <th><b class="bold1">Name</b></th>
                        <th><b class="bold1">Cashier</b></th>
                        <th><b class="bold1">Quantity</b></th>
                        <th><b class="bold1">Unit Price</b></th>
                        <th><b class="bold1">Total Price</b></th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      @foreach($today as $sale)
                      <tr>
                        <td>{{$sale->id}}</td>
                        <td>{{$sale->created_at}}</td>
                        <td>{{$sale->invoice_number}}</td>
                        <td>{{$sale->product_name}}</td>
                        <td>{{$sale->user_name}}</td>
                        <td>{{$sale->quantity}}</td>
                        <td>{{$sale->unit_price}}</td>
                        <td>{{$sale->price}}</td>
                        
                      </tr>
                      @endforeach

                    </tbody>
                    <tbody>
                      <tr >
                        <td><p style="display: none;"></p></td>
                      <td ><p style="display: none;"></p> </td>
                      <td><p style="display: none;"></p></td>
                      <td ><p style="display: none;"></p></td>
                      <td ><p style="display: none;"></p></td>
                      <td ><p style="display: none;"></p></td>
                        <td class="logocolor text-white"><p></p></td>
                        </tr>
                       
                    </tbody>
                    <tbody>
                        <tr>
                          <td colspan="6"></td>
                          <td colspan=""> <a href="{{url('/report_date')}}"><button type="button" class="btn logocolor">Back</button></a></td>
                        </tr>
                      </tbody>  
                  </table>
                
                </div>
              </div>
</div>
</div>
</div>
</div>
</div>
    @endsection
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
  
  function myFunction() {
    alert("message?: DOMString");
  location.replace("https://www.w3schools.com")
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
            $('table tbody td p').eq(index).text('Gross Sale : '+total);
        }
</script>
@endsection