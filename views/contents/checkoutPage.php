<?php 

//  Total qty of items on cart.
  $totalQTY=0;


//Merchant Total
$merchantTotal = NULL;

//create shipping variable
$shipping = NULL;

//create tax variable
$tax = NULL;


//Create grand total variable
$grandTotal = NULL;


//Button disabled class
$btnClass = "btn btn-secondary btn-lg btn-block disabled";


//if user has chosen data needed.
if(is_array($products)){

$shipping = "FREE!";
$tax = "%10";

//  Calculate grand total of the cart
  foreach ($products as $product) {
    $totalQTY += $product['qty'];
    $merchantTotal += $product['totalCost'];    
  }

  $grandTotal = $merchantTotal + ($merchantTotal*0.1);


  $merchantTotal = "$" . $merchantTotal;
  $grandTotal = "$". $grandTotal;
  $btnClass = "btn btn-secondary btn-lg btn-block";
}



 ?> 

  <div class="col-lg-10 mx-auto my-3">
    <?php if(isset($Error)) echo "<div class=\"alert alert-danger\"> $Error</div>";?>
     <div class="row">
        <div class="col-md-4 order-md-2">
          <h5 class="d-flex justify-content-between align-items-center m-0 p-3 border border-bottom border-muted  bg-light ">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"><?php echo $totalQTY; ?></span>
          </h5>
          <ul class="list-group mb-3">
            <?php 
              
              foreach ($products as $key => $product) {
                $title = substr($product['title'], 0, 33);
                $description = substr($product['description'], 0, 40);
                  print "

                    <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
                      <div>
                        <h6 class=\"my-0\"> {$title}.. </h6>
                        <small class=\"text-muted\">{$description}</small>
                      </div>
                      <span class=\"text-muted\"> {$product['totalCost']}</span>
                    </li>

                  ";
              }

            ?>

            <li class="list-group-item d-flex justify-content-between">
              <span>TOTAL (after tax)</span>
              <strong><?php echo $grandTotal; ?></strong>
            </li>
          </ul>
        </div>

        <div class="col-md-8 order-md-1">
            <h5 class="p-3 border border-bottom border-muted  bg-light m-0">Payment</h5>
            <div class="border p-3">


            <div class="row">
              <div class="col-md-12 mb-3">

            <form action=<?php echo BASE_PATH . "/Cart/paymentProcess" ?> method="POST" class="needs-validation">

                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="cardNumber" placeholder="" required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" id="cc-expiration"  name="expirationDate" placeholder="" required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" name="CVV" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>


            <hr class="mb-4">
            <h4 class="mb-3">Billing address</h4>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option>United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" id="state" required>
                  <option value="">Choose...</option>
                  <option>California</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">



            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Place order">
          </form>

            </div>
        </div>

  </div>
 






 <!-- 

        ******************************************************************************************************************


        *BILLING ADDRESS INFORMATION 






  -->