<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
  
      <tbody>
      <tr>
        <td>
          <center>
          {{$product->product}}
      <br>
      <br>
         <img src="data:image/png;base64,{{$product->barcode}}">
         <br>
          {{$product->label}}
          </center>
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>