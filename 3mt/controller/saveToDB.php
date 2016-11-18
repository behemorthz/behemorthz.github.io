<?php 
	include 'connectDB.php';

function saveToDB($competitorData){
	global $conn;
	$firstname = $competitorData['f1-first-name'];
	$lastname = $competitorData['f1-last-name'];
	$student_id = $competitorData['f1-student-id'];
	$faculty = $competitorData['f1-faculty'];
	$field_of_study = $competitorData['f1-field-of-study'];
	$email = $competitorData['f1-email'];
	$phone = $competitorData['f1-phone'];
	$topic = $competitorData['f1-topic'];
	$advisor = $competitorData['f1-advisor'];
	$abstract = $competitorData['f1-abstract'];
	$graduate = $competitorData['f1-graduate'];
	$youtube = $competitorData['f1-youtube'];

	if(!$conn->connect_error){
		$sql = "INSERT INTO competitor (firstname, lastname, student_id, faculty, field_of_study, email, phone, topic, advisor, abstract, graduate, youtube, isVerify)
		VALUES ('$firstname', '$lastname', 
				'$student_id', '$faculty',
				'$field_of_study', '$email',
				'$phone', '$topic',
				'$advisor', '$abstract',
				'$graduate', '$youtube',
				'0')";
		if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
		   	$conn->close();
		    return array('return_code' => 1,'id' => $last_id);
		} else {
			$conn->close();
			return array('return_code' => 2,'id' => null);
		}
	}
	else {
		$conn->close();
		return array('return_code' => 3,'id' => null, 'error' => $conn->connect_error);
	}
}


 ?>