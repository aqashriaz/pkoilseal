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
            @if(count($ab))
             <div class="card-header card-header logocolor">
                  <h4 class="card-title text-white"><b>Invoices</b></h4>
                </div>
                <form action="{{url('/invoicebydate')}}" method="get" accept-charset="utf-8" enctype="multipart/form-data">
              <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
          <div class="card-body">
                  <h4 class="card-title"><b>Showing Result</b></h4>
          <div class="row mt-3">
            <div class="col-sm-2"></div>
            <div class="col-sm-1"><label>From</label></div><div class="col-sm-2"><label>{{$from}}</label></div>
            <div class="col-sm-1"><label>to</label></div><div class="col-sm-2"><label>{{$to}}</label></div>
          </div>
       
                </form>
    <div class="mt-4 container-fluid">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
            <div class="card-body table1">
                <div class="tab-content">
                  <table class="table table-hover" id="table">
                     <thead class="text-dark">
                      <tr>
                        <th><b class="bold1">Invoice#</b></th>
                        <th><center><b class="bold1">Download</b></center></th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      @foreach($ab as $sale)
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
                          <td colspan="7"></td>
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
                @else
                <div class="alert alert-danger mt-5 text-center" role="alert">
 No Record Found
 <br>
 <a href="{{url('/invoiceindex')}}" title="" class="btn btn-dark">Back</a>
</div>
@endif
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
            $('table tbody td p').eq(index).text('Gross Profit : '+total);
        }
</script>
@endsection