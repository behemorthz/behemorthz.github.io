<?php 
	header('Content-Type: application/json');
	if(isset($_POST)){
		if(array_key_exists('f1-first-name',$_POST) &&
			array_key_exists('f1-last-name',$_POST) &&
			array_key_exists('f1-student-id',$_POST) &&
			array_key_exists('f1-faculty',$_POST) &&
			array_key_exists('f1-field-of-study',$_POST) &&
			array_key_exists('f1-email',$_POST) &&
			array_key_exists('f1-phone',$_POST) &&
			array_key_exists('f1-topic',$_POST) &&
			array_key_exists('f1-advisor',$_POST) &&
			array_key_exists('f1-abstract',$_POST) &&
			array_key_exists('f1-graduate',$_POST) &&
			array_key_exists('f1-youtube',$_POST)){

			include 'saveToDB.php';
			$isSave = saveToDB($_POST);
			if($isSave['return_code'] == 1){
				echo json_encode($isSave);
			}
			else if($isSave['return_code'] == 2) {
				echo json_encode($isSave);
			}

		}
		else if($isSave['return_code'] == 3){
			echo json_encode($isSave);
		}
		
	}
 ?>