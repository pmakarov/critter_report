<?php
	echo $this->Html->css('custom-theme/jquery-ui-1.10.0.custom.css');
	echo $this->Html->css('datepicker.css');
	echo $this->Html->css('bootstrap-timepicker.css');
	echo $this->Html->css('select2.css');
	echo $this->Html->css('timepicker.css');
  	
  	echo $this->Html->script('jquery-ui-1.10.0.custom.min.js');
    echo $this->Html->script('bootstrap-typeahead.js');
    echo $this->Html->script('select2.js');
    echo $this->Html->script('bootstrap-datepicker.js');
    echo $this->Html->script('bootstrap-timepicker.js');
	
       
?>
<div class="reports form">
<div class="wrapper">
<div class="container">
	<div class="navbar">
              <div class="navbar-inner">
                <div class="container">
                  <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                 
                  <div class="nav-collapse collapse navbar-responsive-collapse">
                  	<ul class="nav">
                  		<li><?php 
                  			//$span =  $this->Html->tag('span','', array('class' => 'icon-home',  'escape' => false));
							echo $this->Html->link('<span class="icon-home"></span>' . ' '. 'Home', array('controller' => 'users', 'action' => 'dashboard_users'), array('escape' => false)); ?>
                  			
                  		</li>
                  		
                  		<li class="divider-vertical"></li>
                  	</ul>
                    <ul class="nav pull-right">
                    	
                      <li class="divider-vertical"></li>
                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <span class="icon-pencil"></span>&nbsp;Mark</a>
                        <ul class="dropdown-menu">
                          	<li><a href="#">Mark Absent</a></li>
                         	<li><a href="#">Clear</a></li>
                          	<!-- <li><a href="#">Remove</a></li> -->
                        </ul>
                      </li>
                      <li class="divider-vertical"></li>
                      <li><?php echo $this->Html->link('<span class="icon-envelope"></span>&nbsp;'. 'Email', array('action' => 'send_report', $id), array('escape' => false)); ?></li>
                     
                      <li class="divider-vertical"></li>
                      <li><a href="#"> <span class="icon-print"></span>&nbsp;Print</a></li>
                      <li class="divider-vertical"></li>
                      <li><?php echo $this->Html->link(__('PDF'), array('action' => 'view_pdf', 'ext' => 'pdf', $id)); ?></li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>
 <form class="cmxform" id="reportForm" method="post" action="">
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
         
            <legend>General Information:</legend>
            <div class="row-fluid">
              <div class="span6">
                <label>Child's Name</label>
				<?php 
					echo $this->Form->input('child_id', array('required'=>'true', 'style'=>'width:300px','type'=>'select', 'label'=>false, 'options'=> $childrenOptions_list, 'selected' => $this->data['Report']['child_id']));?>
              </div>
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
              <!--/span--> 
            </div>
            <!--/row -->
            <div class="row-fluid">
              <div class="span6">
                <div class="control-group">
                  <label class="control-label">Room:</label>
                  <div class="controls">
				  	<?php echo $this->Form->input('room_id', array('required'=>'true', 'type'=>'select', 'style'=>'width:300px','type'=>'select', 'label'=>false, 'options'=> $rooms, 'selected' => $this->data['Report']['room_id']));?>
                  </div>
                </div>
              </div>
              <div class="span6">
                <div class="control-group">
                  <label class="control-label">My Teachers Today:</label>
                  <div class="controls">
				  <?php
					//$options = array(1=>'One', 2=>array('name'=>'Two', 'value'=>2, 'class'=>'extra'), 3=>'Three');
					//$options = $this->Teacher->find('list');
					//echo $this->Form->input('teachersList', array('multiple'=>'multiple', 'required'=>'true', 'style'=>'width:300px','type'=>'select'));
					echo $this->Form->input('teachersList', array('multiple'=>'multiple', 'required'=>'true', 'style'=>'width:300px','type'=>'select', 'label'=>false, 'options'=> $teacherOptions));
					?>
                   <!-- <select id="teachersList"  multiple="multiple" style="width:300px" required="true"> -->
					
                    <!--  <option></option>
                      <option value="1">Kate Winslet</option>
                      <option value="2">Meryl Streep</option>
                      <option value="3">Juliette Binoche</option>
                      <option value="4">Emma Thompson</option>
                      <option value="5">Hilary Swank</option> -->
                    </select>
                  </div>
                </div>
              </div>
              </div>
               <legend>Actvities</legend>
              <div class="row-fluid">
             
              <div class="span3">
                <div class="control-group">
                  <label id="activityCheckboxesOne" required="true" class="control-label">Today I...</label>
                  <div id="activityCheckboxesOneDiv" class="controls">
                    <label class="checkbox">
                      <input id="gymActivity" type="checkbox" value="went to the gym">
                      Went to the Gym </label>
                    <label class="checkbox">
                      <input id="outsideActivity" type="checkbox" value="went outside">
                      Went Ouside </label>
                    <label class="checkbox">
                      <input id="artsActivity" type="checkbox" value="did arts and crafts">
                      Did Arts and Crafts </label>
                  </div>
                </div>
              </div>
              <div class="span3">
                <div class="control-group">
                  <label id="activityCheckboxesTwo"   class="control-label">&nbsp;</label>
                  <div  class="controls">
                    <label class="checkbox">
                      <input id="otherActivity" type="checkbox" value="" >
                      Other </label>
                    <div id="otherTextInputDiv">
                      <input type="text" id="otherTextInput" value="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/row -->
        
          
         <legend>Eating</legend>
            <div class="row-fluid">
            
            <div class="span6">
                <label class="control-label">Breakfast</label>
                <div id="slider"></div>
                <label class="control-label">Lunch</label>
                <div id="slider2"></div>
                <label class="control-label">Snack</label>
                <div id="slider3"></div>
              </div>
            </div>
            </div>
             <legend>Attitude</legend>
            <div class="row-fluid">
           
            <!--/span-->
              <div class="span6">
                <div class="control-group">
                  <label class="control-label">Today I was:</label>
                  <div class="controls">
                    <select id="personalityList"  multiple="multiple" style="width:300px" required="true">
                      <option></option>
                      <option value="1">Helpful</option>
                      <option value="2">Not Myself</option>
                      <option value="3">Sad</option>
                      <option value="4">Happy</option>
                      <option value="5">Friendly</option>
                      <option value="6">Silly</option>
                      <option value="7">Curious</option>
                      <option value="8">Sleepy</option>
                      <option value="9">Quiet</option>
                      <option value="10">Chatty</option>
                      <option value="11">Teary</option>
                      <option value="12">Cranky</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!--/row -->
             <legend>Sleep</legend>
            <div class="row-fluid">
           
            <div id="sleepyDiv" class="span2">
                    <label id="sleepy" required="true">I slept from:</label>
                    <div class="input-append bootstrap-timepicker">
                      <input id="timepicker1" type="text" class="input-small" required="true">
                      <span class="add-on"><i class="icon-time"></i></span> </div>
                       
                  </div>
                  <div id="sleepyDiv2" class="span4">
                    <label id="sleepy2">to:</label>
                    <div class="input-append bootstrap-timepicker">
                      <input id="timepicker2" type="text" class="input-small" required="true">
                      <span class="add-on"><i class="icon-time"></i></span> </div>
                  </div>
            	
            </div>
            <div class="row-fluid">
              <div class="span6">
            <div class="control-group">
		                  <label class="control-label">&nbsp;</label>
		                  <div class="controls">
		                    <label id="sleepy3"  class="checkbox">
		                      <input type="checkbox" value="" id="notSleepy">
		                      I was not sleepy! </label>
		                  </div>
                		</div>
                		</div>
              <!--/span-->
              
            </div>
            <!--/row-->
             <legend>Potty</legend>
            <div class="row-fluid">
            <div class="span6">
            <label>Undergarment fashion:</label>
             <div class="control-group radio">
		       <div class="controls">
		       <label><input type="radio" name="optionsRadios3" id="diapersCheckbox" value="diapers" checked/>diapers</label>
		       <label><input type="radio" name="optionsRadios3" id="underwearCheckbox" value="underwear" />underwear</label>
	            </div>
		       </div>
             </div>
              <div class="span6">
               <label>Potty Mode:</label>
             <div class="control-group radio">
		       <div class="controls">
		       <label><input type="radio" name="optionsRadios2" id="pottyTrainingCheckbox" value="Potty Training" />In Training</label>
		       <label><input type="radio" name="optionsRadios2" id="naCheckbox" value="N/A" checked/>N/A or already trained</label>
	            </div>
		       </div>
             </div>
            </div>
           <div class="row-fluid">
           <div id="PottEventContainer"><div id="pottyEventLabel"><strong>Potty Events:</strong></div><div id="pottyEventTable"></div>
           </div>
            
                  <div class="span2"> <label>&nbsp;</label><a data-toggle="modal" class="btn btn-small" role="button" href="#pottyTrainingTable">Add Potty Event »</a>
                    <div aria-hidden="true" aria-labelledby="pottyTrainingTable" role="dialog" tabindex="-1" class="modal hide fade" id="pottyTrainingTable">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h3 id="leadTimeLabel">Potty Event:</h3>
                      </div>
                      <div class="modal-body">
	                  <div class="row-fluid">
		                   <div id="pottyTimeSelectorDiv" class="span4">
		                    <label id="pottyTimeSelector">New Potty Event Time:</label>
		                    <div class="input-append bootstrap-timepicker">
		                      <input id="timepicker3" type="text" class="input-small" required="true">
		                      <span class="add-on"><i class="icon-time"></i></span> </div>
		                  </div>
	                  </div>
	                  <div class="row-fluid">
	                   <div class="span12">
	                   <div class="control-group checkbox">
	                   	<div class="controls">
	                   		<div><label><input type="checkbox" name="options4" id="peeBox" value="option1"/> Pee </label></div>
		                  		<div><label><input type="checkbox" name="options4" id="pooBox" value="option1" /> BM </label></div>
	                   	</div>
	                   </div>
	                  	<div id="wetBoxDiv"><label class="radio inline"><input type="radio" name="options" id="wetBox" value="Wet" /> Wet </label>
		                  	<label class="radio inline"><input type="radio" name="options" id="dryBox" value="Dry" /> Dry </label>
		                </div>     	
	                  </div>
	                 
	                  </div>
	                  <div class="row-fluid">
	                  <div class="span6">
	                  	<div class="control-group checkbox">
	                  		<div class="controls">
	                  		<div><label><input type="checkbox" name="options4" id="accidentBox" value="option1"/> I had an accident </label></div>
	                  		<div><label><input type="checkbox" name="options4" id="triedBox" value="option1" /> Tried </label></div>
	                  		</div>
	                  		</div>
	                  </div>
	                  </div>
