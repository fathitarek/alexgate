<?php
 header ('Content-Type: text/html; charset=UTF-8'); 
$pagetitle ="more homes";
$reversed="جميع الحقوق محفوظه لموقع morehomes-eg.com ";
$thankyou="شكرا لتسجيلك ";
$callback="سيتم الأتصال بك فى أسرع وقت";
if(isset($_GET['lang']))
{
  $pagetitle ="more homes";
$reversed="All rights reserved morehomes-eg.com";
$thankyou="Thank you for register";
$callback="We will call you as soon as possible";
}
include_once ('lib/db.class.php');
include_once ('lib/companies.class.php');
$db=new db();
$ads=new ads();
$db->getInstance();
$host=post('host');
$name=post('uFirstName');
$email=post('uMail');
$phone=post('uMobile');
$field_of_expertise=post('field_of_expertise');
$years_of_experience=post('years_of_experience');
$field_of_expertise2=post('field_of_expertise2');


$countries=post('countries');

$source=post('source');
$message=post('message');


$target_dir = "uploads/";
$fullname="";
$target_file = $target_dir .$fullname;
//die($target_file );
$filearray=0;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$filename = pathinfo($target_file,PATHINFO_FILENAME);

$name=post('uFirstName');
$email=post('uMail');
$phone=post('uMobile');
$field_of_expertise=post('field_of_expertise');
$years_of_experience=post('years_of_experience');


$path="";
$cv=$target_file;
if ($fullname!="")
{
$path=	$host.$cv;
}




if ($phone=='')
	return;
$parameters=array(
'name'=> $name,
'email' => $email,
'phone' => $phone,
'years_of_experience' =>$years_of_experience,
'field_of_expertise2' => $field_of_expertise2,
'countries'=>$countries,
'cv' => $path,
'register_source' => $source ,
'leadsource' => 'life-park' ,
'cf_847' => 'life-park' ,
'isconsultant' => '0' ,
'message'=>$message,
);

$ads->add($parameters);
transfer($parameters);
   
function transfer($data)
    {
       
       $url = "http://morehomes-eg.com/crm/web_crm/new_lead.php";
           
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
            //echo 'Transfer Record '. $data['id'].' Is '. $json_response.'<br>';
            //$response = json_decode($json_response, true);
            //echo $response['name'];
            //var_dump($response);
    }
?>



<!DOCTYPE html>
<html lang="ar" dir="rtl">
  	

<head>
	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>more homes</title>
	<meta name="description" content="more homes">
	<meta name="author" content="more homes">
        <link rel="canonical" href="index.php" />
	
	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <!-- Fav and touch icons
	================================================== -->
    <link rel="shortcut icon" href="img/favicon.html">
 
    
	<!-- Custom styles 
	================================================== -->
	<link rel="stylesheet" href="css/responsiveslides.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/animate-custom.css"   type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/style.css"            type="text/css" media="screen">
<!--<link rel="stylesheet" href="js/docsupport/style.css">
  <link rel="stylesheet" href="js/docsupport/prism.css">-->
  <link rel="stylesheet" href="js/chosen.css">
	<!-- Media querys 
	================================================== -->
	<link href="css/media-queries.css" rel="stylesheet" media="screen">
	<!--[if IE 8 ]><link href="css/ie8.css" rel="stylesheet" media="screen"><![endif]-->
	
	<!-- Scripts Libs 
	================================================== -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements 
	================================================== -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
</head>

<style>
.bg-map{background:none !important;}
.copy{position:absolute;left:0;bottom:0;width:100%;}
.span12.curse-form-box.animated.delay1.flipInX{text-align:center;margin-top: 15% !important;}
.span12.curse-form-box.animated.delay1.flipInX p {
font-size:15px;
}
</style>
<body>

	 
	<!-- Header-->
    <header>
    	<!-- Top Bar -->
    	<div class="top">
        	<div class="container">
        
            	<a class="logo" href="index.html"><img src="img/logo.png" alt="logo"></a>

        <!-- Slider -->
            </div>
        </div>
        <!-- End Top Bar -->
        
        <div class="form-curse">
        	 <div class="bg-map animated fadeIn"></div>
        	<div class="container">
            	<div class="row-fluid">            		
            		<div class="span12 curse-form-box  animated delay1 flipInX">
            			
            			<div class="cont">
	          	<p>
				 شكرا لتسجيلك سيتم الأتصال بك فى اسرع وقت ممكن</p>
                </div>
            </div>

        <!-- End Slider -->	
    
    </header>
    <!-- End Header-->


    <!--Copyright-->
	 <div class="copy">
		 <section class="container">
  			<div class="row-fluid">				
	    		<div class="span12">
	    			<p>© جميع الحقوق محفوظة 2016 <a href="http://almoasherbiz.com/" target="_blank">more homes</a></p>
	    		</div>	
			</div>
		</section>
	</div>
    <!--end Copyright-->
 

  


  <script src="js/chosen.jquery.js" type="text/javascript"></script>
  <script src="js/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
	<!-- ======================= JQuery libs =========================== -->        
        
        <!-- Bootstrap.js-->
        <script src="js/bootstrap.js"></script>
    
        <!-- Video Responsive-->
        <script src="js/jquery.fitvids.min.js" type="text/javascript"></script>
    
        <!--Video Responsive-->
        <script src="js/jquery.placeholder.min.js" type="text/javascript"></script>
    
        <!-- Slider --> 
        <script type="text/javascript" src="js/responsiveslides.min.js"></script>
    
        <!-- Custom js -->
        <script src="js/jquery-func.js" type="text/javascript"></script>

	<!-- ======================= End JQuery libs =========================== --> 

  </body>

<!-- Mirrored from digital-essence.co/Projects/mba/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Mar 2016 13:15:53 GMT -->
</html>

