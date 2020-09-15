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
          <div class="row">
           
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-dark logocolor" >
                  <h4 class="card-title text-white"><b>Barcode</b></h4>
                </div>
                <div class="mt-4 container-fluid">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                <div class="card-body mt-4">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-center text-dark">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Barcode</th>
                         <th>Print</th>
                      </thead>
                      <tbody id="myTable">
                        @if($product->count() != 0)                       
                         @foreach($product as $product)
                     <tr>
                          <td><center>{{$product->id}}</center></td>
                          <td><center>{{$product->product}}</center></td>
                            <td><center><img src="data:image/png;base64,{{$product->barcode}}"><br>{{$product->label}}</center></td>
                          <td><a href="{{action('BarCodePrintController@downloadPDF', $product->id)}}"><center><button type="button" class="btn logocolor">Print</button></center></a></center>
</td>
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
            <script src="public/js/jquery.printPage.js" type="text/javascript" charset="utf-8" async defer></script>
            
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
    @endsection
  <!--   Core JS Files   -->
