@extends('layouts.header')
@section('content')

 
  <!--   insert data code  -->
<form action="{{url('/savebar')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add New Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        @if(session('message'))
            <p class="alert alert-success">
            {{session('message')}}</p>
            @endif
            {{csrf_field()}}
            <div>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-3">
          <input type="text" name="product" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Product Name</label>
          </div>        
        <div class="md-form mb-2">
          <input type="text" name="size" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name" >Size</label>
        </div>
        <div class="md-form mb-2">
         <select class="form-control" data-toggle="dropdown" name="color" onchange="gfg_Run()" style="width: 100%;">
            <option class="dropdown-item"selected>Select Color..</option>
            <option class="dropdown-item" value="blue">blue</option>
            <option class="dropdown-item" value="red">red</option>
            <option class="dropdown-item" value="green">green</option>
        </select>
       </div>
        <div class="md-form mb-2">
          <i class="material-icons"></i>
          <textarea id="barcode" name="barcodelabel" class="form-control validate" required></textarea>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Bar Code</label>
        </div>
        <div class="md-form mb-2">
<select class="form-control" data-toggle="dropdown" name="status" style="width: 100%;">
            <option class="dropdown-item"selected>Select Status..</option>
            <option class="dropdown-item" value="red">Active</option>
            <option class="dropdown-item" value="green">Inactive</option>
        </select>
        </div>
          <div class="md-form mb-2">
        <input type="file" value="{{old('thumbnail')}}  " name="image" id="thumbnail" class="form-control" required>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Image</label>
      </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-deep-orange" name="" value="Add Items">
      </div>
    </div>
  </div>
</div>
</form>



<script> 
var el_down = document.getElementById("barcode"); 


/* Function to generate combination of password */ 
function generateP() { 
  var pass = ''; 
  var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +  
  'abcdefghijklmnopqrstuvwxyz0123456789@#$'; 

  for (i = 1; i <= 8; i++) { 
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