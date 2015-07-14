<?php

	// default result
	$defaultResult = array(
		"status" => array(
			"code" => 400,
			"text" => "error",
			"description" => "there_was_an_error"
		),
		"data" => null
	);

	// randomly delay the response - max should be longer than client-side request 
	// timeout to test timeout handling on the client side
	sleep(rand(0,8));

//	// break a specific caller
//	if ($_POST["name"] === 'two') {
//		 echo 'xa:sb:cz';
//		 return;
//	}

	$val = rand(0,9);

	// return invalid data
	if ($val == 9) {
		echo "{adfdajajdfkj}";
		return;
	}

	// return no data
	if ($val == 8) {
		return;
	}
	
	// return fail response code
    if ($val == 7) {
		http_response_code(404);
		return;
	}
	
	// success result
	$result = array(
			"status" => array(
			"code" => 200,
			"text" => "ok",
			"description" => "success"	
		),
		"data" => date("H:i:s")
	);	
			
	$jsonResult = json_encode($result);
			
	if ($jsonResult === false) {
		$defaultResult["status"]["description"] = "json_encode_error";
		echo json_encode($defaultResult);
		return;
	}
	
	echo $jsonResult;
	
	