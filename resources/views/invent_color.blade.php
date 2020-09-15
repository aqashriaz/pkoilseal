@extends('layouts.inventory_header') 
@section('content')
<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;"><b>INVENTORY ADMIN</b></a>
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
                <a class="dropdown-item" href="{{ url('invent_profile') }}">Edit Profile</a>
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
    
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header card-header-dark logocolor">
          <h4 class="card-title text-white">Add Color</h4>
          <p class="card-category text-white">for PK Inventory</p>
        </div>
        <div class="card-body">
          <center>
          <form class="form-horizontal" method="POST" action="{{ url('/invent_insert_color') }}">
            @if(session('message'))
            <p class="alert alert-dark">
            {{session('message')}}</p>
            @endif
            {{csrf_field()}}
            <div>
              <input type="hidden" name="token" value="{{csrf_token()}}">
            </div>

           
            <div class="row">
             <div class="col-sm-3">
               
              <label for="name" class="mt-3 control-label">Add New Color</label>
             </div>

              <div class="col-md-4">
                <input id="name" type="text" class="form-control" name="color" value="" required autofocus>
              </div>

          <div class="col-sm-3">
             <input type="submit" name="submit" class="btn btn-dark logocolor" value="Add New Color">
            </div>
            </div>
         
        </form>
      </center>
      </div>
    </div>
  </div>
 <div class="row">
          <div class="card">
              <div class="card-header card-header-tabs card-header-dark logocolor">
                <div class="nav-tabs-navigation">
                  <div class="nav-tabs-wrapper">
                    <h4 class="nav-tabs-title"><b>All Colors</b></h4>
                   
                  </div>
                </div>
              </div>
              <center>
   <div class="card-body">
                <div class="tab-content">
                  <table class="table table-hover">
                    <thead class="text-dark">
                      <tr class="text-black">
                        <th><b class="bold1">Id</b></th>
                        <th><b class="bold1">Color</b></th>
                        <th><b class="bold1">Delete</b></th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      @foreach($color as $color)
                      <tr class="text-dark">
                        <td>{{$color->id}}</td>
                        <td>{{$color->color}}</td>
                        <td><a href="{{url('/invent_color/'.$color->id.'/delete/')}}" name="delete" onclick="return confirm('Are you sure you want to delete Color?')" ><i class=" text-danger material-icons">delete</i></a></td>

                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                
                </div>
              </div>
            </center>
</div>
          </div>
      
       
</div>
@endsection
<script>
  const x = new Date().getFullYear();
  let date = document.getElementById('date');
  date.innerHTML = '&copy; ' + x + date.innerHTML;
</script>
</div>
</div>


</body>

</html>