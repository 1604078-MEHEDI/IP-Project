<?php

require_once 'db_connect.php';

//if form is submitted
if ($_POST) {

	$validator = array('success' => false, 'messages' => array());

	$name = $_POST['name'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$active = $_POST['active'];
    

	$submitted_Name = $_FILES["images"];
	$images = $submitted_Name["name"];

	$pathname = "images/" . "r1.jpg";
	$imageFileType = strtolower(pathinfo($pathname, PATHINFO_EXTENSION));

	$sql = "insert into dhaka_resturent (name,images, location)values('$name','$pathname', '$address');";
	$result = $db->query($sql);

	if (move_uploaded_file($_FILES["images"]["tmp_name"], $pathname)) {
		if ($result) {
		//	header('Location: insert.php');
			//echo "The file " . basename($_FILES["images"]["name"]) . " has been uploaded.";
		}
	} else {
		echo "Sorry, there was an error uploading your file.";
	}

	$sql = "INSERT INTO members (name, contact, address, active) VALUES ('$name', '$contact', '$address', '$active')";
	$query = $connect->query($sql);

	if ($query === TRUE) {
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";
	} else {
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the member information";
	}

	// close the database connection
	$connect->close();
    $db->close();

	echo json_encode($validator);
}
