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
          <div class="card">
             <div class="card-header card-header-dark logocolor">
                  <h4 class="card-title text-white"><b>Sales Reports</b></h4>
                </div>
     
            <div class="card-body">
<div class="row mt-3">
            <div class="col-sm-2 "></div>
            <div class="col-sm-2 "><a  href="{{url('/todayReport')}}"><button class="collapse-item btn logocolor" type="button">Today Report</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/weeklyreport')}}"><button class="collapse-item btn logocolor" type="button">Weekly Report</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/monthlyreport')}}"><button class="collapse-item btn logocolor" type="button">Monthly Report</button></a></div>
            <div class="col-sm-2 "><a href="{{url('/yearlyreport')}}"><button class="collapse-item btn logocolor" type="button">Yearly Report</button></a></div>
            <div class="col-sm-2 "></div>
              </div>
                <div class="tab-content">

                   <form action="{{url('report_record')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
              <div class="mt-5">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
                  <h4 class="card-title"><b>Select Date Range</b></h4>
          <div class="row mt-5">
            <div class="col-sm-2"></div>
            <div class="col-sm-3"><label>From</label><input type="date" class="form-control" name="from" required></div>
            <div class="col-sm-3"><label>to</label><input type="date" class="form-control" name="to" required></div>
            <div class="col-sm-2 mt-2"><input type="submit" value="Search" class="btn btn-dark logocolor"></div>
            <div class="col-sm-2"></div>
        </div>
                </form>
                
                
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