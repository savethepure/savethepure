<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>
<?php include('static/header.php'); ?>

<title>Save The Pure | Home</title>

<!-- <select class="selectpicker" data-live-search="true">
    
  <?php
    // for ($i=0; $i < count($data_kota['rajaongkir']['results']); $i++) {
  ?>

    <option value="<?php echo $data_kota['rajaongkir']['results'][$i]['city_id']; ?>">
      <?php echo $data_kota['rajaongkir']['results'][$i]['city_name']; ?>
    </option>

  <?php    
    // }
  ?>

</select> -->

<div class="wrapper-container py2">
  <hr>
    <h3 class="center">Checkout</h3>
  <hr>

    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>cart">Cart</a></li>
      <li class="active">Checkout</li>
    </ol>
  
  <div class="col col-12 sm-col-12 md-col-6 shipping-container py1 px2">
  <form action="<?php echo base_url() ?>checkout/order" method="post">
    <!-- <div class="logo-checkout col-6 mt4 mb4 mx-auto">
      <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/stp-black.png" alt="" width="100%"></a>
    </div> -->
    <div class="panel panel-default">
      <div class="panel-heading bg-black">Shipping Information</div>
      <div class="panel-body">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="input name" required>
          </div>

          <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="input phone number" required>
          </div>
          
          <div class="form-group">
            <label for="city">City:</label>
            <select onchange="clear_select()" class="selectpicker form-control" id="city" name="city" data-live-search="true" required>
              <option value="" selected disabled>Choose City</option>
            <?php
              for ($i=0; $i < count($data_kota['rajaongkir']['results']); $i++) {
            ?>

              <option value="<?php echo $data_kota['rajaongkir']['results'][$i]['city_id']; ?>">
                <?php echo $data_kota['rajaongkir']['results'][$i]['type']; ?>
                <?php echo $data_kota['rajaongkir']['results'][$i]['city_name']; ?>
              </option>

            <?php } ?>

            </select>
          </div>

          <div class="form-group">
            <label for="courier">courier:</label>
            <select id="courier" name="courier" class="form-control" onchange="check_ongkir()" required>
              <option value="" selected disabled>Select Courier</option>
              <option value="jne">JNE</option>
              <option value="tiki">TIKI</option>
              <option value="pos">POS INDONESIA</option>
            </select>
          </div>

          <div class="form-group">
            <label for="service">Service:</label>
            <select id="service" name="service" class="form-control" onchange="shipping_cost()" required>
              <option value="" selected disabled>Select Service</option>
            </select>
          </div>
          

          <div class="form-group">
            <label for="address">Address:</label>
            <textarea rows="5" class="form-control" name="address" id="address" placeholder="input address" required></textarea>
          </div>

          <!-- <button type="submit" class="btn btn-default right">Submit</button> -->
      </div>
    </div>

  </div>
  <div class="col col-12 sm-col-12 md-col-6 px2 py1">
    <div class="panel panel-default">
      <div class="panel-heading bg-black">Checkout Summaries</div>
      <div class="panel-body">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table">
              <thead>
                <tr>
                  <td>Items</td>
                  <td>Qty</td>
                </tr>
              </thead>
              <tbody>
                <? foreach($cart_list as $product) { ?>
                  <tr>
                    <td><h4><a href="<?php echo base_url().'product/'.str_replace(' ','-', $product['name']) ?>"><b><? echo $product['name'] ?></b></a></h4></td>
                    <td><? echo $product['qty'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

        <table class="table">
          <tbody>
            <tr>
              <td>Subtotal :</td>
              <td id="total-price">Rp. <?= $this->cart->total(); ?></td>
              <input type="hidden" name="subtotal" id="subtotal" value="<?= $this->cart->total(); ?>">
            </tr>
            <tr>
              <td>Shipping Cost:</td>
              <td id="shipping-price">-</td>
              <input type="hidden" name="ship_cost" id="ship-cost" value="">
            </tr>
          </tbody>
          <tfooter>
            <tr>
              <td>Total :</td>
              <td id="grand-total-price">-</td>
              <input type="hidden" name="total_price" id="total_price" value="">
            </tr>
          </tfooter>
        </table>
        <span id="shipping_detail" class="text-gray"></span>
        <button class="btn btn-default right mt2 bg-black">Checkout</button>
      </div>
    </div>
    <i>note: *please fill the shipping information first</i>
  </div>
  </form>
</div>

<script>
  function clear_select()
  {
    $("#courier").val('');
    $("#service").val('');
  }


  function check_ongkir() {
    var id = $("#city").val();
    var courier = $("#courier").val();

    $('#service').html('<option value="" selected disabled>Select Service</option>');

    $.ajax({
        url: '<?php echo base_url()?>checkout/check_ongkir',
        type: 'POST',
        data: {
            city: id, courier: courier
        },
        success: function(data, textStatus, xhr) {
            data = JSON.parse(data);
            cost = data.rajaongkir.results[0].costs;
            for (var key in cost) {
              if (cost.hasOwnProperty(key)) {
                var val = cost[key];
                // console.log( key+'-'+val.service);
                $('#service').append($("<option></option>")
                              .attr("value",val.service+'|'+val.cost[0].value)
                              .text(val.service+ ' | '+ val.cost[0].value+' | ' + val.cost[0].etd +' days'));
              }
            }
            // service = data.rajaongkir.results[0].costs[1].service;
            // est = data.rajaongkir.results[0].costs[1].cost[0].etd;
            // $('#shipping-price').text(cost);
            // $('#shipping_detail').text('Service : '+ service +' estimate day: '+ est +' day.');
        },
        error: function() {
            console.log('eror')
        }
    });
};

  function shipping_cost()
  {
    service = $('#service').val();
    s_choose = service.split('|') 
    shiiping_cost = s_choose[1];
    
    $('#shipping-price').text('Rp. ' + shiiping_cost);
    $('#ship-cost').val(shiiping_cost);

    grandtotal = parseInt($('#subtotal').val())+parseInt(shiiping_cost);
    $('#grand-total-price').text('Rp. '+grandtotal);
    $('#total_price').val(grandtotal);
    
  }
</script>