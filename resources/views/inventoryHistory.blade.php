@extends('layouts.header')
@section('content')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css
" />
<div class="main-panel">
  <style type="text/css">
     
  table {
  counter-reset: section;
}

.count:before {
  counter-increment: section;
  content: counter(section);
}

   
  
  </style>
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
      <div class="row">
        

        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-dark logocolor">
              <h4 class="card-title"><b>Inventory History</b></h4>

            </div>
            <div class="card-body">
            @if(session('message'))
              <p class="alert alert-dark">
              {{session('message')}}</p>
              @endif
              <div class="table-responsive">
                <table class="table" id="example">
                  <thead class=" text-dark">
                    <th><b class="bold1">Id</b></th>
                    <th><b class="bold1">Name</b></th>
                    <th><b class="bold1">Size</b></th>
                    <th><b class="bold1">Previous Quantity</b></th>
                    <th><b class="bold1">Added Quantity</b></th>
                    <th><b class="bold1">Updated By</b></th>
                    <th><b class="bold1">Updated Time</b></th>
                   </thead>
                  <tbody>

                   @foreach($data as $inventory)
                   <tr>
                     <td class="count"></td>
                    <td>{{$inventory->product}}</td>
                    <td>{{$inventory->size}}</td>
                    <td>{{$inventory->prev_quantity}}</td>
                    <td>{{$inventory->added_quantity}}</td>
                    <td>{{$inventory->updated_by}}</td>
                    <td>{{$inventory->updated_at}}</td>                     
                     
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        @endsection
        <!--   Core JS Files   -->

     



@section('javascript')
 
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>


@endsection

