<?php

class ads extends db {
    /*     * * Declare instance ** */

    private static $success_message = "your transaction are success";
    private static $emailexsist_message = "this email exist before";
    private static $emailnotexsist_message = "invalid username or password";

    /**
     *
     * the constructor is set to private so
     * so nobody can create a new instance using new
     *
     */

    private  static $encryption;
    public function __construct() {
  /*** maybe set the db name here later ***/

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

    public static function add($parameters) {
        $name=$parameters['name'];
		$email=$parameters['email'];
		$phone=$parameters['phone'];
		$years_of_experience=$parameters['years_of_experience'];
		$field_of_expertise=$parameters['field_of_expertise2'];
		$register_source=$parameters['register_source'];
		$message=$parameters['message'];
		$CV=$parameters['cv'];
$countries=$parameters['countries'];
		$isconsultant=$parameters['isconsultant'];
		$register_time=date("Y-m-d H:i:s");
		
        $query = "insert into users  set name='$name',email='$email',mobile='$phone',field_of_expertise2='$field_of_expertise'
		,countries='$countries',years_of_experience='$years_of_experience',CV='$CV',isconsultant='$isconsultant',register_time='$register_time',message='$message'
		,register_source='$register_source'";
		
        
//echo $query;
        $id = self::execquery_id($query);
        //echo self::$success_message;
        /*add record to crm*/
        //self::transferdatatocrmbyid($id);
        
        return $id;
    }

    
	
    public static function getexpertise($id) {
       
		
        $query = "select name from expertise_field where id='$id'";

        $result = self::execquery($query);

        $obj = $result->fetch_object();
		
        return $obj->name;
    }
	
        
    public function  transferdatatocrm()
    {
        
        $query="select * from companies where accountstatus='Active'      ";
        $result = self::execquery($query);
         if ($result) {
            while ($obj = $result->fetch_object()) {
               
                $com = array(
                        'id'=>$obj->id,	
                        'firstname'=>$obj->firstname,
                        'lastname'=>$obj->lastname,
                        'email'	=>$obj->email,
                        'password'	=>$obj->password,
                        'companyname'	=>$obj->companyname,
                        'country'	=>$obj->countrycode,
                        'phone'	=>$obj->phone,
                        'website'	=>$obj->website,
                        'linkedin'	=>$obj->linkedin,
                        'facebook'=>$obj->facebook,
                        'twitter'	=>$obj->twitter,
                        'aboutcompany'	=>$obj->aboutcompany,
                        'google'	=>$obj->google,
                        'instagram'	=>$obj->instagram,
                        'gender'	=>$obj->gender,
                        'profilepic'	=>$obj->profilepic,
                        'account_id'=>$obj->account_id,
                        'start_date'	=>$obj->start_date,
                        'end_date'	=>$obj->end_date,
                        'registerdate'=>$obj->registerdate,
                        'login_type'	=>$obj->login_type,
                        'ispay'=>$obj->ispay,
                        'accountstatus'=>$obj->accountstatus,
                   
                   
                );
                
                self::transfer($com);
           }
         }


         
         

    }
    
    
    
        public function transfer($data)
    {
       
        $url = "http://dddd/web_crm_updates/new_lead.php";

           
            $content="";
            foreach($data as $key=>$value) { $content .= $key.'='.$value.'&'; }
            //echo $content;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            $json_response = curl_exec($curl);

            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            curl_close($curl);
            echo 'Transfer Record '. $data['id'].' Is '. $json_response.'<br>';
            //$response = json_decode($json_response, true);
            //echo $response['name'];
            //var_dump($response);
    }
        
    public static function  transferdatatocrmbyid($id)
    {
        
        $query="select * from companies where id=$id and accountstatus='Active'     ";
        $result = self::execquery($query);
         if ($result) {
            while ($obj = $result->fetch_object()) {
               
                $com = array(
                        'id'=>$obj->id,	
                        'firstname'=>$obj->firstname,
                        'lastname'=>$obj->lastname,
                        'email'	=>$obj->email,
                        'password'	=>$obj->password,
                        'companyname'	=>$obj->companyname,
                        'country'	=>$obj->countrycode,
                        'phone'	=>$obj->phone,
                        'website'	=>$obj->website,
                        'linkedin'	=>$obj->linkedin,
                        'facebook'=>$obj->facebook,
                        'twitter'	=>$obj->twitter,
                        'aboutcompany'	=>$obj->aboutcompany,
                        'google'	=>$obj->google,
                        'instagram'	=>$obj->instagram,
                        'gender'	=>$obj->gender,
                        'profilepic'	=>$obj->profilepic,
                        'account_id'=>$obj->account_id,
                        'start_date'	=>$obj->start_date,
                        'end_date'	=>$obj->end_date,
                        'registerdate'=>$obj->registerdate,
                        'login_type'	=>$obj->login_type,
                        'ispay'=>$obj->ispay,
                        'accountstatus'=>$obj->accountstatus,
                   
                );
                
                self::transferbyid($com);
           }
         }


         
         

    }
    
    
    
    
    public static function transferbyid($data)
    {
       
       /* $url = "http://crm.winwinbiz.com/web_crm_updates/new_lead.php";

           
            $content="";
            foreach($data as $key=>$value) { $content .= $key.'='.$value.'&'; }
            //echo $content;
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

            $json_response = curl_exec($curl);

            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            curl_close($curl);*/
          //  echo 'Transfer Record '. $data['id'].' Is '. $json_response.'<br>';
            //$response = json_decode($json_response, true);
            //echo $response['name'];
            //var_dump($response);
    }

    private function __clone() {
        
    }

    
    
}

/* * * end of class ** */
?>
