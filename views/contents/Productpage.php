<div class="row col-lg-12 m-3" >
	<div class="col-lg-3">
		<img src=<?php echo  '"data:image/jpeg;base64,' . $product['image'] . '"'; ?> width="100%"/>

	</div>


	<div class="col-lg-9">
		<div class="row">
			<div class="col-lg-9">
				<!-- I will hold all the data related to the product  -->
				<h3 class="border-bottom"> <?php echo $product['title']; ?> </h3>

				<p><span style="font-weight: 600;">Author: </span><span class="text-secondary"><?php echo $product['author']; ?> </span></p>
				<p><span style="font-weight: 600;">Publisher: </span><span class="text-secondary"><?php echo $product['publisher']; ?> </span></p>
				<p><span style="font-weight: 600;">Genre: </span><span class="text-secondary"><?php echo $product['genre']; ?> </span></p>
				<p><span style="font-weight: 600;">Released Year: </span><span class="text-secondary"><?php echo $product['year']; ?> </span></p>
				<p><span style="font-weight: 600;">Total Pages: </span><span class="text-secondary"><?php echo $product['pages']; ?> </span></p>
				<p><span style="font-weight: 600;">10 Digit ISBN: </span><span class="text-secondary"><?php echo $product['isbn']; ?> </span></p>
				<p><span style="font-weight: 600;">Description: </span><span class="text-secondary"><?php echo $product['description']; ?>  </span></p>
				
			</div>
			<div class="col-lg-3 float-right">
				<div class="row m-3 text-center" style="font-size: 1.6em;">
					<span class="col-lg-12 text-left">Price: $<?php echo $product['price']; ?> </span>

				</div>
	
				<div class="row px-5 py-3">
					<a href=<?php echo BASE_PATH . "/Cart/addToCart/id/" . $product['uid'] . "/qty/1";?> ><input type="button" value="Add to cart" name="cart" style="align:center;"></a>
				</div>

				<div class="row border border-light">
					<img src=<?php print '"https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl='.BASE_PATH. '/Productpage/index/id/'. $product['uid'] .'"' ?> title="Link to product" style="padding:0;"/>
					
					<p class="text-muted" style="text-align:center; margin-left:10%;">Scan me to share this item</p>
				</div>
			</div>
		</div>
	</div>


</div> 









<!-- 

	**************************************************************************************

				Will be implemented soon this will create quantity off of 


	**************************************************************************************





#				<div class="row">
#					<span class="col-lg-6 text-right">Quantity:</span>
#					<span class="col-lg-6">
#						# Will be generated dynamically with php script
#						<?php 
#							print "<select name=\"qty\">";
#								$itemQty = 3; //Comming from inventory table
#									for($i=1; $i<=$itemQty; $i++){ 
#										print"<option>" . $i . "</option>";
#									}
#							print "</select>";
#
#						 ?>
#					</span>
#				 </div>


 -->






