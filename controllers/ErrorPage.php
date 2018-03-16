<?php 

class ErrorPage extends Controller{

	public function index($parameters = []){

		$this->contentPath = '/contents/error';

		$this->viewConfig = ['title' => 'ERROR'];
		
		return $this->get();

	}
	
}