<!--                         <table id="pottyTrainingDataTable" class="table table-striped"> -->
<!--                         <thead> -->
<!--                             <tr> -->
<!--                              <th></th> -->
<!--                               <th>9am</th> -->
<!--                               <th>12pm</th> -->
<!--                               <th>3pm</th> -->
<!--                               <th>5pm</th> -->
<!--                             </tr> -->
<!--                           </thead> -->
<!--                           <tbody> -->
<!--                            <tr> -->
<!--                               <th>Wet</th> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                             </tr> -->
<!--                              <tr> -->
<!--                               <th>Dry</th> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                             </tr> -->
<!--                              <tr> -->
<!--                               <th>Tried</th> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                             </tr> -->
<!--                             <tr> -->
<!--                               <th>Peed</th> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                             </tr> -->
<!--                             <tr> -->
<!--                               <th>BM</th> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                               <td><input type="checkbox" value="9AMPee"/></td> -->
<!--                             </tr> -->
<!--                           </tbody> -->
<!--                         </table> -->
                      </div>
                      <div class="modal-footer">
                        <button aria-hidden="true" data-dismiss="modal" onclick="javascript:addPottyEvent(event);" class="btn">OK</button>
                      </div>
                    </div>
                  </div>
            </div>
        
        </div>
       
        <!-- #second_step -->
        <div id="second_step">
        <legend>Incidentals and Comments</legend>
          <div class="row-fluid">
              <div class="span6">
                <div class="control-group">
                  <label class="control-label">Needed Items:</label>
                  <div class="controls">
                    <select id="neededItemsList" name="neededItemsList" multiple="multiple" style="width:300px" required="true">
                      <option></option>
                      <option value="1">Diapers</option>
                      <option value="2">Wipes</option>
                      <option value="3">Extra Clothes</option>
                      <option value="4">Sheet</option>
                      <option value="5">Blanket</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="span6">
              	<div class="control-group">
                	<label class="control-label">Teachers' Comments</label>
                	<div class="controls">
                		<?php echo $this->Form->input('notes', array('required'=>'true', 'type'=>'textarea', 'rows'=> '6', 'label'=>false, 'class'=>'field span12', 'placeholder' => 'Today we...', 'value' => $this->data['Report']['notes']));?>
                		<!--<textarea placeholder="Today we ..." rows="6" id="teacherComments" class="field span12" required="true"></textarea> -->
                	</div>
                </div>
              </div> 
          </div>
        </div>
               
             
              <div class="row-fluid">
              	<div class="span12 pull-right">
              	<div class="pull-right"><a class="btn" id="saveBtn" role="button" href="javascript:doSave()"><i class="icon-list-alt"></i>&nbsp;Save</a> <a id="submitBtn" class="btn btn-success" role="button" href="javascript:doSubmit();">Submit »</a></div>
              	</div>
              </div>
             
            </div>
          </div>
          </div>
          </form><!--/mainForm--> 
        </div><!--/end container Div -->
      </div><!--/end Wrapper Div -->
      
      <div id="spinner" class="spinner" style="display:none;">
			<?php echo $this->Html->image('spinner.gif', array('alt' => 'Loading', 'id' => 'img-spinner')); ?>
		<!-- <img id="img-spinner" src="../img/spinner.gif" alt="Loading"/> -->
		Loading...
	  </div>
