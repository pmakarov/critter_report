<?php
echo $this -> Html -> css('custom-theme/jquery-ui-1.10.0.custom.css');
echo $this -> Html -> css('datepicker.css');
echo $this -> Html -> css('bootstrap-timepicker.css');
echo $this -> Html -> css('select2.css');
echo $this -> Html -> css('timepicker.css');

echo $this -> Html -> script('jquery-ui-1.10.0.custom.min.js');
echo $this -> Html -> script('bootstrap-typeahead.js');
echo $this -> Html -> script('select2.js');
echo $this -> Html -> script('bootstrap-datepicker.js');
echo $this -> Html -> script('bootstrap-timepicker.js');
?>
<div class="reports form">
<div class="wrapper">
<div class="container">
 <form class="cmxform" id="reportForm" method="post" action="">
  <div class="row-fluid">
    <div class="span12">
      <div class="well" id="formContainer">
        <div id="mainForm"> 
              <div id="warnBox" class="alert alert-block">
			    <button type="button" onclick="javascript:dismissWarning();" class="close" data-dismiss="alert">&times;</button>
			    <p>
			    <h4>Warning!</h4>&nbsp;<br/>
			   	</p>
			    <div id="warningTextContainer"></div>
			    <div><a href="javascript:dismissWarning();" class="btn">Dismiss</a></div>      
			  </div>
			   <div id="errorBox" class="alert alert-error">
			    
			    <h4>Error!</h4>
			    <div id="errorTextContainer"></div>     
			   
			   </div>
			   
          <!-- #first_step -->
          <div id="first_step" >
         
            <legend>My Dashboard:</legend>
            <div class="row-fluid">
               <div class="span6">
                <div class="control-group">
                  <label class="control-label">Room:</label>
                  <div class="controls">
				  	<?php echo $this->Form->input('room_id', array('empty'=>'Choose One', 'required'=>'true', 'type'=>'select', 'style'=>'width:300px','type'=>'select', 'label'=>false, 'options'=> $rooms));?>
                  </div>
                </div></div>
              <!--/span-->
				<div class="span6">
                <div class="control-group">
                  <label class="control-label">Todays Date:</label>
                  <div class="controls">
                    <div data-date-format="mm/dd/yy" id="datepicker" class="input-append date">
                      <input type="text" placeholder="mm/dd/yy" id="datepicker" value="" required="true">
                      <span class="add-on"><i class="icon-th"></i></span> </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/row -->
            
              
 <div class="row-fluid" id="templateRow">
 <div class="span12 well" id="templateContainer">
	 <!-- <table class="table table-striped">
	 <tr><td>id</td></tr>
	<?php foreach ($reports as $report): ?>
	 <tr><td><?php echo h($report['Report']['id']); ?></td></tr>
	 <?php endforeach; ?>
	 </table> -->
 </div>
 </div>
<div class="row-fluid" id="reportGridRow">
<div class="span12 well" id="reportGridContainer" >
	<h2>Reports</h2>
	<table id="reportTable" cellpadding="0" cellspacing="0" class="table table-striped">
	</table>
	
</div>
</div>
           </div>
             
            <!--  <div class="row-fluid">
              	<div class="span12 pull-right">
              	<div class="pull-right"><a class="btn" id="saveBtn" role="button" ><i class="icon-list-alt"></i>&nbsp;Save</a> <a id="submitBtn" class="btn btn-success" role="button" href="javascript:doSubmit();">Submit »</a></div>
              	</div>
              </div>-->
             
            </div>
          </div>
          </div>
          </form><!--/mainForm--> 
        </div><!--/end container Div -->
      </div><!--/end Wrapper Div -->
      
      <div id="spinner" class="spinner" style="display:none;">
		<img id="img-spinner" src="../img/spinner.gif" alt="Loading"/>
		Loading...
	  </div>


<script type="text/javascript">
//initialize variables from PHPs
var userId  = "<?php echo $userId; ?>";
var userLocation = "<?php echo $userLocation; ?>";



