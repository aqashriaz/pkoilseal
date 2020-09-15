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
<section class="content content_content" style="width: 70%; margin: auto;">
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-sm-12">
        <h1 class="page-header">

          <center>
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
         <b> Customer Name:</b>{{$customer_name1}}  <br>
          <b>  Address:</b> {{$address1}} <br>
        <b>  Phone:</b>{{$phone1}}
      </address>
      </div>
      <div class="col-sm-4 invoice-col">
        <b>Invoice Number #: </b>{{$invoice_number1}}<br>
        <b>Cashier: </b>{{$user_name1}}<br>
        <br>
        <b>Date:</b><span id="today">{{$created_at1}}</span><br>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th style="width: 10%">Qty</th>
              <th style="width: 20%">Product</th>
              <th style="width: 10%">Quantity</th>
              <th style="width: 30%">Price</th>
              <th style="width: 30%">Sub Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($sale as $sale)
            
           <tr>
            <td style="width: 10%" >{{$sale->id}}</td>
            <td style="width: 20%" >{{$sale->product_name}}</td>
            <td style="width: 10%" >{{$sale->quantity}}</td>
            <td style="width: 30%" >{{$sale->unit_price}}</td>
            <td style="width: 30%" >{{$sale->price}}</td>
          </tr>
        
          @endforeach
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

</section>