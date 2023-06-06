
<?php
include '../Includes/products.php';
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../Css/classes.css">
   <script src="../JS/JS.js"></script>
  

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <title> Shopping cart </title>
 <link rel="icon" href="../Pictures/logo4.jpg" type="image/icon type">
<!-- for navbar-->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="../Css/cssgooglemaps.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css2?family=Spinnaker&display=swap" rel="stylesheet">
     
     <!-- for icon footer-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     
  <style>
		@media (max-width: 768px) {
			.table {
				width: 2000px !important;
				max-width: 2000px !important;
			}
		}
	</style>
  
  <body>
      
      <b>
     <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
  <div class="container-fluid">
    <a href="../Includes/homepage.html" class="navbar-brand"><b>ClassMaster</b> Shopping cart</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" id="navbarToggleBtn">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../Includes/classes.html">Our classes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Includes/teamTeachers.html">Team teachers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Includes/ongoing_activity.html">Activities</a>
        </li>
        <li class="nav-item">
          <a id="shoppingCartLink" class="nav-link" href="../Includes/shoppingcart.php">Shopping cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" onclick="logout()" style="cursor: pointer;">
            <svg width="16" height="16" fill="currentColor">
              <path d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
              <path d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Add event listener to the hamburger menu button
    $("#navbarToggleBtn").click(function() {
      // Toggle the collapse state of the menu
      $("#navbarNavDropdown").collapse('toggle');
    });
  });
