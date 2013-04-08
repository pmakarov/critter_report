<?php
	// I guess you could write your save methods 
    //header('Content-type: application/json');
    //header('X-JSON: ' . $js->object($response));
    // Convert the PHP array to JSON and echo it
    //echo $js->object($response);
	//echo  new CakeResponse(array('body'=> json_encode($response));
	echo json_encode($response);
?>