<!--
<script src="js/jquery-1.9.0.min.js" ></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui-1.10.0.custom.min.js"></script> 
<script src="js/modernizr-2.6.2.min.js"></script> 
<script src="js/bootstrap-typeahead.js" type="text/javascript"></script> 
<script src="js/select2.js" type="text/javascript"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/bootstrap-timepicker.js"></script> -->



<!-- <script src="js/jquery.validate.js"></script>  -->
<!-- <script src="js/jquery.validity.js"></script>  -->

<script type="text/javascript">
var userId  = "<?php echo $userId; ?>";
var userLocation = "<?php echo $userLocation; ?>";
var teacherArray = "<?php echo $this->data['Report']['teacher_list']; ?>";
var activities = "<?php echo $this->data['Report']['daily_activity']; ?>";
var breakfast = "<?php echo $this->data['Report']['breakfast']; ?>";
var lunch = "<?php echo $this->data['Report']['lunch']; ?>";
var snack = "<?php echo $this->data['Report']['snack']; ?>";
var attitude = "<?php echo $this->data['Report']['attitude']; ?>";
var sleep = "<?php echo $this->data['Report']['sleep']; ?>";
var potty = "<?php echo $this->data['Report']['potty']; ?>";
var needed = "<?php echo $this->data['Report']['needed_items']; ?>";
var sleep = "<?php echo $this->data['Report']['sleep']; ?>";


