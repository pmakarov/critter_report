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

  <div class="row-fluid">
    <div class="span12">
      <div class="critterWell" id="formContainer">
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
				<div class="span6 pull-right">
                <div class="control-group pull-right">
                  <label class="control-label">Today's Date:</label>
                  <div class="controls">
                    <div data-date-format="mm/dd/yy" id="datepicker" class="input-append date">
                      <input type="text"  placeholder="mm/dd/yy" id="datepicker" value="" required="true">
                      <span class="add-on"><i class="icon-th"></i></span> </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/row -->
            
              
 <!-- <div class="row-fluid" id="templateRow">
 <div class="span12 well pull-right" id="templateContainer">
	<span class="label">Default</span><span class="label label-success">Success</span><span class="label label-warning">Warning</span><span class="label label-important">Important</span><span class="label label-info">Info</span>
 </div>
 </div> -->
<div class="row-fluid" id="reportGridRow">
<div class="span12 well" id="reportGridContainer" >
	    <div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                	
                  <a class="brand" data-toggle="dropdown" href="#">Reports</a>
				 
              	<form class="navbar-search pull-right">
			      		<input type="text" placeholder="Search" class="search-query">
			      	</form>
             
                </div>
              </div><!-- /navbar-inner -->
        </div>
	<div class="row-fluid">
		<div id="actionBar" class="nav" >
               <div style="margin: 0;" class="btn-toolbar">
               
              <div id="actionButtons" class="btn-group pull-right">
                <button id="tagBtn" class="btn"><span class="icon-tag"></span></button>
                <button id="clearBtn" class="btn"><span class="icon-minus-sign"></span></button>
                <button id="deleteBtn" class="btn"><span class="icon-trash"></span></button>
                <button id="printBtn" class="btn" data-toggle="tooltip"  title="Print" formtarget="_blank" ><span class="icon-print"></span></button>
                <button id="emailBtn" class="btn" data-toggle="tooltip"  title="Email"><span class="icon-envelope"></span></button>
              </div>
               <div class="btn-group">
               	<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<span class="icon-check">&nbsp;</span>
					<span class="caret"></span>
				</a>
					<ul class="dropdown-menu">
						<li><a href="javascript:selectAll()">All</a></li>
						<li><a href="javascript:deSelectAll()">None</a></li>
						<li><a href="#">Absent</a></li>
					   	<li><a href="#">Draft</a></li>
					   	<li><a href="#">Finalized</a></li>
					   	<li><a href="#">Sent</a></li>
					</ul>
              </div>
               <div class="btn-group">
                 <button id="refreshReports" class="btn" data-toggle="tooltip"  title="Refresh"><span class="icon-refresh"></span></button>
              </div>
              
            </div>
		</div>
	</div>
	<div class="row-fluid">
	<table id="reportTable" cellpadding="0" cellspacing="0" class="table table-striped">
	</table>
	</div>
</div>
</div>
           </div>
            </div>
          </div>
          </div>
         
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
var action = "";