var warn = true;
var isValid = false;
var _STATUS = "DRAFT"; //DRAFT / SUBMITTED / SENT
var _REPORT_ID = "";


	$(document).ready(function(){
		
						
					
						$("#saveBtn").click(function(){
							doSave();
							
						});

			        	  var d = new Date();

			        	  var month = d.getMonth()+1;
			        	  var day = d.getDate();

			        	  var output = ((''+month).length<2 ? '0' : '') + month  + '/'+ 
			        	   ((''+day).length<2 ? '0' : '') + day +
			        	  	'/' + d.getFullYear(); 
			        	 
			        	 
			        	 $("#warnBox").hide();
			        	 $("#errorBox").hide();
			        	 $('#datepicker').datepicker('setValue', d);
			        	
			        	$("#childrenList").select2({ 
			        	    placeholder: "Select a Child"
			        		});
			        	
			        	$("#room_id").select2({ 
			        		 placeholder: "Select a Personality"
			        		}).select2(); 
			        	$("#room_id").change(function(){
							
							//console.log($("#room_id option:selected").text());
							setRoom($("#room_id option:selected").text());
						});
			        	
			        	
			        	
			        	 $('#timepicker1').timepicker({
			        	     //defaultTime: false
			        	 });
			        	
			        	
	
						console.log("curernt user: " + userId);
						//alert(userLocation);
						if(userLocation === "false"){
							
							$("#s2id_room_id").popover({
								'content': " Select a room so we can setup your reports for the day.",
								'title' : "<b>Hello there!</b>",
								'html' : true
							});
							$("#s2id_room_id").popover('show');
								
						}
						else
						{
							//console.log("durrr... " + userLocation);
							
							switch(userLocation)
							{
								case "Blue":
									$("#room_id").select2("val", 1);
									break;
									
								case "Purple":
									$("#room_id").select2("val", 2);
									break;
									
								case "Yellow":
									$("#room_id").select2("val", 3);
									break;
									
								default:
									break;
							}
							
							
							//console.log("Selected value is: "+ $("#room_id option:selected").text()); 
							$("#room_id").select2({ 
			        	   disabled:true,
			        		}).select2("disable"); 
			        		
			        		getReportsByRoom();
							
						}
	 	
	 	$("tr").not(':first').hover(
			function () {
			
				$(this).addClass("highlight");
			}, 
			function () {
				$(this).removeClass("highlight");
			}
		);
						

	});
	
	function addPottyEvent(evt){
	   // console.log("new potty event @"+ $("#timepicker3").val());
	   var msg = "";
	   
	   var timeMsg = "@" + $("#timepicker3").val();
	   msg += timeMsg;
	   
	    var triedMsg  = "";
	    if($("#triedBox").is(":checked")){
			triedMsg = "I tried to go Potty";
			msg+=" " + triedMsg;
	    }
	    
	    var wetMsg = "";
	    if($("#wetBox").is(":checked")){
			wetMsg = "my diaper was wet";
			msg+= " " +wetMsg;
	    }
	    else if($("#dryBox").is(":checked")){
		 	var dryMsg = "";
		    
				dryMsg = "my diaper was checked but I was dry";
				msg += " " + dryMsg;
		    
	    }
	   
	    
	    var peeMsg = "";
	    if($("#peeBox").is(":checked") && $("#diapersBox").is(":checked")){
			peeMsg = "I had done a pee";
			msg += " " + peeMsg;
	    }
	    else if($("#peeBox").is(":checked") && !$("#diapersBox").is(":checked")){
			peeMsg = "I went pee";
			msg += " " + peeMsg;
	    }
	    
	    var bmMsg = "";
	    if($("#pooBox").is(":checked") && $("#diapersBox").is(":checked")){
			bmMsg = "I had done a BM";
			msg += " " + bmMsg;
	    }
	    else if ($("#pooBox").is(":checked") && !$("#diapersBox").is(":checked")){
			bmMsg = "I made a  BM";
			msg += " " + bmMsg;
	    }
	    
	    var accidentMsg = "";
	    if($("#accidentBox").is(":checked")){
		
			accidentMsg = "it was an accident";
			msg += " " +  accidentMsg;
	    }
	    
	    var pottyEventItem = $('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Potty Event- </strong>'+msg+'</div>');
		pottyEventItem.appendTo("#pottyEventTable");
		
		//reset potty event form:
		$("#pottyTrainingTable input").attr('checked', false);
	}
	function doSave(){
		_STATUS = "DRAFT";
	    submitFormData();
	}
	function doSubmit()	{
		_STATUS = "SUBMITTED";
		validateForm();
	
	}
	function validateForm() {
	   
	    if(warn) {
	    	doCheckWarning();
	    }
	  
	   $("#errorTextContainer").html("");
	   var hasError = false;
	   hasError = validateItem();
	  
	   	if(hasError===false){
			$("#errorTextContainer").html("");
			$("#errorBox").hide();
			
			if(!warn){
				submitFormData();
			}
		}
	   else{
		 	$("#errorBox").show();
		}
	   	 $("html, body").animate({ scrollTop: 0 }, "slow");
	 
	}
	
	function submitFormData()
	{
	 
	 	$("#spinner").show();
	 	$("#submitBtn").addClass("disabled");
	 	$("#saveBtn").addClass("disabled");
	 	/*$("#submitBtn").click(function(event){
	 	   event.preventDefault(); 
	 	});*/
	 	
	 	//var jsonObjects = [{id:1, name:"amit"}, {id:2, name:"ankit"},{id:3, name:"atin"},{id:1, name:"puneet"}];
	 	/* 
	 	jQuery.ajax({
	 	          url: <Url of the action>,
	 	          type: "POST",
	 	          data: {students: JSON.stringify(jsonObjects) },
	 	          dataType: "json",
	 	          beforeSend: function(x) {
	 	            if (x && x.overrideMimeType) {
	 	              x.overrideMimeType("application/j-son;charset=UTF-8");
	 	            }
	 	          },
	 	          success: function(result) {
	 	 	     //Write your code here
	 	 	     alert("success motha flower");
	 	          }
	 	});*/
	 	
	 	 //$.get("http://localhost/critter/critter.php", function(data){cb(data)});
	 	 //$.get('https://pawsbk.ncr.disa.mil/DDOrderEntry-tsr/DDOELookup?id=Agency', function(data){cb(data)});
	 	// console.log("Date: " + $("#datepicker").data('date'));
	 	
	 	 /*console.log("Child: " + $("#childrenList option:selected").text());
	 	 console.log("Teachers: " + $("#teachersList option:selected").text());
	 	 console.log($("#teachersList").val());
	 	 console.log("Needed items: " + $("#neededItemsList option:selected").val());
	 	 console.log($("#personalityList").val());
	 	 console.log($("#timepicker1").val());
	 	 console.log($("#timepicker2").val());
	 	 console.log($("#notSleepy").is(':checked'));
	 	 console.log($("#gymActivity").is(':checked'));
		 console.log($("#outsideActivity").is(':checked'));
		 console.log($("#artsActivity").is(':checked'));
		 console.log($("#otherActivity").is(':checked'));
		 console.log($("#otherTextInput").val());
		 console.log($('#slider').slider("option", "value"));
		 console.log($('#slider2').slider("option", "value"));
		 console.log($('#slider3').slider("option", "value"));*/
		 
		 //get teachers list from dropdown
		 var tl = $("#teachersList option:selected").map(function(){return this.text});
		 
		 //get daily activities items
		 var dl = $("#activityCheckboxesOneDiv label input:checked").map(function(){return this.value});
		 activityString = dl.get().join("|");
		 if($("#otherActivity").is(':checked')){
		     
		     var otherActString = $("#otherTextInput").val();
		     activityString = (activityString==="") ? otherActString : activityString+ "|"+otherActString;
		 }
		 
		 //get needed items
		 var nl = $("#neededItemsList option:selected").map(function(){return this.text});
		 
		 var al = $("#personalityList option:selected").map(function(){return this.text});
		 console.log("attitude List: " + al.get().join("|"));
		 
		 //get sleep status
		 var sleepMessage = "";
		 if(!$("#notSleepy").is(':checked')){
		     sleepMessage = "I slept from: " + $("#timepicker1").val() + " to: "+ $("#timepicker2").val()+ ".";
		 }
		 else sleepMessage = "I was not sleepy.";
		
		 console.log("sleep message: " + sleepMessage);
		
		
		 var creatureReport = {
		 	 "id" : _REPORT_ID,
		 	 "userId" : "999",
			 "status" : _STATUS,
			 "student" : $("#childrenList option:selected").val(),
			 "date" : $("#datepicker").data('date'),
			 "teachers" : tl.get().join("|"),
			 "dailyActivity" : activityString,
			 "neededItems" : nl.get().join("|"),
			 "attitudes" : al.get().join("|"),
			 "sleepMessage" : sleepMessage,
			 "percentageBreakfastComplete" : $('#slider').slider("option", "value"),
		 	 "percentageLunchComplete" : $('#slider2').slider("option", "value"),
		 	 "percentageSnackComplete" : $('#slider3').slider("option", "value"),
		 	 "pottyEvents" : $("#pottyEventTable div").text().split("×").join("|"),
		 	 "teacherComments" : $("#teacherComments").val()
			 
		 }
	 	 	 	 
	 	 	 //var URL = (_REPORT_ID === "") ? '../reports/ajax_function' : '../reports/edit/' + _REPORT_ID;
	 	 $.ajax({
	 	        type: "POST",
	 	        async: false,
	 	        data: JSON.stringify(creatureReport),
	 	        dataType: "JSON",
	 	        url: '../reports/ajax_function',
	 	        beforeSend: function(x) {
	 	            if (x && x.overrideMimeType) {
	 	              x.overrideMimeType("application/j-son;charset=UTF-8");
	 	            }
	 	        },
	 	        success: function(result) {
	 	 	   		//TODO: Reset form, 
	 	 	   		console.log("Report id:"+ result.id +" for : " + result.student + " was successfully submitted by: " + result.userId + " on: " + result.date);
	 	 	   		_REPORT_ID = result.id;
	 	 	   		if(!_STATUS === "DRAFT"){
	 	 	   			resetForm();
	 	 	   		}
	 	 	   		else{
	 	 	   			$("#submitBtn").removeClass("disabled");
	 	 				$("#saveBtn").removeClass("disabled");
	 	 	   		}
	 	 	   		$("#spinner").hide();
	 	          },
	 	       error: function (request, status, error) {
	 		   		alert(status + " : " + error);
	 		        //alert(request.responseText);
	 		   		if(!_STATUS === "DRAFT"){
	 	 	   			resetForm();
	 	 	   		}
	 	 	   			$("#spinner").hide();
	 		    }
	 	    });
	}
	function resetForm(){
	    /*console.log("Child: " + $("#childrenList option:selected").text());
	 	 console.log("Teachers: " + $("#teachersList option:selected").text());
	 	 console.log($("#teachersList").val());
	 	 console.log("Needed items: " + $("#neededItemsList option:selected").val());
	 	 console.log($("#personalityList").val());
	 	 console.log($("#timepicker1").val());
	 	 console.log($("#timepicker2").val());
	 	 console.log($("#notSleepy").is(':checked'));
	 	 console.log($("#gymActivity").is(':checked'));
		 console.log($("#outsideActivity").is(':checked'));
		 console.log($("#artsActivity").is(':checked'));
		 console.log($("#otherActivity").is(':checked'));
		 console.log($("#otherTextInput").val());
		 console.log($('#slider').slider("option", "value"));
		 console.log($('#slider2').slider("option", "value"));
		 console.log($('#slider3').slider("option", "value"));*/
		
		 $("#childrenList").select2("data", null);
		 $("#teachersList").select2("data", null);
		 $("#personalityList").select2("data", null);
		 $("#neededItemsList").select2("data", null);
		 $("#timepicker1").val("");
		 $("#timepicker1").timepicker('setTime', 'current');
		 $("#timepicker2").val("");
		 $("#timepicker2").timepicker('setTime', 'current');
		 $("#timepicker3").val("");
		 $("#timepicker3").timepicker('setTime', 'current');
		 $("#notSleepy").attr("checked", false);
		 $("#gymActivity").attr("checked", false);
		 $("#outsideActivity").attr("checked", false);
		 $("#artsActivity").attr("checked", false);
		 $("#otherActivity").attr("checked", false);
		 $("#otherTextInput").val("");
		
		 $("#slider").slider("value", $("#slider").slider("option", "min") );
		 $("#slider2").slider("value", $("#slider2").slider("option", "min") );
		 $("#slider3").slider("value", $("#slider3").slider("option", "min") );
		 
		 $("#pottyEventTable").html("");
		 
		
	}
	function cb(data){
	    
	    alert( data.user.name);
	   // myTweets = dataToObj;
	    //document.write(myTweets.user.name + " says:<br/>\"" + myTweets.text + "\"");
	}
	function validateItem(){
	    var hasError= false;
	    $('*[required="true"]').each(function(i, el){
	    	
	    switch($(el).get(0).tagName){
	    	case "LABEL":
	    	    if($(el).attr('id') === "sleepy")
			    {
	    			if($("#timepicker1").val()==="" || ($("#timepicker1").val()=== $("#timepicker2").val()) && !$("#notSleepy").is(":checked")){
		    			var msg = "Error: You must indicate when a child took a nap or else indicate that he/she did not."
					    	
					    var p = $('<p>'+msg+'</p>');
					    p.appendTo("#errorTextContainer");  
					    $(el).css('border', '1px solid #f00');
					    hasError = true;
	    			}
	    			else{
	    			    $(el).css('border', 'none');
	    			}
	    			    
	    			
			    		
			    }
	    	    else
	    		{
	    		    		
			    	if(!didActivity()){
				    	var msg = "Error: You did not select an activity."
				    	
					    var p = $('<p>'+msg+'</p>');
					    p.appendTo("#errorTextContainer");  
					    $(el).css('border', '1px solid #f00');
					    hasError = true;
			    	}
			    	else if($("#otherActivity").is(":checked") && $("#otherTextInput").val().trim()===""){
						var msg = "Error: You did not enter any description for 'other' activity."
					    var p = $('<p>'+msg+'</p>');
					    p.appendTo("#errorTextContainer");  
					    $(el).css('border', '1px solid #f00');
					    hasError = true;
				    }
			    	else{
			    		$(el).css('border', 'none');
			    	}
			    	console.log($("#otherActivity").is(":checked"));
	    		}
			break;
			
		    case "SELECT":
			var select = $(el).attr('id');
			//if(select == "childrenList" || select == "neededItemsList" || select == "teachersList" || select == "personalityList")
			//handleSelect2ComboboxValidation(select);
			var tmp = $("#" + select).select2("data");
			
			if(select == "childrenList" && (tmp == null || tmp.length == 0))
			{
			   
			    var msg = "Error: You did not select a child."
			    var p = $('<p>'+msg+'</p>');
			    p.appendTo("#errorTextContainer");  
			    $("#s2id_"+select).css('border', '1px solid #f00');
			    hasError = true;
			      
			}
			else if(select == "teachersList" && (tmp == null || tmp.length == 0))
			{
			    var msg = "Error: You did not select a teacher."
			    var p = $('<p>'+msg+'</p>');
			    p.appendTo("#errorTextContainer");  
			    $("#s2id_"+select).css('border', '1px solid #f00');
			    hasError = true;
			      
			}
			
			else if(select == "personalityList" && (tmp == null || tmp.length == 0))
			{
			    var msg = "Error: You did not select a personality."
			    var p = $('<p>'+msg+'</p>');
			    p.appendTo("#errorTextContainer");  
			    $("#s2id_"+select).css('border', '1px solid #f00');
			    hasError = true;
			      
			}
			else{
				$("#s2id_"+select).css('border', 'none');
			}
			break;
			
		    case "TEXTAREA":
				//$(el).css('border', '1px solid #f00');
				if($(el).val().trim()==="")
				{
				    var msg = "Error: You did not enter teacher comments."
					var p = $('<p>'+msg+'</p>');
					p.appendTo("#errorTextContainer"); 
					$(el).css('border', '1px solid #f00');
					hasError = true;
				}
				else{
				    $(el).css('border', 'none');
				}
			break;
			
		    case "INPUT":
			var input = $(el).attr('id');
			//$(el).css('border', '1px solid #f00');
			if($(el).val().trim()==="" && input==="")
			{
			    var msg = "Error: You did not enter teacher comments."
				var p = $('<p>'+msg+'</p>');
				p.appendTo("#errorTextContainer"); 
				$(el).css('border', '1px solid #f00');
				hasError = true;
			}
			else{
			    $(el).css('border', 'none');
			}
		break;
			
		   
		
			default:
		    break
	    }
	    
	    });
	   
	    return hasError;
	}
	function didActivity(){
	    
	    /*console.log($("#gymActivity").is(':checked'));
	    console.log($("#outsideActivity").is(':checked'));
	    console.log($("#artsActivity").is(':checked'));
	    console.log($("#otherActivity").is(':checked'));
	    console.log($("#otherTextInput").val());*/
	    if($("#gymActivity").is(':checked') || $("#outsideActivity").is(':checked') || $("#artsActivity").is(':checked') || $("#otherActivity").is(':checked') )
	    return true;
	    else return false;
	}
	function handleSelect2ComboboxValidation(select)
	{
	    
	    var tmp = $("#" + select).select2("data");
	    /*for(var i=0; i < tmp.length; i++)
		{
			console.log(tmp[i].text);
		}*/
		if(tmp == null || tmp.length == 0)
		{
		    switch(select)
		    {
			    case "childrenList":
				$("#s2id_"+select).css('border', '1px solid #f00');
				//$("#s2id_"+select).attr('title', "Please select a child from the dropdown");
				$("#s2id_"+select).alert();
				/*$("#s2id_"+select).popover({
				    html: "true",
				    title: "<strong>Select a Child</strong>",
				    content: "Please select a child from the dropdown",
					trigger: "hover"    
				});
				$("#s2id_"+select).click(function(){
				    $(this).popover('hide');
				    $(this).popover('disable');
				});*/
				break;
				
			    default:
				    break;
		    }
	    	
		}
	}
	
	function doCheckWarning(){
	  //clear warn/error headers:
		  $("#warningTextContainer").html("");
		  var hasWarning = false;

		 
		  
		  var val = $('#slider').slider("option", "value");
		  if(val===0)
		  {
		      var msg = "Warning: No breakfast eaten?"
		      var p = $('<p>'+msg+'</p>');
		  	  p.appendTo("#warningTextContainer");  
		      hasWarning = true;
		  }
		  
		  var val2 = $('#slider2').slider("option", "value");
		  if(val2===0)
		  {
		      var msg = "Warning: No lunch eaten?"
		      var p = $('<p>'+msg+'</p>');
		  	  p.appendTo("#warningTextContainer");  
		      hasWarning = true;
		  }
		  
		  var val3 = $('#slider3').slider("option", "value");
		  if(val3===0)
		  {
		      var msg = "Warning: No snack eaten?"
		      var p = $('<p>'+msg+'</p>');
		  	  p.appendTo("#warningTextContainer");  
		      hasWarning = true;
		  }
		  

		  if($("#pottyEventTable").children().size() === 0){
		      var msg = "Warning: You did not list any potty events for today."
			     var p = $('<p>'+msg+'</p>');
			     p.appendTo("#warningTextContainer"); 
		      hasWarning = true;
		  }
		  
		  /* Do time check
		  *
		  * uh...  would much rather
		  * just convert time to 24 hours
		  */
		  var time1 = $("#timepicker1").val();
		  time1 = convertToMeridian(time1);
		  var time2 = $("#timepicker2").val();
		  time2 = convertToMeridian(time2);
		  var ind = compareTime(time1,time2);//returns -1 if A<B, 0 if A==B, and 1 if A>B
		 // console.log("ind: " + ind);
		 if(ind>0){
		     //console.log("gotta be something wrong, time is long");
		     var msg = "Warning: The start and end time of the nap appears to be quite long."
		     var p = $('<p>'+msg+'</p>');
		     p.appendTo("#warningTextContainer");  
		     hasWarning = true;
		 }
		
		  if(hasWarning===false)
		  {
		      $("#warningTextContainer").html("");
		      $("#warnBox").hide();
		      warn = false;
		  }
		  else{
		 	$("#warnBox").show();
		  }
	}
	function convertToMeridian(time){
	     
		  var dayPeriod1 = time.split(" ")[1];
		  var hour1 = parseInt(time.split(":")[0]);
		  var min1 = parseInt(time.split(":")[1]);
		  
		
		  if(dayPeriod1==="PM" && hour1 !== 12){
		      hour1+=12;
		  }
		  else if(dayPeriod1==="AM" && hour1 === 12){
		  	hour1 = 0;
		  }
		  //console.log(hour1+":"+min1);
		  return hour1+":"+min1;  
	}
	function compareTime(A,B)
	{
	    var tmpA = A.split(":");
	    var hoursA = parseInt(tmpA[0]);
	    var minsA = parseInt(tmpA[1]);
	    
	    var tmpB = B.split(":");
	    var hoursB = parseInt(tmpB[0]);
	    var minsB = parseInt(tmpB[1]);
	    if(hoursA > hoursB)
		{
			return 1;
		}
	    else if(hoursA < hoursB)
		{
			return -1;
		}
	    else{
			if(minsA === minsB){
				return 0;
			}
			else if(minsA > minsB){
					return 1;
			}
			else if(minsA < minsB){
			    return -1;
			}
			
	    }
		
	}
	
