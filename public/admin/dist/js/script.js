$(document).ready(function() {

	var abc = 0; 

	$('body').on('change', '#ffff', function(){

		if (this.files && this.files[0]) {

            abc += 1; //increementing global variable by 1

            $("#images").prepend("<div id='abcd"+ abc +"' class='abcd'></div></div>");

            

			





			

			$("#images").append("<div class='file"+ abc +" fileimage'><input type='file' name='images[]' id='ffff' class='filein"+ abc +"' /></div>");

			   

            $(".file"+(abc-1)).hide();



			   var reader = new FileReader();

                reader.onload = imageIsLoaded;

                reader.readAsDataURL(this.files[0]);

			

			    

				$("#abcd"+ abc).append($("<img/>", {class: 'img', src: URL+'/images/pp.png', alt: 'delete'}).click(function() {

                $(this).parent().remove();

			    var btest=$(this).parent().attr("id").replace(/\D/g,'');

				$('.file'+ (btest-1)).remove();

	

				




                }));



			





	    function imageIsLoaded(e) {

		$('#abcd' + abc).css('background-image', 'url(' + e.target.result + ')');



    };



	

	

					}
					

	

	});

	

	

	

	var  token= '{{ csrf_token() }}';



$(".bbb").click(function() {	
	var num=$(this).attr("id").replace(/\D/g,'');
	var imgname=$("#delete_file"+num).val();  
var status = confirm("Are you sure you want to delete ?");  
  if(status==true)
  {
    $('.isla'+num).remove();

   $.ajax({

        data: {
			 _token: token
		},
        type: "GET",
        url: URL+"/adminpanel/deleteimg/"+imgname,
     success: function (msg) {
		 if(msg.success){
	  alert('Deleted');
		 }
    }
	
   });


 }   
});


	

	
	
	
	
	
	

$(".projbb").click(function() {	
	var num=$(this).attr("id").replace(/\D/g,'');
	var imgname=$("#delete_file"+num).val(); 
	var projid=$("#pro_id").val();  
	
var status = confirm("Are you sure you want to delete ?");  
  if(status==true)
  {
    $('.isla'+num).remove();

   $.ajax({

        data: {
			 _token: token
		},
        type: "GET",
        url: URL+"/adminpanel/deleteimg/"+imgname+"/"+projid,
     success: function (msg) {
		 if(msg.success){
	  alert('Deleted');
		 }
    }
	
   });


 }   
});	
	
	


$(".buildbb").click(function() {	
	var num=$(this).attr("id").replace(/\D/g,'');
	var imgname=$("#delete_file"+num).val(); 
	var projid=$("#pro_id").val();  
	
var status = confirm("Are you sure you want to delete ?");  
  if(status==true)
  {
    $('.isla'+num).remove();

   $.ajax({

        data: {
			 _token: token
		},
        type: "GET",
        url: "/adminpanel/deleteimgb/"+imgname+"/"+projid,
     success: function (msg) {
		 if(msg.success){
	  alert('Deleted');
		 }
    }
	
   });


 }   
});	
	
	
	if ( $( ".divimage" ).length ) {
		$("#uploadslider").hide();	

	}

$(".slidbb").click(function() {	
	var imgname=$("#delete_file").val(); 
	var sliderid=$("#slider_id").val();  
	
var status = confirm("Are you sure you want to delete ?");  
  if(status==true)
  {
    $('.divimage').remove();
	$("#uploadslider").show('slow');	

   $.ajax({

        data: {
			 _token: token
		},
        type: "GET",
        url: "/adminpanel/deleteimgsli/"+imgname+"/"+sliderid,
     success: function (msg) {
		 if(msg.success){
	  alert('Deleted');

		 }
    }
	
   });


 }   
});	

	
	


	
	
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $('.inputs').append('<br><div><input class="form-control" placeholder="مميزات المشروع" type="text" name="chk1[]"/><a href="#" class="remove_field">Remove</a></div><br>'); //add input box
        }
return false;
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });

$('input[name="nameurl"]').on('blur', function(e) {
        var nameurl = $('#checkk').val();
		var dataString = 'nameurl='+nameurl+'&_token='+token; 


        $.ajax({
            type: "POST",
            url: '/checkemail',
			data: dataString,
			dataType: "json",

            success: function(res) {
                if(res.exists){
                    alert('true');
                }else{
                    alert('false');
                }
            },
            error: function (jqXHR, exception) {

            }
        });
	
		});
	


	
	$(".offerx").click(function() {	
	var num=$(this).attr("id").replace(/\D/g,'');
	var imgname=$("#delete_file"+num).val(); 
	var offerid=$("#offer_id").val();  
	
var status = confirm("Are you sure you want to delete ?");  
  if(status==true)
  {
    $('.isla'+num).remove();

   $.ajax({

        data: {
			 _token: token
		},
        type: "GET",
        url: "/adminpanel/deleteimgo/"+imgname+"/"+offerid,
     success: function (msg) {
		 if(msg.success){
	  alert('Deleted');
		 }
    }	
   });


 }   
});	

	
	
	



	$(".newsx").click(function() {	
	var num=$(this).attr("id").replace(/\D/g,'');
	var imgname=$("#delete_file"+num).val(); 
	var newsid=$("#news_id").val();  
	
var status = confirm("Are you sure you want to delete ?");  
  if(status==true)
  {
    $('.isla'+num).remove();

   $.ajax({
        data: {
			 _token: token
		},
        type: "GET",
        url: "/adminpanel/deleteimgn/"+imgname+"/"+newsid,
     success: function (msg) {
		 if(msg.success){
	  alert('Deleted');
		 }
    }	
   });


 }   
});		
	

	

	

	});