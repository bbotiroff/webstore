<?php 

/*****************************************************************
	
	# CURRENT FILE CONTAINS ALL THE CONFIGURATION OF OUR APP

******************************************************************/ 


/*
	#INCLUDE __GLOBAL VARIABLES
*/ 

require('__globals.php');

/*
	# INCLUDE DATABASE FILES
*/ 
require(APP_PATH . '/models/dbConnection.php');

require(APP_PATH . "/models/Insertion.php");

require(APP_PATH . "/models/Selections.php");

/*
	# INCLUDE ALL THE HELPER CLASSES
*/ 

require(APP_PATH . '/helpers/router.php');
require(APP_PATH . '/helpers/formHelpers.php');
require(APP_PATH . '/helpers/validator.php');
require(APP_PATH . '/helpers/templating.php');
require(APP_PATH . '/helpers/Item.php');
require(APP_PATH . '/helpers/ViewBuilder.php');

/*
	# Include Controller from controllers folder
*/ 


require(APP_PATH . "/controllers/Controller.php");








 