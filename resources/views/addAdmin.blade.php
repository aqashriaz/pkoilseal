@extends('layouts.header')

@section('content')
<div class="main-panel">
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
    
  <div class="content">
    <div class="container-fluid">
      <div class="card">
              <div class="card-header card-header-tabs card-header-dark logocolor">
          <h4 class="card-title text-white">Add User </h4>
          <p class="card-category text-white">for PK Inventory</p>
        </div>
        <div class="card-body">
          <center>
          <form class="form-horizontal" method="POST" action="{{ url('/insertAdmin') }}">
            @if(session('message'))
            <p class="alert alert-dark">
            {{session('message')}}</p>
            @endif
            {{csrf_field()}}
            <div>
              <input type="hidden" name="token" value="{{csrf_token()}}">
            </div>

           
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
             
              <label for="name" class="mt-3 col-md-4 control-label">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="mt-3 col-md-4 control-label">E-Mail Address</label>

              <div class="col-md-6 ">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>


            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
              <label for="phone" class="mt-3 col-md-4 control-label">Phone</label>
              <div class="col-md-6">
               <input id="phone" type="number" class="form-control" name="phone" value="" required>
             </div>
           </div>
           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="mt-3 col-md-4 control-label">Password</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" required>
              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
           <div class="form-group{{ $errors->has('admin_role') ? ' has-error' : '' }}">
                <div class="col-md-6 ">
                  <select id="admin"  name ="admin_role"class="form-control">
                  <option value="" class="bmd-label-floating control-label">Select Admin Role</option>
                  <option value="Super_Admin">Super Admin</option>
                  <option value="Inventory_Manager">Inventory Manager</option>
                  <option value="Front_Desk_Manager">Front Desk Manager</option>
                </select>
              </div>
              </div>
           <div class="form-group{{ $errors->has('admin_role') ? ' has-error' : '' }}">
                <div class="col-md-6 ">
                 <select class="form-control" data-toggle="dropdown" name="status" style="width: 100%;">
            <option class="dropdown-item" value="Active">Active</option>
            <option class="dropdown-item" value="Inactive">Inactive</option>
        </select>
              </div>
              </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-dark logocolor" >
                Register
              </button>
            </div>
          </div>
        </form>
      </center>
      </div>
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