<?php 
/*

*****************************************************************************************************

* It is a code to access the fake credit card processing code on Michael Wilde the  PHP2 teacher.  

*****************************************************************************************************



*****************************************************************************************************

* The code returns four different codes:

 

	'APPROVED'      :If a 16 digit credit card number and four digit expiration date is sent

	'DATA SEND ERROR'      : When there is an issue with the POST data not being sent

	'BAD DATA ERROR'       :If there is a problem with the credit card number that was sent

	'BAD DATE ERROR'     : If there is a problem with the date that was sent

 

Then we need a payment/sale confirmation page.  Maybe also send them an email to confirm the sale.  And be sure to have a link back to the main page of the site.

*/

function proccesPayment($card_number, $expiration_date){


	$fields_string = '';
	//set POST variables
	$url = 'http://chelan.highline.edu/~mwilde/215/creditcardcompany.php';
	$fields = array(
	                      'cardnumber'=>urlencode($card_number),
	                      'date'=>urlencode($expiration_date)
	               );

	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string,'&');

	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);

	return $result;
}