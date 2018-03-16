<?php 

class Controller{


//	Path for the View file from content folder, default HOME page
	protected $contentPath = '/contents/home';
//	All configurations and data for view. it will send only data to fill up VIEW pages for client	
	protected $viewConfig = ['title' => 'HOME'];


	protected function get(){

		return Array('contentPath' => $this->contentPath, 'viewConfig' => $this->viewConfig);
	
	}
}

 