function dismissWarning(){
	console.log("dismissWarning called");
	$("#warningTextContainer").html("");
	$("#warnBox").hide();
	warn = false;
}

//  ========== 
//  = Set Room = 
//  ========== 
function setRoom(room){
	//console.log(room);
	var ul = (room != null || room != 'Choose One') ? room : "Blue";
	/*switch(ul)
	{
		case "Blue":
		ul = 1;
		break;
		
		case "Purple":
		ul = 2;
		break;
		
		case "Yellow":
		ul = 3;
		break;
		
		default:
		break;
	}*/
	var msg = {
		"location" : ul
	};
	 $.ajax({
	 	type: "POST",
	 	async: false,
	 	data: JSON.stringify(msg),
	 	dataType: "JSON",
	 	url: '../users/set_location',
	 	beforeSend: function(x) {
	 		if (x && x.overrideMimeType) {
	 			x.overrideMimeType("application/j-son;charset=UTF-8");
	 		}
	 	},
	 	success: function(result) {
	 		console.log("location: was successfully submitted by: " + result.userId);
			userLocation = room;
			console.log(userLocation + " after set_location");
			/*$("#room_id").select2({ 
				disabled:true,
				}).select2("disable"); */
			$("#room_id").popover("destroy");	
	 	 	$("#spinner").hide();
			
			//get report list by room filter by today's date
			getReportsByRoom();
		},
		error: function (request, status, error) {
	 		   		alert(status + " : " + error);
					$("#spinner").hide();
	 		    }
	 	    });
}

