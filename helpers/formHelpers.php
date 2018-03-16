<?php 

class FormHelpers{


	/////////////////////////////////////////
	// clean up given string 
	public function cleanString($string){
		$string = trim($string);
		$string = htmlspecialchars($string);
		$string = htmlentities($string);
		$string = strip_tags($string);
		$string = stripslashes($string);
		return $string;
	}



	public function cleanUpInteger($number){

		$num = trim($number);
		$num = htmlspecialchars($number);
		$num = strip_tags($number);
		$num = stripslashes($number);
		$num = str_replace("(", "", $number);
		$num = str_replace(")", "", $number);
		$num = str_replace("-", "", $number);

		return $num;
	}


	///////////////////////////////////////////////////////
	//check if user entered valid phone number
	public function isValidEmail($email){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  return false;
		}
		return true;
	}


	 ////////////////////////////////////////////
	//check if user entered valid phone number//
	public function isValidPhone($pNumber){
		$pNumber = cleanUpString($pNumber);
		$pNumber = str_replace("(", "", $pNumber);
		$pNumber = str_replace(")", "", $pNumber);
		$pNumber = str_replace("-", "", $pNumber);
	

		if(!is_numeric($pNumber)){
			return false;
		}

		return true;
	}





	public function resizeImg($image, $newWidth){

	   // *** Get extension
	    $extension = strtolower(strrchr($image['name'], '.'));
	 
	    switch($extension)
	    {
	        case '.jpg':
	        case '.jpeg':
	            $imagetmp = imagecreatefromjpeg($image['tmp_name']);
	            break;
	        case '.gif':
	            $imagetmp = imagecreatefromgif($image['tmp_name']);
	            break;
	        case '.png':

	            $imagetmp = imagecreatefrompng($image['tmp_name']);
	            break;
	        default:
	            return false;
	            break;
    	}

     // *** Get width and height
        $width  = imagesx($imagetmp);
        $height = imagesy($imagetmp);


        $ratio = $height / $width;

        $newHeight = $newWidth * $ratio;


     // *** Resample - create image canvas of x, y size
	    $imageResized = imagecreatetruecolor($newWidth, $newHeight);
	    imagecopyresampled($imageResized, $imagetmp, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

	    $imageQuality = 100;



		ob_start();

		switch($extension)
		{
			case '.jpg':
			case '.jpeg':
				imagejpeg($imageResized);
				break;
			case '.gif':
				imagejpeg($imageResized);
				break;
			case '.png':
				// Scale quality from 0-100 to 0-9
				$scaleQuality = round(($imageQuality/100) * 9);
				// *** Invert quality setting as 0 is best, not 9
				$invertScaleQuality = 9 - $scaleQuality;
				imagepng($imageResized);
				break;
			default:
				return false;
			break;
		}
		$final_image = ob_get_contents();

		ob_end_clean();
	    return $final_image;



	}














}


