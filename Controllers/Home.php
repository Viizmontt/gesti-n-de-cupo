<?php
  require_once("Controllers/Login.php");
  class Home extends Controllers{
	  public function __construct(){
		  parent::__construct();
		  session_start();
		  header('Location: '.base_url().'/dashboard');
		}
    }
?>