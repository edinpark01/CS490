<?php include "conf.php";?>
<?php
	$str_json = file_get_contents('php://input'); 
	$response = json_decode($str_json, true); // decoding received JSON to array
	$category=$response['category'];
	$level=$response['level'];
	$res_proejct=question_project($category,$level);	
	echo $res_proejct;

function question_project($category,$level){
	$data = array('category' => $category,'level'=>$level);
	$url = $GLOBALS['BACK_PATH']."filterquestion_back.php";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	$response = curl_exec($ch);
	curl_close ($ch);
	return $response;
}
?>