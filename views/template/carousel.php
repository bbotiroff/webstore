
<div id="carouselExampleIndicators" class="carousel slide carousel-bgcolor0 d-none d-xl-block d-lg-block" data-ride="carousel">

  <ol class="carousel-indicators">
  


    <!-- create indicators for popular items and carousel  -->
    <?php 
      for($i=0; $i<count($popularProducts); $i++){
        // Is it first item, if it is make as active 
        if($i===0) {
          
          print "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>";
        
        } else {
        
          print "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"{$i}\"></li>";
        
        }
     }
    ?>
    <!-- End create indicators for popular items and carousel  -->

  </ol>

  <!-- Creating inner item  -->
  <div class="carousel-inner container">
    
  <?php 

      for($i=0; $i<count($popularProducts); $i++){
        // Is it first item, if it is make as active 
        if($i===0) {
          
          print "<div class=\"carousel-item mt-3 active\">";
        
        } else {
  
          print "<div class=\"carousel-item mt-3\">";
        
        }

        $title = $popularProducts[$i]['title'];
        $description = substr($popularProducts[$i]['description'], 0, 150);
        $bookURL = BASE_PATH . "/Productpage/index/id/" . $popularProducts[$i]['uid'];
        print "
            <div>
              <div class=\"image-container border border-rounded p-0 caruselShadow\" >
                <img src=\"data:image/jpeg;base64, {$popularProducts[$i]['image']} \" alt=\"{$title}\">
              </div>
              <div class=\"carousel-caption text-left\">
                  <h1> {$title}</h1>
                  <p>{$description}...</p>
                  <p><a class=\"btn btn-lg btn-primary\" href=\"{$bookURL}\" role=\"button\">See more..</a></p>
              </div>
            </div>
          </div>
        ";
        }

   ?>

  </div>


  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>







