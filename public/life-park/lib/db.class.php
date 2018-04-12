<?php

Class db {

/*** Declare instance ***/
private static $instance = NULL;


/**
*
* the constructor is set to private so
* so nobody can create a new instance using new
*
*/




public function __construct() {
  /*** maybe set the db name here later ***/
   
}

public function index() 
{   
    
}


/**
*
* Return DB instance or create intitial connection
*
* @return object (PDO)
*
* @access public
*
*/
public static function getInstance() {

if (!self::$instance)
    {
    //self::$instance = new PDO("mysql:host=localhost;dbname=biz", 'root', '');;
    //self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //self::$instance= new mysqli("50.116.108.181", "kheprat_winwin", "Almoasher123", "kheprat_winwin");
	 self::$instance= new mysqli("localhost", "kheprat_morehome", "Almoasher123", "kheprat_morehomes");
   self::$instance->set_charset("utf8");
    /* check connection */
    if (self::$instance->connect_errno) {
        printf("Connect failed: %s\n", self::$instance->connect_error);
        exit();
}
    }
return self::$instance;
}

/**
*
* Like the constructor, we make __clone private
* so nobody can clone the instance
*
*/
  public static function execquery($query)
    {
    
      return  self::$instance->query($query);
 return self::$instance->fetchAll();
        if ( self::$instance->query($query) === TRUE) {
          return self::$instance->result;
            return TRUE; 
          
        } else {
      
            return FALSE; 
        } self::$instance->close();
    }
    
      public static function execquery_id($query)
    {
         

        if ( self::$instance->query($query) ) {
            
          return self::$instance->insert_id;
        } else {
            // printf("Errormessage: %s\n", self::$instance->error);
            return -1; 
        } self::$instance->close();
    }
private function __clone(){
}

}	  function get($key)
		{
			$value="";
			// Stripslashes
			if (isset($_GET[$key]))
			  {
			    $value = stripslashes($_GET[$key]);
			  }
			// Quote if not a number
	
			return $value;
		}
		
		 function post($key)
		{
			$value="";
			// Stripslashes
			if (isset($_POST[$key]))
			  {
			    $value = stripslashes($_POST[$key]);
			  }
			// Quote if not a number
	
			return $value;
		}


 /*** end of class ***/


?>