function getReportsByRoom(date){
	$("#spinner").show();
	
	var d = new Date();
	var month = d.getMonth()+1;
	var day = d.getDate();
	var hour = d.getHours();
	var minute = d.getMinutes();
	var second = d.getSeconds();
	
	var output = d.getFullYear() + '-' +
	    ((''+month).length<2 ? '0' : '') + month + '-' +
	    ((''+day).length<2 ? '0' : '') + day;
	    
	    /* full date string to match PHP
	    var output = d.getFullYear() + '-' +
	    ((''+month).length<2 ? '0' : '') + month + '-' +
	    ((''+day).length<2 ? '0' : '') + day + ' ' +
	    ((''+hour).length<2 ? '0' :'') + hour + ':' +
	    ((''+minute).length<2 ? '0' :'') + minute + ':' +
	    ((''+second).length<2 ? '0' :'') + second; */
	    
	    
	    console.log(userLocation);
	    var hack = 0;
	    switch(userLocation){
	    	case "Blue":
	    	hack = 1;
	    	break;
	    	
	    	case "Purple":
	    	hack = 2;
	    	break;
	    	
	    	case "Yellow":
	    	hack = 3;
	    	break;
	    	
	    	default:
	    	break;
	    }
	var ul = (date != null) ? date : output ;
	
	var msg = {
		"date" : ul,
		"room" : hack
	};
	
	 console.log(msg["room"] + " is teh value for room after local conversion");
	 $.ajax({
			  type: "POST",
			  async: false,
			  data: JSON.stringify(msg),
			  dataType: "JSON",
			  url: '../reports/get_reports',
			  beforeSend: function(x) {
				  if (x && x.overrideMimeType) {
					  x.overrideMimeType("application/j-son;charset=UTF-8");
				  }
			  },
			  success: function(result) {
				  console.log("report list generated: was successfully generated: " + result.success);
				//console.log(result.reports)
				//console.log(result.reports.count);
				 obj = $.parseJSON(result.reports);
				//console.log(obj.length);
				buildReportGrid(obj);
				 $("#spinner").hide();
				
			 },
			 error: function (request, status, error) {
							 alert(status + " : " + error);
						 $("#spinner").hide();
					  }
				  });
		
	 
}