if(teacherArray!= null && teacherArray != ""){
	teacherArray = teacherArray.split("|");
}
if(activities!=null && activities!= ""){
	activities = activities.split("|");
}

if(attitude!=null && attitude!= ""){
	attitude = attitude.split("|");
}

if(potty!=null && potty!=""){
	potty = potty.split("|");
}

if(needed!=null && needed!=""){
	needed = needed.split("|");
}

var warn = true;
var isValid = false;
var _STATUS = "DRAFT"; //DRAFT / SUBMITTED / SENT
var _REPORT_ID = "<?php echo $id; ?>";
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
			        	
			        	$("#child_id").select2({ 
			        	    placeholder: "Select a Child"
			        		});
			        	
			        	
			        	$("#room_id").select2({ 
			        	  
			        		}); 
			        	
			        	
			        	$("#teachersList").select2({ 
			        	    placeholder: "Select Teachers",
			        	    
			        	    
			        		});
			        		
			        	if(teacherArray.length > 0)
			        	{
			        		//console.log("we got teachers " + teacherArray);
			        		
			        		sel = new Array();
			        		$("#teachersList option").each(function() {
							    // add $(this).val() to your list
							    for(var i=0; i < teacherArray.length; i++)
							    {
							    	if(teacherArray[i] == $(this).text()){
							    		
							    		//console.log("match");
							    		//$(this).select
							    		//$(this).selected = true;
							    		sel.push($(this).val());
							    	
							    	}
							    }
							   // console.log($(this).text());
							});
							$("#teachersList").select2("val", sel);
							sell = null;
			        	}
			        	
									        	
			        	$("#neededItemsList").select2({ 
			        	    placeholder: "Select Needed Items"
			        		});
			        		
			        	if(needed.length > 0)
			        	{
			        		//console.log("we got teachers " + teacherArray);
			        		
			        		sel = new Array();
			        		$("#neededItemsList option").each(function() {
							    // add $(this).val() to your list
							    for(var i=0; i < needed.length; i++)
							    {
							    	if(needed[i] == $(this).text()){
							    		
							    		//console.log("match");
							    		//$(this).select
							    		//$(this).selected = true;
							    		sel.push($(this).val());
							    	
							    	}
							    }
							   // console.log($(this).text());
							});
							$("#neededItemsList").select2("val", sel);
							sell = null;
			        	}
			        	
			        	$("#personalityList").select2({ 
			        	    placeholder: "Select a Personality"
			        		});
			        	 
			        	 if(attitude.length > 0){
			        	 	sel = new Array();
			        		$("#personalityList option").each(function() {
							    // add $(this).val() to your list
							    for(var i=0; i < attitude.length; i++)
							    {
							    	if(attitude[i] == $(this).text()){
							    		
							    		//console.log("match");
							    		//$(this).select
							    		//$(this).selected = true;
							    		sel.push($(this).val());
							    	
							    	}
							    }
							   // console.log($(this).text());
							});
							$("#personalityList").select2("val", sel);
							sell = null;
			        	 }
			        	
			        	//sleep start and end pickers
			        	 $('#timepicker1').timepicker({
			        	     //defaultTime: false
			        	 });
			        	 $('#timepicker2').timepicker({
			        	    // defaultTime: false
			        	 });
			        	 
			        	 
			        	 if(sleep!=null && sleep !="")
			        	 {
			        	 	if(sleep === "I was not sleepy."){
			        	 		$("#notSleepy").prop('checked', 'checked');
			        	 		$('#sleepyDiv').hide();
							 	$('#sleepyDiv2').hide();
			        	 	}
			        	 	else {
			        	 		var started = sleep.replace("I slept from: ","");
			        	 		var start = started.split("to: ")[0];
			        	 		var end = started.split("to: ")[1]
			        	 		console.log(start + " " +  end);
			        	 		$("#timepicker1").val(start);
			        	 		$("#timepicker2").val(end);
			        	 		
			        	 	}
			        	 }
			        	 
			        	 //potty event picker
			        	 $('#timepicker3').timepicker({
			        	    // defaultTime: false
			        	 });
			        	 
			        	 $('#otherActivity').click(function(event){
			        	    
			        	     $('#otherTextInputDiv').toggle('fast');
			        	     if(!$("#otherActivity").is(":checked")){
			        	     	$("#otherTextInput").val("");
			        	 	}
			        	     
			        	 });
						 
						  $('#notSleepy').click(function(event){
			        	    
			        	     $('#sleepyDiv').toggle();
							 $('#sleepyDiv2').toggle();
							
			        	 });
	
	 					$('#otherTextInputDiv').hide();
	
	 					var slider =  $( "#slider" ).slider({
	 					    range: "min"
	 					    }); 
	 					var options = [ "25%", "50%", "75%", "100%"];
	 					
	 					//how far apart each option label should appear
	 					var width = slider.width() / (options.length);

	 					//after the slider create a containing div with p tags of a set width.
	 					slider.after('<div style="width:'+width+'" ><span style="width:' + width + 'px;display:inline-block;text-align:right">' + options.join('</span><span style="width:' + width + 'px;display:inline-block;text-align:right">') +'</span></div>');
	 					//slider.after('<div class="ui-slider-legend"><p style="width:' + width + 'px;">' + options.join('</p><p style="width:' + width + 'px;">') +'</p></div>');
	 					slider.slider('value',breakfast);
	 					
	 					var slider2 =  $( "#slider2" ).slider({
	 					    range: "min"
	 					    }); 
	 					slider2.after('<div style="width:'+width+'" ><span style="width:' + width + 'px;display:inline-block;text-align:right">' + options.join('</span><span style="width:' + width + 'px;display:inline-block;text-align:right">') +'</span></div>');
	 					slider2.slider('value', lunch);

	 					var slider3 =  $( "#slider3" ).slider({
	 					    range: "min"
	 					    }); 
	 					slider3.after('<div style="width:'+width+'" ><span style="width:' + width + 'px;display:inline-block;text-align:right">' + options.join('</span><span style="width:' + width + 'px;display:inline-block;text-align:right">') +'</span></div>');
	 					slider3.slider('value', snack);
	 					
	 					
	 					$("#optionsRadios3").change(function(){
	 					   var $this = $(this);
	 					    if ($this.val()== "diapers") {
	 						console.log("diapers checked");
	 							$("#wetBoxDiv").show();
		 					   	$("#dryBoxDiv").show();
	 					    }
	 					    else{
	 						console.log("diapers unchecked");
		 						$("#wetBoxDiv").hide();
		 					   	$("#dryBoxDiv").hide();
	 					    }
	 					  
	 					   
	 					});
	 					
	 					if(activities.length > 0){
	 						
	 						$("#activityCheckboxesOneDiv input").each(function(){
		 						for(var i=0; i < activities.length; i++){
		 							if(activities[i] === $(this).val())
		 							{
		 								$(this).prop('checked', 'checked');
		 							}
		 							if(activities[i].indexOf("other::")>-1){
		 								$("#otherActivity").prop('checked', 'checked');
		 								$("#otherTextInput").val(activities[i].split("::")[1]);
		 								$("#otherTextInputDiv").show();
		 							}
		 						}
	 						});
	 						
	 						
	 					}
	 					
	 					if(potty.length > 0){
	 						for(var i =0; i < potty.length; i++){
	 							var pottyEventItem = $('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>'+potty[i]+'</div>');
								pottyEventItem.appendTo("#pottyEventTable");
	 						}
	 						
							$("#pottyEventLable").show();
	 					}
	 	
	
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
	    
	    var pottyEventItem = $('<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>'+msg+'</div>');
		pottyEventItem.appendTo("#pottyEventTable");
		$("#pottyEventLable").show();
		//reset potty event form:
		$("#pottyTrainingTable input").attr('checked', false);
	}
	function doSave(){
		_STATUS = "DRAFT";
	    submitFormData();
	     $("html, body").animate({ scrollTop: 0 }, "slow");
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
	 	
	 	
	 	 /*console.log("Child: " + $("#child_id option:selected").text());
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
		     
		     var otherActString = "other::" + $("#otherTextInput").val();
		     activityString = (activityString==="") ? otherActString : activityString+ "|"+otherActString;
		 }
		 
		 //get needed items
		 var nl = $("#neededItemsList option:selected").map(function(){return this.text});
		 
		 var al = $("#personalityList option:selected").map(function(){return this.text});
		// console.log("attitude List: " + al.get().join("|"));
		 
		 //get sleep status
		 var sleepMessage = "";
		 if(!$("#notSleepy").is(':checked')){
		     sleepMessage = "I slept from: " + $("#timepicker1").val() + " to: "+ $("#timepicker2").val()+ ".";
		 }
		 else sleepMessage = "I was not sleepy.";
		
		// console.log("sleep message: " + sleepMessage);
		//console.log($("#pottyEventTable div").text().split("×").join("|"));
		var idk = $("#pottyEventTable div").text().split("×").join("|");
		idk = idk.substr(1, idk.length);
		var wtf = idk;
		console.log(wtf);
		
		 var creatureReport = {
		 	 "id" : _REPORT_ID,
		 	 "userId" : userId,
		 	 "room" : $("#room_id").select2("val"),
			 "status" : _STATUS,
			 "student" : $("#child_id option:selected").val(),
			 "date" : $("#datepicker").data('date'),
			 "teachers" : tl.get().join("|"),
			 "dailyActivity" : activityString,
			 "neededItems" : nl.get().join("|"),
			 "attitudes" : al.get().join("|"),
			 "sleepMessage" : sleepMessage,
			 "percentageBreakfastComplete" : $('#slider').slider("option", "value"),
		 	 "percentageLunchComplete" : $('#slider2').slider("option", "value"),
		 	 "percentageSnackComplete" : $('#slider3').slider("option", "value"),
		 	 "pottyEvents" : wtf,
		 	 "teacherComments" : $("#notes").val()
			 
		 }
	 	 	 	 
	 	 	 //var URL = (_REPORT_ID === "") ? '../reports/ajax_function' : '../reports/edit/' + _REPORT_ID;
	 	 $.ajax({
	 	        type: "POST",
	 	        async: false,
	 	        data: JSON.stringify(creatureReport),
	 	        dataType: "JSON",
	 	        url: '../ajax_function',
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
	    /*console.log("Child: " + $("#child_id option:selected").text());
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
		
		 $("#child_id").select2("data", null);
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
			    	//console.log($("#otherActivity").is(":checked"));
	    		}
			break;
			
		    case "SELECT":
			var select = $(el).attr('id');
			//if(select == "child_id" || select == "neededItemsList" || select == "teachersList" || select == "personalityList")
			//handleSelect2ComboboxValidation(select);
			var tmp = $("#" + select).select2("data");
			
			if(select == "child_id" && (tmp == null || tmp.length == 0))
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
			    case "child_id":
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
	</script>
</div>
<!--<div class="reports form">
<?php echo $this->Form->create('Report'); ?>
	<fieldset>
		<legend><?php echo __('Edit Report'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('child_id', array('options'=> $childrenOptions_list));
		echo $this->Form->input('room_id');
		echo $this->Form->input('daycare_center_id');
		echo $this->Form->input('date');
		echo $this->Form->input('daily_activity');
		echo $this->Form->input('needed_items');
		echo $this->Form->input('attitude');
		echo $this->Form->input('sleep');
		echo $this->Form->input('breakfast');
		echo $this->Form->input('lunch');
		echo $this->Form->input('snack');
		echo $this->Form->input('potty');
		echo $this->Form->input('notes');
		echo $this->Form->input('Teacher');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div> -->
<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Report.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Report.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reports'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Children'), array('controller' => 'children', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Child'), array('controller' => 'children', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Daycare Centers'), array('controller' => 'daycare_centers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Daycare Center'), array('controller' => 'daycare_centers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
	</ul>
</div>-->

