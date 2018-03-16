
############################################
            
              webstore

############################################


    * This is webstore project build in PHP with no frameworks based on MVC design pattern and using 
    * OOP, in order to better understanding of MVC and OOP programming.


############################################

             File structure:

############################################

  - Helpers  # Included all helpers and router file
  
    -- FormHelpers.php   # Function for validate user input 
    -- Item.php          # Store item
    -- Router.php        # Application level routing
    -- Templating.php    # Creates pages and renders view contents
    -- Validators.php    # Validates user inputs and returns clean data to controller
    -- ViewBuilder.php   # HELPS TO BUILD PAGE DEFAULTED VIEWS SUCH AS Categories, Popular products, and Homepage carousel data
  
  - Controllers # As its name it is a bridge between Modals and Views, and contains all the business logics, one class for each specific page
    
    -- Controller.php   #
    -- Cart.php
    -- ErrorPage.php
    -- Home.php
    -- InserBook.php
    -- MyAccount.php
    -- Productpage.php
    -- Search.php
  
  - Models
  
    -- dbConnection.php
    -- Insertion.php
    -- Selection.php
  
  - Views
  
    -- contents
    
      --- Cart.php
      --- error.php
      --- home.php
      --- insertBook.php
      --- login.php
      --- Productpage.php
      --- Search.php
      --- signup.php
      --- userAccount.php
      
    -- template
    
      --- carousel.php
      --- header.php
      --- footer.php
      --- categories.php
      --- left-ad.php
      --- productList.php
      
    -- files
      
      --- popularProducts.csv
        
    -- css
    
      --- bootstrap.css
      --- carousel.css
      --- main.css
      --- styles.css
    
    -- scripts
      
      --- helper.js
      
    -- images
      
      --- Cart.png
      --- webstore.png
      
  - .htaccess
  - _globals.php
  - _init.php
  - index.php
