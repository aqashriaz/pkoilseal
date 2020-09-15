@extends('layouts.inventory_header')

@section('content')
<div class="main-panel">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">INVENTORY ADMIN</a>
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
          <h4 class="card-title text-white">Profile Setting </h4>
          <p class="card-category text-white">for PK Inventory</p>
        </div>
        <div class="card-body">
          <center>
          <form class="form-horizontal" method="POST" action="{{ url('/update_profile') }}">
            @if(session('message'))
            <p class="alert alert-dark">
            {{session('message')}}</p>
            @endif
            {{csrf_field()}}
            <div>
              <input type="hidden" name="token" value="{{csrf_token()}}">
               <input id="id" type="hidden" class="form-control" name="id" value="{{$user->id}}" required autofocus>

            </div>

            
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} ">
             
              <label for="name" class="mt-3 col-md-4 control-label">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>

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
                <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>

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
               <input id="phone" type="number" class="form-control" name="phone" value="{{$user->phone}}" >
             </div>
           </div>
           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="mt-3 col-md-4 control-label">Password</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" value="{{$user->password}}" >
             
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="mt-3 col-md-4 control-label">Joining Date</label>
            <div class="col-md-6">
              <input id="password" type="text" class="form-control" name="created_at" value="{{$user->created_at}}" readonly>
             
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-dark logocolor">
                Update Profile
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