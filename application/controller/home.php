<?php

error_reporting(E_ERROR | E_PARSE);

class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
       
         
            require_once 'application/views/home/index.php';
        }
  
    
}

