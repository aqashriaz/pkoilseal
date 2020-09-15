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
                  <h4 class="card-title text-white"><b>Weekly Invoices</b></h4>
                </div>
         
            <div class="card-body">
                 <div class="row mt-3">
            <div class="col-sm-2 "></div>
            <div class="col-sm-2 "><a  href="{{url('/todayinvoice')}}"><button class="btn btn-dark logocolor" type="button">Today Invoice</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/weeklyinvoice')}}"><button class="btn-dark btn logocolor" type="button">Weekly Invoice</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/monthlyinvoice')}}"><button class="btn-dark btn logocolor" type="button">Monthly Invoice</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/yearlyinvoice')}}"><button class="btn-dark btn logocolor" type="button">Yearly Invoice</button></a></div>
            <div class="col-sm-2 "></div>
              </div>
    <div class="mt-4 container-fluid">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                <div class="tab-content mt-5">
                  <table class="table table-hover">
                    <thead class="text-dark">
                      <tr>
                        <th><b class="bold1">Invoice#</b></th>
                        <th><center><b class="bold1">Download</b></center></th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      @foreach($salesum7 as $sale)
                      <tr>
                      <center>
                        <td>{{$sale->invoice_number}}</td>
                        <td><a href="{{action('invoices@downloadinvoice', $sale->invoice_number)}}"><center><button type="button" class="btn logocolor">Download</button></center></a></td>
                      </center>
                      </tr>
                      @endforeach

                    </tbody>
                  
                    <tbody>
                        <tr>
                          <td colspan="6"></td>
                          <td colspan=""> <a href="{{url('/invoiceindex')}}"><button type="button" class="btn logocolor">Back</button></a></td>
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

@endsection