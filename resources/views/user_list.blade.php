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
          <div class="row">
             <div class="card">
              <div class="card-header  card-header-dark logocolor">
                <h4 class="card-title">Employees Record</h4>
                <p class="card-category">Total Admins # {{$user->count()}} </p>
              </div>
              <div class="card-body table-responsive">
              @if(session('message'))
            <p class="alert alert-dark text-white">
            {{session('message')}}</p>
            @endif
                <table class="table table-hover">
                <div class="mt-4 container-fluid">
                   <input class="form-control" id="myInput" type="text" placeholder="Search..">
                <br>
                  <thead class="text-dark">
                    <th><b class="bold1">ID</th>
                    <th><b class="bold1">Name</b></th>
                    <th><b class="bold1">Admin Role</b></th>
                    <th><b class="bold1">Phone</b></th>
                    <th><b class="bold1">Email</b></th>
                    <th><b class="bold1">Status</b></th>
                    <th><b class="bold1">Joining Date</b></th>
                    <th><b class="bold1">Edit</b></th>
                    <th><b class="bold1">Remove</b></th>
                  </thead>
                  <tbody id="myTable">
                    @if($user->count() != 0)                       
                    @foreach($user as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->admin_role}}</td>
                      <td>{{$user->phone}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->status}}</td>
                      
                      <td>{{$user->created_at}}</td>
                        <td><a href="javascript:void(0);"><i class="material-icons update_user text-warning" data-id="{{$user->id}}">create</i></a></td>

                         <td><a href="{{url('/userlist/'.$user->id.'/delete/')}}" onclick="return confirm('Are you sure you want to delete user?')" name="delete"><i class=" text-danger material-icons">delete</i></a></td>
                       
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
            </div>
            
<!--update query-->

<form action="{{url('userlist_update')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        
<div class="modal fade" id="UpdateRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Update User Record</h4>
            <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <div class="modal-body mx-3">
          <input type="hidden" class="form-control validate id" name="id" value="">
          <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Name</label>
        <input type="text" class="form-control validate name" name="name" >

        </div>      
              
        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Email</label>
            <input type="email" class="form-control validate email" name="email" >
        
        </div>

        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Phone</label>
            <input type="text" class="form-control validate phone" name="phone" >
        
        </div>

        <div class="md-form mb-2">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Password</label>
            <input type="password" class="form-control validate password" name="password" >
        
        </div>
        <div class="md-form mb-2">
      <label data-error="wrong" data-success="right" for="orangeForm-name" >Admin Role</label>
                    <select id="admin"  name ="admin_role"class="form-control admin_role">
                  <option value="" class="bmd-label-floating control-label">Select Admin Role</option>
                  <option value="Super_Admin">Super Admin</option>
                  <option value="Inventory_Manager">Inventory Manager</option>
                  <option value="Front_Desk_Manager">Front Desk Manager</option>
                </select>
         
        </div>
       
        <div class="md-form mb-2">
          <i class="material-icons"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Status</label>
          <select class="form-control status" data-toggle="dropdown" name="status" style="width: 100%;">
            <option class="dropdown-item" value="Active">Active</option>
            <option class="dropdown-item" value="Inactive">Inactive</option>
        </select>
        </div>
        
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="update_item" value="Update Details"  class="update_item btn btn-dark logocolor">
      </div>
    </div>
  </div>
</div>
</form>

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
    var el_down = document.getElementById("barcode"); 
    /* Function to generate combination of password */ 
    function generateP() { 
    var pass = ''; 
    var str = 'ABCDEF&GHIJKL*MNOPQR(STUVWX)YZ' +  
    'abcdefghijklmn%opqrstuvwxyz0123456789@#$'; 

    for (i = 1; i <= 10; i++) { 
    var char = Math.floor(Math.random() 
    * str.length + 1); 

    pass += str.charAt(char) 
    } 

    return pass; 
    } 

    function gfg_Run() { 
    el_down.innerHTML = generateP(); 
    } 
</script>

<script>
  $(document).ready(function(){
    $(document).on('click', '.update_user', function(e){
      e.preventDefault();
      data =$(this).data('id');
     // alert($(this).data('id'));


$.ajax({
    method:"get",
        data: 'id='+ data,
        url:'{{ route('get_userlist') }}',
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
         $('.name').val(data.name);
          $('.email').val(data.email);
          $('.admin_role').val(data.admin_role);
          $('.phone').val(data.phone);
          $('.status').val(data.status);
          $('.password').val(data.password);
        
          console.log(data.id);
      

         // console.log('');
     // alert(data.product);

            },
            error: function()
            {
                toastr.error('Error!', 'Something Went Wrong. Please try again later. If the issue persists contact support.' ,{"positionClass": "toast-bottom-right"});

            }
        });

});
    });
</script>
@endsection

    @endsection