</script>



    
    </b>
  
  
  
   <section class="h-100 h-custom">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <form action="place_order.php" method="post" id="orderForm">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="h5">Shopping Bag</th>
                                        <th scope="col">SKU</th>
										<th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
										<th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($products as $product){
                                ?>
                                    <tr>
                                        <th scope="row" width="45%">
                                            <div class="d-flex align-items-center">
                                                <img src="<?php echo $product['image']; ?>" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                                <div class="flex-column ms-4">
                                                    <p class="mb-2"><?php echo $product['name'] ?></p>

                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;"><?php echo $product['sku'] ?></p>
                                        </td>
										<td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;">$<?php echo $product['price']; ?></p>
                                        </td>
										
                                        <td class="align-middle">
                                            <div class="d-flex flex-row">
                                                <button type="button" class="btn btn-link px-2" onclick="quantityDown('item_<?php echo $i; ?>')">
                                                    <i class="fa fa-minus"></i>
                                                </button>

                                                <input id="item_<?php echo $i; ?>" min="0" name="quantity" value="0" type="number" class="form-control form-control-sm quantity" data-price="<?php echo $product['price']; ?>" style="width: 50px;" />

                                                <button type="button" class="btn btn-link px-2" onclick="quantityUp('item_<?php echo $i; ?>')">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <p class="mb-0" style="font-weight: 500;" id="item_<?php echo $i; ?>_price">$0</p>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="product_name[]" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="product_price[]" value="<?php echo $product['price']; ?>">
                                    <input type="hidden" name="product_quantity[]" id="item_<?php echo $i; ?>_quantity" value="0">
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    
                    <div class="col-lg-4"></div>







                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                        <p class="mb-2">Subtotal</p>
                        <p class="mb-2" id="subtotal"></p>
                    </div>



                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                        <p class="mb-2">Total (tax included)</p>
                        <p class="mb-2" id="order_total"></p>
                    </div>



                    <button type="submit" name="placeorder" class="btn btn-primary btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                            <span>Making reservation</span>
                            <span id="order_total_2"></span>
                        </div>
                    </button>


                    </form>




                </div>
            </div>
        </div>
    </section>

  
  
  
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


    <script>
        


        var order_total = 0;
		
		$('#orderForm').on('submit', function(){
			if(order_total == 0){
				alert('Please select any item to proceed!');
				return false;
			}
		})

        function quantityUp(id) {
            var value = parseInt($("#" + id).val());
            value++;
            $("#" + id).val(value);
            var price = $("#" + id).data('price');
            var quantity = value;
            update(price, quantity, id);
        }

        function quantityDown(id) {
            var value = parseInt($("#" + id).val());
            if (value == 0) {
                return false;
            }
            value--;
            $("#" + id).val(value);
            var price = $("#" + id).data('price');
            var quantity = value;
            update(price, quantity, id);
        }

        function update(price, quantity, id) {
            var total_price = price * quantity;
            $("#" + id + '_price').html("$" + total_price.toFixed(2));
            $("#" + id + '_quantity').val(quantity);

            updateTotal();

        }

        function updateTotal() {
            order_total = 0;
            $('input[name=quantity]').each(function(index) {
                order_total += $(this).val() * $(this).data('price');
            });

            $("#subtotal").html('$' + order_total.toFixed(2));
            $("#order_total").html('$' + order_total.toFixed(2));
            $("#order_total_2").html('$' + order_total.toFixed(2));
        }

        updateTotal();
    </script>



  <!--footer-->
  <footer class="footer-area footer--light">
  <div class="footer-big">
    <!-- start .container -->
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="footer-widget">
            <div class="widget-about">
              
              <p class="pha"><b>With us you can find any art class that interests you, and with one click register for it. Feel free to contact us for any reason you may have ♥</b></p>
              
            </div>
          </div>
          <!-- Ends: .footer-widget -->
        </div>
        <!-- end /.col-md-4 -->
     
        <!-- end /.col-md-3 -->

        <div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu">
              <h4 class="footer-widget-title tit"><b>Quick Links:</b></h4>
              <ul>
                <li class="li1">
                  <a href="../Includes/homepage.html" class="aaa">Home</a>
                </li>
                <li class="li1">
                  <a href="../Includes/classes.html" class="aaa">Our classes</a>
                </li>
                <li class="li1">
                  <a href="../Includes/teamTeachers.html" class="aaa">Our teachers</a>
                </li>
                <li class="li1">
                  <a href="../Includes/ongoing_activity.html" class="aaa">Activities</a>
                </li>
                 <li class="li1">
                            
        		    <a  onclick="logout()" class="aaa" style="cursor: pointer;">Log out</a>
                </li>
               
                
                
              </ul>
            </div>
            <!-- end /.footer-menu -->
          </div>
          <!-- Ends: .footer-widget -->
        </div>
        <!-- end /.col-lg-3 -->

        <div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu no-padding">
              <h4 class="footer-widget-title tit"><b>Contact us:</b></h4>
              <ul>
				<li class="li1">
				<i class="fas fa-mobile-alt" style="font-size:24px"></i>
                  <a href="tel:344-755-111" class="aaa">03-7544321</a>
               </li>
                <li class="li1">
                   <i class="far fa-envelope-open" ></i> 
                 <a href="mailto:ClassMasterOn@gmail.com" title="click to send mail">ClassMasterOn@gmail.com</a>
                </li>
				<li class="li1">
				
				<i class="fa fa-map-marker"style="font-size:20px;"></i> <a href="#" onclick="openMapPopup('Pinkas 4, Tel Aviv-Yafo')">Pinkas 4, Tel Aviv-Yafo</a></a>
				</li>

               	<script>
function openMapPopup(address) {
    event.preventDefault();
  // Create a URL for the Google Maps location based on the address
  var mapUrl = 'https://www.google.com/maps?q=' + encodeURIComponent(address) ;
  
  // Set the width and height of the pop-up window
  var width = 600;
  var height = 400;
  
  // Calculate the position of the pop-up window to center it on the screen
  var left = (window.innerWidth - width) / 2;
  var top = (window.innerHeight - height) / 2;
  
  // Open the pop-up window with the Google Maps URL
  window.open(mapUrl, 'Map', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
}
</script>
               	
              </ul>
            </div>
            <!-- end /.footer-menu -->
          </div>
          <!-- Ends: .footer-widget -->
        </div>
        <!-- Ends: .col-lg-3 -->
		<div class="col-md-3 col-sm-4">
          <div class="footer-widget">
            <div class="footer-menu no-padding">
              <h4 class="footer-widget-title tit"><b>Follow us:</b></h4>
             <ul class="list-group">
			  <li  class="list-group-item bg-transparent li1 border-0 p-0 mb-2">
				<a ><i class="fab fa-linkedin"></i> LinkedIn</a>
			  </li>
				 <a ><i class="fab fa-tumblr-square"></i> Twitter</a>       
			  <li class="list-group-item bg-transparent li1 border-0 p-0 mb-2">
			  <li class="list-group-item bg-transparent li1 border-0 p-0 mb-2"> 
			  
			  <li class="list-group-item bg-transparent li1 border-0 p-0 mb-2">
				<a href="https://github.com/maybakoch/classmaster" class="aaa" target="_blank"><i class="fab fa-git-square"></i> Github</a>
				
				<li class="list-group-item bg-transparent li1 border-0 p-0 mb-2">
				<a class="aaa" target="_blank"><i class="fab fa-facebook-f" ></i> Facebook</a>
			  </li>
			 </ul>
            
			</div>
		  </div>
		</div>
   </div>
     
      <!-- end /.row -->
    </div>
    <!-- end /.container -->
  </div>
  <!-- end /.footer-big -->

  <div class="mini-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            
               © Copyright 2023 - ClassMaster.  All rights reserved 
			  
              
           
          </div>

          
        </div>
      </div>
    </div>
  </div>
</footer>
  </body>

</html>