var warn = true;
var isValid = false;
var _STATUS = "DRAFT"; //DRAFT / SUBMITTED / SENT
var _REPORT_ID = "";


	$(document).ready(function(){
		
						
					
					
			        	  var d = new Date();

			        	  var month = d.getMonth()+1;
			        	  var day = d.getDate();

			        	  var output = ((''+month).length<2 ? '0' : '') + month  + '/'+ 
			        	   ((''+day).length<2 ? '0' : '') + day +
			        	  	'/' + d.getFullYear(); 
			        	 
			        	 
			        	 $("#warnBox").hide();
			        	 $("#errorBox").hide();
			        	 $('#datepicker').datepicker('setValue', d);
			        	
			        	
			        	
			        	$("#room_id").select2({ 
			        		 placeholder: "Select a Personality"
			        		}).select2(); 
			        	$("#room_id").change(function(){
							
							//console.log($("#room_id option:selected").text());
							setRoom($("#room_id option:selected").text());
						});
			        	
			        	
			        	
			        	$("#refreshReports").click(function(){
			        		
			        		getReportsByRoom();
			        	});
			        
			        	$("#refreshReports").tooltip({
			        	
			        	});
	
						$("#printBtn").click(function(){
							
							doPrintSelected();
						});
						$("#printBtn").tooltip();
						
						$("#emailBtn").click(function(){
							
							doEmailSelected();
						});
						$("#emailBtn").tooltip();
						
	
						//console.log("curernt user: " + userId);
						if(userId==="" ){
							window.location.href = "../";
						}
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
	
	
	
function dismissWarning(){
	//console.log("dismissWarning called");
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
	 		//console.log("location: was successfully submitted by: " + result.userId);
			userLocation = room;
			//console.log(userLocation + " after set_location");
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
	   //console.log(userLocation);
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
	
	// console.log(msg["room"] + " is teh value for room after local conversion");
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
				 // console.log("report list generated: was successfully generated: " + result.success);
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
	$("#reportTable").append("<tr><th></th><td><strong>Name</strong></td><td><strong>Status</strong></td><td><strong class='pull-right'></strong></td><td></td></tr>");
	$.each(reports, function(i, item) {
    	//console.log(reports[i].status);
    	$("#reportTable").append("<tr id="+reports[i].id+"><th width='14'><div style='float:left;margin:0;vertical-align: middle;'><input  style='margin:0;vertical-align:middle;' type='checkbox' name='"+reports[i].id+"' value='"+reports[i].status+"'></div></th><td>" + reports[i].child_name + "</td><td>" + reports[i].status +"</td><td><div class='pull-right'><!-- <a class='btn btn-danger btn-mini' href='javascript:clearReport("+reports[i].id+")'>clear <span class='icon-warning-sign'></span></a> &nbsp; &nbsp;<a class='' href='../reports/edit/"+reports[i].id+"'></a>--></div></td><td><span class='icon-chevron-right pull-right'></span></td></tr>");
	});
	$("#reportTable td").click(function(evt){
		//console.log($(evt.target).parent().get(0).id);
		window.location.href = "../reports/edit/" + $(evt.target).parent().get(0).id;
		//window.location.href = "../reports/edit/" + this.id;
	});
	
	$('#reportTable').find('input:checkbox').click(function(){
		//console.log($(this).val());
		handleActionBar();
	});
	
	$("tr").not(':first').hover(
			function () {
				$(this).addClass("highlight");
			}, 
			function () {
				$(this).removeClass("highlight");
			}
		);
		
		//TODO: initialize actionBar buttons, set visible to false. code logic to activate/deactivate accordingly
		//$("#print").parent().addClass('disabled');
		//$("#actionBar li").hide();
		disableAllActions();
	
}
function handleActionBar(){
	
	var status = "";
	var check = "";
	var cut = false;
	if($('#reportTable th input:checked').length == 0)
	{
		disableAllActions();
	}
	else {
		$('#reportTable').find('input:checkbox').each(function(){
			if($(this).prop("checked")){
				
				status = $(this).val();
				//console.log($(this).prop('name') + " is active");
				if(status == check || check===""){
					//console.log("all the same status");
					check = status;
				}
				else{
					enableAllButPrintEmail();
					cut = true;
					return false;
				}
			}
		});
		
		if(status == check && status != ""){
			if(status === "DRAFT"){
				enableAllButPrintEmail();
			}
			else{
				enableAllActions();
			}
		}
	
	}
	
		//console.log("All selected? " + $('#reportTable th input:checked').length + " : " + $('#reportTable th input').length);
		//console.log( $('#reportTable th input:checked').length  === $('#reportTable th input').length);
		
	/*if(status == check && status != ""){
		if(status === "DRAFT"){
			enableAllButPrintEmail();
		}
		else{
			enableAllActions();
		}
	}
	else if(cut == true){
		
	}*/
}
function enableAllButPrintEmail(){
	$("#actionButtons button").each(function(){
		//console.log($(this).prop('id') == "printBtn");
		if($(this).prop('id')== "printBtn" ||$(this).prop('id')== "emailBtn" ){
			$(this).addClass('disabled');
		}
		else{
			$(this).removeClass('disabled');
		}
	});
}
function disableAllActions(){
	$("#actionButtons button").each(function(){
		$(this).addClass('disabled');
	});
}
function enableAllActions(){
	$("#actionButtons button").each(function(){
		$(this).removeClass('disabled');
	});
}
function handlePrintClick(){
	
	action = "PRINT";
	$("#actionBar").show();
   $("#reportTable").find('div').show();
   $('#reportTable tr').unbind('click');//(function(event){event.preventDefault();return false;});

}
function toggleSelectAll(){
	
	 var status = $('#selectAll').prop("checked") ;
	$('#reportTable').find('input:checkbox').prop('checked', status);
	
}
function selectAll(){
	
	
	$('#reportTable').find('input:checkbox').prop('checked', 'checked');
	handleActionBar();
}
function deSelectAll(){
	
	
	$('#reportTable').find('input:checkbox').prop('checked', false);
	handleActionBar();
	
}

function doPrintSelected(){
	
	$("#spinner").show();
	var id = new Array();
	$("#reportTable input:checked").each(function(){
		id.push($(this).prop('name'));
	});
	
	//console.log(id);
	
	var msg = {
		"reports" : id
	};
	//console.log(JSON.stringify(msg));
	$.ajax({
			  type: "POST",
			  async: false,
			  data: JSON.stringify(msg),
			  dataType: "JSON",
			  url: '../reports/print_reports',
			  beforeSend: function(x) {
				  if (x && x.overrideMimeType) {
					  x.overrideMimeType("application/j-son;charset=UTF-8");
				  }
			  },
			  success: function(result) {
				  console.log("report " + id+ " as successfully printed: " + result.success);
			
				 $("#spinner").hide();
			
				
			 },
			 error: function (request, status, error) {
							 alert(status + " : " + error);
						 $("#spinner").hide();
					  }
				  });
		
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
				  //console.log("report " + id+ " as successfully cleared: " + result.success);
			
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
