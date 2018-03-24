<?php 

//Merchant Total
$merchantTotal = NULL;

//create shipping variable
$shipping = NULL;

//create tax variable
$tax = NULL;

// Get today's date

$today = date("m/d/Y h:i:sa", strtotime("today"));

$oneWeek = strtotime("+1 week");

$nextWeek = date("m/d/Y h:i:sa", $oneWeek);


//Create grand total variable
$grandTotal = NULL;


//Button disabled class
$btnClass = "btn btn-secondary btn-lg btn-block disabled";

//Button link to checkout page
$btnLink = BASE_PATH . "/Cart/gotoCheckout";

//if user has chosen data needed.
if(is_array($products)){

$shipping = "FREE!";
$tax = "%10";

//  Calculate grand total of the cart
    foreach ($products as $product) {
        $merchantTotal += $product['totalCost'];        
    }

    $grandTotal = $merchantTotal + ($merchantTotal*0.1);


    $merchantTotal = "$" . $merchantTotal;
    $grandTotal = "$". $grandTotal;
    $btnClass = "btn btn-secondary btn-lg btn-block";
}


 ?>


<div class="col-lg-7 mx-auto  my-5">

<div class="invoice row-printable">
        <!-- col-lg-12 start here -->
        <div class="cart plain border" id="dash_0">

            <div class="cart-header bg-light p-3">
                <h4>RECEIPT</h4>
            </div>
            <!-- Start .cart -->
            <div class="cart-body p30">
                <div class="row">
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="invoice-details  m-4">
                            <div class="well">
                                <ul class="list-unstyled mb0">
                                    <li><strong>Invoice</strong> #936988</li>
                                    <li><strong>Invoice Date: </strong> <?php echo $today; ?></li>
                                    <li><strong>Due Date: </strong><?php echo $nextWeek; ?></li>
                                    <li><strong>Status:</strong> <span class="bg-warning text-white p-1">PROCESSING</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                   <thead>
                                        <tr>
                                            <th class="per70 text-left">Purchace Name </th>
                                            <th class="per5 text-center">Qty</th>
                                            <th class="per25 text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                            foreach ($products as $key => $product) {
                                              $title = substr($product['title'], 0, 50);
                                              $description = substr($product['description'], 0, 40);
                                              print "

                                                    <tr>
                                                        <td class=\"per70 text-left\">{$title}.. </td>
                                                        <td class=\"per5 text-center\">{$product['qty']}</td>
                                                        <td class=\"per25 text-center\"> {$product['totalCost']} </td>
                                                    </tr>

                                              ";
                                            }

                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-right">Sub Total:</th>
                                            <th class="text-center"><?php echo $merchantTotal; ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-right">State Tax:</th>
                                            <th class="text-center"><?php echo $tax; ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" class="text-right">Total:</th>
                                            <th class="text-center"><?php echo $grandTotal; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="invoice-footer mt25">
                            <p class="text-center">THANK YOU FOR PURCHASE, <a href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
                        </div>
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
</div>


</div>

