<head>
  <meta charset="utf-8">
  <title></title>
<style type="text/css" media="screen">
  .invoice {
    position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;
}
.page-header {
    margin: 10px 0 20px 0;
    font-size: 22px;
}

@media print {
    #printbtn {
        display :  none;
    }
}
</style></head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<section class="content content_content" style="width: 70%; margin: auto;">
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-sm-12">
        <h1 class="page-header">

          <center>
        <img src="public/images/pklogo.png" style="width: 70px; height: 70px;" alt="">
            <b>
         Pk Rubber Oil Seal
       </b>
     </center>
        </h1>
      </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info mt-3">
    
      <div class="col-sm-8 invoice-col">
       <b> Customer Details</b>
        <address>
          <br>
         <b> Customer Name:</b> {{$name}} <br>
          <b>  Address:</b> {{$address}} <br>
        <b>  Phone:</b>{{$phone}}
      </address>
      </div>
      <div class="col-sm-4 invoice-col">
        <b>Invoice Number #: </b>{{$invoice_number}}<br>
        <b>Cashier: </b>{{$user_name}}<br>
        <br>
        <b>Date:</b><span id="today"></span><br>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Sub Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sale as $sale)
            
           <tr>
            <td>{{$sale->id}}</td>
            <td>{{$sale->product_name}}</td>
            <td>{{$sale->quantity}}</td>
            <td>{{$sale->unit_price}}</td>
            <td>{{$sale->price}}</td>
          </tr>
        
          @endforeach
        </tbody>
         <tbody>
                      <tr >
                        <td><p style="display: none;"></p></td>
                      <td ><p style="display: none;"></p></td>
                      <td ><p style="display: none;"></p></td>
                      <td ><p style="display: none;"></p></td>
                        <td class="logocolor"><p></p></td>
                        </tr>
                       
                    </tbody>
      </table>
    </div>
  </div>
  <!-- this row will not appear when printing -->
 
</section>
 
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
            $('table tbody td p').eq(index).text('Total : '+total);
        }
</script>
<script>
  var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = mm + '/' + dd + '/' + yyyy;
console.log(today);
document.getElementById("today").innerHTML = today.toString();
</script>

<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        var printButton2 = document.getElementById("home");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        printButton2.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
        printButton2.style.visibility = 'visible';
    }
</script>

<div class="row">
    <div class="col-lg-12">
<input id ="printpagebutton" type="button" class="btn logocolor btn-dark" value="Print" onclick="printpage();" >
 <a href="{{url('/frontdesk')}}" id="home" class="btn logocolor btn-success bottom-right">Home</a>

 </div>
  </div>

</section>