function buildReportGrid(reports){
	
	$("#reportTable").html("");
	$("#reportTable").append("<tr><td><strong>Name</strong></td><td><strong>Status</strong></td><td><strong class='pull-right'></strong></td><td></td></tr>");
	$.each(reports, function(i, item) {
    	//console.log(reports[i].status);
    	$("#reportTable").append("<tr id="+reports[i].id+"><td>" + reports[i].child_name + "</td><td>" + reports[i].status +"</td><td><div class='pull-right'><!-- <a class='btn btn-danger btn-mini' href='javascript:clearReport("+reports[i].id+")'>clear <span class='icon-warning-sign'></span></a> &nbsp; &nbsp;<a class='' href='../reports/edit/"+reports[i].id+"'></a>--></div></td><td><span class='icon-chevron-right pull-right'></span></td></tr>");
	});
	$("#reportTable tr").click(function(evt){
		console.log(this.id);
		window.location.href = "../reports/edit/" + this.id;
	});
	
	$("tr").not(':first').hover(
			function () {
			
				$(this).addClass("highlight");
			}, 
			function () {
				$(this).removeClass("highlight");
			}
		);
}

function clearReport(id){
	$("#spinner").show();
	
	if(id==null || id === ""){
		return;
	}
	
	
	var msg = {
		"id" : ul
	};
	
	 $.ajax({
			  type: "POST",
			  async: false,
			  data: JSON.stringify(msg),
			  dataType: "JSON",
			  url: '../reports/clear_reports',
			  beforeSend: function(x) {
				  if (x && x.overrideMimeType) {
					  x.overrideMimeType("application/j-son;charset=UTF-8");
				  }
			  },
			  success: function(result) {
				  console.log("report " + id+ " as successfully cleared: " + result.success);
			
				 $("#spinner").hide();
			
				
			 },
			 error: function (request, status, error) {
							 alert(status + " : " + error);
						 $("#spinner").hide();
					  }
				  });
		
	 
}

	</script>
</div>
